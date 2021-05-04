<?php
namespace Acme\Controleur;
use Acme\Framework\Controleur;
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
         if($this->requete->getSession()->existeAttribut("id_admin"))
         {
             parent::executerAction($action);
         }
         else
         {
             $this->rediriger("Connexion");
         }
     }
 }