<?php
require_once 'Modele/convocation.php';
require_once 'Modele/effectif.php';
require_once 'Modele/competition.php';
require_once 'Framework/Vue.php';
require_once 'Framework/Controleur.php';

class ControleurConvocation extends Controleur{
    private $convocation;
    private $joueur;
    private $compe;

    public function __construct()
    {
        $this->convocation=new convocation();
        $this->joueur=new effectif();
        $this->compe= new competition();
    }
    public function index($date=null,$equipe=null)
    {
        if(isset($date) && isset($equipe))
        {
            $convocation = $this->convocation->getConvo($date,$equipe);
            $tab = $convocation->fetch(PDO::FETCH_BOTH);
            if(isset($tab[0]))
            {
                $joueur = $this->joueur->getJoueur_convo($tab[0]);
                $compe = $this->compet->getCompet($tab[1],$tab[2]);
                $this->genererVue(array('convocation'=>$convocation,'joueur'=>$joueur,'compe'=>$compe));
            }
            else
            {
                $this->genererVue(array("trouve"=>"Aucune convocation n'a été publié pour les informations entrées"));
            }
        }
        else
        {
            $this->genererVue(array());
        }
            
    }
}