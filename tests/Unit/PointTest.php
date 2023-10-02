<?php

use Opmvpc\Formes\Canvas;
use Opmvpc\Formes\Point;

it('is a Point', function () {
    $point = new Point(0, 0);
    expect($point)->toBeInstanceOf(Point::class);
    expect($point->getX())->toBe(0.0);
    expect($point->getY())->toBe(0.0);
});

it('can\'t be added to canvas', function () {
    $canvas = new Canvas(100, 100);
    expect($canvas->getFormes())->toBeArray();
    expect($canvas->getFormes())->toBeEmpty();
    $canvas->add(new Point(0, 0));
})->throws(TypeError::class);
