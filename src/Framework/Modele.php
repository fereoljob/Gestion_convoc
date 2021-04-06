<?php
require_once "Configuration.php";
/**
 * Classe abstraite Modele.
 * centralise les services d'acces a une base de donnees.
 * utilise l'API PDO de PHP
 * @author JOB Fereol
 * @author Corentin Maillochon
 */
abstract class Modele
{
    //objet PDO d'acces a la BD
    private static $bdd;

    public static function executerRequete($sql,$param=null)
    {
        if($param==null)
        {
            $resultat = self::getBdd()->query($sql);
        }
        else
        {
            $resultat = self::getBdd()->prepare($sql);
            $resultat->execute($param);
        }
        return $resultat;
    }
    /**
     * Renvoie un objet de connexion à la BDD en initialisant la connexion au besoin
     * @return PDO objet PDO de connexion à la BDD
     */
    private static function getBdd()
    {
        if(self::$bdd==null)
        {
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $mdp = Configuration::get("mdp");
            self::$bdd = new PDO($dsn,$login,$mdp);
            self::$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        return self::$bdd;
    }
}