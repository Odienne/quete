<?php

class Joueur
{
    public $nom;
    public $pv;
    public $attaque;
    public $niveau;
    public $xp;

    public $etat;

    /**
     * Joueur constructor.
     * @param $nom
     * @param $pv
     * @param $attaque
     * @param $niveau
     * @param $xp
     * @param $etat
     */
    public function __construct($nom, $pv, $attaque, $niveau, $xp, Etat $etat)
    {
        $this->setNom($nom);
        $this->setPv($pv);
        $this->setAttaque($attaque);
        $this->setNiveau($niveau);
        $this->setXp($xp);
        $this->transitionTo($etat);
    }

    /**
     * The Context allows changing the State object at runtime.
     * @param Etat $etat
     */
    public function transitionTo(Etat $etat): void
    {
        echo "Context: Transition to " . get_class($etat) . ".\n";
        $this->setEtat($etat);
        $this->etat->setJoueur($this);
    }

    /**
     * The Context delegates part of its behavior to the current State object.
     */
    public function request1(): void
    {
        $this->etat->handle1();
    }

    public function request2(): void
    {
        $this->etat->handle2();
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPv()
    {
        return $this->pv;
    }

    /**
     * @param mixed $pv
     */
    public function setPv($pv)
    {
        $this->pv = $pv;
    }

    /**
     * @return mixed
     */
    public function getAttaque()
    {
        return $this->attaque;
    }

    /**
     * @param mixed $attaque
     */
    public function setAttaque($attaque)
    {
        $this->attaque = $attaque;
    }

    /**
     * @return mixed
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @param mixed $niveau
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;
    }

    /**
     * @return mixed
     */
    public function getXp()
    {
        return $this->xp;
    }

    /**
     * @param mixed $xp
     */
    public function setXp($xp)
    {
        $this->xp = $xp;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }



}