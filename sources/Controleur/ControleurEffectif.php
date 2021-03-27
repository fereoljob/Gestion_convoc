<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/effectif.php';
require_once 'Modele/etat.php';

class ControleurEffectif extends ControleurSecurise
{

    private $effectif;
    private $absence;
    public function __construct()
    {
        $this->effectif= new effectif();
        $this->absence=new etat();
    }
    public function index()
    {
        $joueurs = $this->effectif->getJoueur();
        $this->genererVue(array("joueurs"=>$joueurs));
    }
    public function modifier()
    {
        if($this->requete->existeParametre("listejoueurs"))
        {
            $joueurs = $this->effectif->getJoueur();
            $this->genererVue(array("joueurs"=>$joueurs));
        }else
        {
            $this->genererVue(array());
        }
    }
    public function modif()
    {
        if(($this->requete->existeParametre("nom")) || ($this->requete->existeParametre("prenom"))||
        ($this->requete->existeParametre("lid")))
        {
            $id = $this->requete->existeParametre("lid")?$this->requete->getParametre("lid"):"";
            $nom = $this->requete->existeParametre("nom") ? $this->requete->getParametre("nom"):"";
            $prenom=$this->requete->existeParametre("prenom")?$this->requete->getParametre("prenom"):"";
            $licence = $this->requete->existeParametre("licence")?$this->requete->getParametre("licence"):"";
            if($this->requete->existeParametre("retirer"))
            {
                $resul = $this->effectif->retirerJoueur(array($id));
                if($resul)
                {
                    echo "<script type='text/javascript' > alert('Suppression reussie');
                    </script>";
                }
                $this->absence->Maj($id);
            }
            else if($this->requete->existeParametre("ajouter"))
            {
                $resul = $this->effectif->ajouterJoueur(array($nom,$prenom,$licence));
                if($resul)
                {
                    echo "<script type='text/javascript' >alert('Insertion reussie');
                    </script>";
                }
            }
            else
            {
                $resul = $this->effectif->modifier(array($nom,$prenom,$licence,$id));
                if($resul)
                {
                    echo "<script type='text/javascript' > alert('Mise à jour reussie');</script>";
                }
            }
        }
        $this->setAction("modifier");
        $this->genererVue();
    }
}