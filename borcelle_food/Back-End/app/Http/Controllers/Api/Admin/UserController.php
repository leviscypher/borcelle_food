<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;


class UserController extends Controller
{

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $user = $this->user->all();
        return response()->json($user, Response::HTTP_OK);
    }

    public function create(UserRequest $request)
    {
        try {
            $data = $request->all();
            $data['password'] = Hash::make($request->password);
            $this->user->create($data);
            $this->user->save();
            return response()->json($this->message($this->addSuccess), Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_INTERNAL_SERVER_ERROR);
        }        
    }

    public function edit($id)
    {
        try {
            $user = $this->user->find($id);
            if (!$user) {
                return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
            }
            return response()->json($user, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(UserRequest $request, $id)
    {
        try {
            $user = $this->user->find($id);
            if (!$user) {
                return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
            }
            $data = $request->all();
            $data['password'] = Hash::make($request->password);
            $userUpdate = $user->update($data);
            $userUpdate->save();
            return response()->json($this->message($this->updateSuccess), Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete($id)
    {
        try {
            $user = $this->user->find($id);
            if (!$user) {
                return response()->json($this->message($this->doesNotExist), Response::HTTP_NOT_FOUND);
            }
            $user->delete();
            return response()->json($this->message($this->deleteSuccess), Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($this->message($this->anUnspecifiedError), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
