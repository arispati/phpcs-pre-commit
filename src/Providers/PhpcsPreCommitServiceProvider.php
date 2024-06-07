<?php

namespace Arispati\PhpcsPreCommit\Providers;

use Arispati\PhpcsPreCommit\Commands\Install;
use Illuminate\Support\ServiceProvider;

class PhpcsPreCommitServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Install::class
            ]);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
