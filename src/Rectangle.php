<?php

namespace Opmvpc\Formes;

class Rectangle extends Forme {
    private Point $origine;
    private float $height;
    private float $width;
    public function __construct(Point $origine, float $height, float $width, string $couleur = '#000000')
    {
        parent::__construct($couleur);
        $this->origine = $origine;
        $this->height = $height;
        $this->width  =$width;
    }
    public function getPoint(){
        return $this->origine;
    }
    public function getWidth(){
        return $this->width;
    }
    public function getHeight(){
        return $this->height;
    }
}
