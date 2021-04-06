<?php

namespace Acme;
require_once __DIR__ . '/../../vendor/autoload.php';
use Acme\Framework\Modele;
/**
 * 
 * Modelise un utilisateur du blog
 * @author JOB fereol 
 */

 class Utilisateur extends Modele{
     /** 
      * Verifie qu'un utilsateur existe dans la BD
      *@param string $login le login
      *@param string $mdp le mot de passe
      *@return boolean vrai si l'utilisateur existe ,faux sinon
      */
      public function connecter($login,$mdp)
      {
          $sql = "Select id_admin from administrateur where
          _login = ? and mot_de_passe=?";
          $utilisateur = $this->executerRequete($sql,array($login,$mdp));
          return ($utilisateur->rowCount()==1);
      }

      /**
       * Renvoie un utilisateur existant dans la BD
       * 
       * @param string $login 
       */
      public function getUtilisateur($login,$mdp)
      {
        $sql = "Select * from administrateur where
        _login = ? and mot_de_passe=?";
        $utilisateur = $this->executerRequete($sql,array($login,$mdp));
        if($utilisateur->rowCount()==1)
            return $utilisateur->fetch(PDO::FETCH_ASSOC);
        else
            throw new Exception("Aucun utilisateur ne correspond aux identifiants fournis");
      }

 }