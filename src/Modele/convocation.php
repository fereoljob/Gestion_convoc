<?php
namespace Acme;
use Acme\Framework\Modele;
require_once __DIR__ . '/../../vendor/autoload.php';
class convocation extends Modele
{
    //insertion d'une convocation
    public function CreationConvo($date_convo,$nomEquipe,$equipeadverse,$nbreconvo,$idcompe)
    {
        $sql = 'insert into convocation values(null,?,?,"non",?,?,?)';
        $reponses  =$this->executerRequete($sql,array($date_convo,$nomEquipe,$equipeadverse,$nbreconvo,$idcompe));
        return $reponses;
    }
    public function getConvos($date,$equipe,$idcompe)
    {
        $sql = 'select * from convocation where DateConvoc=? and nomEquipe=? and id_compet =?';
        $reponses = $this->executerRequete($sql,array($date,$equipe,$idcompe));
        return $reponses;
    }
    public function getConvo($id)
    {
        $sql = 'select * from convocation where id_convocation=?';
        $reponses = $this->executerRequete($sql,array($id));
        return $reponses;
    }
    public function getAllConvo()
    {
        $sql = 'select * from convocation ';
        $reponses = $this->executerRequete($sql,array());
        return $reponses;
    }
    public function getConvoN()
    {
        $sql = 'select * from convocation where publie=?';
        $reponses = $this->executerRequete($sql,array("non"));
        return $reponses;
    }
    public function getConvo2($date,$equipe)
    {
        $sql = "select * from convocation  where DateConvoc=? and nomEquipe=?";
        $reponses = $this->executerRequete($sql,array($date,$equipe));
        return $reponses;
    }
    public function maj($val,$id)
    {
        $sql = 'update convocation set nbre_convok=? where id_convocation=?';
        $reponses = $this->executerRequete($sql,array($val,$id));
    }
    //modification champs publiable
    public function publier($val,$id)
    {
        $sql = 'update convocation set publie=? where id_convocation=?';
        $this->executerRequete($sql,array($val,$id));
    }
    public function getConvoEq($equipe)
    {
        $sql = "select * from convocation where nomEquipe=?";
        $reponses = $this->executerRequete($sql,array($equipe));
        return $reponses;
    }

}