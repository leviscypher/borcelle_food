<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate($this->itemsPerPage);
        $datas = [];
        foreach ($orders as $item) {
            $address = $item->address;
            $data = [
                'id' => $item->id,
                'recipients_name' => $address->fullname,
                'phone' => $address->phone,
                'order_date' => $item->created_at->format('d-m-Y, H:i'),
                'order_status' => $item->order_status->status,
                'order_status_id' => $item->status_id,
            ];
            $datas[] = $data;
        }
        $pagination = $this->getPagination($datas, $orders);
        return response()->json($pagination, 200);
    }

    public function order_detail($order_id)
    {
        // try {
        $order = Order::find($order_id);
        if (!$order) {
            return response()->json($this->message($this->doesNotExist), 404);
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


        return response()->json($details, 200);
        // } catch (\Throwable $th) {
        //     return response()->json($this->message($this->anUnspecifiedError), 404);
        // }
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
