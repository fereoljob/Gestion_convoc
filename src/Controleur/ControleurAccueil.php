<?php
namespace Acme;
require_once __DIR__ . '/../../vendor/autoload.php';
use Acme\Framework\Vue;
use Acme\Framework\Controleur;

class ControleurAccueil extends Controleur{

    public function __construct()
    {
        
    }
    
    public function index()
    {
        $this->genererVue(array());
    }
}
