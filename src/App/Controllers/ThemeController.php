<?php

namespace Kenjiefx\StrawberryFramework\App\Controllers;

use Kenjiefx\StrawberryFramework\App\Models\ThemeModel;
use Kenjiefx\StrawberryFramework\App\Services\DirMover;

class ThemeController
{

    private string $theme = '';

    public function setTheme(
        ThemeModel $themeModel
        )
    {
        $this->ThemeModel = $themeModel;
    }

    public function compile()
    {
        ob_start();
        $this->build();
        $this->ThemeModel->setRawHTML(ob_get_contents());
        ob_end_clean();
    }

    private function build()
    {
        include __dir__.'/theme.functions.php';
        include $this->ThemeModel->getIndexPath();
    }

    public function install(
        string $themeDirPath
        )
    {
        $dirMover = new DirMover(
            source: $themeDirPath,
            destination: ROOT.'/theme',
            placeholders: []
        );
        $dirMover->move();
    }

}


