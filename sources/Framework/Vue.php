<?php
require_once 'Configuration.php';
class Vue{
    private $ficher;
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
        //$racineWeb="";
        //generation du gabarit commun
        $vue = $this->genererFichier('Vue/gabarit.php',array('titre'=>$this->titre,'contenu'=>$contenu));
        echo $vue;
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