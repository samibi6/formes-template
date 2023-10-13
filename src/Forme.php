<?php

namespace Opmvpc\Formes;

abstract class Forme {
    protected string $couleur = '#000000';
    public function __construct(string $couleur)
    {
        $this->couleur = $couleur;
    }
    public function getCouleur(){
        return $this->couleur;
    }
}
