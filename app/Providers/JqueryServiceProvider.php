<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class JqueryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            base_path('node_modules') . '/jquery/dist/jquery.min.js' => public_path('js/lib/jquery/jquery.min.js'),
        ], 'public');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
