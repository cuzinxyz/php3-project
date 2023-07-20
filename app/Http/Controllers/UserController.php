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

        if (Auth::attempt($credentials)) {
            return redirect()
                ->intended('dashboard')
                    ->withSuccess('Đăng nhập thành công rồi nà!');
        }
        return redirect()->route('login')->with('error', 'Đăng nhập thất bại do sai tài khoản hoặc mật khẩu!');
    }

    public function registerSubmit(UserRequest $request)
    {
        $token = $request->token;

        $verification_link = url('register/verify/'. $token .'/'.$request->email);
        $subject = "Registration Confirmation";
        $message = "Please click on this link to verify account: <br> <a href='".$verification_link."'>Click here</a>";

        Mail::to($request->email)->send(new RegisterMail($subject, $message));

        User::create($request->validated());

        echo 'Email is sent!';
        // dd($request->validated());
        // return redirect()
        //         ->route('login')
        //             ->withSuccess('Email is sent! Please check your email and verify');
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
