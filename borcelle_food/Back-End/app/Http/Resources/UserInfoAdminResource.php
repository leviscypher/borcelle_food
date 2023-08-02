<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;


class UserInfoAdminResource extends JsonResource
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
            'fullname' => $this->user_info->fullname,
            'nickname' => $this->user_info->nickname,
            'phone' => $this->user_info->phone,
            'email' => $this->email,
            'birthday' => $this->user_info->birthday,
            'gender_id' => $this->user_info->gender_id,
            'gender' => $this->user_info->gender->gender,
            'avatar' => $this->user_info->avatar ? Storage::disk('google')->url(json_decode($this->user_info->avatar)) : null,
            'user_id' => $this->user_info->user_id,
            'user_name' =>  $this->username,
            'permanent_address' => $this->user_info->permanent_address,
            'role_id' => $this->role_id,
            'position_id' => $this->position_id,
            'position_name' => $this->position->name,
        ];
    }
}
