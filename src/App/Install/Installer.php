<?php 

namespace Kenjiefx\StrawberryFramework\App\Install;

use Symfony\Component\Console\Output\OutputInterface;
use Kenjiefx\StrawberryFramework\App\Models\AppConfig;
use Kenjiefx\StrawberryFramework\App\Models\ThemeModel;
use Kenjiefx\StrawberryFramework\App\Controllers\ThemeController;

class Installer 
{
    public function __construct(
        private OutputInterface $Output
        )
    {

    }

    public function install()
    {
        AppConfig::init();
        $themeName = AppConfig::getTheme('infinity');
        $themeModel = new ThemeModel($themeName);
        $themeController = new ThemeController($themeModel);
        $themeController->install(__dir__.'/theme');
    }
}