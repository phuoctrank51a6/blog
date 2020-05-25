<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('backend.login');
    }
    public function postLogin(Request $request)
    {
        // dd($request);
        $user = $request->only('email', 'password');
        // dd(Auth::attempt($user));
        if (Auth::attempt($user) == true) {
            return redirect()->route('user.index');
        } else {
            return redirect()->back()->with('thongbao', 'Tài khoản hoặc mật khẩu không chính xác');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function forgotPassword()
    {
        return view('backend.forgot');
    }
    public function postForgot(Request $r)
    {

        $email = $r->email;
        $user = User::where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('thongbao', 'Email không tồn tại');
        }

        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $token_exists = date("Y-m-d H:i:s", strtotime("+15 minutes"));

        $data = [
            'token' => Str::random(60),
            'token_exists' => $token_exists,
        ];
        // dd($data);

        $user->token = Str::random(60);
        $user->token_exists = $token_exists;
        $user->save();
        $r->session()->put('token', $user->token);
        // dd(session('token'));
        // dd($user);
        Mail::to($user)->send(new ForgotPassword($user));
        return redirect()->back()->with('thongbao', 'Gửi yêu cầu thành công. Hãy check mail để nhập mật khẩu mới');
    }
    public function newPassword($token){
        $user = User::where('token', $token)->first();
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $now = date("Y-m-d H:i:s");
        // dd($now);
        if($user->token_exists < $now)
        {
            return redirect()->route('forgotPassword')->with('thongbao', 'Nội dung mail chỉ có hiệu lực 15p hãy nhập lại email để nhận lại đường link mới');
        }
        else{
            return view('backend.new-password',['token' => $token]);
        }
    }
    public function updatePassword(Request $request){
        $user = User::where('token', $request->token)->first();

        $user->password = Hash::make($request->password) ;
        $user->save();
        return redirect()->route('login')->with('thongbao', 'Đổi mật khẩu thành công');
    }
}
