<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\UserInfo;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CustomerUserInfoRequest;



class CustomerUserInfoController extends Controller
{
    public function edit($id)
    {
        try {
            $user_info_edit = UserInfo::where('user_id', $id)->first();
            if (!$user_info_edit) {
                return response()->json($this->message($this->doesNotExist), 404);
            }
            $item = [
                'id' => $user_info_edit->id,
                'fullname' => $user_info_edit->fullname,
                'nickname' => $user_info_edit->nickname,
                'phone' => $user_info_edit->phone,
                'email' => $user_info_edit->user->email,
                'birthday' => $user_info_edit->birthday,
                'gender' => $user_info_edit->gender ? $user_info_edit->gender : 'other',
                'avatar' => $user_info_edit->avatar ? Storage::disk('google')->url($user_info_edit->avatar) : null,
                'user_id' => $user_info_edit->user_id,
                'user_name' =>  $user_info_edit->user->username
            ];
            return response()->json($item, 200);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), 404);
        }
    }

    public function update(CustomerUserInfoRequest $request, $user_id)
    {
        try {
            $user_info_update = UserInfo::where('user_id', $user_id)->first();

            if (!$user_info_update) {
                $this->handleCreate($request, $user_id);
                DB::table('users')->where('id', $user_id)->update([
                    'isActive' => 1
                ]);
                return response()->json($this->message($this->updateSuccess), 201);
            } else {
                $this->handleUpdate($user_info_update, $request, $user_id);
                return response()->json($this->message($this->updateSuccess), 200);
            }
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), 404);
        }
    }

    private function handleCreate($request, $user_id)
    {
        if (!$request->avatar) {
            $pathImage = null;
        }

        if ($request->email) {
            DB::table('users')->where('id', $user_id)->update(['email' => $request->email]);
        }

        $pathImage = $this->uploadImageDrive($request->avatar);
        UserInfo::create([
            'fullname' => $request->fullname,
            'nickname' => $request->nickname,
            'phone' => $request->phone,
            'birthday' => $request->birthday,
            'gender' => $request->gender ? $request->gender : 'other',
            'avatar' => $pathImage,
            'permanent_address' => $request->permanent_address,
            'user_id' => $user_id
        ]);
    }

    private function handleUpdate($repository, $request, $user_id)
    {
        if ($request->email) {
            DB::table('users')->where('id', $user_id)->update(['email' => $request->email]);
        }

        if ($request->avatar) {
            $pathImage = $this->uploadImageDrive($request->avatar);
            $this->deleteImageDrive($repository->avatar);
        } else {
            $pathImage = null;
            $this->deleteImageDrive($repository->avatar);
        }
        DB::table('user_info')->where('user_id', $user_id)->update([
            'fullname' => $request->fullname,
            'nickname' => $request->nickname,
            'phone' => $request->phone,
            'birthday' => $request->birthday ? $request->birthday : $repository->birthday,
            'gender' => $request->gender ? $request->gender : $repository->gender,
            'avatar' => $pathImage,
            'permanent_address' => $request->permanent_address,
            'user_id' => $user_id
        ]);
    }
}
