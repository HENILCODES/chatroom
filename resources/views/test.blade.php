<!DOCTYPE html>
<html lang="en">

<head>
    <title>Henil</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container my-3">
        {{ Form::open(['url' => 'ee/e', 'method' => 'get', 'files' => true, 'class' => 'row g-3 w-50 m-auto']) }}
        <div class="input-group">
            @php $label = array('name' => 'name', 'value' => 'Student Name', 'attributes' => array('class' => 'input-group-text w-25 justify-content-center')) @endphp
            @include('fields.label', $label)

            {{ Form::text('name', '', ['class' => 'form-control', 'id' => 'name', 'required' => true, 'placeholder' => 'Student Name']) }}
        </div>
        <div class="input-group">
            @php $label = array('name' => 'password', 'value' => 'Student Password', 'attributes' => array('class' => 'input-group-text w-25 justify-content-center')) @endphp
            @include('fields.label', $label)
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'id' => 'password', 'required' => 'true']) }}
        </div>
        <div class="input-group">
            @php $label = array('name' => 'email', 'value' => 'Student email', 'attributes' => array('class' => 'input-group-text w-25 justify-content-center')) @endphp
            @include('fields.label', $label)
            {{ Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'email', 'id' => 'email']) }}
        </div>
        <div class="input-group">
            {{ Form::label('contact', 'Student contact', ['class' => 'input-group-text w-25 justify-content-center']) }}
            {{ Form::tel('contact', '', ['class' => 'form-control', 'id' => 'contact', 'required' => true, 'placeholder' => 'enter Contact']) }}
        </div>
        <div class="input-group">
            {{ Form::label('semester', 'semester', ['class' => 'input-group-text']) }}
            {{ Form::select('semester', ['1' => '1', '2' => '2'], '2 ', ['class' => 'form-select', 'id' => 'semester']) }}
        </div>
        <div class="input-group">
            <label class="input-group-text">Hobby</label>
            <div class="form-check m-2">
                {{ Form::checkbox('hobby[]', 'programming', true, ['class' => 'form-check-input', 'id' => 'programming']) }}
                {{ Form::label('programming', 'programming') }}
            </div>
            <div class="form-check m-2">
                {{ Form::checkbox('hobby[]', 'cricket', true, ['class' => 'form-check-input', 'id' => 'cricket']) }}
                {{ Form::label('cricket', 'cricket') }}
            </div>
            <div class="form-check m-2">
                {{ Form::checkbox('hobby[]', 'football', false, ['class' => 'form-check-input', 'id' => 'football']) }}
                {{ Form::label('football', 'football') }}
            </div>
        </div>
        <div class="input-group">
            <label class="input-group-text">Gender</label>
            <div class="form-check m-2">
                {{ Form::radio('gender', 'male', true, ['class' => 'form-check-input', 'id' => 'male']) }}
                {{ Form::label('male', 'male') }}
            </div>
            <div class="form-check m-2">
                {{ Form::radio('gender', 'female', false, ['class' => 'form-check-input', 'id' => 'female']) }}
                {{ Form::label('female', 'female') }}
            </div>
            <div class="form-check m-2">
                {{ Form::radio('gender', 'other', false, ['class' => 'form-check-input', 'id' => 'other']) }}
                {{ Form::label('other', 'other') }}
            </div>
        </div>
        <div class="input-group w-50">
            {{ Form::label('color', 'favorite color', ['class' => 'input-group-text']) }}
            {{ Form::color('color', '', ['class' => 'form-control form-control-color', 'id' => 'color']) }}
        </div>
        <div class="input-group">
            {{ Form::label('interest', 'Interest in coding', ['class' => 'input-group-text']) }}
            {{ Form::selectRange('interest', 0, 100, ['class' => 'form-control']) }}
        </div>
        <div class="input-group">
            {{ Form::label('dob', 'Date Of Birth', ['class' => 'input-group-text']) }}
            {{ Form::date('dob', '', ['class' => 'form-control']) }}
        </div>
        <div class="input-group">
            {{ Form::label('month', 'month', ['class' => 'input-group-text']) }}
            {{ Form::selectMonth('month', ['class' => 'form-select']) }}
        </div>
        <div class="input-group">
            {{ Form::label('url', 'Website', ['class' => 'input-group-text']) }}
            {{ Form::url('website', '', ['class' => 'form-control']) }}
        </div>
        <div class="input-group">
            {{ Form::label('photo', 'photo', ['class' => 'input-group-text']) }}
            {{ Form::file('photo', ['class' => 'form-control form-control-lg']) }}
        </div>
        <div class="mt-5 text-center">
            {{ Form::submit('submit', ['class' => 'btn btn-primary w-50']) }}
        </div>
        {{ Form::close() }}
    </div>
</body>

</html>
