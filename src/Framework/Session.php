<?php
namespace Acme\Framework;
/**
 * classe modelisant la sesssion.
 * Encapsule la superglobale PHP $_SESSION.
 * @author Baptiste Pesquet
 */
class Session
{
    /**
     * Constructeur.
     * Demarre ou restaure la session
     */
    public function __construct()
    {
        session_start();
    }
    /**
     * Detruit la seesion actuelle
     */
    public function detruire()
    {
        session_destroy();
    }
    /**
     * Ajoute un attribut à la session
     * 
     * @param string $nom Nom de l'attribut
     * @param string $valeur Valeur de l'attribut
     */
    public function setAttribut($nom,$valeur)
    {
        $_SESSION[$nom]=$valeur;
    }
    /**
     * Renvoie vrai si l'attribut existe dans la session
     * 
     * @param string $nom Nom de l'attribut
     * @return bool vrai si l'attribut existe et sa valeur n'est pas vide
     */
    public function existeAttribut($nom)
    {
        return (isset($_SESSION[$nom]) && $_SESSION[$nom]!="");
    }
    /**
     * Renvoie la valeur de l'attribut demandé
     * 
     * @param string $nom Nom de l'attribut
     * @return string Valeur de l'attribut
     * @throws Exception si l'attribut n'existe pas dans la session
     */
    public function getAttribut($nom)
    {
        if($this->existeAttribut($nom))
        {
            return $_SESSION[$nom];;
        }
        else
        {
            throw new Exception("Attribut '$nom' absent de la session");
        }
        
    }
}