<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class IncreaseNumberCountCommand extends Command
{
    protected function configure()
    {
        $this->setName('increase-number-count')
            ->setDescription('Addition of increase number count.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
    }
}