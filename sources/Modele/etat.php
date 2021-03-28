<?php

require_once 'Framework/Modele.php';

class etat extends Modele
{
    //Recuperer planning des absence en fonction d'une date
    public function getEtat($date)
    {
        $sql = 'select id_joueur from etat where dateAb=?';
        $reponses = $this->executerRequete($sql,array($date));
        return $reponses;
    }
    public function getAllEtat()
    {
        $sql = 'select * from etat';
        $reponses = $this->executerRequete($sql);
        return $reponses;
    }
    //inserer absence
    public function ajouterJoueur($param)
    {
        $sql = 'insert into etat values(null,?,?,?)';
        $reponses = $this->executerRequete($sql,$param);
        return $reponses;
    }
    //suppression d'un enregistrement
    public function retirerJoueur($param)
    {
        $sql = 'delete from etat where id_etat=?';
        $reponses = $this->executerRequete($sql,$param);
        return $reponses;
    }
    public function maj($param)
    {
        $sql = 'delete from etat where id_joueur=?';
        $reponses = $this->executerRequete($sql,$param);
        return $reponses;
    }
    public function modifier($param)
    {
        $sql = 'update etat set type_absence=?,dateAb=? where id_etat=?';
        $reponses= $this->executerRequete($sql,$param);
        return $reponses;
    }

}