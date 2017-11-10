<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\VarDumper\VarDumper;

/**
 * Class checkNamesInTextCommand
 * @package AppBundle\Command
 */
class SortProductsCommand extends Command
{
    /**
     * Configure command
     */
    protected function configure()
    {
        $this
            ->setName('products:sort')
            ->setHelp('Sort by product price ascending, and if price is the same sorted alphabetically ascending.')
            ->addArgument('json', InputArgument::REQUIRED, 'Put some json array.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $textArgument = $input->getArgument('json');
        $array = json_decode($textArgument, true);

        foreach ($array as $key => $row) {
            $price[$key]  = $row['price'];
            $title[$key] = $row['title'];
        }
        array_multisort($price, SORT_ASC, $title, SORT_ASC, $array);

        $output->write(json_encode($array));
    }
}