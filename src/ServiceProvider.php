<?php

namespace Tv2regionerne\StatamicUnpublishCron;

use Statamic\Providers\AddonServiceProvider;
use Tv2regionerne\StatamicUnpublishCron\Console\Commands\UnpublishEntries;

class ServiceProvider extends AddonServiceProvider
{
    protected $commands = [
        UnpublishEntries::class,
    ];

    public function bootAddon()
    {

        $this->mergeConfigFrom(__DIR__.'/../config/statamic-unpublish-cron.php', 'statamic-unpublish-cron');

        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__.'/../config/statamic-unpublish-cron.php' => config_path('statamic-unpublish-cron.php'),
            ], 'statamic-unpublish-cron');

        }
    }
}
