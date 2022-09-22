<?php


namespace Ogbuechi\LaraSecure\Providers;

class LaraSecureServiceProvider extends ServiceProvider
{


    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }

}
