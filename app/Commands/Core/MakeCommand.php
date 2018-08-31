<?php

namespace App\Commands\Core;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Exceptions\CommandAlReadyExistsException;
use Symfony\Component\Console\Input\InputArgument;


class MakeCommand extends Command
{
    /**
     * Setting Command Information
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName('make:command')
            ->setDescription('Generate a command class')
            ->addArgument('name', InputArgument::REQUIRED, 'Command name are required.');
    }
    /**
     * Creating a command class on Command folder
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $commandName = $input->getArgument('name');

        if ($this->isCommandExists($commandName)) {
            $output->writeln("This command are already exists");
            exit;
        }

        $this->generateCommandClass($commandName);


        $output->write($commandName . ' generated.');
    }

    private function getStubContent()
    {
        return file_get_contents(__DIR__ . '/stubs/command.stub');
    }

    private function isCommandExists($command)
    {
        return file_exists($this->commandDirectory() . '/' . $command . '.php');
    }

    private function commandDirectory()
    {
        return dirname(__DIR__);
    }

    private function generateCommandClass($commandName)
    {
        $contents = str_replace('DummyClass', $commandName, $this->getStubContent());

        file_put_contents($this->commandDirectory() . '/' . $commandName . '.php', $contents);
    }
}