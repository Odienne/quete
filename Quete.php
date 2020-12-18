<?php


class Quete implements SplSubject
{
    private $_observers;

    public $nom;
    public $description;
    public $recompense;

    public $status;

    /**
     * Quete constructor.
     * @param $nom
     * @param $description
     * @param $recompense
     */
    public function __construct($nom, $description, $recompense)
    {
        $this->_observers = new SplObjectStorage();

        $this->setNom($nom);
        $this->setDescription($description);
        $this->setRecompense($recompense);
    }

    public function attach(SplObserver $observer) {
        $this->_observers->attach($observer);
    }

    public function detach(SplObserver $observer) {
        $this->_observers->detach($observer);
    }

    public function notify() {
        foreach ($this->_observers as $observer) {
            $observer->update($this);
        }
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getRecompense()
    {
        return $this->recompense;
    }

    /**
     * @param mixed $recompense
     */
    public function setRecompense($recompense)
    {
        $this->recompense = $recompense;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}