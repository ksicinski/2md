<?php

namespace Tests\AppBundle\Command;

use AppBundle\Command\CheckNamesInTextCommand;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * Class CheckNamesInTextCommandTest
 * @package Tests\AppBundle\Command
 */
class CheckNamesInTextCommandTest extends KernelTestCase
{
    /**
     * Test when string don't have any names
     */
    public function testNoneNameExecute()
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $application->add(new CheckNamesInTextCommand());

        $command = $application->find('string:check-name');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command' => $command->getName(),
            'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ',
        ]);

        $output = $commandTester->getDisplay();
        $this->assertContains('0', $output);
    }

    /**
     * Test when string have one name - John
     */
    public function testOneNameJohnExecute()
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $application->add(new CheckNamesInTextCommand());

        $command = $application->find('string:check-name');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'text' => 'Lorem Ipsum is simply dummy John text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ',
        ]);

        $output = $commandTester->getDisplay();
        $this->assertContains('0', $output);
    }

    /**
     * Test when string have one name - Mary
     */
    public function testOneNameMaryExecute()
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $application->add(new CheckNamesInTextCommand());

        $command = $application->find('string:check-name');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'text' => 'Lorem Ipsum is simply dummy Mary text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ',
        ]);

        $output = $commandTester->getDisplay();
        $this->assertContains('0', $output);
    }

    /**
     * Test
     * Found one names pair
     */
    public function testFoundOnePairExecute()
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $application->add(new CheckNamesInTextCommand());

        $command = $application->find('string:check-name');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'text' => 'Lorem Ipsum is John simply dummy Mary text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ',
        ]);

        $output = $commandTester->getDisplay();
        $this->assertContains('1', $output);
    }

    /**
     * Test
     * Found three names pair
     */
    public function testFoundThreePairExecute()
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $application->add(new CheckNamesInTextCommand());

        $command = $application->find('string:check-name');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'text' => 'Lorem mary Ipsum Maryis JohnJohn John simply dummy Mary text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ',
        ]);

        $output = $commandTester->getDisplay();
        $this->assertContains('1', $output);
    }

    /**
     * Test case sensitive
     */
    public function testCaseSensitiveExecute()
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $application->add(new CheckNamesInTextCommand());

        $command = $application->find('string:check-name');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'text' => 'Lorem mary Ipsum Maryis Johnjohn john simply dummy Mary text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ',
        ]);

        $output = $commandTester->getDisplay();
        $this->assertContains('1', $output);
    }
}