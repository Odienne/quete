<?php

class Mort extends Etat
{
    public function handle1(): void
    {
        echo "Mort handles request1.\n";
    }

    public function handle2(): void
    {
        echo "Mort handles request2.\n";
        echo "Mort wants to change the state of the context.\n";
        $this->joueur->transitionTo(new Vivant());
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