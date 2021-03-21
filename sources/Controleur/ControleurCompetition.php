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
}