<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
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
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return response()->json(['message' => 'đăng kí tài khoản thành công!'], 201);
    }

    public function edit($id)
    {
        $user_edit = User::find($id);
        return response()->json($user_edit, 200);
    }

    public function update(UserRequest $request)
    {
    }

    public function delete($id)
    {
        $user_delete = User::find($id);
        $user_delete->delete();
        return response()->json(['message' => 'xóa thành công.'], 200);
    }
}
