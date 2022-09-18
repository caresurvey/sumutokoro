<?php
namespace Tool\Common;

use Illuminate\Support\ServiceProvider;


class CommonServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom( __DIR__ . '/resources/views', 'common');
    }
}
