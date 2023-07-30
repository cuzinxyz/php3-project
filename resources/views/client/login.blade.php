@extends('client.layout.app')

@section('content')

<link rel="stylesheet" href="{{ asset('client/css/login.css') }}">
    <div class="container">
        <form class="login100-form validate-form mx-auto" action="{{ route('loginSubmit') }}" method="POST">
            @include('client.layout.errors')

            @csrf
            <span class="login100-form-title p-b-34">
                Account Login
            </span>
            <div class="wrap-input100 validate-input m-b-20">
                <input id="first-name" class="input100" type="text" name="email" placeholder="Email">
                <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input m-b-20">
                <input class="input100" type="password" name="password" placeholder="Password">
                <span class="focus-input100"></span>
            </div>
            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    Sign in
                </button>
            </div>
            <div class="w-100 d-flex justify-content-between">
                    <div>
                        <span class="txt1">
                            Forgot
                        </span>
                        <a href="#" class="txt2">
                            User name / password?
                        </a>
                    </div>
                    <a href="/register" class="txt3">
                        Sign Up
                    </a>
            </div>

        </form>
    </div>
@endsection
