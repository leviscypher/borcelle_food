<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $urls = [];
        foreach (json_decode($this->image_path) as $item) {
            $url = Storage::disk('google')->url($item);
            $urls[] = $url;
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'description' => $this->description,
            'image_path' => $urls,
            'categories_id' => $this->categories_id,
            'category_name' => $this->categories->name,
            'status_name' => $this->product_status->status,
            'status_id' => $this->product_status_id,
        ];
    }
}
