<?php
namespace Acme;
require_once __DIR__ . '/../../vendor/autoload.php';
use Acme\Framework\Vue;
use Acme\Framwork\Controleur;
use Acme\Modele\Utilisateur;

class ControleurConnexion extends Controleur{

    private $utilisateur;
    public function __construct()
    {
        $this->utilisateur=new Utilisateur();
    }
    public function index()
    {
        if($this->requete->getSession()->existeAttribut("id_admin"))
         {
            $this->rediriger("Admin");
         }
         else
         {
            $this->genererVue();   
         }

    }
    public function connecter()
    {
        if($this->requete->existeParametre("_login") &&
        $this->requete->existeParametre("mot_de_passe"))
        {
            $login = $this->requete->getParametre("_login");
            $mdp = $this->requete->getParametre("mot_de_passe");
            if($this->utilisateur->connecter($login,$mdp))
            {

                $utilisateur =$this->utilisateur->getUtilisateur($login,$mdp);
                $this->requete->getSession()->setAttribut("_login",$utilisateur["_login"]);
                $this->requete->getSession()->setAttribut("id_admin",$utilisateur["id_admin"]);
                $this->requete->getSession()->setAttribut("type",$utilisateur["typAdmin"]);
                $this->rediriger("Admin");
            }
            else
            {
                $this->setAction("index");
                $this->genererVue(array("msgErreur"=>"Login ou mot de passe incorrects! Réessayez!"));
            }

        }else{
            throw new Exception("Action impossible:login ou mot de passe non defini");
        }
    }
    public function deconnecter()
    {
        $this->requete->getSession()->detruire();
        $this->rediriger("Accueil");
    }
}