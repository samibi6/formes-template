<?php

use Opmvpc\Formes\Canvas;
use Opmvpc\Formes\Ligne;
use Opmvpc\Formes\Point;

it('is a Ligne', function () {
    $point1 = new Point(0, 0);
    $point2 = new Point(10, 10);
    $ligne = new Ligne($point1, $point2);
    expect($ligne)->toBeInstanceOf(Ligne::class);
    expect($ligne->getPoint1())->toBeInstanceOf(Point::class);
    expect($ligne->getPoint1())->toBe($point1);
    expect($ligne->getPoint2())->toBeInstanceOf(Point::class);
    expect($ligne->getPoint2())->toBe($point2);
    expect($ligne->getCouleur())->toBe('#000000');
});

it('can be added to canvas', function () {
    $canvas = new Canvas(100, 100);
    expect($canvas->getFormes())->toBeArray();
    expect($canvas->getFormes())->toBeEmpty();
    $canvas->add(new Ligne(new Point(0, 0), new Point(10, 10)));
    expect($canvas->getFormes())->toBeArray();
    expect($canvas->getFormes())->toHaveLength(1);
    $canvas->add(new Ligne(new Point(0, 0), new Point(10, 10)));
    expect($canvas->getFormes())->toBeArray();
    expect($canvas->getFormes())->toHaveLength(2);
});
