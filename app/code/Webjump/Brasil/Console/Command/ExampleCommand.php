<?php

declare(strict_types=1);

namespace Webjump\Brasil\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExampleCommand extends  Command
{
    const NAME = null;

    protected function configure()
    {
        parent::configure();
        $this->setName('training:example:run');
        $this->setDescription('Training Console Example');
        $this->addArgument('frase', InputArgument::REQUIRED, 'frase' );

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('frase');
        $output->writeln('--- Hello Wold Men =>' . $name);
    }
}
