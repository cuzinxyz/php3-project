<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login()
    {
        return view('client.login');
    }

    public function register()
    {
        return view('client.register');
    }

    public function loginSubmit(UserRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials))
        {
            session()->flash('success', 'Login successful!');

            if(Auth::user()->role == 'admin') {
                return redirect()
                    ->route('admin.home');
            } else {
                return redirect()
                    ->route('index');
            }
        }
        return redirect()->route('login')->with('error', 'Đăng nhập thất bại do sai tài khoản hoặc mật khẩu!');
    }

    public function registerSubmit(UserRequest $request)
    {
        User::create($request->validated());
        return redirect()
                ->route('login')
                    ->withSuccess('Register successfully! Please login!');
    }

    public function register_verify($token, $email)
    {
        $user = User::where('token', $token)->where('email', $email)->first();

        if(!$user) {
            return redirect()
                ->route('login');
        }
        $user->status = 'Active';
        $user->token = '';
        $user->update();

        echo "Registration verification is successful";
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
