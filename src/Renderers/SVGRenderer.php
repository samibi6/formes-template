<?php

namespace Opmvpc\Formes\Renderers;

use Opmvpc\Formes\Canvas;
use Opmvpc\Formes\Rectangle;
use Opmvpc\Formes\Cercle; 
use Opmvpc\Formes\Ligne; 
use Opmvpc\Formes\Polygone;
use Opmvpc\Formes\Ellipse;
use Opmvpc\Formes\Path;
use Opmvpc\Formes\Polyline;
use SVG\Nodes\Shapes\SVGCircle;
use SVG\Nodes\Shapes\SVGEllipse;
use SVG\Nodes\Shapes\SVGLine;
use SVG\Nodes\Shapes\SVGPath;
use SVG\Nodes\Shapes\SVGPolygon;
use SVG\Nodes\Shapes\SVGPolyline;
use SVG\Nodes\Shapes\SVGRect;
use SVG\SVG;

class SVGRenderer implements Renderer {
    private Canvas $canvas;

    public function __construct(Canvas $canvas) {
        $this->canvas = $canvas;
    }
    public function render(): string {
        $image = $this->getSVG();
        return $image->toXMLString();
    }
    protected function getSVG(){
        $image = new SVG($this->canvas->getWidth(), $this->canvas->getHeight());
        $doc = $image->getDocument();
        
        $square = new SVGRect(0, 0, $this->canvas->getWidth(), $this->canvas->getHeight(), $this->canvas->getCouleur());
        $doc->setStyle('fill', $this->canvas->getCouleur());
        $doc->addChild($square);
        
        foreach ($this->canvas->getFormes() as $forme) {
            switch(get_class($forme)) {
                case Ligne::class:
                    $line = new SVGLine($forme->getPoint1()->getX(), $forme->getPoint1()->getY(), $forme->getPoint2()->getX(), $forme->getPoint2()->getY());
                    $line->setStyle('fill', $forme->getCouleur());
                    $doc->addChild($line);
                    break;
                case Cercle::class:
                    $circle = new SVGCircle($forme->getCentre()->getX(), $forme->getCentre()->getY(), $forme->getRayon());
                    $circle->setStyle('fill', $forme->getCouleur());
                    $doc->addChild($circle);
                    break;
                case Polygone::class:
                    $pointsArray = $forme->getPoints();
                    $mainArray = [];
                    foreach($pointsArray as $point){
                        array_push($mainArray, [$point->getX(), $point->getY()]);
                    }
                    $polygon = new SVGPolygon($mainArray);
                    $polygon->setStyle('fill', $forme->getCouleur());
                    $doc->addChild($polygon);
                    break;
                case Rectangle::class:
                    $rect = new SVGRect($forme->getPoint()->getX(), $forme->getPoint()->getY(), $forme->getHeight(), $forme->getWidth());
                    $rect->setStyle('fill', $forme->getCouleur());
                    $doc->addChild($rect);
                    break;
                case Ellipse::class:
                    $ellipse = new SVGEllipse($forme->getCentre()->getX(), $forme->getCentre()->getY(), $forme->getRayon()->getX(), $forme->getRayon()->getY());
                    $ellipse->setStyle('fill', $forme->getCouleur());
                    $doc->addChild($ellipse);
                    break;
                case Path::class:
                    $path = new SVGPath($forme->getDesc());
                    $path->setStyle('fill', $forme->getCouleur());
                    $doc->addChild($path);
                    break;
                case Polyline::class:
                    $pointsArray = $forme->getPoints();
                    $mainArray = [];
                    foreach($pointsArray as $point){
                        array_push($mainArray, [$point->getX(), $point->getY()]);
                    }
                    $polyline = new SVGPolyline($mainArray);
                    $polyline->setStyle('fill', $forme->getCouleur());
                    $doc->addChild($polyline);
                    break;
            }
        }
        return $image;
    }
    public function save(string $path): void {
        file_put_contents($path, $this->render());
    }
}