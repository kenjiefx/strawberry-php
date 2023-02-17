<?php

namespace Kenjiefx\StrawberryFramework\App\Components;

class ComponentModel
{
    private string $templateReference;
    private string $pageRelativePath;

    public function __construct(
        private string $name
        )
    {

    }

    public function getName()
    {
        return $this->name;
    }

    public function setTemplateReference(
        string $templateName
        )
    {
        $this->templateReference = $templateName;
    }

    public function getTemplateReference()
    {
        return $this->templateReference;
    }

    public function setPageRelativePath(
        string $pageRelativePath
        )
    {
        $this->pageRelativePath = $pageRelativePath;
    }
}
