<?php

namespace Kenjiefx\StrawberryFramework\App\Theme;
use Kenjiefx\StrawberryFramework\App\Registry\ComponentRegistry;
use Kenjiefx\StrawberryFramework\App\Theme\Registry\PageRegistry;

/**
 * Class ThemeController 
 * This object holds all the things you can do 
 * in a theme
 */
class ThemeController
{

    public function __construct(
        private ThemeModel $themeModel,
        private ComponentRegistry $componentRegistry
        )
    {

    }

    public function getThemeModel()
    {
        return $this->themeModel;
    }

    public function getFunctionsPath()
    {
        return __dir__.'/theme.functions.php';
    }

    public function getTemplatePath(
        string $templateName
        )
    {
        return $this->themeModel->getThemeDir().'/templates/template.'.$templateName.'.php';
    }

    public function getComponentPath(
        string $componentName
        )
    {
        return $this->themeModel->getThemeDir().'/components/'.$componentName;
    }

    public function getComponentRegistry()
    {
        return $this->componentRegistry;
    }

    /**
     * Get the path to theme's index.php file
     */
    public function getIndexPath()
    {
        return $this->themeModel->getThemeDir().'/index.php';
    }

    public function setCompiledHTML(
        string $compiledHTML
        )
    {
        
    }


}
