<?php
namespace Acme;
require_once __DIR__ . '/../../vendor/autoload.php';
use Acme\Framework\Modele;

class effectif extends Modele
{
    //Renvoie la liste des joueurs
    public function getJoueur($id_joueur=null)
    {
        if($id_joueur==null)
        {
            $sql = 'select * from effectif';
            $reponses = $this->executerRequete($sql);
        }
        else
        {
            $sql = 'select * from effectif where id_joueur=?';
            $reponses = $this->executerRequete($sql,array($id_joueur));
        }
        return $reponses;
    }
    //insertion joueur
    public function ajouterJoueur($param)
    {
        $sql = 'insert into effectif values(null,?,?,?)';
        $reponses = $this->executerRequete($sql,$param);
        return $reponses;
    }
    //Modification table effectif(convo ou licence) 
    public function modifier($param)
    {
        $sql = 'update effectif set nom=?,prenom=?,licence=? where id_joueur=?';
        $reponses= $this->executerRequete($sql,$param);
        return $reponses;
    }
    public function retirerJoueur($param)
    {
        $sql = 'delete from effectif where id_joueur=?';
        $reponses = $this->executerRequete($sql,$param);
        return $reponses;
    }
    public function getJoueurid($param)
    {
        $sql = "select id_joueur from effectif where nom=? and prenom =?";
        $reponses = $this->executerRequete($sql,$param);
        return $reponses;
    }
    public function getLibre($date)
    {
            $sql = "select * from effectif f where licence=? and  not exists (select * from etat e where e.id_joueur=f.id_joueur and dateAb=?) and not exists (select * from 
            occupation o where o.id_joueur=f.id_joueur and dateOccu=?)";
            $reponses = $this->executerRequete($sql,array("Libre",$date,$date));
            return $reponses;
    }
    
}