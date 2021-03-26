<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/competition.php';

class ControleurCompetition extends ControleurSecurise
{

    private $competit;
    public function __construct()
    {
        $this->competit= new competition();
    }
    public function index()
    {
        $competitions = $this->competit->getCompetitions();
        $this->genererVue(array("competitions"=>$competitions));
    }
    public function modifier()
    {
        if($this->requete->existeParametre("listeCompets"))
        {
            $competitions = $this->competit->getCompetitions();
            $this->genererVue(array("competitions"=>$competitions));
        }else
        {
            $this->genererVue(array());
        }
    }
    public function modif()
    {
        if($this->requete->existeParametre("ajouter"))
        {
            $nomcompe = $this->requete->getParametre("nomcompet");
            $equipe = $this->requete->getParametre("Equipe");
            $equipAdv = $this->requete->getParametre("equipAdv");
            $date = $this->requete->getParametre("ladate");
            $heure = $this->requete->getParametre("heure");
            $terrain = $this->requete->getParametre("terrain");
            $site = $this->requete->getParametre("site");
            $reponses = $this->competit->ajouterCompe(array($nomcompe,$equipe,$equipAdv,$date,$heure,$terrain,$site));
        }
        $this->setAction("modifier");
    }
}