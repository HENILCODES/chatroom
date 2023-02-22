<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <script src="{{ url('js/jquery-3.6.3.js') }}" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"></script>
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
            @guest
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="ms-auto ps-3">
                        <a href="{{ route('login') }}" class="fs-4 text-decoration-none text-black me-3"> Log in </a>
                    </div>
                </div>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="fs-4 text-decoration-none text-black ms-2" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>

        @endguest
        </div>
    </nav>

    @yield('body')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            <h1>
                {{ session('status') }}
            </h1>
        </div>
    @endif
    <footer class="bg-light text-center text-white mt-4">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn text-white btn-floating m-1 rounded-circle" style="background-color: #3b5998;"
                    href="" role="button"><i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn text-white btn-floating m-1 rounded-circle" style="background-color: #55acee;"
                    href="" role="button"><i class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a class="btn text-white btn-floating m-1 rounded-circle" style="background-color: #dd4b39;"
                    href="" role="button"><i class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a class="btn text-white btn-floating m-1 rounded-circle" style="background-color: #ac2bac;"
                    href="" role="button"><i class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a class="btn text-white btn-floating m-1 rounded-circle" style="background-color: #0082ca;"
                    href="" role="button"><i class="fab fa-linkedin-in"></i></a>
                <!-- Github -->
                <a class="btn text-white btn-floating m-1 rounded-circle" style="background-color: #333333;"
                    href="" role="button"><i class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3 text-muted" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020
            <a class="text-decoration-none" href="https://henilcode.rf.gd/">Henil Code</a>
        </div>
        <!-- Copyright -->
    </footer>
</body>
<script src="{{ url('js/bootstrap.bundle.js') }}"></script>

</html>
