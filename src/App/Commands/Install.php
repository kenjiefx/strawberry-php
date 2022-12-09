<?php 

namespace Kenjiefx\StrawberryFramework\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Kenjiefx\StrawberryFramework\App\Install\Installer;

#[AsCommand(name: 'init')]
class Install extends Command  
{
    protected static $defaultDescription = 'Create a new Strawberry Framework project';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $installer = new Installer($output);
        $installer->install();
        return Command::SUCCESS;
    }

    protected function configure(): void
    {
        $this->setHelp('This command allows you create a new project.');
    }
    
}