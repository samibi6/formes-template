<?php

use Opmvpc\Formes\Canvas;
use Opmvpc\Formes\Forme;
use Opmvpc\Formes\Point;
use Opmvpc\Formes\Rectangle;

it('is a Rectangle', function () {
    $rectangle = new Rectangle(new Point(0, 0), 10, 10);
    expect($rectangle)->toBeInstanceOf(Rectangle::class);
    expect($rectangle)->toBeInstanceOf(Forme::class);
    expect($rectangle->getPoint())->toBeInstanceOf(Point::class);
    expect($rectangle->getPoint()->getX())->toBe(0.0);
    expect($rectangle->getPoint()->getY())->toBe(0.0);
    expect($rectangle->getWidth())->toBe(10.0);
    expect($rectangle->getHeight())->toBe(10.0);
    expect($rectangle->getCouleur())->toBe('#000000');
});

it('can be added to canvas', function () {
    $canvas = new Canvas(100, 100);
    expect($canvas->getFormes())->toBeArray();
    expect($canvas->getFormes())->toBeEmpty();
    $canvas->add(new Rectangle(new Point(0, 0), 10, 10));
    expect($canvas->getFormes())->toBeArray();
    expect($canvas->getFormes())->toHaveLength(1);
    $canvas->add(new Rectangle(new Point(0, 0), 10, 10));
    expect($canvas->getFormes())->toBeArray();
    expect($canvas->getFormes())->toHaveLength(2);
});
