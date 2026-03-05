<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'price_id' => 'required|exists:prices,id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        Config::$serverKey    = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized  = true;
        Config::$is3ds        = true;

        $price = Price::with(['service', 'subService'])->findOrFail($request->price_id);

        $quantity = $price->unit_type === 'per_item'
            ? ($request->quantity ?? 1)
            : 1;

        $unitPrice = (int) $price->price;
        $total = $unitPrice * $quantity;

        $orderId = 'ORD-' . Str::upper(Str::random(10));

        // simpan order
        $order = Order::create([
            'user_id' => auth()->id(),
            'price_id' => $price->id,
            'order_id' => $orderId,
            'quantity' => $quantity,
            'total_price' => $total,
            'status' => 'pending'
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $total,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email'      => auth()->user()->email,
            ],
            'item_details' => [[
                'id'       => $price->id,
                'price'    => $unitPrice,
                'quantity' => $quantity,
                'name'     => $price->service->name
                    . ($price->subService ? ' - ' . $price->subService->name : '')
            ]]
        ];

        $snapToken = Snap::getSnapToken($params);

        return response()->json([
            'snap_token' => $snapToken,
            'order_id'   => $orderId
        ]);
    }
}
