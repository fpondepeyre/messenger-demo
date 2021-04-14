<?php

namespace App\Command;

use League\Csv\Reader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ImportSubscriptionsCommand extends Command
{
    protected static $defaultName = 'app:import:subscriptions';
    protected static $defaultDescription = 'Add a short description for your command';

    protected function configure()
    {
        $this
            ->setDescription(self::$defaultDescription)
            ->addArgument('path', InputArgument::REQUIRED, 'Csv file path')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $path = $input->getArgument('path');

        if ($path) {
            $io->note(sprintf('You passed an argument: %s', $path));
        }

        $reader = Reader::createFromPath($path);
        $reader->setHeaderOffset(0);
        $records = $reader->getRecords();

        foreach($records as $record) {
            // @todo process record
            //dump($record);
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
