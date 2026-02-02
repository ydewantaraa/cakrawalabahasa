<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Services\MidtransService;

class CheckoutController extends Controller
{
    protected $midtrans;

    public function __construct(MidtransService $midtrans)
    {
        $this->midtrans = $midtrans;
    }

    public function process(Request $request)
    {
        $carts = Cart::where('user_id', Auth::id())->with('course')->get();
        $total = $carts->sum(function ($cart) {
            return $cart->course->price * $cart->quantity;
        });

        $orderId = 'ORDER-' . uniqid();

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $total,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ]
        ];

        $snapToken = $this->midtrans->createTransaction($params)->token;

        return view('checkout.payment', compact('snapToken'));
    }
}
