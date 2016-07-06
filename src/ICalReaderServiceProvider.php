<?php

namespace Timegridio\ICalReader;

use Illuminate\Support\ServiceProvider;

class ICalReaderServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerICal();
    }

    private function registerICal()
    {
        $this->app->bind('ical', function ($app) {
            return new ICalEvents($app);
        });
    }
}
