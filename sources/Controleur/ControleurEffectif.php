<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/effectif.php';

class ControleurEffectif extends ControleurSecurise
{

    private $effectif;
    public function __construct()
    {
        $this->effectif= new effectif();
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
        if(($this->requete->existeParametre("nom")) && ($this->requete->existeParametre("prenom")))
        {
            $nom = $this->requete->getParametre("nom");
            $prenom= $this->requete->getParametre("prenom");
            $licence = $this->requete->getParametre("licence");
            if($this->requete->existeParametre("retirer"))
            {
                $resul = $this->effectif->retirerJoueur(array($nom,$prenom));
                if($resul)
                {
                    echo "<script type='text/javascript' > alert('Suppression reussie');
                    </script>";
                }
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
        }
        $this->setAction("modifier");
        $this->genererVue();
    }
}