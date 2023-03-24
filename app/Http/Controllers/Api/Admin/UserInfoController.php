<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserInfoRequest;
use App\Http\Requests\UserInfoUpdateRequest;

use App\Models\Admin\UserInfo;
use Illuminate\Support\Facades\Storage;




class UserInfoController extends Controller
{

    public function index()
    {
        $user_info = UserInfo::all();
        $datas = [];
        foreach ($user_info as $item) {
            $data = [
                'fullname' => $item->fullname,
                'nickname' => $item->nickname,
                'phone' => $item->phone,
                'email' => $item->email,
                'birthday' => $item->birthday,
                'gender' => $item->gender ? $item->gender : 'other',
                'avatar' => $item->avatar ? Storage::disk('google')->url($item->avatar) : null,
                'user_id' => $item->user_id,
            ];
            $datas[] = $data;
        }

        return response()->json(['datas' => $datas]);
    }

    public function create(UserInfoRequest $request, $id)
    {
        $pathImage = $this->uploadImageDrive($request->avatar);
        $user_info = UserInfo::create([
            'fullname' => $request->fullname,
            'nickname' => $request->nickname,
            'phone' => $request->phone,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'gender' => $request->gender ? $request->gender : 'other',
            'avatar' => $pathImage,
            'user_id' => $id
        ]);
        return response()->json(['user-info' => $user_info, 'message' => 'thêm thông tin tài khoản thành công!'], 201);
    }

    public function edit($id)
    {
        $user_info_edit = UserInfo::find($id);
        if ($user_info_edit->avatar) {
            $user_info_edit->avatar = Storage::disk('google')->url($user_info_edit->avatar);
        }
        return $user_info_edit;
    }

    public function update(UserInfoUpdateRequest $request, $id)
    {
        $user_info_update = UserInfo::find($id);

        if ($request->avatar === "" || $request->avatar === null) {
            $this->deleteImageDrive($user_info_update->avatar);
        }

        $pathImage = $this->uploadImageDrive($request->avatar);
        $this->deleteImageDrive($user_info_update->avatar);
        $this->handleUpdate($user_info_update, $request, $pathImage);
        return response()->json(['message' => 'cập nhật thành công!'], 200);
    }

    private function handleUpdate($repo, $request, $pathImage)
    {
        $repo->fullname = $request->fullname;
        $repo->nickname = $request->nickname;
        $repo->phone = $request->phone;
        $repo->email = $request->email;
        $repo->birthday = $request->birthday ? $request->birthday : $repo->birthday;
        $repo->gender = $request->gender ? $request->gender : $repo->gender;
        $repo->avatar = $pathImage ? $pathImage : $request->avatar;
        $repo->user_id = $repo->user_id;
        $repo->save();
    }

    public function delete($id)
    {
        $user_info_delete = UserInfo::find($id);
        $this->deleteImageDrive($user_info_delete->avatar);
        $user_info_delete->delete();
        return response()->json(['message' => 'xóa thành công!'], 200);
    }
}
