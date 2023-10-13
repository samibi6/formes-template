<?php

namespace Opmvpc\Formes\Renderers;

class JPGRenderer extends SVGRenderer implements Renderer
{
    public function save(string $path): void {
        $image = $this->getSVG();
        $rasterImage = $image->toRasterImage(200, 200, '#FFFFFF');
        imagejpeg($rasterImage, $path);
    }
}
