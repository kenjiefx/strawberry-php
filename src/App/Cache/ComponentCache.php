<?php

namespace Kenjiefx\StrawberryFramework\App\Cache;

use Kenjiefx\StrawberryFramework\App\Cache\BinManager;
use Kenjiefx\StrawberryFramework\App\Models\BuildInstance;
use Kenjiefx\StrawberryFramework\App\Cache\CacheManagerInterface;

class ComponentCache extends BinManager implements CacheManagerInterface
{

    private int $buildId;
    protected string $binNmspc = '/components/';

    public function __construct(
        private BuildInstance $BuildInstance
        )
    {
        $this->buildId = $BuildInstance::id();
    }

    public function addItem(
        array $args
        )
    {
        $existing = $this->loadItem();
        if (!in_array($args['name'],$existing)) {
            array_push($existing,$args['name']);
        }
        $this->saveItem($existing);
    }

    public function getId()
    {
        return $this->buildId.'.json';
    }

    public function loadItem()
    {
        if (!$this->doItemExist()) return [];
        return json_decode(
            file_get_contents(
                $this->getFilePath($this->getId())
            )
        );
    }

    private function saveItem(
        array $data
        )
    {
        $this->saveFile(
            $this->getId(),
            json_encode($data)
        );
    }

    public function doItemExist()
    {
        return (file_exists(
            $this->getFilePath($this->getId())
        ));
    }



    
}
