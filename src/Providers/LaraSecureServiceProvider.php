<?php


namespace Ogbuechi\LaraSecure\Providers;

use Illuminate\Support\ServiceProvider;

class LaraSecureServiceProvider extends ServiceProvider
{


    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }

}
