@extends('layouts.app')
@section('title')
    Sign up
@endsection

@section('content')

    <body>
        <div class="main">
            <div class="box">
                <div class="header">
                    <img src="{{ url('storage/logo.png') }}" alt="not load">
                    <div class="h-data">
                        <a href="/" class="logo_name">{{ env('APP_NAME') }}</a>
                        <h5>Create Account</h5>
                    </div>
                </div>
                <div class="infor">
                    <form method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf
                        <div class="input_box">
                            <span class="TagIn">User name</span>
                            <input type="text" name="name" class="input" placeholder="type username"
                                value="{{ old('name') }}" id="name" required title="User Name">
                            @error('name')
                                <div class="error-msg">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="input_box">
                            <span class="TagIn">Email Address</span>
                            <input type="email" name="email" class="input" placeholder="type email" id="email"
                                value="{{ old('email') }}" required title="Email Address">
                            @error('email')
                                <div class="error-msg">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="input_box">
                            <span class="TagIn">password</span>
                            <div class="passwor">
                                <input type="password" name="password" class="inputx" placeholder="type Password" required
                                    title="Password">
                            </div>
                            @error('password')
                                <div class="error-msg">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>
                        <div class="input_box">
                            <span class="TagIn">Confirm Password</span>
                            <div class="passwor">
                                <input type="password" name="password_confirmation" class="inputx"
                                    placeholder="type Confirm Password" id="password" required title="Password">
                                <span class="bi bi-eye-fill" id="show_hide_password"></span>
                            </div>
                        </div>
                        <button class="Log_Button" type="submit" id="login">Sign Up</button>
                    </form>
                </div>
                <div class="or">
                    <div class="desd"></div>
                    <span class="osr">OR</span>
                    <div class="desd"></div>
                </div>
                <div class="box1_bottm">
                    <span class="crea">Have an account?</span> <a href="{{ route('login') }}" class="sign_up"> Log
                        In</a>
                </div>
            </div>
        </div>
    </body>
@endsection
