<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json($user, 200);
    }

    public function create(UserRequest $request)
    {
        try {
            User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'role_id' => $request->role_id,
                'position_id' => $request->position_id
            ]);
            return response()->json(['message' => $this->addSuccess], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function edit($id)
    {
        try {
            $user_edit = User::find($id);
            if (!$user_edit) {
                return response()->json(['message' => $this->doesNotExist], 404);
            }
            return response()->json($user_edit, 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function update(UserRequest $request, $id)
    {
        try {
            $user_update = User::find($id);
            if (!$user_update) {
                return response()->json(['message' => $this->doesNotExist], 404);
            }
            DB::table('users')->where('id', $id)->update([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'role_id' => $request->role_id ? $request->role_id : $user_update->role_id,
                'position_id' => $request->position_id ? $request->position_id : $user_update->position_id,
            ]);
            return response()->json(['message' => $this->updateSuccess], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function delete($id)
    {
        try {
            $user_delete = User::find($id);
            if (!$user_delete) {
                return response()->json(['message' => $this->doesNotExist], 404);
            }
            $user_delete->delete();
            return response()->json(['message' => $this->deleteSuccess], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }
}
