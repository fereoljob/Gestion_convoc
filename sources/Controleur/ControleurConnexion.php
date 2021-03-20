<?php
require_once 'Framework/Vue.php';
require_once 'Framework/Controleur.php';
require_once 'Modele/Utilisateur.php';

class ControleurConnexion extends Controleur
{

    private $utilisateur;
    public function index()
    {
        $this->genererVue(array());
    }
    public function __construct()
    {
        $this->utilisateur=new Utilisateur();
    }
    public function connecter()
    {
        if($this->requete->existeParametre("login") &&
        $this->requete->existeParametre("mdp"))
        {
            $login = $this->requete->getParametre("login");
            $mdp = $this->requete->getParametre("mdp");
            if($this->utilisateur->connecter($login,$mdp))
            {

                $utilisateur =$this->utilisateur->getUtilisateur($login,$mdp);
                $this->requete->getSession()->setAttribut("login",$utilisateur["login"]);
                $this->requete->getSession()->setAttribut("idUtilisateur",$utilisateur["id_admin"]);
                $this->rediriger("admin");
            }
            else
            {
                $this->genererVue(array("msgErreur"=>"Login ou mot de passe incorrects"),"index");
            }

        }else{
            throw new Exception("Action impossible:login ou mot de passe non defini");
        }
    }
    public function deconnecter()
    {
        $this->requete->getSession()->detruire();
        $this->rediriger("acceuil");
    }
}