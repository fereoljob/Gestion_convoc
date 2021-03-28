<?php
require_once 'Requete.php';
require_once 'Vue.php';

class Routeur
{
    //route une requete entrante  
    public function routerRequete()
    {
        try{
            $requete  = new Requete(array_merge($_GET,$_POST,$_FILES));
            $controleur = $this->creerControleur($requete);
            $action = $this->creerAction($requete);
            $controleur->executerAction($action);
        }
        catch(Exception $e)
        {
            $this->gererErreur($e);
        }
    }
    //cree le controleur appropriee en fonction de la requete
    private function creerControleur(Requete $requete)
    {
        $controleur = "Accueil";//controleur par defaut
        if($requete->existeParametre('controleur'))
        {
            $controleur = $requete->getParametre('controleur');
            $controleur = ucfirst(strtolower($controleur));
        }
        //creation du nom du fichier
        $classeControleur = "Controleur".$controleur;
        $fichierControleur = "Controleur/".$classeControleur.".php";
        if(file_exists($fichierControleur))
        {
            //instanciation du controleur adapté a la requete
            require($fichierControleur);
            $controleur = new $classeControleur();
            $controleur->setRequete($requete);
            return $controleur;
        }
        else
        {
            throw new Exception ("Fichier '$fichierControleur' introuvable");
        }
    }
    //determine l'action a executer en  fonction de la requete recue
    private function creerAction(Requete $requete)
    {
        $action = "index";//action par defaut
        if($requete->existeParametre('action'))
        {
            $action = $requete->getParametre('action');
        }
        return $action;
    }
    private function gererErreur(Exception $e)
    {
            $vue = new Vue("Erreur");
            $vue->generer(array('msgErreur'=>$e->getMessage()));

    }
}