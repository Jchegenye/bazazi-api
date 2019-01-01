<?php 

namespace Jchegenye\MyAuthentication;

use Illuminate\Support\ServiceProvider;

class MyAuthenticationServiceProvider extends ServiceProvider {

   /**
    * Bootstrap the application services.
    *
    * @return void
    */
   public function boot()
   {
      //$this->loadRoutesFrom(__DIR__.'/routes.php');
      $this->loadMigrationsFrom(__DIR__.'/database/migrations');
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