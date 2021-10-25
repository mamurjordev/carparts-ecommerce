<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session as checkout;
use Illuminate\Support\Facades\URL;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        $name = 'part name';
        $price = 200;
        $qty = 2;

        return $this->Stripe($name, $price, $qty);
    }

    public function Stripe($name, $price, $qty)
    {
        Stripe::setApiKey('sk_test_51IuGJeSBLyifUJR0dyopouE0cplJEGRzI71kBNLfDxxePYBsg3E9CG5BusixQ3a39Lm7tVYZcYZwtmYFZxx2fsZE00LC57TKCv');

        header('Content-Type: application/json');

        $checkout_session = checkout::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => $price . '00',
                    'product_data' => [
                        'name' => $name,
                    ],
                ],
                'quantity' => $qty,
            ]],
            'mode' => 'payment',
            'success_url' => URL::to("/") . '/payment/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => URL::to("/") . '/payment/cancel',
        ]);

        return response()->json(['id' => $checkout_session->id]);
    }
}
