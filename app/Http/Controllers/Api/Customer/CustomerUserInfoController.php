<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\UserInfo;
use App\Http\Requests\CustomerUserInfoRequest;
use Illuminate\Http\Response;
use App\Http\Resources\UserInfoResource;



class CustomerUserInfoController extends Controller
{
    protected $userInfo;

    public function __construct(UserInfo $userInfo)
    {
        $this->userInfo = $userInfo;
    }

    public function edit($user_id)
    {
        try {
            $userInfo = $this->userInfo->where('user_id', $user_id)->first();
            if (!$userInfo) {
                return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
            }
            $userInfoResouce = new UserInfoResource($userInfo);
            return response()->json($userInfoResouce, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(CustomerUserInfoRequest $request, $user_id)
    {
        try {
            $userInfoUpdate = $this->userInfo->find($user_id);
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
            
            if($request->avatar == null) {
                $userInfo->avatar = $userInfoUpdate->avatar;
                $userInfo->save();
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
}
