<?php

namespace Tests\AppBundle\Command;

use AppBundle\Command\SortProductsCommand;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * Class SortProductsCommandTest
 * @package Tests\AppBundle\Command
 */
class SortProductsCommandTest extends KernelTestCase
{
    /**
     * Test execute command
     */
    public function testExecuteCommand()
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $application->add(new SortProductsCommand());

        $command = $application->find('products:sort');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command' => $command->getName(),
            'json' => '[{"title":"H&M T-Shirt White","price":10.99,"inventory":10},{"title":"Magento Enterprise License","price":1999.99,"inventory":9999},{"title":"iPad 4 Mini","price":500.01,"inventory":2},{"title":"iPad Pro","price":990.2,"inventory":2},{"title":"Barmin Fenix 5","price":789.67,"inventory":34},{"title":"armin Fenix 3 HR Sapphire Performer Bundle","price":789.67,"inventory":12}]',
        ]);

        $output = $commandTester->getDisplay();
        $this->assertContains('[{"title":"H&M T-Shirt White","price":10.99,"inventory":10},{"title":"iPad 4 Mini","price":500.01,"inventory":2},{"title":"Barmin Fenix 5","price":789.67,"inventory":34},{"title":"armin Fenix 3 HR Sapphire Performer Bundle","price":789.67,"inventory":12},{"title":"iPad Pro","price":990.2,"inventory":2},{"title":"Magento Enterprise License","price":1999.99,"inventory":9999}]', $output);
    }
}