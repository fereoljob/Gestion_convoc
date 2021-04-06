<?php
require_once 'ControleurSecurise.php';
require_once 'Modele/convocation.php';
require_once 'Modele/effectif.php';
require_once 'Modele/etat.php';

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
