<?php

namespace Opmvpc\Formes;

class Path extends Forme{
    private string $description;
    public function __construct(string $description, string $couleur = '#000000'){
        parent::__construct($couleur);
        $this->description = $description;
    }
    public function getDesc(){
        return $this->description;
    }
}