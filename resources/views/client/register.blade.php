@extends('client.layout.app')

@section('content')

<link rel="stylesheet" href="{{ asset('client/css/login.css') }}">
    <div class="container">
        <form class="login100-form validate-form mt-2 mx-auto" action="{{ route('registerSubmit') }}" method="POST">

            @include('client.layout.errors')

            @csrf
            <span class="login100-form-title p-b-34">
                Sign Up
                <p class="fs-6">It's quick and easy.</p>
            </span>

            <div class="wrap-input100 validate-input m-b-20">
                <input id="first-name" class="input100" type="text" name="name" placeholder="Name">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20">
                <input id="first-name" class="input100" type="text" name="email" placeholder="Email">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20">
                <input id="first-name" class="input100" type="tel" name="phonenumber" placeholder="Phone Number">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20">
                <input id="first-name" class="input100" type="text" name="username" placeholder="User name">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20">
                <input class="input100" type="password" name="password" placeholder="Password">
                <span class="focus-input100"></span>
            </div>
            <div class="container-login100-form-btn mt-2">
                <button class="login100-form-btn">
                    Sign Up
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
                    <a href="{{ route('login') }}" class="txt3">
                        Log In
                    </a>
            </div>

        </form>
    </div>
@endsection
