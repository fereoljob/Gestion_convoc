<?php

require_once 'Framework/Controleur.php';

/**
 * 
 * Classe parente des controleurs sousmis a authentification
 * @author JOB Fereol Corentin Maillochon
 */

 abstract class ControleurSecurise extends Controleur
 {
     public function executerAction($action)
     {
         if($this->requete->getSession()->existeAttribut("idUtilisateur"))
         {
             parent::executerAction($action);
         }
         else
         {
             $this->rediriger("connexion");
         }
     }
 }