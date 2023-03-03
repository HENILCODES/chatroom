<!DOCTYPE html>
<html lang="en">

<head>
    <title>edit</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
</head>


<body>
    <div class="container my-3">
        {{ Form::modal($student,['route' => ['student.update',$student], 'method' => 'post', 'files' => true, 'class' => 'row g-3 w-50 m-auto']) }}
        @csrf
        @method('put')
        @include('student.form')
        {{ Form::close() }}
    </div>
</body>

</html>
