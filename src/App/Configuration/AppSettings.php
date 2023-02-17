<?php

namespace Kenjiefx\StrawberryFramework\App\Configuration;
use Kenjiefx\StrawberryFramework\App\Exceptions\ConfigurationException;

class AppSettings
{
    /**
     * Tells whether the configuration has been loaded 
     * already or not
     */
    private static bool $hasLoaded = false;

    /**
     * The name of the strawberry configuration file 
     */
    private static string $fileName = 'strawberry.config.json';

    /**
     * The name of the current active theme
     */
    private static string $themeName = '';

    /**
     * Build configuration manager
     */
    private static BuildConfiguration $buildConfiguration; 

    /**
     * Loads strawberry configuration file
     */
    public static function load()
    {

        $error = 'Strawberry configuration not found. Please make sure that the file ';
        $error .= 'strawberry.config.json exists in your root directory and is valid.';
        $error .= 'To generate the configuration file, use init conmmand.';

        if (!static::$hasLoaded) {
            $path = Self::getConfigFilePath();
            if (!file_exists($path)) {
                throw new ConfigurationException($error);
            }
            $config = json_decode(file_get_contents($path),TRUE);
            static::$themeName = $config['theme'] ?? 'infinity';
            if (isset($config['build'])) {
                static::$buildConfiguration = new BuildConfiguration($config['build']);
            }
            static::$hasLoaded = true;
        }
        
    }

    /**
     * Returns the path of the strawberry configuration file
     */
    private static function getConfigFilePath()
    {
        return static::$fileName;
    }

    public static function getThemeName()
    {
        return static::$themeName;
    }

    public static function build()
    {
        return static::$buildConfiguration;
    }


}
