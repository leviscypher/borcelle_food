<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class OrderDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'product_name' => $this->product->name,
            'product_image' => Storage::disk('google')->url(json_decode($this->product->image_path)[0]),
            'description' => $this->product->description,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'total' => $this->total,
            'phone' => $this->order->address->phone,
            'order_date' => $this->order->created_at->format('d/m/Y, H:i'),
            'order_status' => $this->order->order_status->status,
            'order_status_id' => $this->order->status_id,
            'reason' => $this->order->cancellation_reason,
            'delivery_fee' => $this->order->delivery_fee,
            'recipients_name' => $this->order->address->fullname,
            'address' =>  $this->order->address->delivery_address . ', ' . $this->order->address->ward->name . ' ' . $this->order->address->district->name . ' ' .   $this->order->address->city->name,
        ];
    }
}
