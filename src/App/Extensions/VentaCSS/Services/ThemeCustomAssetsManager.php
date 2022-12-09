<?php

declare(strict_types=1);
namespace Kenjiefx\StrawberryFramework\App\Extensions\VentaCSS\Services;

use Kenjiefx\StrawberryFramework\App\Models\AppConfig;
use Kenjiefx\StrawberryFramework\App\Models\ThemeModel;

class ThemeCustomAssetsManager {

    private const UTILS_PATH = '/widgets/css/venta.utils.json';

    public function __construct(
        private AppConfig $AppConfig,
        private ThemeModel $ThemeModel
        )
    {
        $themeName = $AppConfig::getTheme('name');
        $this->ThemeModel->setName($themeName);
    }

    public function loadCustomAssets()
    {
        $utilsPath = $this->ThemeModel->getThemeDir().Self::UTILS_PATH;
        if (!file_exists($utilsPath)){
            return [];
        }
        return json_decode(file_get_contents($utilsPath),TRUE);
    }
    







}