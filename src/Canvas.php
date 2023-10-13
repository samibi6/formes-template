<?php

namespace Opmvpc\Formes;

class Canvas extends Forme {
    private float $width;
    private float $height;
    private array $formes = [];
    public function __construct(float $width, float $height, string $couleur = '#FFFFFF')
    {
        parent::__construct($couleur);
        $this->width = $width;
        $this->height = $height;
    }
    public function add(Forme $formes){
        $this->formes[] = $formes;
    }
    public function getWidth(){
        return $this->width;
    }
    public function getHeight(){
        return $this->height;
    }
    public function getFormes(){
        return $this->formes;
    }
}
