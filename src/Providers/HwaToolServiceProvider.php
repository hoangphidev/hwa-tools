<?php

namespace HoangPhi\HwaTools\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use HoangPhi\HwaTools\Console\Commands\HwaMetaCommand;
use HoangPhi\HwaTools\Console\Commands\HwaMigrateCommand;

class HwaToolServiceProvider extends ServiceProvider
{
    /**
     * Register hwa tools services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/hwa_tools.php', 'hwa_tools');
    }

    /**
     * Bootstrap hwa tools services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'hwa_tools');

        $this->publishes([
            __DIR__ . '/../../config/hwa_tools.php' => config_path('hwa_tools.php')
        ], 'hwa_tools');

        $this->commands([
            HwaMetaCommand::class,
            HwaMigrateCommand::class,
        ]);

        $this->app->booted(function () {
            Artisan::call('vendor:publish', [
                '--provider' => 'HoangPhi\HwaTools\Providers\HwaToolServiceProvider',
                '--tag' => 'hwa_tools'
            ]);
        });

    }
}
