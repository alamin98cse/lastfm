<?php

namespace Integration\Lastfm;

use Illuminate\Support\ServiceProvider;

class LastfmServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind(Lastfm::class, function () {
            return new Lastfm();
        });
    }

    public function provides()
    {
        
        return [Lastfm::class];

    }
}