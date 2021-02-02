<?php

namespace Nhinstein\Lchannel;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Config\Repository as Config;



class BlastServiceProvider extends ServiceProvider
{
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    

    public function boot() {
        /**
         * Publish 
         * php artisan vendor:publish --tag=core
         */
        $this->publishes([
            __DIR__ . '/config/blast.php' => base_path('/config/blast.php'),
            __DIR__ . '/app/Channels/BlastChannel.php' => app_path('app/Channels/BlastChannel'),
        ], 'core');
    }
}
