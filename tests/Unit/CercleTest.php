<?php

use Opmvpc\Formes\Canvas;
use Opmvpc\Formes\Cercle;
use Opmvpc\Formes\Forme;
use Opmvpc\Formes\Point;

it('is a Cercle', function () {
    $cercle = new Cercle(new Point(0, 0), 10);
    expect($cercle)->toBeInstanceOf(Cercle::class);
    expect($cercle)->toBeInstanceOf(Forme::class);
    expect($cercle->getCentre())->toBeInstanceOf(Point::class);
    expect($cercle->getRayon())->toBe(10.0);
    expect($cercle->getCouleur())->toBe('#000000');
});

it('can be added to canvas', function () {
    $canvas = new Canvas(100, 100);
    expect($canvas->getFormes())->toBeArray();
    expect($canvas->getFormes())->toBeEmpty();
    $canvas->add(new Cercle(new Point(0, 0), 10));
    expect($canvas->getFormes())->toBeArray();
    expect($canvas->getFormes())->toHaveLength(1);
    $canvas->add(new Cercle(new Point(0, 0), 10));
    expect($canvas->getFormes())->toBeArray();
    expect($canvas->getFormes())->toHaveLength(2);
});
