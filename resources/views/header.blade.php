<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <script src="{{url('js/jquery-3.6.3.js')}}" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top position-sticky top-0 shadow navbar-light bg-light">
        <div class="container-fluid">
            <a href="/" class="navbar-brand fs-4 fw-bold">Chat Room</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="ms-auto ps-3">
                    <a href="{{ route('user-signup') }}" class="fs-4 text-decoration-none text-black me-3"> Sign up </a>
                </div>
            </div>
        </div>
    </nav>
    @yield('body')
</body>
<script src="{{url('js/bootstrap.bundle.js')}}"></script>

</html>
