<?php

namespace Caio\LaravelExtraCommands;

use Illuminate\Support\ServiceProvider;

class LaravelExtraCommandsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\MakeServiceCommand::class,
            ]);
        }
    }
}
