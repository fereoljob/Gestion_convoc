<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/etat.php';

class ControleurAbsence extends ControleurSecurise
{

    private $absents;
    public function __construct()
    {
        $this->absents= new etat();
    }
    public function index()
    {
        $absents = $this->etat->getAllEtat();
        $this->genererVue(array("absents"=>$absents));
    }
}