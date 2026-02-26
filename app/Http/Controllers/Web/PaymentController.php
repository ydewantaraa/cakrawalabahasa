<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function process(Request $request)
    {
        // Midtrans config
        Config::$serverKey    = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized  = true;
        Config::$is3ds        = true;

        // Ambil harga dari database
        $price = Price::with(['service', 'subService'])->findOrFail($request->price_id);

        // Tentukan quantity
        $quantity = $price->unit_type === 'per_item' ? (int) $request->quantity : 1;
        $quantity = max(1, $quantity);

        $unitPrice = (int) round((float) $price->price);
        $total = $price->unit_type === 'per_item' ? $unitPrice * $quantity : $unitPrice;

        // Parameter Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => 'ORD-CB-' . strtoupper(uniqid()),
                'gross_amount' => $total,
            ],
            'customer_details' => [
                'first_name' => $request->name,
                'email'      => $request->email,
                'phone'      => $request->phone,
            ],
            'item_details' => [[
                'id'       => (string) $price->id,
                'price'    => $unitPrice,
                'quantity' => $quantity,
                'name'     => $price->service->name . ($price->subService ? ' - ' . $price->subService->name : ''),
            ]],
        ];

        $snapToken = Snap::getSnapToken($params);

        return response()->json(['snapToken' => $snapToken]);
    }
}
