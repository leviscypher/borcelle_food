<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\PasswordResetRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function adminLogin(LoginRequest $request)
    {
        try {
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                $user = User::where('username', $request->username)->first();
                if ($user->role_id === 1) {
                    $token = $user->createToken('token')->plainTextToken;
                    $cookie = cookie('token', $token, 60 * 12);
                    return response()->json(['token' => $token, 'message' => 'đăng nhập thành công!'], 200)->withCookie($cookie);
                } else {
                    return response()->json(['errors' => 'bạn không có quyền truy cập!'], 403);
                }
            }
            return response()->json(['errors' => 'sai tên đăng nhập hoặc mật khẩu!'], 401);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                $user = User::where('username', $request->username)->first();
                $token = $user->createToken('token')->plainTextToken;
                $cookie = cookie('token', $token, 60 * 144);

                return response()->json(['token' => $token, 'message' => 'đăng nhập thành công!'], 200)->withCookie($cookie);
            }
            return response()->json(['errors' => 'sai tên đăng nhập hoặc mật khẩu!'], 401);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email
            ]);
            return response()->json(['message' => 'đăng kí tài khoản thành công!'], 201);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function userLogin()
    {
        return response()->json(Auth::user(), 200);
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->tokens()->delete();
            return response()->json(['message' => 'đăng xuất thành công!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $this->anUnspecifiedError], 404);
        }
    }

    public function passwordReset(PasswordResetRequest $request)
    {
        return 'reset password';
    }
}
