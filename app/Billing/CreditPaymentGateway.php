<?php


namespace App\Billing;


use App\Interfaces\PaymentGateway;
use Illuminate\Support\Str;

class CreditPaymentGateway implements PaymentGateway
{
    /** @var string */
    private $currency;

    /** @var int percentage of a value */
    private $discount = 0;

    /**
     * PaymentGateway constructor.
     * @param string $currency
     */
    public function __construct(string $currency)
    {
        $this->currency = $currency;
    }

    /**
     * @param int $discount
     * @return PaymentGateway
     */
    public function setDiscount(int $discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * @param float $amount
     * @return array
     */
    public function charge(float $amount)
    {
        // Charge the bank
        $fees = $amount * 0.03;
        return  [
            'amount' => $amount - ($amount *  ($this->discount / 100)) + $fees,
            'confirmation_number' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount,
            'fees' => $fees,
        ];
    }
}
