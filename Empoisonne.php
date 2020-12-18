<?php

class Empoisonne extends Etat
{
    public $nom = 'empoisonne';

    public function handle1(): void
    {
        echo "Empoisonne handles request1.\n";
        echo "Empoisonne wants to change the state of the context.\n";
        $this->joueur->transitionTo(new Mort());
    }

    public function handle2(): void
    {
        echo "Empoisonne handles request2.\n";
    }


    function boostAttaque()
    {
        // TODO: Implement boostAttaque() method.
    }

    function actionsImpossibles()
    {
        // TODO: Implement actionsImpossibles() method.
    }

    function pertePv()
    {
        // TODO: Implement pertePv() method.
    }
}