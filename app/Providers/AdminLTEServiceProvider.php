<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AdminLTEServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            base_path('vendor') . '/almasaeed2010/adminlte/dist' => public_path('adminlte/dist'),
        ], 'public');
        
        $this->publishes([
            base_path('vendor') . '/almasaeed2010/adminlte/bootstrap' => public_path('adminlte/bootstrap'),
        ], 'public');
        
        $this->publishes([
            base_path('vendor') . '/almasaeed2010/adminlte/plugins' => public_path('adminlte/plugins'),
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
