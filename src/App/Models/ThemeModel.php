<?php

namespace Kenjiefx\StrawberryFramework\App\Models;

class ThemeModel
{
    private string $name;
    private string $rawHTML;

    public function setName(
        string $name
        )
    {
        $this->name = $name;
        return $this;
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

    public function getIndexPath()
    {
        $path = $this->getThemeDir().'/index.php';
        if (!file_exists($path)) {
            throw new \Exception('Error: Theme Not Found');
        }
        return $this->getThemeDir().'/index.php';
    }

    public function getThemeDir()
    {
        return ROOT.'/theme/'.$this->name;
    }

}
