<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function adminLogin(LoginRequest $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = User::where('username', $request->username)->first();
            if ($user->role > 0) {
                $token = $user->createToken('token')->plainTextToken;
                $cookie = cookie('token', $token, 60 * 12);
                return response()->json(['token' => $token, 'message' => 'đăng nhập thành công!'], 200)->withCookie($cookie);
            } else {
                return response()->json(['errors' => 'bạn không có quyền truy cập!'], 403);
            }
        }
        return response()->json(['errors' => 'sai tên đăng nhập hoặc mật khẩu!'], 401);
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = User::where('username', $request->username)->first();
            $token = $user->createToken('token')->plainTextToken;
            $cookie = cookie('token', $token, 60 * 144);

            return response()->json(['token' => $token, 'message' => 'đăng nhập thành công!'], 200)->withCookie($cookie);
        }
        return response()->json(['errors' => 'sai tên đăng nhập hoặc mật khẩu!'], 401);
    }

    public function register(RegisterRequest $request)
    {
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);
        return response()->json(['message' => 'đăng kí tài khoản thành công!'], 201);
    }

    public function userLogin()
    {
        return response()->json(Auth::user(), 200);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'đăng xuất thành công!'], 200);
    }

    public function resetPassword()
    {
        return 'reset password';
    }
}
