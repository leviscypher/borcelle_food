<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderDetailsResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        $orders = $this->order->paginate($this->itemsPerPage);
        $orderResouce = OrderDetailsResource::collection($orders);
        $pagination = $this->getPagination($orderResouce, $orders);
        return response()->json($pagination, Response::HTTP_OK);
    }

    public function orderDetail($order_id)
    {
        try {
            $order = Order::find($order_id);
            if (!$order) {
                return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
            }

            $address = $order->address;
            $order_details = $order->order_detail;
            $orders = [];
            $total = 0;

            foreach ($order_details as $item) {
                $total += $item->total;
                $orders[] = $item->product->name . ', số lượng ' . $item->quantity . ', giá tiền ' . $item->price . 'đ';
                $strAddress = $address->delivery_address . ', ' . $address->ward->name . ', ' . $address->district->name . ', ' . $address->city->name;
                $details = [
                    'id' => $item->id,
                    'recipients_name' => $order->address->fullname,
                    'phone' => $order->address->phone,
                    'delivery_address' => $address->delivery_address,
                    'city' => $address->city->name,
                    'district' => $address->district->name,
                    'ward' => $address->ward->name,
                    'full_address' => $strAddress,
                    'orders' => $orders,
                    'total' => $total,
                    'order_status' => $order->order_status->status,
                    'order_status_id' => $order->status_id
                ];
            }
            return response()->json($details, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_NOT_FOUND);
        }
    }

    public function updateStatus(Request $request, $order_id)
    {
        $order = $this->order->where('id', $order_id)->first();
        if (!$order) {
            return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
        }
        $order->status_id = $request->status_id;
        $order->user_id = $order->user_id;
        $order->save();
        return response()->json($this->message($this->updateSuccess), Response::HTTP_OK);
    }
}
