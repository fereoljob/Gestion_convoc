<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/etat.php';
require_once 'Modele/effectif.php';
class ControleurAbsence extends ControleurSecurise
{

    private $absents;
    private $effectif;
    public function __construct()
    {
        $this->absents= new etat();
        $this->effectif=new effectif();
    }
    public function index()
    {
        $absences = $this->absents->getAllEtat();
        $tableau = $absences->fetchAll(PDO::FETCH_ASSOC);
        foreach($tableau as $key=>$val)
        {
            $rep = $this->effectif->getJoueur($tableau[$key]["id_joueur"]);
            $infos = $rep->fetch(PDO::FETCH_ASSOC);
            $tableau[$key]["id_joueur"]="$infos[nom] $infos[prenom]";
        }
        $this->genererVue($tableau);
    }
    public function maj()
    {
        $this->genererVue();
    }
    public function modifier()
    {
        $joueurs = $this->effectif->getJoueur();
        $tab = $joueurs->fetchAll(PDO::FETCH_ASSOC);
        $absences = $this->absents->getAllEtat();
        $tableau = $absences->fetchAll(PDO::FETCH_ASSOC);
        foreach($tableau as $key=>$val)
        {
            $rep = $this->effectif->getJoueur($tableau[$key]["id_joueur"]);
            $infos = $rep->fetch(PDO::FETCH_ASSOC);
            $tableau[$key]["noms"]="$infos[nom] $infos[prenom]";
        }
        $this->genererVue(array("tab"=>$tableau,"liste"=>$tab));
    }
    public function modif()
    {
        $joueur = $this->requete->existeParametre("Joueur")?$this->requete->getParametre("Joueur"):"";
        $type = $this->requete->existeParametre("type") ? $this->requete->getParametre("type"):"";
        $date=$this->requete->existeParametre("ladate")?$this->requete->getParametre("ladate"):"";
        $lida = $this->requete->existeParametre("lida")?$this->requete->getParametre("lida"):"";
            if($this->requete->existeParametre("retirer"))
            {
                $resul = $this->absents->retirerJoueur(array($lida));
                if($resul)
                {
                    echo '<script type="text/javascript"> alert("Suppression reussie");
                    </script>';
                }
            }
            else if($this->requete->existeParametre("ajouter"))
            {
                $lesnom = explode(" ",$joueur);
                $nom = trim($lesnom[0]);
                $prenom = trim($lesnom[1]);
                $info = $this->effectif->getJoueurid(array($nom,$prenom));
                $lid = $info->fetch(PDO::FETCH_ASSOC);
                try{
                    $resul = $this->absents->ajouterJoueur(array($type,$date,$lid['id_joueur']));
                }catch(Exception $e)
                {
                    echo "<script type='text/javascript' >";
                                echo 'alert("';
                                echo $e->getMessage();
                                echo '");</script>';
                }
                if($resul)
                {
                    echo '<script type="text/javascript" >alert("Insertion reussie");
                    </script>';
                }
            }
            else
            {
                $resul = $this->absents->modifier(array($type,$date,$lida));
                if($resul)
                {
                    echo '<script type="text/javascript" > alert("Mise à jour reussie");</script>';
                }
            }
        $this->setAction("modifier");
        $this->modifier();
    }
    public function import()
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
            $matab = ['A','B','N','S'];
            $arrt=fgetcsv($f,",");
            $count+=1 ;
            while(($arr=fgetcsv($f,","))!==FALSE)
            {
                $repon=false;
                if($count==1){

                    if($arrt[0]!="nom_joueur")
                    {
                        $error = "Les informations ne sont pas corrects pour la table des absences";
                        break; 
                    }
                }
                $tab= explode(" ",$arr[0]);
                $prenom = trim($tab[0]);
                $nom = trim($tab[1]);
                $tab = [$nom,$prenom];
                $res = $this->effectif->getJoueurid($tab);
                if($res->rowCount()!=0)
                {
                    $info = $res->fetch(PDO::FETCH_ASSOC);
                    foreach($arr as $key=>$val)
                    {
                        
                        if(in_array($val,$matab))
                        {
                            try
                            {
                                $repon = $this->absents->ajouterJoueur(array($val,$arrt[$key],$info["id_joueur"]));
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
                                $nbre= $count;
                                $reponses[]="$nbre importation reussie";
                                
                            }
                            else
                            {
                                $nbre= $count;
                                $reponses[]="$nbre ligne : Echec, Verifier le contenu du fichier importé";
                            }
                            $count+=1;
                        }
                    }

                }
            }
            flock($f,LOCK_UN);
            fclose($f);
            $this->setAction("maj");
            $this->genererVue(array("nbr"=>$nbr,"histo"=>$reponses,"nbre"=>$count,"error"=>$error));
        }
    }
}