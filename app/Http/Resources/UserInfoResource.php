<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;


class UserInfoResource extends JsonResource
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
            'fullname' => $this->fullname,
            'nickname' => $this->nickname,
            'phone' => $this->phone,
            'email' => $this->user->email,
            'birthday' => $this->birthday,
            'gender_id' => $this->gender_id,
            'gender' => $this->gender->gender,
            'avatar' => $this->avatar ? Storage::disk('google')->url(json_decode($this->avatar)) : null,
            'user_id' => $this->user_id,
            'user_name' =>  $this->user->username,
            'permanent_address' => $this->permanent_address,
            'role_id' => $this->user->role_id,
            'position_id' => $this->user->position_id,
            'position_name' => $this->user->position->name,
        ];
    }
}
