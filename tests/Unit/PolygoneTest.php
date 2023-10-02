<?php

use Opmvpc\Formes\Canvas;
use Opmvpc\Formes\Forme;
use Opmvpc\Formes\Point;
use Opmvpc\Formes\Polygone;

it('is a Polygone', function () {
    $polygone = new Polygone([new Point(0, 0), new Point(0, 1), new Point(1, 1), new Point(1, 0)]);
    expect($polygone)->toBeInstanceOf(Polygone::class);
    expect($polygone)->toBeInstanceOf(Forme::class);
    expect($polygone->getPoints())->toBeArray();
    expect($polygone->getPoints())->not->toBeEmpty();
    expect($polygone->getPoints())->toHaveCount(4);
    expect($polygone->getCouleur())->toBe('#000000');
});

it('can be added to canvas', function () {
    $canvas = new Canvas(100, 100);
    expect($canvas->getFormes())->toBeArray();
    expect($canvas->getFormes())->toBeEmpty();
    $canvas->add(new Polygone([new Point(0, 0), new Point(0, 1), new Point(1, 1), new Point(1, 0)]));
    expect($canvas->getFormes())->toBeArray();
    expect($canvas->getFormes())->toHaveLength(1);
    $canvas->add(new Polygone([new Point(0, 0), new Point(0, 1), new Point(1, 1), new Point(1, 0)]));
    expect($canvas->getFormes())->toBeArray();
    expect($canvas->getFormes())->toHaveLength(2);
});

it('can be a triangle', function () {
    $polygone = new Polygone([new Point(0, 0), new Point(0, 1), new Point(1, 1)]);
    expect($polygone)->toBeInstanceOf(Polygone::class);
    expect($polygone)->toBeInstanceOf(Forme::class);
    expect($polygone->getPoints())->toBeArray();
    expect($polygone->getPoints())->not->toBeEmpty();
    expect($polygone->getPoints())->toHaveCount(3);
});
