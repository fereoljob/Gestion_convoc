<?php

require_once 'ControleurSecurise.php';
require_once 'Modele/competition.php';

class ControleurCompetition extends ControleurSecurise
{

    private $competit;
    public function __construct()
    {
        $this->competit= new competition();
    }
    public function index()
    {
        $competitions = $this->competit->getCompetitions();
        $this->genererVue(array("competitions"=>$competitions));
    }
    public function modifier()
    {
        if($this->requete->existeParametre("listecompet"))
        {
            $competitions = $this->competit->getCompetitions();
            $this->genererVue(array("competitions"=>$competitions));
        }else
        {
            $this->genererVue(array());
        }
    }
    public function modif()
    {
            $id = $this->requete->existeParametre("lid")?$this->requete->getParametre("lid"):"";
            $nomcompe = $this->requete->existeParametre("nomcompet")?$this->requete->getParametre("nomcompet"):"";
            $equipe = $this->requete->existeParametre("Equipe")?$this->requete->getParametre("Equipe"):"";
            $equipAdv = $this->requete->existeParametre("equipeAdv")?$this->requete->getParametre("equipAdv"):"";
            $date = $this->requete->existeParametre("ladate")?$this->requete->getParametre("ladate"):"";
            $heure = $this->requete->existeParametre("heure")?$this->requete->getParametre("heure"):"";
            $terrain = $this->requete->existeParametre("terrain")?$this->requete->getParametre("terrain"):"";
            $site = $this->requete->existeParametre("site")?$this->requete->getParametre("site"):"";
        if($this->requete->existeParametre("ajouter"))
        {
            
            $reponses = $this->competit->ajouterCompe(array($nomcompe,$equipe,$equipAdv,$date,$heure,$terrain,$site));
            if($reponses)
            {
                echo "<script type='text/javascript' >alert('Insertion reussie');
                </script>";
            }
        }
        else if($this->requete->existeParametre("retirer"))
        {
            $resul = $this->competit->retirerCompe($id);
                if($resul)
                {
                    echo "<script type='text/javascript' > alert('Suppression reussie');
                    </script>";
                }
        }
        else
        {
            $resul = $this->competit->Maj(array($nomcompe,$equipe,$equipAdv,$date,$heure,$terrain,$site,$id));
            if($resul)
            {
                echo "<script type='text/javascript' > alert('Mise à jour reussie');
                </script>";
            }
        }
        $this->setAction("modifier");
        $this->genererVue();
    }
}