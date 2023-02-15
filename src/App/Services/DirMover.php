<?php

namespace Kenjiefx\StrawberryFramework\App\Services;

class DirMover {

    public function __construct(
        private string $source,
        private string $destination,
        private array $placeholders
        )
    {

    }

    public function move()
    {
        if (!file_exists($this->destination)) {
            mkdir($this->destination);
        }
    }

}