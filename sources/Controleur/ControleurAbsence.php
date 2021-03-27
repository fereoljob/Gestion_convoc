<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/etat.php';
require_once 'Modele/effectif.php';
class ControleurAbsence extends ControleurSecurise
{

    private $absents;
    private $effectif;
    public function __construct()
    {
        $this->absents= new etat();
        $this->effectif=new effectif();
    }
    public function index()
    {
        $absences = $this->absents->getAllEtat();
        $tableau = $absences->fetchAll(PDO::FETCH_ASSOC);
        foreach($tableau as $key=>$val)
        {
            $rep = $this->effectif->getJoueur($tableau[$key]["id_joueur"]);
            $infos = $rep->fetch(PDO::FETCH_ASSOC);
            $tableau[$key]["id_joueur"]="$infos[nom] $infos[prenom]";
        }
        $this->genererVue($tableau);
    }
    public function modifier()
    {
        if($this->requete->existeParametre("listeAbsences"))
        {
            $absences = $this->absents->getAllEtat();
            $tableau = $absences->fetchAll(PDO::FETCH_ASSOC);
            foreach($tableau as $key=>$val)
            {
                $rep = $this->effectif->getJoueur($tableau[$key]["id_joueur"]);
                $infos = $rep->fetch(PDO::FETCH_ASSOC);
                $tableau[$key]["id_joueur"]="$infos[nom] $infos[prenom]";
            }
            $this->genererVue($tableau);
        }else
        {
            $this->genererVue(array());
        }
    }
    public function modif()
    {
            $id = $this->requete->existeParametre("lid")?$this->requete->getParametre("lid"):"";
            $type = $this->requete->existeParametre("type") ? $this->requete->getParametre("type"):"";
            $date=$this->requete->existeParametre("ladate")?$this->requete->getParametre("ladate"):"";
            $lida = $this->requete->existeParametre("lida")?$this->requete->getParametre("lida"):"";
            if($this->requete->existeParametre("retirer"))
            {
                $resul = $this->absents->retirerJoueur(array($id));
                if($resul)
                {
                    echo "<script type='text/javascript'> alert('Suppression reussie');
                    </script>";
                }
            }
            else if($this->requete->existeParametre("ajouter"))
            {
                $resul = $this->absents->ajouterJoueur(array($type,$date,$lid));
                if($resul)
                {
                    echo "<script type='text/javascript' >alert('Insertion reussie');
                    </script>";
                }
            }
            else
            {
                $resul = $this->absents->modifier(array($type,$date,$lid,$lida));
                if($resul)
                {
                    echo "<script type='text/javascript' > alert('Mise à jour reussie');</script>";
                }
            }
            $this->setAction("modifier");
            $this->genererVue();
    }
}