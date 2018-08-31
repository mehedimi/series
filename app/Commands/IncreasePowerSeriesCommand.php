<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;


class IncreasePowerSeriesCommand extends Command
{
    protected $numbers = [];

    protected function configure()
    {
        $this->setName('series:increase-power')
            ->setDescription('Calculate increase power series addition.')
            ->addArgument('limit', InputArgument::REQUIRED, 'Limit of series');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $answer = $this->calculate($input->getArgument('limit'));

        $output->write(implode(' + ', $this->numbers) . ' = ' . $answer);
    }

    private function calculate($number)
    {
        $sum = 0;

        for($i = 1; $i <= $number; $i++){
            $sum += pow($i, $i);
            $this->numbers[] = $i . "^{$i}";
        }

        return $sum;
    }
}