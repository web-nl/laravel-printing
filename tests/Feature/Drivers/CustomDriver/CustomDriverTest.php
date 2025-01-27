<?php

declare(strict_types=1);

namespace Rawilk\Printing\Tests\Feature\Drivers\CustomDriver;

use Rawilk\Printing\Facades\Printing;
use Rawilk\Printing\Tests\Feature\Drivers\CustomDriver\Driver\CustomDriver;
use Rawilk\Printing\Tests\TestCase;

class CustomDriverTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config([
            'printing.driver' => 'custom',
            'printing.drivers.custom' => [
                'driver' => 'custom_driver',
                'api_key' => '123456',
            ],
        ]);

        $this->app['printing.factory']->extend('custom_driver', fn (array $config) => new CustomDriver($config['api_key']));
    }

    /** @test */
    public function can_list_a_custom_drivers_printers(): void
    {
        $this->assertCount(2, Printing::printers());
        $this->assertEquals('printer_one', Printing::printers()[0]->id());
        $this->assertEquals('printer_two', Printing::printers()[1]->id());
    }

    /** @test */
    public function can_find_a_custom_drivers_printer(): void
    {
        $printer = Printing::printer('printer_one');

        $this->assertEquals('printer_one', $printer->id());
        $this->assertTrue($printer->isOnline());
    }

    /** @test */
    public function can_get_a_custom_drivers_default_printer(): void
    {
        config(['printing.default_printer_id' => 'printer_two']);

        $this->assertEquals('printer_two', Printing::defaultPrinterId());

        $defaultPrinter = Printing::defaultPrinter();

        $this->assertEquals('printer_two', $defaultPrinter->id());
        $this->assertFalse($defaultPrinter->isOnline());
    }

    /** @test */
    public function can_create_new_print_tasks_for_a_custom_driver(): void
    {
        $job = Printing::newPrintTask()
            ->printer('printer_one')
            ->content('hello world')
            ->send();

        $this->assertEquals('success', $job->state());
        $this->assertEquals('printer_one', $job->printerId());
    }
}
