<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserInfoRequest;
use App\Http\Resources\UserInfoResource;
use App\Models\UserInfo;
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
            $userInfo = $this->userInfo->where('user_id', $id);
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
        try {
            $userInfo = UserInfo::updateOrCreate(
                ['user_id' => $user_id], 
                [
                    'fullname' => $request->fullname,
                    'nickname' => $request->nickname,
                    'phone' => $request->phone,
                    'birthday' => $request->birthday,
                    'permanent_address' => $request->permanent_address,
                    'gender_id' => $request->gender_id,
                    'user_id' => $user_id,
                ],
            );

            if ($request->avatar && $request->avatar != null) {
                $avatar = $this->uploadImageDrive($request->avatar);
                $oldAvatar = $userInfo->getOriginal('avatar');
                $userInfo->avatar = json_encode($avatar);
                $userInfo->save();
                $this->deleteImageDrive(json_decode($oldAvatar));

            } 
            
            if ($userInfo->wasRecentlyCreated) {
                $user = $userInfo->user;
                $user->isActive = 1;
                $user->save();
                return response()->json($this->message($this->addSuccess), Response::HTTP_OK);                
            } else {
                return response()->json($this->message($this->updateSuccess), Response::HTTP_OK);
            }
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete($id)
    {
        try {
            $userInfo = $this->userInfo->find($id);
            if (!$userInfo) {
                return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
            }
            $this->deleteImageDrive($userInfo->avatar);
            $userInfo->delete();
            $user = $userInfo->user();
            $user->isActive = 0;
            $user->save();
            return response()->json($this->message($this->deleteSuccess), Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
