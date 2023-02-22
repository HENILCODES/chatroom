<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} | Log in</title>
    <link rel="stylesheet" href="{{ url('css/user.css') }}">
</head>

<body>
    <div class="main">
        <div class="box">
            <div class="header">
                {{-- <img src="Image/logo.png" alt="not load"> --}}
                <div class="h-data">
                    <a href="/" class="logo_name">Henil Codes</a>
                    <h5>Welcome back!</h5>
                </div>
            </div>
            <div class="infor">
                <form method="POST" action="{{ route('login') }}" autocomplete="off">
                    @csrf
                    <div class="input_box">
                        <label class="TagIn" for="email">Email Address </label>
                        <input type="email" name="email" class="input" placeholder="type email"
                            value="{{ old('email') }}" id="email" required title="Email Address">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input_box">
                        <span class="TagIn">password</span>
                        <div class="passwor">
                            <input type="password" name="password" class="inputx" placeholder="type Password"
                                id="password" required title="Password">
                            <span class="bi bi-eye-fill" id="show_hide_password"></span>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input_box">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <button class="Log_Button" type="submit" id="login">Log in</button>
                </form>
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
            {{-- <a href="" class="forget"><i class="bi bi-arrow-right"></i> Forgot password? </a> --}}
        </div>
        <div class="Footer">
            <span>&copy; 2022 <a href="/"> Henil Code</a> </span>
        </div>
</body>

</html>
