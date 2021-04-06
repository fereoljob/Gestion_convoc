<?php
require_once 'Framework/Vue.php';
require_once 'Framework/Controleur.php';

class ControleurAccueil extends Controleur{

    public function __construct()
    {
        
    }
    
    public function index()
    {
        $this->genererVue(array());
    }
}
