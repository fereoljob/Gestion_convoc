<?php
require_once 'Framework/Modele.php';

class competition extends Modele
{
    
    public function getCompet($date,$nomEquipe)
    {
        $sql = 'select * from competition where datecompet=? and nom_equipe = ?';
        $reponses = $this->executerRequete($sql,array($date,$nomEquipe));
        return $reponses;
    }
    public function getCompetitions()
    {
        $sql = 'select *from competition ';
        $reponses = $this->executerRequete($sql);
        return $reponses;
    }
}