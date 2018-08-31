<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;


class IncreaseNumberCountCommand extends Command
{
    protected $numberString = [];

    protected function configure()
    {
        $this->setName('series:increase-number-count')
            ->setDescription('Addition of increase number count.')
            ->addArgument('limit', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sum = 0;
        $n = $input->getArgument('limit');
        $i = $k = 1;
        $internalNumber = [];
        for(; $i <= $n; $i++){
            for($j = 1; $j <= $i; ++$j){
                if($i == 1){
                    $this->numberString[] = 1;
                }else{
                    $internalNumber[] = $k;
                }
                $sum += $k;
                $k++;
            }
            if($i == 1){
                continue;
            }
            $this->numberString[] = '(' . implode(' + ' ,$internalNumber) . ')';
            $internalNumber = [];
        }

        $output->writeln(implode(' + ', $this->numberString));
        $output->writeln($sum);
    }
}