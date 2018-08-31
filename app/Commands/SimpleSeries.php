<?php
namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class SimpleSeries extends Command
{
    protected function configure()
    {
        $this->setName('series:simple')
            ->setDescription('Calculate simple series addition')
            ->setHelp('Like 1+2+3+.....n')
            ->addArgument('limit', InputArgument::REQUIRED, 'Limit of series');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $series = range(1, $input->getArgument('limit'));

        $output->write(implode($series, ' + ') . ' = ' . array_sum($series));
    }
}