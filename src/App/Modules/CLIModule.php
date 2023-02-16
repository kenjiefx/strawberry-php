<?php

namespace Kenjiefx\StrawberryFramework\App\Modules;

use Kenjiefx\StrawberryFramework\App\Commands\Build;
use Kenjiefx\StrawberryFramework\App\Factory\ContainerFactory;
use Kenjiefx\StrawberryFramework\App\Modules\ModuleInterface;
use Kenjiefx\StrawberryFramework\Container;
use Symfony\Component\Console\Application;

class CLIModule implements ModuleInterface
{

    private Application $ConsoleApplication;
    private Container $AppContainer;

    public function importDependencies() 
    {
        $this->ConsoleApplication = new Application();
        $this->ConsoleApplication->add(new Build());
        $this->AppContainer = new Container(ContainerFactory::create());
        $this->AppContainer->register();
    }

    public function runCommands()
    {
        $this->ConsoleApplication->run();
    }
}
