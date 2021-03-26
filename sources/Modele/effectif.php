<?php
require_once 'Framework/Modele.php';

class effectif extends Modele
{
    //Renvoie la liste des joueurs associé a une convocation
    public function getJoueur_convo($id_convo)
    {
        $sql = 'select nom,prenom from effectif where id_convocation=?';
        $reponses = $this->executerRequete($sql,array($id_convo));
        return $reponses;
    }
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
        $reponses = $this->executerRequete($sql);
        return $reponses;
    }
    //insertion joueur
    public function ajouterJoueur($param)
    {
        $sql = 'insert into effectif values(null,?,?,?,null,null)';
        $reponses = $this->executerRequete($sql,$param);
        return $reponses;
    }
    //Modification table effectif(convo ou licence) 
    public function modifier($param)
    {
        $sql = 'update effectif set ?=? where nom=? and prenom=?';
        $this->executerRequete($sql,$param);
    }
    public function retirerJoueur($param)
    {
        $sql = 'delete from effectif where nom=? and prenom=?';
        $reponses = $this->executerRequete($sql,$param);
        return $reponses;
    }
    
}