<?php

namespace Kenjiefx\StrawberryFramework\App\Models;

class AppConfig
{

    private static array $config = [
        'theme' => [
            'name' => 'infinity'
        ]
    ];

    private static bool $hasLoaded = false;
    private static string $fileName = 'strawberry.config.json';


    private static function load()
    {
        if (!static::$hasLoaded) {
            $path = ROOT.static::$fileName;
            if (file_exists($path)) {
                # Load Config Values here
            }
            static::$hasLoaded = true;
        }
    }

    public static function getTheme(
        string $key
        )
    {
        if (!static::$hasLoaded) AppConfig::load();
        return static::$config['theme'][$key] ?? NULL;
    }

    public static function init()
    {
        $configPath = ROOT.'/'.Self::$fileName;
        if (!file_exists($configPath)) {
            file_put_contents($configPath,json_encode(Self::$config));
        }
    }

    public function __invoke(
        string $key
    )
    {
        if (!static::$hasLoaded) AppConfig::load();
        return static::$config[$key] ?? NULL;
    }

}
