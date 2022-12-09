<?php

namespace Kenjiefx\StrawberryFramework\App\Modules;

use Symfony\Component\Console\Application;
use Kenjiefx\StrawberryFramework\App\Commands\Install;
use Kenjiefx\StrawberryFramework\App\Modules\ModuleInterface;
use Kenjiefx\StrawberryFramework\App\Commands\CreateComponent;

class CLIModule implements ModuleInterface
{
    public function import()
    {
        return $this;
    }

    public function run()
    {
        $application = new Application();
        $application->add(new Install());
        $application->add(new CreateComponent());
        $application->run();
        return $this;
    }
}
