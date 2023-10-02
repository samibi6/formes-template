<?php

namespace Opmvpc\Formes\Renderers;

interface Renderer
{
    public function render(): string;

    public function save(string $path): void;
}
