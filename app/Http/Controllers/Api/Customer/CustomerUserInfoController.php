<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin\UserInfo;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserInfoRequest;



class CustomerUserInfoController extends Controller
{
    public function edit($user_id)
    {
        $user_info_edit = UserInfo::where('user_id', $user_id)->first();

        if (!$user_info_edit) {
            return response()->json($user_info_edit, 404);
        }

        if ($user_info_edit->avatar) {
            $user_info_edit->avatar = Storage::disk('google')->url($user_info_edit->avatar);
        }
        return response()->json($user_info_edit, 200);
    }

    public function update(UserInfoRequest $request, $user_id)
    {
        try {
            $user_info_update = UserInfo::where('user_id', $user_id)->first();

            if (!$user_info_update) {
                $this->handleCreate($request, $user_id);
                DB::table('users')->where('id', $user_id)->update([
                    'isActive' => 1
                ]);
                return response()->json(['message' => 'cập nhật thành công.'], 201);
            } else {
                $this->handleUpdate($user_info_update, $request, $user_id);
                return response()->json(['message' => 'cập nhật thành công.'], 200);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => 'đã có lỗi xảy ra.'], 404);
        }
    }

    private function handleCreate($request, $user_id)
    {
        if (!$request->avatar) {
            $pathImage = null;
        }
        $pathImage = $this->uploadImageDrive($request->avatar);
        UserInfo::create([
            'fullname' => $request->fullname,
            'nickname' => $request->nickname,
            'phone' => $request->phone,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'gender' => $request->gender ? $request->gender : 'other',
            'avatar' => $pathImage,
            'user_id' => $user_id
        ]);
    }

    private function handleUpdate($repository, $request, $user_id)
    {
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
            'email' => $request->email,
            'birthday' => $request->birthday ? $request->birthday : $repository->birthday,
            'gender' => $request->gender ? $request->gender : $repository->gender,
            'avatar' => $pathImage,
            'user_id' => $user_id
        ]);
    }
}
