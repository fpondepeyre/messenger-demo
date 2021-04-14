<?php

namespace App\Tests\Command;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zenstruck\Console\Test\InteractsWithConsole;
use Zenstruck\Messenger\Test\InteractsWithMessenger;
use Zenstruck\Messenger\Test\Transport\TestTransport;

class ImportSubscriptionCommandTest extends KernelTestCase
{
    use InteractsWithConsole;
    use InteractsWithMessenger;

    public function testSomething(): void
    {
        TestTransport::reset();
        $this->messenger('async')->queue()->assertEmpty();

        $this->executeConsoleCommand('app:import:subscription subscriptions.csv')
            ->assertSuccessful()
        ;

        $this->messenger('async')->queue()->assertNotEmpty();
        $this->messenger('async')->queue()->assertCount(10);
    }
}
