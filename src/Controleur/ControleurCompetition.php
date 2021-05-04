<?php
use Acme\Controleur\ControleurSecurise;
use Acme\Modele\competition;
class ControleurCompetition extends ControleurSecurise
{

    private $competit;
    public function __construct()
    {
        $this->competit= new competition();
    }
    public function index()
    {
        $competitions = $this->competit->getCompetitions();
        $this->genererVue(array("competitions"=>$competitions));
    }
    public function maj()
    {
        if($this->requete->getSession()->getAttribut("type")=="Entraineur")
        {
            echo '<script type="text/javascript" >alert(" Action non autorisé! Connectez vous en tant que Secretaire.");
            </script>';
            $this->setAction("index");
            $this->index();
        }
        else
        {
            $this->genererVue();
        }
    }
    public function modifier()
    {
        
        if($this->requete->getSession()->getAttribut("type")=="Entraineur")
        {
            echo '<script type="text/javascript" > alert("Action non autorisé! Connectez vous en tant que Secretaire.");
            </script>';
            $this->setAction("index");
            $this->index();
        }
        else
        {
            if($this->requete->existeParametre("listecompet"))
            {
                $competitions = $this->competit->getCompetitions();
                $this->genererVue(array("competitions"=>$competitions));
            }else
            {
                $this->genererVue(array());
            }
        }
    }
    public function modif()
    {
        if($this->requete->getSession()->getAttribut("type")=="Entraineur")
        {
            echo '<script type="text/javascript" > alert("Action non autorisé! Connectez vous en tant que Secretaire.");
            </script>';
            $this->setAction("index");
            $this->index();
        }
        else
        {
            $id = $this->requete->existeParametre("lid")?$this->requete->getParametre("lid"):"";
            $nomcompe = $this->requete->existeParametre("nomcompet")?$this->requete->getParametre("nomcompet"):"";
            $equipe = $this->requete->existeParametre("Equipe")?$this->requete->getParametre("Equipe"):"";
            $equipAdv = $this->requete->existeParametre("Adversaire")? $this->requete->getParametre("Adversaire"):"";
            $date = $this->requete->existeParametre("ladate")?$this->requete->getParametre("ladate"):"";
            $heure = $this->requete->existeParametre("heure")?$this->requete->getParametre("heure"):"";
            $terrain = $this->requete->existeParametre("terrain")?$this->requete->getParametre("terrain"):"";
            $site = $this->requete->existeParametre("site")?$this->requete->getParametre("site"):"";
            if($this->requete->existeParametre("ajouter"))
            {
            
                $reponses = $this->competit->ajouterCompe(array($nomcompe,$equipe,$equipAdv,$date,$heure,$terrain,$site));
                if($reponses)
                {
                    echo "<script type='text/javascript' >alert('Insertion reussie');
                    </script>";
                }
            }
            else if($this->requete->existeParametre("retirer"))
            {
                $resul = $this->competit->retirerCompe($id);
                if($resul)
                {
                    echo "<script type='text/javascript' > alert('Suppression reussie');
                    </script>";
                }
            }   
            else
            {
                $resul = $this->competit->Maj(array($nomcompe,$equipe,$equipAdv,$date,$heure,$terrain,$site,$id));
                if($resul)
                {
                    echo "<script type='text/javascript' > alert('Mise à jour reussie');
                    </script>";
                }
            }
            $this->setAction("modifier");
            $this->modifier();
        }
    }
    public function import()
    {
        if($this->requete->getSession()->getAttribut("type")=="Entraineur")
        {
            echo '<script type="text/javascript" >alert("Action non autorisé! Connectez vous en tant que Secretaire.");
            </script>';
            $this->setAction("index");
            $this->index();
        }
        else
        {
            if($this->requete->existeParametre("fichier"))
            {
                $error="Importation reussie(s)";
                $nomfichier = $this->requete->getParametre("fichier");
                $this->setAction("maj");
                $f = fopen($nomfichier["tmp_name"],"r");
                flock($f,LOCK_EX);
                $count=0;
                $nbr=0;
                $reponses=array();
                while(($arr=fgetcsv($f,","))!==FALSE)
                {
                    if(count($arr)!=11)
                    {
                        $error = "Les informations ne sont pas corrects pour la table competition";
                        break; 
                    }
                    $count+=1 ;
                    $repon=false;
                    if($count==1){continue ;}
                    $ar[0]=$arr[1];
                    $ar[1]=$arr[2];
                    $ar[2]=$arr[5];
                    $ar[3]=($arr[6]=="")?null:$arr[6];
                    $ar[4]=($arr[7]=="")?null:$arr[7];
                    $ar[5]=$arr[9];
                    $ar[6]=$arr[10];
                    try{
                    $repon = $this->competit->ajouterCompe($ar);
                    }
                    catch(Exception $e)
                    {
                        echo "<script type='text/javascript' >";
                        echo 'alert("';
                        echo $e->getMessage();
                        echo '");</script>';
                    }
                    if($repon==true)
                    {
                        $nbr+=1;
                        $nbre= $count-1;
                        $reponses[]="$nbre importation reussie";
                    
                    }
                    else
                    {
                        $nbre= $count-1;
                        $reponses[]="$nbre ligne : Echec, Verifier le contenu du fichier importé";
                    }
                }
                flock($f,LOCK_UN);
                fclose($f);
                $this->setAction("maj");
                $this->genererVue(array("nbr"=>$nbr,"histo"=>$reponses,"nbre"=>$count,"error"=>$error));
            }
        }
    }
}