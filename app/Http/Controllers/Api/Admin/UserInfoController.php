<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserInfoRequest;
use App\Http\Resources\UserInfoResource;
use App\Models\UserInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;



class UserInfoController extends Controller
{

    protected $userInfo;

    public function __construct(UserInfo $userInfo)
    {
        $this->userInfo = $userInfo;
    }

    public function index()
    {
        $userInfo = $this->userInfo->paginate($this->itemsPerPage);
        $userInfoResouce = userInfoResource::collection($userInfo);
        $pagination = $this->getPagination($userInfoResouce, $userInfo);
        return response()->json($pagination, Response::HTTP_OK);
    }

    public function edit($id)
    {
        try {
            $userInfo = $this->userInfo->find($id);
            if (!$userInfo) {
                return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
            }
            $userInfoResouce = new UserInfoResource($userInfo);
            return response()->json($userInfoResouce, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(AdminUserInfoRequest $request, $user_id)
    {
        // try {
        //     $user_info_update = UserInfo::where('user_id', $user_id)->first();

        //     if (!$user_info_update) {
        //         $this->handleCreate($request, $user_id);
        //         DB::table('users')->where('id', $user_id)->update([
        //             'isActive' => 1
        //         ]);
        //         return response()->json($this->message($this->updateSuccess), 201);
        //     } else {
        //         $this->handleUpdate($user_info_update, $request, $user_id);
        //         return response()->json($this->message($this->updateSuccess), 200);
        //     }
        // } catch (\Throwable $th) {
        //     return response()->json($this->message($this->anUnspecifiedError), 404);
        // }

        $userInfo = $this->userInfo->find($user_id);

        if($userInfo == null) {
            $this->handleCreate($request, $user_id);
            DB::table('users')->where('id', $user_id)->update([
                'isActive' => 1
            ]);
            return response()->json($this->message($this->addSuccess), Response::HTTP_CREATED);
        } else {
            $this->handleUpdate($userInfo, $request, $user_id);
            return response()->json($this->message($this->updateSuccess), Response::HTTP_CREATED);
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
        $data = $request->all();
        $avatar = $this->uploadImageDrive($request->avatar);
        $data['avatar'] = json_encode($avatar);
        $data['user_id'] = $user_id;
        $this->userInfo->create($data);
        $this->userInfo->save();
    }

    private function handleUpdate($repository, $request, $user_id)
    {
        // if ($request->avatar) {
        //     $pathImage = $this->uploadImageDrive($request->avatar);
        //     $this->deleteImageDrive($repository->avatar);
        // } else {
        //     $pathImage = null;
        //     $this->deleteImageDrive($repository->avatar);
        // }
        // DB::table('user_info')->where('user_id', $user_id)->update([
        //     'fullname' => $request->fullname,
        //     'nickname' => $request->nickname,
        //     'phone' => $request->phone,
        //     'birthday' => $request->birthday ? $request->birthday : $repository->birthday,
        //     'gender_id' => $request->gender_id ? $request->gender_id : $repository->gender_id,
        //     'avatar' => $pathImage,
        //     'permanent_address' => $request->permanent_address,
        //     'user_id' => $user_id
        // ]);
        $data = $request->all();
        $this->deleteImageDrive($repository->avatar);
        $avatar = $this->uploadImageDrive($request->avatar);
        $data['avatar'] = json_encode($avatar);
        $data['user_id'] = $user_id;
        $repository->update($data);
        $repository->save();
    }
}
