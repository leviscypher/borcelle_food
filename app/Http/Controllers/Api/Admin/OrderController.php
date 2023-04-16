<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function index()
    {
    }

    public function updateStatus(Request $request, $order_id)
    {
        $order = Order::where('id', $order_id)->first();
        if (!$order) {
            return response()->json($this->message($this->doesNotExist), 404);
        }
        $order->status_id = $request->status_id;
        $order->user_id = $order->user_id;
        $order->save();
        return response()->json($this->message($this->updateSuccess), 200);
    }
}
