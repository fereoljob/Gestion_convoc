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
    public function index()
    {
        if($this->requete->existeParametre("ladate") && $this->requete->existeParametre("Equipe"))
        {
            $date=$this->requete->getParametre("ladate");
            $equipe =$this->requete->getParametre("Equipe");
            $convocations = $this->convocation->getConvo($date,$equipe);
            if($convocations->rowCount()==1)
            {
                $tab = $convocations->fetch(PDO::FETCH_ASSOC);
                if($tab["publie "]=="oui"){
                    $joueurs = $this->joueur->getJoueur_convo($tab["id_convocation"]);
                    $compes = $this->compet->getCompet($tab["id_compet"]);
                    $competition = $compes->fetch(PDO::FETCH_ASSOC);
                    $this->genererVue(array('convocation'=>$tab,'joueur'=>$joueurs,'compe'=>$competition,'trouve'=>"oui"));
                }
                else
                {
                    $this->genererVue(array("trouve"=>"non"));
                }
            }
            else
            {
                $this->genererVue(array("trouve"=>"non"));
            }
        }
        else
        {
            $this->genererVue(array());
        }
            
    }
}