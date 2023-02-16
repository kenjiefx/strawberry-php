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
}
