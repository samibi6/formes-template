<?php

namespace Opmvpc\Formes;

class Ellipse extends Forme {
    private Point $centre;
    private Point $rayon;
    public function __construct(Point $centre, Point $rayon, string $couleur = '#000000')
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