<!DOCTYPE html>
<html lang="en">

<head>
    <title>Henil</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
</head>
@php
    $form = [
        [['type' => 'label', 'name' => 'name', 'value' => 'Student Name', 'attributes' => ['class' => 'fw-bold mt-3 justify-content-center']], ['type' => 'text', 'name' => 'name', 'value' => '', 'attributes' => ['class' => 'form-control w-50', 'id' => 'name', 'required' => true, 'placeholder' => 'Student Name']]],
        [['type' => 'label', 'name' => 'password', 'value' => 'Student Password', 'attributes' => ['class' => 'fw-bold mt-3 justify-content-center']], ['type' => 'password', 'name' => 'password', 'attributes' => ['class' => 'form-control w-50', 'placeholder' => 'Password', 'id' => 'password', 'required' => 'true']]],
        [['type' => 'label', 'name' => 'email', 'value' => 'Student email', 'attributes' => ['class' => 'fw-bold mt-3 justify-content-center']], ['type' => 'email', 'name' => 'email', 'value' => '', 'attributes' => ['class' => 'form-control w-50', 'placeholder' => 'email', 'id' => 'email']]],
        [['type' => 'label', 'name' => 'contact', 'value' => 'Student contact', 'attributes' => ['class' => 'fw-bold mt-3 justify-content-center']], ['type' => 'tel', 'name' => 'contact', 'value' => '', 'attributes' => ['class' => 'form-control w-50', 'id' => 'contact', 'required' => true, 'placeholder' => 'enter contact']]],
        [],
        [['type' => 'label', 'name' => 'semester', 'value' => 'Student semeste', 'attributes' => ['class' => 'fw-bold mt-3 justify-content-center']], ['type' => 'select', 'name' => 'semester', 'value' => ['1' => '1', '2' => '2'], 'attributes' => ['class' => 'form-select  w-25', 'id' => 'semester']]],
        [['type' => 'label', 'name' => 'hobby', 'value' => 'hobby', 'attributes' => ['class' => 'fw-bold mt-3']], ['type' => 'checkbox', 'name' => 'hobby[]', 'value' => 'programming', 'checked' => false, 'attributes' => ['class' => '', 'id' => 'programming']]],
    
        [['type' => 'label', 'name' => 'programming', 'value' => 'programming', 'attributes' => ['']], ['type' => 'checkbox', 'name' => 'hobby[]', 'value' => 'cricket', 'checked' => false, 'attributes' => ['class' => '', 'id' => 'cricket']]],
        [['type' => 'label', 'name' => 'cricket', 'value' => 'cricket', 'attributes' => ['']], ['type' => 'checkbox', 'name' => 'hobby[]', 'value' => 'football', 'checked' => false, 'attributes' => ['class' => '', 'id' => 'football']]],
        [['type' => 'label', 'name' => 'football', 'value' => 'football', 'attributes' => ['']], ['type' => 'label', 'name' => 'gender', 'value' => 'gender', 'attributes' => ['class' => 'fw-bold mt-3']]],
    
        [['type' => 'radio', 'name' => 'gender', 'value' => 'male', 'attributes' => ['id' => 'male']], ['type' => 'label', 'name' => 'male', 'value' => 'male', 'checked' => false, 'attributes' => ['class' => '']]],
    
        [['type' => 'radio', 'name' => 'gender', 'value' => 'female', 'attributes' => ['id' => 'female']], ['type' => 'label', 'name' => 'female', 'value' => 'female', 'checked' => false, 'attributes' => ['class' => '']]],
    
        [['type' => 'radio', 'name' => 'gender', 'value' => 'other', 'attributes' => ['id' => 'other']], ['type' => 'label', 'name' => 'other', 'value' => 'other', 'checked' => false, 'attributes' => ['class' => '']]],
        [['type' => 'label', 'name' => 'color', 'value' => 'favorite color', 'attributes' => ['class' => 'fw-bold mt-3']], ['type' => 'color', 'name' => 'color', 'value' => '', 'attributes' => ['class' => 'form-control form-control-color']]],
        [['type' => 'label', 'name' => 'interest', 'value' => 'Interest coding', 'attributes' => ['class' => 'fw-bold mt-3']], ['type' => 'selectRange', 'name' => 'interest', 'min' => 0, 'max' => 20, 'attributes' => ['class' => 'form-select']]],
        [['type' => 'label', 'name' => 'dob', 'value' => 'Date of birth', 'attributes' => ['class' => 'fw-bold mt-3']], ['type' => 'date', 'name' => 'dob', 'value' => '', 'attributes' => ['class' => 'form-control w-50']]],
        [['type' => 'label', 'name' => 'month', 'value' => 'Month', 'attributes' => ['class' => 'fw-bold mt-3']], ['type' => 'selectMonth', 'name' => 'month', 'attributes' => ['class' => 'form-select']]],
        [['type' => 'label', 'name' => 'url', 'value' => 'website', 'attributes' => ['class' => 'fw-bold mt-3']], ['type' => 'url', 'name' => 'website', 'value' => '', 'attributes' => ['class' => 'form-control w-50']]],
        [['type' => 'label', 'name' => 'photo', 'value' => 'photo', 'attributes' => ['class' => 'fw-bold mt-3']], ['type' => 'file', 'name' => 'photo', 'attributes' => ['class' => 'form-control ']]],
    ];
@endphp

<body>
    <div class="container my-3">
        {{ Form::open(['url' => '', 'method' => 'get', 'files' => true, 'class' => 'w-50 m-auto']) }}
        @foreach ($form as $item)
            <div class="row">
                @foreach ($item as $r)
                    @include('fields.' . $r['type'], $r)
                @endforeach
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary mt-5">Submit</button>
        {{ Form::close() }}
    </div>
</body>

</html>
