<?php

namespace Kenjiefx\StrawberryFramework\App\Services;

use Kenjiefx\StrawberryFramework\App\Models\AppConfig;
use Kenjiefx\StrawberryFramework\App\Models\ThemeModel;
use Kenjiefx\StrawberryFramework\App\Cache\ComponentCache;
use Kenjiefx\StrawberryFramework\App\Factories\ContainerFactory;
use Kenjiefx\StrawberryFramework\App\Controllers\WidgetController;
use Kenjiefx\StrawberryFramework\App\Controllers\ComponentController;

class CSSBundler
{
    public function __construct(
        private ComponentCache $ComponentCache,
        private ThemeModel $ThemeModel,
        private AppConfig $AppConfig,
        private WidgetController $WidgetController
        )
    {
        $this->ThemeModel->setName((new AppConfig)('theme')['name']);
    }

    public function bundleFromComponents()
    {
        $css = '';
        $componentNames = $this->ComponentCache->loadItem();
        foreach ($componentNames as $componentName) {
            $component = ContainerFactory::create()->get(ComponentController::class);
            $component->setTheme($this->ThemeModel);
            $component->setComponentName($componentName);
            if (file_exists($component->getCssPath()))
                $css .=  file_get_contents($component->getCssPath());
        }
        return $this->removeExcessChars($css);
    }

    public function bundleFromWidgetCss()
    {
        $css = '';
        $this->WidgetController->setTheme($this->ThemeModel);
        foreach ($this->WidgetController->getAllCsspaths() as $cssPath) {
            $css .=  file_get_contents($cssPath);
        }
        return $this->removeExcessChars($css);
    }

    private function removeExcessChars(
        string $chars
        )
    {
        return str_replace(["\r","\n","    ","\t"],"", $chars);
    }
}
