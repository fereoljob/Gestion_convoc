<?php
use Acme\Modele\convocation;
use Acme\Modele\effectif;
use Acme\Modele\competition;
use Acme\Framework\Vue;
use Acme\Framework\Controleur;
use Acme\Modele\occupation;
class ControleurConvocation extends Controleur{
    private $convocation;
    private $joueur;
    private $compe;
    private $occ;

    public function __construct()
    {
        $this->convocation=new convocation();
        $this->joueur=new effectif();
        $this->compe= new competition();
        $this->occ = new occupation();
    }
    public function index()
    {
        $lescompetitions = $this->compe->getCompetitions();
        $lesresultats = $lescompetitions->fetchAll(PDO::FETCH_ASSOC);
        $seniorA = array();
        $seniorB = array();
        $seniorC = array();
        foreach($lesresultats as $resu)
        {
            if($resu["nom_equipe"]=="SENIORS_A")
                $seniorA[]=$resu["datecompet"];
            else if($resu["nom_equipe"]=="SENIORS_B")
                $seniorB[]=$resu["datecompet"];
            else
                $seniorC[]=$resu["datecompet"];
        }
        $equipes = array($seniorA,$seniorB,$seniorC);
        if($this->requete->existeParametre("ladate") && $this->requete->existeParametre("Equipe"))
        {
            $date=$this->requete->getParametre("ladate");
            $equipe =$this->requete->getParametre("Equipe");
            $convocations = $this->convocation->getConvo2($date,$equipe);
            $datecompets = $this->compe->getCompetEq($equipe);
            $datecompet = $datecompets->fetchAll(PDO::FETCH_ASSOC);
            if($convocations->rowCount()==1)
            {
                $tableau=array();
                $tab = $convocations->fetch(PDO::FETCH_ASSOC);
                if($tab["publie"]=="oui"){
                    $joueurs = $this->occ->getJoueur($tab["id_convocation"]);
                    $val = $joueurs->fetchAll(PDO::FETCH_ASSOC);
                    foreach($val as $v)
                    {
                        $listesjoueures = $this->joueur->getJoueur($v["id_joueur"]);
                        $recup = $listesjoueures->fetch(PDO::FETCH_ASSOC);
                        $tableau[]=$recup;
                    }
                    $compes = $this->compe->getCompet($tab["id_compet"]);
                    $competition = $compes->fetch(PDO::FETCH_ASSOC);
                    $this->genererVue(array('joueur'=>$tableau,'compe'=>$competition,'trouve'=>"oui"));
                }
                else
                {
                    $this->genererVue(array("trouve"=>"non"));
                }
            }
            else
            {
                $this->genererVue();
            }
        }
        else
        {
            $this->genererVue();
        }
            
    }
}