<?php

namespace Muzammal\SyncEnvVariables;
use Illuminate\Support\ServiceProvider;
use Muzammal\SyncEnvVariables\Console\Commands\SyncEnvCommand;

class SyncEnvVariablesServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Register the command with Laravel
        $this->commands([
            SyncEnvCommand::class,
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Code here if any other boot actions are needed
    }
}
