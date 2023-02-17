<?php

namespace Kenjiefx\StrawberryFramework\App\Registry;
use Kenjiefx\StrawberryFramework\App\Page\PageController;

class PageRegistry
{
    private array $arrayOfPageControllers = [];

    public function addPage(
        PageController $pageController
        )
    {
        array_push($this->arrayOfPageControllers,$pageController);
    }

    public function getPages()
    {
        return $this->arrayOfPageControllers;
    }
}
