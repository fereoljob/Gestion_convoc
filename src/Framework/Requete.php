<?php
require_once 'Session.php';
class Requete
{
    //parametre de la requete
    private $parametres;
    private $session;
    public function __construct($tableau)
    {
        $this->parametres=$tableau;
        $this->session = new Session();
    }
    //renvoie vrai si le parametre existe dans la requete
    public function existeParametre($nom)
    {
        return ((isset($this->parametres[$nom])) && ($this->parametres[$nom]!=""));
    }

    //Renvoi la valeur du parametre demandé
    //leve une exception si le parametre est introuvable

    public function getParametre($nom)
    {
        if($this->existeParametre($nom))
        {
            return $this->parametres[$nom];
        }else
        {
            throw new Exception("Parametre '$nom' absent de la requete");
        }
    }
    public function getSession()
    {
        return $this->session;
    }
}