<?php
namespace Acme;
require_once __DIR__ . '/../../vendor/autoload.php';
use Acme\ControleurSecurise;
use Acme\Modele\effectif;
use Acme\Modele\etat;
class ControleurEffectif extends ControleurSecurise
{

    private $effectif;
    private $absence;
    public function __construct()
    {
        $this->effectif= new effectif();
        $this->absence=new etat();
    }
    public function index()
    {
        $joueurs = $this->effectif->getJoueur();
        $this->genererVue(array("joueurs"=>$joueurs));
    }
    public function maj()
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
            if($this->requete->existeParametre("listejoueurs"))
            {
                $joueurs = $this->effectif->getJoueur();
                $this->genererVue(array("joueurs"=>$joueurs));
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

            if(($this->requete->existeParametre("retirer")) || ($this->requete->existeParametre("Maj"))||
            ($this->requete->existeParametre("ajouter")))
            {
                $id = $this->requete->existeParametre("lid")?$this->requete->getParametre("lid"):"";
                $nom = $this->requete->existeParametre("nom") ? $this->requete->getParametre("nom"):"";
                $prenom=$this->requete->existeParametre("prenom")?$this->requete->getParametre("prenom"):"";
                $licence = $this->requete->existeParametre("licence")?$this->requete->getParametre("licence"):"";
                if($this->requete->existeParametre("retirer"))
                {
                    $resul = $this->effectif->retirerJoueur(array($id));
                    if($resul)
                    {
                        echo '<script type="text/javascript" > alert("Suppression reussie");
                        </script>';
                    }
                    $this->absence->maj(array($id));
                }
                else if($this->requete->existeParametre("ajouter"))
                {
                    try{
                        $resul = $this->effectif->ajouterJoueur(array($nom,$prenom,$licence));
                    }
                    catch(Exception $e)
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
                    $resul = $this->effectif->modifier(array($nom,$prenom,$licence,$id));
                    if($resul)
                    {
                        echo '<script type="text/javascript" > alert("Mise à jour reussie");</script>';
                    }
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
            echo '<script type="text/javascript" > alert("Action non autorisé! Connectez vous en tant que Secretaire.");
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
                    if(count($arr)!=3)
                    {
                        $error = "Les informations ne sont pas corrects pour la table effectif";
                        break; 
                    }
                    $count+=1 ;
                    $repon=false;
                    if($count==1){continue ;}
                    try{
                    $repon = $this->effectif->ajouterJoueur(array($arr[2],$arr[1],$arr[0]));
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