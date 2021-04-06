<?php
namespace Acme;
require_once __DIR__ . '/../../vendor/autoload.php';
use Acme\Configuration;
class Vue{
    private $fichier;
    private $titre;
    private $control;

    public function __construct($action,$controleur="")
    {
        $fichier = "Vue/";
        $this->control = $controleur;
        if($controleur !="")
        {
            $fichier = $fichier.$controleur."/";
        }
        $this->fichier = $fichier.$action.".php";
        if($action=="index")
            $this->titre="Club_sportif.com/".$controleur;
        else
            $this->titre="Club_sportif.com/".$action;
    }
    public function generer($donnes)
    {
        $tab = ["Effectif","Competition","Absence","Convoc"];
        //Generation de la partie specifique de la vue
        if (in_array($this->control,$tab))
        { 
            $contenu_prim = $this->genererFichier($this->fichier,$donnes);
            $contenu = $this->genererFichier('Vue/gabAdmin.php',array('contenu_prim'=>$contenu_prim));
        }
        else
        {
            $contenu = $this->genererFichier($this->fichier,$donnes);
        }
        $racineWeb=Configuration::get("racineWeb","/");
        //generation du gabarit commun
        $vue = $this->genererFichier('Vue/gabarit.php',array('titre'=>$this->titre,'contenu'=>$contenu,'racineWeb'=>$racineWeb));
        echo $vue;
    }
    private function nettoyer($valeur)
    {
        return htmlspecialchars($valeur, ENT_QUOTES, 'UTF-8', false);
    }
    public function genererFichier($fichier,$donnees)
    {
        if(file_exists($fichier))
        {
            extract($donnees);
            ob_start();
            require $fichier;
            return ob_get_clean();
        }
        else
        {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }
}