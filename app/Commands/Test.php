<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class Test extends Command
{
    protected function configure()
    {
        $this->setName('CHANGE ME')
            ->setDescription('CHANGE ME');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //
    }
}