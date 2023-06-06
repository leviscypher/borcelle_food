<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class OrderResource extends JsonResource
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
            'address' =>  $this->address->delivery_address . ', ' . $this->address->ward->name . ' ' . $this->address->district->name . ' ' .   $this->address->city->name,
            'name' => $this->address->fullname,
            'phone' => $this->address->phone,
            'order_date' =>  Carbon::parse($this->created_at)->format('d/m/Y H:i'),
            'status_id' => $this->order_status->id,
            'status_name' => $this->order_status->status,
        ];
    }
}
