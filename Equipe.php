<?php

include 'MyIterator.php';

class Equipe implements SplObserver
{
    public $nom;
    public $joueurs;
    public $iteratorPlayers;

    /**
     * Equipe constructor.
     * @param $nom
     * @param $joueurs
     */
    public function __construct($nom, $joueurs)
    {
        $this->setNom($nom);
        $this->setJoueurs($joueurs);
        $this->iteratorPlayers = new MyIterator($joueurs);
    }

    public function update(SplSubject $subject)
    {
        echo __CLASS__ . ' - ' . $subject->getStatus();
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
    public function getJoueurs()
    {
        return $this->joueurs;
    }

    /**
     * @param mixed $joueurs
     */
    public function setJoueurs($joueurs)
    {
        $this->joueurs = $joueurs;
    }


    public function dealsDamage($value)
    {
        for ($this->iteratorPlayers->rewind(); $this->iteratorPlayers->valid(); $this->iteratorPlayers->next()) {
            try {
                $player = $this->iteratorPlayers->current();
                $player->setPv($player->getPv() - $value);
            } catch (Exception $exception) {
                continue;
            }
        }
    }
    public function shareXp($value)
    {
        for ($this->iteratorPlayers->rewind(); $this->iteratorPlayers->valid(); $this->iteratorPlayers->next()) {
            try {
                $player = $this->iteratorPlayers->current();
                $player->setXp($player->getXp() + $value);
            } catch (Exception $exception) {
                continue;
            }
        }
    }
}