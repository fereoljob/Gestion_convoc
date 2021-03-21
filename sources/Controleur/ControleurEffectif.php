<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/effectif.php';

class ControleurEffectif extends ControleurSecurise
{

    private $effectif;
    public function __construct()
    {
        $this->effectif= new effectif();
    }
    public function index()
    {
        $joueurs = $this->effectif->getJoueur();
        $this->genererVue(array("joueurs"=>$joueurs));
    }
}