<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeServiceCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    public function getStubPath()
    {
        return base_path('stubs');
    }

    public function filePath()
    {
        return app_path('Services/' . $this->fileName() . '.php');
    }

    public function getStubVariables()
    {
        return [
            'className' => $this->fileName(),
        ];
    }

    public function getStubContents()
    {
        $stub = file_get_contents($this->getStubPath() . '/service.stub');

        foreach ($this->getStubVariables() as $key => $value) {
            $this->replaceStubVariable($stub, $key, $value);
        }
    
        return $stub;
    }

    public function replaceStubVariable(&$stub, $key, $value)
    {
        $stub = str_replace('{' . $key . '}', $value, $stub);
    }

    public function fileName()
    {
        $checkNameHasService = strpos($this->argument('name'), 'Service');

        if ($checkNameHasService === false) {
            return $this->argument('name') . 'Service';
        }

        return $this->argument('name');
    }

    public function makeDirectory()
    {
        if (!is_dir(app_path('Services'))) {
            mkdir(app_path('Services'));
        }
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {

        if (file_exists($this->filePath())) {
            $this->error('Service already exists!');
            return false;
        }

        $this->makeDirectory();

        file_put_contents($this->filePath(), $this->getStubContents());

        $this->info('Service created successfully.');
        return true;
    }
}