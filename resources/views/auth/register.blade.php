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
                    {{ Form::open(['route' => 'register', 'autocomplete' => 'off', 'method' => 'post','files'=>true]) }}
                    {{ Form::token() }}
                    <div class="input_box">
                        {{ Form::label('name', 'User Name', ['class' => 'TagIn']) }}
                        {{ Form::text('name', '', ['class' => 'input', 'placeholder' => 'type username', 'title' => 'User Name', 'required' => 'true']) }}
                        @error('name')
                            <div class="error-msg">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
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
                        </div>
                        @error('password')
                            <div class="error-msg">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="input_box">
                        {{ Form::label('confirmPassword', 'Confirm Password', ['class' => 'TagIn']) }}
                        <div class="passwor">
                            {{ Form::password('password_confirmation', ['class' => 'inputx', 'id' => 'confirmPassword', 'placeholder' => 'type password', 'required' => 'true']) }}
                            <span class="bi bi-eye-fill" id="show_hide_password"></span>
                        </div>
                    </div>
                    <div class="input_box">
                        {{ Form::label('photo', 'profile photo', ['class' => 'TagIn']) }}
                        {{ Form::file('photo', ['class' => 'input', 'placeholder' => 'type username','accept'=>'image/*', 'title' => 'Profile photo', 'required' => 'true']) }}
                        @error('photo')
                            <div class="error-msg">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    {{ Form::submit('Sign Up', ['class' => 'Log_Button', 'id' => 'login']) }}
                    {{ Form::close() }}
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
