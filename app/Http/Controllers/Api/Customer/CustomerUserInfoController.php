<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\UserInfo;
use App\Http\Requests\CustomerUserInfoRequest;
use Illuminate\Http\Response;
use App\Http\Resources\UserInfoResource;
use App\Models\User;

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
                $user = User::where('id', $user_id)->first();
                return response()->json(['email'=> $user->email], Response::HTTP_OK);
            }
            $userInfoResouce = new UserInfoResource($userInfo);
            return response()->json($userInfoResouce, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(CustomerUserInfoRequest $request, $user_id)
    {
        // try {
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


            if ($userInfo->wasRecentlyCreated) {
                $user = $userInfo->user;
                $user->isActive = 1;
                $user->save();
                return response()->json($this->message($this->addSuccess), Response::HTTP_OK);                
            } else {
                return response()->json($this->message($this->updateSuccess), Response::HTTP_OK);
            }
        // } catch (\Throwable $th) {
        //     return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_INTERNAL_SERVER_ERROR);
        // }
    }
}
