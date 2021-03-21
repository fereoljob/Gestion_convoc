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
    public function InsererAb($type,$date,$id_joueur)
    {
        $sql = 'insert into etat values(null,?,?,?)';
        $this->executerRequete($sql,array($type,$date,$id_joueur));
    }
    //mise a jour d'un champs
    public function Maj($id_joueur=null,$date=null,$type=null)
    {
        if($id_joueur==null)
        {
            $sql = 'delete from etat where id_joueur=? and dateAb=?';
            $this->executerRequete($sql,array($id_joueur,$date));
        }
        else
        {
            $sql = 'update etat set type_absence=? where id_joueur =?';
            $this->executerRequete($sql,array($type,$id_joueur));
        }
    }
}