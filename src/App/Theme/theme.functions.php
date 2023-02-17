<?php 
use Kenjiefx\StrawberryFramework\App\Components\ComponentModel;

function render_content()
{
    $template = $GLOBALS['PAGE_TEMPLATE'] ?? null;
    if ($template!==null) {
        $theme = $GLOBALS['THEME_OBJECT'];
        $templatePath = $theme->getTemplatePath($template);
        if (!file_exists($templatePath)) {
            echo 'template not found.';
            return;
        }
        include $templatePath;
    }
}

function component(
    string $name,
    ?string $class = null
    )
{
    $theme = $GLOBALS['THEME_OBJECT'];

    $componentPath = $theme->getComponentPath($name);
    if (!is_dir($componentPath)) {
        echo 'component not found';
        return;
    }

    $componentHTMLPath = $componentPath.'/'.$name.'.php';
    if (!file_exists($componentHTMLPath)) {
        echo 'component not found';
        return;
    }

    $componentModel = new ComponentModel($name);
    $componentModel->setTemplateReference($GLOBALS['PAGE_TEMPLATE'] ?? '');
    $componentModel->setPageRelativePath($GLOBALS['PAGE_RELATIVE_PATH']);

    $theme->getComponentRegistry()->register($componentModel);

    echo '<section xcomponent="@'.$name.'" xparent="">';
    include $componentHTMLPath;
    echo '</section>';
}