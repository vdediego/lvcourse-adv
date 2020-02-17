<?php

namespace App\Billing;

interface PaymentGateway
{
    /**
     * @param int $discount
     * @return PaymentGateway
     */
    public function setDiscount(int $discount);

    /**
     * @param float $amount
     * @return array
     */
    public function charge(float $amount);
}
