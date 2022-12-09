<?php 

namespace Kenjiefx\StrawberryFramework\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Kenjiefx\StrawberryFramework\App\Install\Installer;

#[AsCommand(name: 'create-component')]
class CreateComponent extends Command  
{
    protected static $defaultDescription = 'Create a new StrawberryJS component';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $componentName = $input->getArgument('component name');
        echo $componentName;
        return Command::SUCCESS;
    }

    protected function configure(): void
    {
        $this->setHelp('Creates a new StrawberryJS component');
        $this->addArgument('component name', InputArgument::REQUIRED, 'Name of the component');
    }
    
}