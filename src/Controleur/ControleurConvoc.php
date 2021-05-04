<?php
use Acme\Controleur\ControleurSecurise;
use Acme\Modele\effectif;
use Acme\Modele\etat;
use Acme\Modele\competition;
use Acme\Modele\convocation;
use Acme\Modele\occupation;
class ControleurConvoc extends ControleurSecurise
{

    private $effectif;
    private $absence;
    private $competition;
    private $convocation;
    private $occupation;
    public function __construct()
    {
        $this->effectif= new effectif();
        $this->absence=new etat();
        $this->competition = new competition();
        $this->convocation = new convocation();
        $this->occupation = new occupation();
    }
    public function index()
    {
        $convoc = $this->convocation->getAllConvo();
        $tableau = $convoc->fetchAll(PDO::FETCH_ASSOC);
        foreach($tableau as $key=>$val)
        {
            $rep = $this->competition->getCompet($tableau[$key]["id_compet"]);
            $info = $rep->fetch(PDO::FETCH_ASSOC);
            $tableau[$key]["nom"]="$info[nom_compet]";
            if($tableau[$key]["nbre_convok"]<11)
                $tableau[$key]["publiable"]="Non";
            else
                $tableau[$key]["publiable"]="Oui";
        }
        $this->genererVue($tableau);

    }
    public function modifier()
    {
        if($this->requete->getSession()->getAttribut("type")!="Entraineur")
        {
            echo '<script type="text/javascript" > alert("Action non autorisé! Connectez vous en tant que Entraineur.");
            </script>';
            $this->setAction("index");
            $this->index();
        }
        else
        {
            if($this->requete->existeParametre("valider"))
            {
                $idconvo = $this->requete->getParametre("valider");
                $repon = $this->convocation->getConvo($idconvo);
                $tab = $repon->fetch(PDO::FETCH_ASSOC);
                $ID = $tab["id_compet"];
                $compe = $this->competition->getCompet($ID);
                $tableau = $compe->fetch(PDO::FETCH_ASSOC);
                $datecom = $tableau["datecompet"];
                $libres = $this->effectif->getLibre($datecom);
            }
            $this->genererVue(array("competition"=>$tableau,"dispo"=>$libres,"convo"=>$tab));
        }
    }
    public function modif()
    {
        if($this->requete->getSession()->getAttribut("type")!="Entraineur")
        {
            echo '<script type="text/javascript" > alert("Action non autorisé! Connectez vous en tant que Entraineur.");
            </script>';
            $this->setAction("index");
            $this->index();
        }
        else
        {
            if($this->requete->existeParametre("Valider"))
            {
                $lesids = $this->requete->getParametre("choix");
                $idcomp = $this->requete->getParametre("idcomp");
                $equi = $this->requete->getParametre("nomEquipe");
                $adv = $this->requete->getParametre("adv");
                $dateJ = $this->requete->getParametre("ladate");
                $nb = count($lesids);
                $Icon = $this->requete->getParametre("convol");
                $bon = $this->convocation->getConvo($Icon);
                $ress = $bon->fetch(PDO::FETCH_ASSOC);
                $ancien = $ress["nbre_convok"];
                $nouveau = $ancien+$nb;
                $this->convocation->maj($nouveau,$Icon);
                if($Icon!="")
                {
                    foreach($lesids as $val)
                    {
                        $req = $this->occupation->insererOccu($val,$dateJ,$Icon);
                    }
                }
                if($req)
                    echo '<script>alert("Mise à jour reussie");</script>';
                $this->setAction("index");
                $this->index();
            }
        }
    }
    public function creer()
    {
        if($this->requete->getSession()->getAttribut("type")!="Entraineur")
        {
            echo '<script type="text/javascript" >alert("Action non autorisé! Connectez vous en tant que Entraineur.");
            </script>';
            $this->setAction("index");
            $this->index();
        }
        else
        {
            if($this->requete->existeParametre("Envoyer"))
            {
                $equipe =$this->requete->getParametre("Equipe");
                $competitions = $this->competition->getCompetEq($equipe);
                $this->genererVue(array("compet"=>$competitions));
            }
            else
            {
                $this->genererVue(array());
            }
        }
    }
    public function gestion()
    {
        if($this->requete->getSession()->getAttribut("type")!="Entraineur")
        {
            echo '<script type="text/javascript" > alert("Action non autorisé! Connectez vous en tant que Entraineur.");
            </script>';
            $this->setAction("index");
            $this->index();
        }
        else
        {
            if($this->requete->existeParametre("valider"))
            {
                $idcompe = $this->requete->getParametre("competit");
                $compe = $this->competition->getCompet($idcompe);
                $tableau = $compe->fetch(PDO::FETCH_ASSOC);
                $datecom = $tableau["datecompet"];
                $libres = $this->effectif->getLibre($datecom);
            
            }      
            $this->genererVue(array("competition"=>$tableau,"dispo"=>$libres));
        }
    }
    public function ajout()
    {
        if($this->requete->getSession()->getAttribut("type")!="Entraineur")
        {
            echo '<script type="text/javascript" > alert("Action non autorisé! Connectez vous en tant que Entraineur.");
            </script>';
            $this->setAction("index");
            $this->index();
        }
        else
        {
            if($this->requete->existeParametre("Valider"))
            {
                $lesids = $this->requete->getParametre("choix");
                $idcomp = $this->requete->getParametre("idcomp");
                $equi = $this->requete->getParametre("nomEquipe");
                $adv = $this->requete->getParametre("adv");
                $dateJ = $this->requete->getParametre("ladate");
                $nb = count($lesids);
                try{
                $req = $this->convocation->CreationConvo($dateJ,$equi,$adv,$nb,$idcomp);
                }
                catch(Exception $e)
                {
                    echo "<script type='text/javascript' >";
                    echo 'alert("';
                    echo $e->getMessage();
                    echo '");</script>';    
                }
                if($req)
                {  
                    $resu = $this->convocation->getConvos($dateJ,$equi,$idcomp);
                    if($resu->rowCount()==1)
                    {
                        $af = $resu->fetch(PDO::FETCH_ASSOC);
                        $Icon = $af["id_convocation"];
                        foreach($lesids as $val)
                        {
                            $this->occupation->insererOccu($val,$dateJ,$Icon);
                        }
                    }
                }
                if($req)
                    echo '<script>alert("Convocation créée avec succes");</script>';
                $this->setAction("index");
                $this->index();
            }
        }
    }
    public function publier()
    {
        if($this->requete->getSession()->getAttribut("type")!="Entraineur")
        {
            echo '<script type="text/javascript" >alert(" Action non autorisé! Connectez vous en tant que Entraineur.");
            </script>';
            $this->setAction("index");
            $this->index();
        }
        else
        {
            $lesconvos = $this->convocation->getConvoN();
            $tableau = $lesconvos->fetchAll(PDO::FETCH_ASSOC);
            foreach($tableau as $key=>$val)
            {   
                $rep = $this->competition->getCompet($tableau[$key]["id_compet"]);
                $info = $rep->fetch(PDO::FETCH_ASSOC);
                $tableau[$key]["nom"]="$info[nom_compet]";
                if($tableau[$key]["nbre_convok"]<11)
                    $tableau[$key]["publiable"]="Non";
                else
                    $tableau[$key]["publiable"]="Oui";
            }
            $this->genererVue($tableau);
        }
    }
    public function publication()
    {
        if($this->requete->getSession()->getAttribut("type")!="Entraineur")
        {
            echo '<script type="text/javascript" >alert("Action non autorisée! Connectez vous en tant que Entraineur.");
            </script>';
            $this->setAction("index");
            $this->index();
        }
        else
        {
            if($this->requete->existeParametre("valider"))
            {
                $idconvo = $this->requete->getParametre("valider");
                $re = $this->convocation->publier("oui",$idconvo);
                if($re)
                {
                    echo '<script type="text/javascript" > alert("Publication effectuée avec succès!"); </script>';
                }
            }
            $this->setAction("index");
            $this->index();
        }
    }
}