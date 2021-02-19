<?php

namespace Tridi\Tripay;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

class ServiceProvider extends LaravelServiceProvider implements DeferrableProvider
{
    /**
     * Bootstrap the application services.
     * 
     * @return void
     */

     public function boot()
     {
         $this->publishes([
            dirname(__DIR__).'/config.php'=>config_path('tripay-payment.php'),
         ]);
     }

     /**
      * Register the application services
      *
      *@return void
      */
      public function register()
      {
          $this->app->singleton(\Tripay::class,function($app){
            return new Tripay();
          });
      }

      /**
       * Get the services provider by the provider.
       * 
       * @return array
       */
      public function provides()
      {
          return [\Tripay::class];
      }
}
?>