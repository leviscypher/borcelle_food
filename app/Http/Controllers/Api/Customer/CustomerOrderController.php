<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderDetailsResource;

use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CustomerOrderController extends Controller
{

    public function index($user_id) {
        $order = Order::where('user_id', $user_id)->get();
        $orderResource = OrderResource::collection($order);
        return response()->json($orderResource, Response::HTTP_OK);
    }

    public function orderDetail($order_id) {
        $orderDetail = OrderDetail::where('order_id', $order_id)->get();
        $orderDetailResource = OrderDetailsResource::collection($orderDetail);
        return response()->json($orderDetailResource, Response::HTTP_OK);
    }

    public function createOrder(Request $request, $user_id)
    {
        try {

            $data = $request->all();
            $order_details = $data['order_details'];

            $order = Order::create([
                'user_id' => $user_id,
                'address_id' => $request->address_id,
                'delivery_fee' => $request->delivery_fee
            ]);

            foreach ($order_details as $item) {
                $product = Product::find($item['product_id']);
                if((int)$product->quantity - $item['quantity'] == 0) {
                    $product->product_status_id = 2;
                    $product->save();
                }

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
                if ($product->quantity === 0) {
                    $product->product_status_id = 2;
                    $product->save();
                }
                $product->quantity = $product->quantity - $item['quantity'];
                $product->save();
            }
            return response()->json($this->message($this->addSuccess), Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_NOT_FOUND);
        }
    }

}
