<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
            'recipients_name' => $this->address->fullname,
            'phone' => $this->address->phone,
            'order_date' => $this->created_at->format('d-m-Y, H:i'),
            'order_status' => $this->order_status->status,
            'order_status_id' => $this->status_id,
        ];
    }
}
