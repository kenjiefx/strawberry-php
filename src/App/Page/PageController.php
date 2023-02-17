<?php

namespace Kenjiefx\StrawberryFramework\App\Page;

class PageController
{
    public function __construct(
        private PageModel $pageModel
        )
    {

    }

    public function setPath(
        string $pagePath
        )
    {
        $pagesDirPathLength = strlen(ROOT.'/pages');
        $this->pageModel->setPagePath($pagePath);
        $pageRelativePath = substr($pagePath,$pagesDirPathLength);
        $this->pageModel->setRelativePath(substr($pageRelativePath,0,-5));
    }

    public function getRelativePath()
    {
        return $this->pageModel->getRelativePath();
    }

    public function getTemplateName()
    {
        return $this->pageModel->getTemplateName();
    }

    public function getCompiledHTML()
    {
        return $this->pageModel->getRawHTML();
    }

    public function setCompiledHTML(
        string $HTML
        )
    {
        $this->pageModel->setRawHTML($HTML);
    }

    
}
