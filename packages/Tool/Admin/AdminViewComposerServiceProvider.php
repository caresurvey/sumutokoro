<?php
namespace Tool\Admin;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AdminViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', '\Tool\Admin\Application\ViewComposers\AuthComposer');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
