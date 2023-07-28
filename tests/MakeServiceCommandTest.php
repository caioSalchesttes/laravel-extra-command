<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use App\Console\Commands\MakeServiceCommand;

class MakeServiceCommandTest extends TestCase
{
    /** @test */
    public function it_creates_a_service()
    {
        // setup
        $serviceName = 'TestService';
        $serviceFilePath = __DIR__ . '/../../app/Services/' . $serviceName . '.php';

        // make sure we're starting from a clean state
        if (File::exists($serviceFilePath)) {
            unlink($serviceFilePath);
        }

        $this->assertFalse(File::exists($serviceFilePath));

        // Run the make:service command
        Artisan::call('make:service ' . $serviceName);

        $this->assertTrue(File::exists($serviceFilePath));
    }

    /** @test */
    public function it_does_not_create_a_service_if_one_already_exists()
    {
        // setup
        $serviceName = 'ExistingService';
        $serviceFilePath = __DIR__ . '/../../app/Services/' . $serviceName . '.php';

        // Ensure the service file exists
        if (!File::exists($serviceFilePath)) {
            File::put($serviceFilePath, '');
        }

        $this->assertTrue(File::exists($serviceFilePath));

        // Attempt to run the make:service command
        $exitCode = Artisan::call('make:service ' . $serviceName);

        // Assert the command returned an error
        $this->assertEquals($exitCode, false);
    }
}
