<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;

use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function createOrder(Request $request, $user_id)
    {
        try {

            $data = $request->all();
            $order_details = $data['order_details'];

            $order = Order::create([
                'user_id' => $user_id,
                'address_id' => $request->address_id
            ]);

            foreach ($order_details as $item) {
                $product = Product::find($item['product_id']);
                if ($item['quantity'] > $product->quantity) {
                    return response()->json(
                        ['error' => $product->name . ' chỉ còn ' . $product->quantity . ' sản phẩm'],
                        400
                    );
                };
                OrderDetail::create([
                    'total' => $item['quantity'] * $product->price,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                    'order_id' => $order->id,
                    'product_id' => $product->id
                ]);
                if ($product->quantity == 0) {
                    $product->status_product_id = 2;
                    $product->save();
                }
                $product->quantity = $product->quantity - $item['quantity'];
                $product->save();
            }
            return response()->json($this->message($this->addSuccess), 201);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), 404);
        }
    }
}
