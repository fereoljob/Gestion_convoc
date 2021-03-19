<?php
require_once 'Framework/Modele.php';
class convocation extends Modele
{
    //insertion d'une convocation
    public function CreationConvo($id_convocation,$date_convo,$nomEquipe,$publie)
    {
        $sql = 'insert into convocation values(?,?,?,?)';
        $this->executerRequete($sql,array($id_convocation,$date,$nomEquipe,$publie));
    }
    public function getConvo($date,$equipe)
    {
        $sql = 'select * from convocation where DateConvoc=? and nomEquipe=?';
        $reponses = $this->executerRequete($ql,array($date,$equipe));
        return $reponses;
    }
    //modification champs publiable
    public function publier($val,$date,$equipe)
    {
        $sql = 'update convocation set publie=? where DateConvoc=? and nomEquipe=?';
        $this->executerRequete($sql,array($val,$date,$equipe));
    }
}