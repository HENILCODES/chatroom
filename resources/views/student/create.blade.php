<!DOCTYPE html>
<html lang="en">

<head>
    <title>create</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container my-3">
        {{ Form::open(['route' => 'student.store', 'method' => 'post', 'files' => true, 'class' => 'row g-3 w-100 m-auto']) }}
        @csrf
        @include('student.form')
        {{ Form::close() }}
    </div>
</body>

</html>
