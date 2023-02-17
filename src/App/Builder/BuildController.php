<?php

namespace Kenjiefx\StrawberryFramework\App\Builder;
use Kenjiefx\StrawberryFramework\App\Configuration\AppSettings;
use Kenjiefx\StrawberryFramework\App\Page\PageController;
use Kenjiefx\StrawberryFramework\App\Page\PageModel;
use Kenjiefx\StrawberryFramework\App\Registry\PageRegistry;
use Kenjiefx\StrawberryFramework\App\Theme\ThemeController;

/**
 * Class BuildController 
 * This object holds all the build functions
 */
class BuildController
{

    public function __construct(
        private ThemeController $themeController,
        private PageController $pageController,
        private PageRegistry $pageRegistry
        )
    {
        AppSettings::load();
    }

    public function build()
    {

        $themeName = AppSettings::getThemeName();
        $this->themeController->getThemeModel()->setThemeName($themeName);

        $pagesDir = ROOT.'/pages';
        $this->registerPages($pagesDir);
        $this->renderPages();
        $this->exportPages();
        

        //$this->bufferThemeRendering();
    }

    public function registerPages(
        string $path_to_pages_dir
        )
    {
        foreach (scandir($path_to_pages_dir) as $page_json_file) {
            if ($page_json_file==='.'||$page_json_file==='..') continue;

            /** Generate the path to the page JSON file */
            $path_to_page_json = $path_to_pages_dir.'/'.$page_json_file;
            if (is_dir($path_to_page_json)) {
                $this->registerPages($path_to_page_json);
                continue;
            } 

            $page_model         = new PageModel();
            $page_config        = json_decode(file_get_contents($path_to_page_json),TRUE);
            $page_template_name = $page_config['template'] ?? null;

            if (null!==$page_template_name) {
                $page_model->setTemplateName($page_template_name);
                $pageController = new PageController($page_model);
                $pageController->setPath($path_to_page_json);
                $this->pageRegistry->addPage(($pageController));
            }
        }
    }

    private function renderPages()
    {
        $this->includeGlobalEntities();
        foreach ($this->pageRegistry->getPages() as $pageController) {
            $GLOBALS['PAGE_TEMPLATE']      = $pageController->getTemplateName();
            $GLOBALS['PAGE_RELATIVE_PATH'] = $pageController->getRelativePath();
            ob_start();
            $this->renderThemeFromIndex();
            $pageController->setCompiledHTML(ob_get_contents());
            ob_end_clean();
        }
    }

    private function exportPages()
    {
        foreach ($this->pageRegistry->getPages() as $pageController) {
            $exportPath = ROOT.'/dist'.$pageController->getRelativePath();
            echo $pageController->getCompiledHTML().PHP_EOL;
        }
    }

    private function includeGlobalEntities()
    {
        include $this->themeController->getFunctionsPath();
        $GLOBALS['THEME_OBJECT'] = $this->themeController;
    }

    /** Build starts at the index.php file */
    private function renderThemeFromIndex()
    {
        include $this->themeController->getIndexPath();
    }

}
