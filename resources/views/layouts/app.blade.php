<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }} | @yield('title')</title>
    <link rel="stylesheet" href="{{ url('css/user.css') }}">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
</head>

<body>

    @yield('content')

    <div class="Footer">
        <span>&copy; 2022 <a href="/"> Henil Code</a> </span>
    </div>
</body>
<script defer>
    var ShowHide = document.getElementById("show_hide_password");
    var User_password = document.getElementById("password");


    // password show hide
    ShowHide.addEventListener("click", function() {
        if (User_password.type == "password") {
            User_password.type = "teUser_password_valuet";
            ShowHide.classList.remove("bi-eye-fill");
            ShowHide.classList.add("bi-eye-slash-fill");
        } else {
            User_password.type = "password";
            ShowHide.classList.remove("bi-eye-slash-fill");
            ShowHide.classList.add("bi-eye-fill");
        }
    });

    // hide show icon
    User_password.addEventListener("keyup", function() {
        var User_password_value = document.getElementById("password").value;
        if (User_password_value.length < 1) {
            document.getElementById("show_hide_password").style.display = "none";
        } else {
            document.getElementById("show_hide_password").style.display = "block";
        }
    })
</script>

</html>
