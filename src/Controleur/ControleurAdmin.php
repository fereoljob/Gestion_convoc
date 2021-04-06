<?php
namespace Acme;
require_once __DIR__ . '/../../vendor/autoload.php';
use Acme\ControleurSecurise;
use Acme\Modele\convocation;
use Acme\Modele\effectif;
use Acme\Modele\etat;

/**
 * Controleur des actions d'administration
 * 
 * @author JOB Fereol / Corentin Maillochon
 * 
 */

 class ControleurAdmin extends ControleurSecurise
 {
     private $convocation;
     private $effectif;
     private $etat;

     /**
      * Constructeur
      */
      public function __construct()
      {
          $this->convocation = new convocation();
          $this->effectif = new effectif();
          $this->etat = new etat();
      }
      public function index()
      {
          $login = $this->requete->getSession()->getAttribut("_login");
          $this->genererVue(array("_login"=>$login));
      }
 }
