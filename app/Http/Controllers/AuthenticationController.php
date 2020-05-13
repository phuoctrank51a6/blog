<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
