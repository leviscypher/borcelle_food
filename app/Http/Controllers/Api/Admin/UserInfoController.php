<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserInfoRequest;

use App\Models\UserInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserInfoController extends Controller
{

    public function index()
    {
        $user_info = UserInfo::paginate($this->itemsPerPage);
        $datas = [];

        foreach ($user_info as $item) {
            $data = [
                'id' => $item->id,
                'fullname' => $item->fullname,
                'nickname' => $item->nickname,
                'phone' => $item->phone,
                'email' => $item->user->email,
                'birthday' => $item->birthday,
                'gender' => $item->gender ? $item->gender : 'other',
                'avatar' => $item->avatar ? Storage::disk('google')->url($item->avatar) : null,
                'user_id' => $item->user_id,
                'user_name' =>  $item->user->username,
                'permanent_address' => $item->permanent_address,
                'role_id' => $item->user->role_id,
                'position_id' => $item->user->position_id,
                'position_name' => $item->user->position->name,
            ];
            $datas[] = $data;
        }
        $pagination = $this->getPagination($datas, $user_info);
        return response()->json($pagination, 200);
    }

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

    public function update(AdminUserInfoRequest $request, $user_id)
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

    public function delete($id)
    {
        try {
            $user_info_delete = UserInfo::find($id);

            if (!$user_info_delete) {
                return response()->json($this->message($this->doesNotExist), 404);
            }

            $this->deleteImageDrive($user_info_delete->avatar);
            $user_info_delete->delete();
            DB::table('users')->where('id', $user_info_delete->user_id)->update([
                'isActive' => 0
            ]);
            return response()->json(['message' => $this->deleteSuccess], 200);
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
