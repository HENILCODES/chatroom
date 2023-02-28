@extends('layouts.app')
@section('title')
    Log in
@endsection
@section('content')

    <body>
        <div class="main">
            <div class="box">
                <div class="header">
                    <img src="{{ url('storage/logo.png') }}" alt="not load">
                    <div class="h-data">
                        <a href="/" class="logo_name">{{ env('APP_NAME') }}</a>
                        <h5>Welcome back!</h5>
                    </div>
                </div>
                <div class="infor">
                    {{ Form::open(['route' => 'login', 'autocomplete' => 'on', 'method' => 'post']) }}
                    {{ Form::token() }}
                    <div class="input_box">
                        {{ Form::label('email', 'email address', ['class' => 'TagIn']) }}
                        {{ Form::email('email', '', ['class' => 'input', 'id' => 'email', 'placeholder' => 'type email', 'required' => 'true']) }}
                        @error('email')
                            <div class="error-msg">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="input_box">
                        {{ Form::label('password', 'password', ['class' => 'TagIn']) }}
                        <div class="passwor">
                            {{ Form::password('password', ['class' => 'inputx', 'id' => 'password', 'placeholder' => 'type password', 'required' => 'true']) }}
                            <span class="bi bi-eye-fill" id="show_hide_password"></span>
                        </div>
                        @error('password')
                            <div class="error-msg">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="input_box">
                        {{ Form::checkbox('remember', '', false, ['class' => 'form-check-input', 'id' => 'remember']) }}
                        {{ Form::label('remember', 'remeber me', ['class' => 'form-check-label']) }}
                    </div>
                    {{ Form::submit('Log in', ['class' => 'Log_Button', 'id' => 'login']) }}
                    {{ Form::close() }}
                </div>
                <div class="or">
                    <div class="desd"></div>
                    <span class="osr">OR</span>
                    <div class="desd"></div>
                </div>
                <div class="box1_bottm">
                    <span class="crea">Don't have an account?</span> <a href="{{ route('register') }}" class="sign_up">
                        Sign up</a>
                </div>
            </div>
            <div class="box box2">
                @if (Route::has('password.request'))
                    <a class="forget" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>
    </body>
@endsection
