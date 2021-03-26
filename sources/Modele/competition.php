<?php
require_once 'Framework/Modele.php';

class competition extends Modele
{
    
    public function getCompet($id_compet)
    {
        $sql = 'select * from competition where id_compet = ?';
        $reponses = $this->executerRequete($sql,array($id_compet));
        return $reponses;
    }
    public function getCompetitions()
    {
        $sql = 'select *from competition ';
        $reponses = $this->executerRequete($sql);
        return $reponses;
    }
    public function ajouterCompe($param)
    {
        $sql="insert into competition values (null,?,?,?,?,?,?,?)";
        $reponses = $this->executerRequete($sql,$param);
        return $reponses;
    }
}