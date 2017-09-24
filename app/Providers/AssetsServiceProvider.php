<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AssetsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // ADMIN LTE
        $this->publishes([
            base_path('vendor') . '/almasaeed2010/adminlte/dist' => public_path('adminlte/dist'),
        ], 'public');
        
        $this->publishes([
            base_path('vendor') . '/almasaeed2010/adminlte/bower_components' => public_path('adminlte/bower_components'),
        ], 'public');
        
        $this->publishes([
            base_path('vendor') . '/almasaeed2010/adminlte/plugins' => public_path('adminlte/plugins'),
        ], 'public');
        
        // JQUERY
        $this->publishes([
            base_path('node_modules') . '/jquery/dist/jquery.min.js' => public_path('js/lib/jquery/jquery.min.js'),
        ], 'public');
        
        // JQUERY
        $this->publishes([
            base_path('node_modules') . '/jquery-colorbox/jquery.colorbox-min.js' => public_path('js/lib/jquery-colorbox/js/jquery.colorbox-min.js'),
            base_path('node_modules') . '/jquery-colorbox/example1/colorbox.css' => public_path('js/lib/jquery-colorbox/css/colorbox.css'),
            base_path('node_modules') . '/jquery-colorbox/example1/images' => public_path('js/lib/jquery-colorbox/css/images'),
        ], 'public');
        
        // TINYMCE
        $this->publishes([
            base_path('node_modules') . '/tinymce' => public_path('js/lib/tinymce'),
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
