<?php 

namespace Kenjiefx\StrawberryFramework\App\Modules;

interface ModuleInterface
{
    /**
     * Import module dependencies
     */
    public function importDependencies();

    /**
     * Runs module
     */
    public function runCommands();
}