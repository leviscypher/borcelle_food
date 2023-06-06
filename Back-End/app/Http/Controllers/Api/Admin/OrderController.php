<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderDetailsResource;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class OrderController extends Controller
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index($status)
    {

        if ($status > 1) {
            $orders = $this->order->where('status_id', $status)->orderBy('id', 'desc')->paginate($this->itemsPerPage);
        } else {
            $orders = $this->order->orderBy('id', 'desc')->paginate($this->itemsPerPage);
        }
        $orderResouce = OrderResource::collection($orders);
        $pagination = $this->getPagination($orderResouce, $orders);
        return response()->json($pagination, Response::HTTP_OK);
    }


    public function orderDetail($order_id)
    {
        $orderDetail = OrderDetail::where('order_id', $order_id)->get();
        $orderDetailResource = OrderDetailsResource::collection($orderDetail);
        return response()->json($orderDetailResource, Response::HTTP_OK);
    }

    public function updateStatus(Request $request, $order_id)
    {
        $order = $this->order->where('id', $order_id)->first();
        $status = ['progressing', 'shipping', 'delivered', 'cancelled'];
        foreach ($status as $item => $val) {
            if($request->status === $status[$item]){
                if($status[$item] === 'progressing') {
                    $order->status_id = 3;
                    $order->save();
                }

                if($status[$item] === 'shipping') {
                    $order->status_id = 4;
                    $order->save();
                }

                if($status[$item] === 'delivered') {
                    $order->status_id = 5;
                    $order->save();
                }

                if($status[$item] === 'cancelled') {
                    $order->cancellation_reason = $request->reason;
                    $order->status_id = 6;
                    $order->save();
                }
            }
        }
        return response()->json($this->message($this->updateSuccess), Response::HTTP_OK);
    }
}
