<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
class AccessControlProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
          Gate::define('admin',function($user){
            dd($user->menuroles);
            return $user->menuroles == 'user,admin';
          });

          Gate::define('user',function($user){
            dd($user->menuroles);
            return $user->menuroles == 'user';
          });
    }
}
