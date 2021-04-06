<?php

require_once 'Requete.php';
require_once 'Vue.php';

abstract class Controleur
{
    //action a realiser
    private $action;

    //requete entrante
    public $requete;

    //definit la requete entrante
    public function setRequete(Requete $requete)
    {
        $this->requete=$requete;
    }
    public function setAction($act)
    {
        $this->action = $act;
    }

    //Execute l'action a realiser
    public function executerAction($action)
    {
        if(method_exists($this,$action))
        {
            $this->action=$action;
            $this->{$this->action}();
        }
        else
        {
            $classeControleur = get_class($this);
            throw new Exception ("Action '$action' non defini dans la classe $classeControleur");
        }
    }
    //Methode abstraite 
    //oblige les classes derivées a implementer cette action
    public abstract function index();
    
    //Genere la vue associe au controleur courant
    protected function genererVue($donneesVue=array())
    {
        //Determination du nom du fichier vue a partir du nom du controleur actuel
        $classeControleur = get_class($this);
        $controleur = str_replace("Controleur","",$classeControleur);
        //instanciation de generation de la vue
        $vue = new Vue($this->action,$controleur);
        $vue->generer($donneesVue);
    }
    /**
     * Effectue une redirection vers un controleur et une action specifique
     * @param string $controleur Controleur
     * @param type $action Action Action 
     */
    protected function rediriger($controleur,$action = null)
    {
        $racineWeb = Configuration::get("racineWeb","/");
        //redirection vers l'url racine_site_/Controleur/action
        header("Location:".$racineWeb.$controleur."/".$action);
    }
}