<?php


abstract class Etat
{
    /**
     * @var Joueur
     */
    protected $joueur;
    public $nom = 'test';

    public function setJoueur(Joueur $joueur)
    {
        $this->joueur = $joueur;
    }

    public function getNom()
    {
        return $this->nom;
    }

    abstract public function handle1(): void;

    abstract public function handle2(): void;

    abstract function boostAttaque();

    abstract function actionsImpossibles();

    abstract function pertePv();
}