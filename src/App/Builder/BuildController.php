<?php

namespace Kenjiefx\StrawberryFramework\App\Builder;
use Kenjiefx\StrawberryFramework\App\Configuration\AppSettings;
use Kenjiefx\StrawberryFramework\App\Theme\ThemeController;

/**
 * Class BuildController 
 * This object holds all the build functions
 */
class BuildController
{
    public function __construct(
        private ThemeController $themeController,
        private AppSettings $appSettings
        )
    {
        $appSettings::load();
    }
}
