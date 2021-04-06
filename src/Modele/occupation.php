<?php
require_once 'Framework/Modele.php';

class occupation extends Modele
{
    
    public function insererOccu($id,$dat,$id_conv)
    {
        $sql = "insert into occupation values(null,?,?,?)";
        $reponses = $this->executerRequete($sql,array($id,$dat,$id_conv));
        return $reponses;
    }
    public function getJoueur($id)
    {
        $sql = "select * from occupation where convo=?";
        $reponses = $this->executerRequete($sql,array($id));
        return $reponses;
    }
}