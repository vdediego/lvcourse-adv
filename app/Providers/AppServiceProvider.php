<?php

namespace App\Providers;

use App\Billing\PaymentGateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * app: is the entire app
         * bind(): provides a callback where we could specify the injection needed in the service (PaymentGateway)
         *
         * It basically says: Whenever the service is called, use this currency as default. So any controller that injects/uses
         * a PaymentGateway object does not need to know how the object needs to be instantiated in order to be used.
         */
        $this->app->bind(PaymentGateway::class,
            function ($app) {
                return new PaymentGateway('usd');
            });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
