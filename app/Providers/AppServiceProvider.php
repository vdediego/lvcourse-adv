<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Interfaces\PaymentGateway;
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
         *
         * We use singleton because we do not need to have different instances of PaymentGateway every time we invoke the service
         */
        $this->app->singleton(PaymentGateway::class,
            function ($app) {
                if (request()->has('credit')) {

                    return new CreditPaymentGateway('usd');
                }
                return new BankPaymentGateway('usd');
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
