<?php


namespace App\Orders;


use App\Interfaces\PaymentGateway;

class OrderDetails
{
    /** @var PaymentGateway $paymentGateway */
    private $paymentGateway;

    public function __construct(PaymentGateway $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function all()
    {
        $this->paymentGateway->setDiscount(30);

        return [
            'name' => 'Name 1',
            'address' => 'Address 1',
        ];
    }
}
