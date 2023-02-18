<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}} | Sign up</title>
    <link rel="stylesheet" href="{{url('css/user.css')}}">
</head>
<body>
    <div class="main">
        <div class="box">
            <div class="header">
                {{-- <img src="Image/logo.png" alt="not load"> --}}
                <div class="h-data">
                    <a href="/" class="logo_name">Henil Codes</a>
                    <h5>Create Account</h5>
                </div>
            </div>
            <div class="infor">
                <form autocomplete="off" action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="input_box">
                        <span class="TagIn">User name</span>
                        <input type="text" name="name" class="input" placeholder="type username" id="name"
                            required title="User Name">
                    </div>
                    <div class="input_box">
                        <span class="TagIn">Email Address</span>
                        <input type="email" name="email" class="input" placeholder="type email" id="email" required
                            title="Email Address">
                    </div>
                    <div class="input_box">
                        <span class="TagIn">password</span>
                        <div class="passwor">
                            <input type="password" name="password" class="inputx" placeholder="type Password"
                                id="password" required title="Password">
                            <span class="bi bi-eye-fill" id="show_hide_password"></span>
                        </div>
                    </div>
                    <button class="Log_Button" type="submit" id="login" >Sign Up</button>
                </form>
            </div>
            <div class="or">
                <div class="desd"></div>
                <span class="osr">OR</span>
                <div class="desd"></div>
            </div>
            <div class="box1_bottm">
                <span class="crea">Have an account?</span> <a href="Form_login.php" class="sign_up"> Log In</a>
            </div>
        </div>
        <div class="Footer">
            <span>© 2022 <a href="https://henil.rf.gd"> Henil Code</a> </span>
        </div>
    </div>
</body>
</html>