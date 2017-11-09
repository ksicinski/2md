<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class checkNamesInTextCommand
 * @package AppBundle\Command
 */
class CheckNamesInTextCommand extends Command
{
    /**
     * Configure command
     */
    protected function configure()
    {
        $this
            ->setName('string:check-name')
            ->setHelp('This command check if “John” and “Mary” names are found the same number of times inside the provided text. If the number of times is the same it should return 1, if not it should return 0.')
            ->addArgument('text', InputArgument::REQUIRED, 'Put some text to test.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $textArgument = $input->getArgument('text');

        preg_match_all('/john/i', $textArgument, $johnMatches);
        $johnCountMatched = count($johnMatches[0]);

        preg_match_all('/mary/i', $textArgument, $maryMatches);
        $maryCountMatched = count($maryMatches[0]);

        if ($johnCountMatched == $maryCountMatched && ($johnCountMatched != 0 || $maryCountMatched != 0)) {
            $output->write(1);
        } else {
            $output->write(0);
        }
    }
}