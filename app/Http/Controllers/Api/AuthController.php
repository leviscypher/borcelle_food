<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Admin\PasswordReset;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\CheckEmailRequest;
use App\Http\Requests\CheckTokenRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


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

    public function checkEmail(CheckEmailRequest $request)
    {
        $checkEmail = $request->email;
        $user = User::where('email', $checkEmail)->first();
        if ($user) {
            PasswordReset::where('created_at', '<', Carbon::now()->subSeconds(60))->delete();
            $createToken = $this->addToken($user->id);
            // $this->handleSendEmail($createToken, $user->email);
            return response()->json(['message' =>  'chúng tôi đã gửi mã xác minh đến email của bạn.'], 200);
        } else {
            return response()->json(['message' => 'email này không tồn tại'], 404);
        }
    }

    public function checkToken(CheckTokenRequest $request)
    {
        $token = PasswordReset::Where('token', $request->token)->first();
        if ($token && $token->expires_at > Carbon::now()) {
            session()->put('id', $token->user_id);
            return response()->json(true, 200);
        } else {
            return response()->json(['message' => 'mã xác minh đã hết thời hạn sử dụng.'], 401);
        }
    }

    public function changePassword(changePasswordRequest $request)
    {
        $user_id = session()->get('id');
        $user = User::where('id', $user_id)->first();

        if ($user) {
            DB::table('users')->where('id', $user->id)->update([
                'password' => Hash::make($request->password),
            ]);
            return response()->json(['message' => $this->updateSuccess], 200,);
        } else {
            return response()->json(['message' => $this->anUnspecifiedError], 401);
        }
    }

    private function addToken($user_id)
    {
        $token = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $expiresAt = now()->addSeconds(60);
        PasswordReset::create([
            'token' => $token,
            'user_id' => $user_id,
            'expires_at' => $expiresAt,
        ]);

        return $token;
    }

    private function handleSendEmail($token, $email)
    {
        $title = 'Yêu Cầu Lấy Lại Mật Khẩu';
        $description = 'mã xác minh lấy lại mật khẩu của bạn là: ' . $token . ' không cung cấp mã này cho bất kì ai.';
        Mail::raw($description, function (Message $message) use ($email, $title) {
            $message->to($email);
            $message->subject($title);
        });
    }
}
