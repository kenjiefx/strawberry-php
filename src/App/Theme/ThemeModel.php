<?php

namespace Kenjiefx\StrawberryFramework\App\Theme;

/** 
 * @class ThemeModel 
 * The Theme is represented by the Theme Model. 
 * This holds all the Theme properties and values 
 */
class ThemeModel
{
    /**
     * @var string name 
     * The name of the theme 
     */
    private string $name;

    /**
     * @var int createdAt 
     * The date this theme has been created
     */
    private int $createdAt;

    private string $html;

    public function __construct()
    {

    }

    public function setThemeName(
        string $themeName
        )
    {
        $this->name = $themeName;
    }

    public function getThemeDir()
    {
        return ROOT.'/theme/'.$this->name;
    }
}
