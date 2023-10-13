<?php

namespace Opmvpc\Formes;

class Cercle extends Forme {
    private float $rayon;
    private Point $centre;
    public function __construct(Point $centre, float $rayon, string $couleur = '#000000')
    {
        parent::__construct($couleur);
        $this->centre = $centre;
        $this->rayon = $rayon;
    }
    public function getCentre(){
        return $this->centre;
    }
    public function getRayon(){
        return $this->rayon;
    }
}
