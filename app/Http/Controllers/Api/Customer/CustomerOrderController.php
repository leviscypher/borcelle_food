<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\customer\Order;
use App\Models\customer\OrderDetail;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function createOrder(Request $request, $user_id)
    {
        $order = Order::create([
            'user_id' => $user_id,
            'city' => $request->city,
            'address_' => $request->address,
        ]);
        foreach ($request->all() as $item) {
            OrderDetail::create([
                'total' => $item['price'] * $item['quantity'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'product_id' => $item['product_id'],
                'order_id' => $order->id
            ]);
        }
        return response()->json($this->message('đặt hàng thành công'), 201);
    }
}
