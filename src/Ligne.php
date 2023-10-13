<?php

namespace Opmvpc\Formes;

class Ligne extends Forme {
    private Point $point1;
    private Point $point2;
    public function __construct(Point $point1, Point $point2, string $couleur = '#000000')
    {
        parent::__construct($couleur);
        $this->point1 = $point1;
        $this->point2 = $point2;
    }
    public function getPoint1(){
        return $this->point1;
    }
    public function getPoint2(){
        return $this->point2;
    }
}
