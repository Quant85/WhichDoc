<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Braintree\Configuration;

class AppServiceProvider extends ServiceProvider
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

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $environment = 'sandbox';
        $braintree = new \Braintree\Gateway([
        'environment' => $environment,
        'merchantId' => 'bssnwr5n5cqstfbh',
        'publicKey' => 'w9b6vc8txhfnsktf',
        'privateKey' => '7c669aee7be469395d09aa911dfbd0ac'
        ]);
        config(['braintree' => $braintree]);
    }
}
