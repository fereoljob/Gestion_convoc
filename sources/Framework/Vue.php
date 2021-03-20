<?php
require_once 'Configuration.php';
class Vue{
    private $fichier;
    private $titre;

    public function __construct($action,$controleur="")
    {
        $fichier = "Vue/";
        if($controleur !="")
        {
            $fichier = $fichier.$controleur."/";
        }
        $this->fichier = $fichier.$action.".php";
    }
    public function generer($donnes)
    {
        //Genereation de la partie specifique de la vue
        $contenu = $this->genererFichier($this->fichier,$donnes);
        $racineWeb=Configuration::get("racineWeb","/");
        //generation du gabarit commun
        $vue = $this->genererFichier('Vue/gabarit.php',array('titre'=>$this->fichier,'contenu'=>$contenu,'racineWeb'=>$racineWeb));
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