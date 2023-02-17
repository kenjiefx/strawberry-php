<?php

namespace Kenjiefx\StrawberryFramework\App\Page;

class PageModel
{

    private string $templateName;

    private string $pathToPageJSON;

    private string $relativePath;

    private string $rawHTML;

    public function __construct()
    {

    }

    public function setTemplateName(
        string $templateName
        )
    {
        $this->templateName = $templateName;
    }

    public function getTemplateName()
    {
        return $this->templateName;
    }

    public function setPagePath(
        string $pathToPageJSON
        )
    {
        $this->pathToPageJSON = $pathToPageJSON;
    }

    public function getPagePath()
    {
        return $this->pathToPageJSON;
    }

    public function setRelativePath(
        string $relativePath
        )
    {
        $this->relativePath = $relativePath;
    }

    public function getRelativePath()
    {
        return $this->relativePath;
    }

    public function setRawHTML(
        string $rawHTML
        )
    {
        $this->rawHTML = $rawHTML;
    }

    public function getRawHTML()
    {
        return $this->rawHTML;
    }
}
