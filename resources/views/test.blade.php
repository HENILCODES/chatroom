<!DOCTYPE html>
<html lang="en">

<head>
    <title>Henil</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
</head>
@php
    
    $form = [
        [['type' => 'label', 'name' => 'name', 'value' => 'Student Name', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'text', 'name' => 'name', 'value' => '', 'attributes' => ['class' => 'form-control w-50', 'id' => 'name', 'required' => true, 'placeholder' => 'Student Name']]],
        [['type' => 'label', 'name' => 'password', 'value' => 'Student Password', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'password', 'name' => 'password', 'attributes' => ['class' => 'form-control w-50', 'placeholder' => 'Password', 'id' => 'password', 'required' => 'true']]],
        [['type' => 'label', 'name' => 'email', 'value' => 'Student email', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'email', 'name' => 'email', 'value' => '', 'attributes' => ['class' => 'form-control w-50', 'placeholder' => 'email', 'id' => 'email']]],
        [['type' => 'label', 'name' => 'contact', 'value' => 'Student contact', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'tel', 'name' => 'contact', 'value' => '', 'attributes' => ['class' => 'form-control w-50', 'id' => 'contact', 'required' => true, 'placeholder' => 'enter contact']]],
        [['type' => 'label', 'name' => 'semester', 'value' => 'Student semeste', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'select', 'name' => 'semester', 'value' => ['1' => '1', '2' => '2'], 'attributes' => ['class' => 'form-select w-25', 'id' => 'semester']]],
        [
        ['type' => 'label', 'name' => 'hobby', 'value' => 'hobby', 'attributes' => ['class' => 'input-group-text justify-content-center col-4']],
        ['type' => 'label', 'name' => 'programming', 'value' => 'programming', 'attributes' => ['class'=>'col-2']],
        ['type' => 'checkbox', 'name' => 'hobby[]', 'value' => 'programming', 'checked' => false, 'attributes' => ['class' => '', 'id' => 'programming']],
        ['type' => 'label', 'name' => 'cricket', 'value' => 'cricket', 'attributes' => ['class'=>'col-1']], 
        ['type' => 'checkbox', 'name' => 'hobby[]', 'value' => 'cricket', 'checked' => true, 'attributes' => ['class' => '', 'id' => 'cricket']],
        ], 
        [
        ['type' => 'label', 'name' => 'gender', 'value' => 'gender', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']],
        ['type' => 'label', 'name' => 'male', 'value' => 'male',  'attributes' => ['class' => 'col-1']],
        ['type' => 'radio', 'name' => 'gender', 'value' => 'male','checked' => false, 'attributes' => ['id' => 'male']], 
        ['type' => 'label', 'name' => 'female', 'value' => 'female', 'attributes' => ['class' => 'col-1']],
        ['type' => 'radio', 'name' => 'gender', 'value' => 'female', 'checked' => false, 'attributes' => ['id' => 'female']],
        ['type' => 'label', 'name' => 'other', 'value' => 'other', 'attributes' => ['class' => 'col-1']],
        ['type' => 'radio', 'name' => 'gender', 'value' => 'other','checked' => false,  'attributes' => ['id' => 'other']], 
        ],
        [['type' => 'label', 'name' => 'color', 'value' => 'favorite color', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'color', 'name' => 'color', 'value' => '', 'attributes' => ['class' => 'form-control form-control-color w-25']]],
        [['type' => 'label', 'name' => 'interest', 'value' => 'Interest coding', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'selectRange', 'name' => 'interest', 'min' => 0, 'max' => 20, 'attributes' => ['class' => 'form-select']]],
        [['type' => 'label', 'name' => 'dob', 'value' => 'Date of birth', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'date', 'name' => 'dob', 'value' => '', 'attributes' => ['class' => 'form-control w-50']]],
        [['type' => 'label', 'name' => 'month', 'value' => 'Month', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'selectMonth', 'name' => 'month', 'attributes' => ['class' => 'form-select']]],
        [['type' => 'label', 'name' => 'url', 'value' => 'website', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'url', 'name' => 'website', 'value' => '', 'attributes' => ['class' => 'form-control w-50']]],
        [['type' => 'label', 'name' => 'photo', 'value' => 'photo', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'file', 'name' => 'photo', 'attributes' => ['class' => 'form-control w-50']]],
        [['type'=>'submit','value'=>'submit','attributes'=>['class'=>'btn btn-primary mt-4']]],
    ];
@endphp

<body>
    <div class="container my-3">
        {{ Form::open(['url' => '', 'method' => 'get', 'files' => true, 'class' => 'row g-3 w-50 m-auto']) }}
        @foreach ($form as $item)
            <div class="row my-2">
                @foreach ($item as $r)
                    @include('fields.' . $r['type'], $r)
                @endforeach
            </div>
        @endforeach
        {{ Form::close() }}
    </div>
</body>

</html>
