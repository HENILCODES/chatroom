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
            @php $text = array('name' => 'name', 'value' => '', 'attributes' => array('class' => 'form-control', 'id' => 'name', 'required' => true, 'placeholder' => 'Student Name')) @endphp
            @include('fields.text', $text)
        </div>
        <div class="input-group">
            @php $label = array('name' => 'password', 'value' => 'Student Password', 'attributes' => array('class' => 'input-group-text w-25 justify-content-center')) @endphp
            @include('fields.label', $label)
            @php $password = array('name' => 'password','attributes' => array('class' => 'form-control', 'placeholder' => 'Password', 'id' => 'password', 'required' => 'true')) @endphp
            @include('fields.password', $password)
        </div>
        <div class="input-group">
            @php $label = array('name' => 'email', 'value' => 'Student email', 'attributes' => array('class' => 'input-group-text w-25 justify-content-center')) @endphp
            @include('fields.label', $label)
            @php $email = array('name' => 'email', 'value' => '', 'attributes' => array('class' => 'form-control', 'placeholder' => 'email', 'id' => 'email')) @endphp
            @include('fields.email', $email)
        </div>
        <div class="input-group">
            @php $label = array('name' => 'contact', 'value' => 'Student contact', 'attributes' => array('class' => 'input-group-text w-25 justify-content-center')) @endphp
            @include('fields.label', $label)
            @php $tel = array('name' => 'contact', 'value' => '', 'attributes' => array('class' => 'form-control', 'id' => 'contact', 'required' => true, 'placeholder' => 'enter contact')) @endphp
            @include('fields.tel', $tel)
        </div>
        <div class="input-group">
            @php $label = array('name' => 'semester', 'value' => 'Student semeste', 'attributes' => array('class' => 'input-group-text w-25 justify-content-center')) @endphp
            @include('fields.label', $label)
            @php $semester = array('name' => 'semester', 'value' => ['1' => '1', '2' => '2'], 'attributes' => array('class' => 'form-select', 'id' => 'semester')) @endphp
            @include('fields.select', $semester)
        </div>
        <div class="input-group">
            <label class="input-group-text">Hobby</label>
            <div class="form-check m-2">
                @php $checkbox = array('name' => 'hobby[]', 'value'=>'programming','checked' => false, 'attributes' => array('class' => 'form-check-input', 'id' => 'programming')) @endphp
                @include('fields.checkbox', $checkbox)
                @php $label = array('name' => 'programming', 'value' => 'programming', 'attributes' => array('')) @endphp
                @include('fields.label', $label)
            </div>
            <div class="form-check m-2">
                @php $checkbox = array('name' => 'hobby[]', 'value'=>'cricket','checked' => false, 'attributes' => array('class' => 'form-check-input', 'id' => 'cricket')) @endphp
                @include('fields.checkbox', $checkbox)
                @php $label = array('name' => 'cricket', 'value' => 'cricket', 'attributes' => array('')) @endphp
                @include('fields.label', $label)
            </div>
            <div class="form-check m-2">
                @php $checkbox = array('name' => 'hobby[]', 'value'=>'football','checked' => false, 'attributes' => array('class' => 'form-check-input', 'id' => 'football')) @endphp
                @include('fields.checkbox', $checkbox)
                @php $label = array('name' => 'football', 'value' => 'football', 'attributes' => array('')) @endphp
                @include('fields.label', $label)
            </div>
        </div>
        <div class="input-group">
            <label class="input-group-text">Gender</label>
            <div class="form-check m-2">
                @php $radio = array('name' => 'gender', 'value' => 'male','checked'=>false, 'attributes' => array('class' => 'form-check-input', 'id' => 'male')) @endphp
                @include('fields.radio', $radio)
                @php $label = array('name' => 'male', 'value' => 'male', 'attributes' => array('')) @endphp
                @include('fields.label', $label)
            </div>
            <div class="form-check m-2">
                @php $radio = array('name' => 'gender', 'value' => 'female','checked'=>false, 'attributes' => array('class' => 'form-check-input', 'id' => 'female')) @endphp
                @include('fields.radio', $radio)
                @php $label = array('name' => 'female', 'value' => 'female', 'attributes' => array('')) @endphp
                @include('fields.label', $label)
            </div>
            <div class="form-check m-2">
                @php $radio = array('name' => 'gender', 'value' => 'other','checked'=>false, 'attributes' => array('class' => 'form-check-input', 'id' => 'other')) @endphp
                @include('fields.radio', $radio)
                @php $label = array('name' => 'other', 'value' => 'other', 'attributes' => array('')) @endphp
                @include('fields.label', $label)
            </div>
        </div>
        <div class="input-group w-50">
            @php $label = array('name' => 'color', 'value' => 'favorite color', 'attributes' => array('class' => 'input-group-text')) @endphp
            @include('fields.label', $label)
            @php $color = array('name' => 'color', 'value' => '', 'attributes' => array('class' => 'form-control form-control-color')) @endphp
            @include('fields.color', $color)
        </div>
        <div class="input-group">
            @php $label = array('name' => 'interest', 'value' => 'Interest coding', 'attributes' => array('class' => 'input-group-text')) @endphp
            @include('fields.label', $label)
            @php $range = array('name' => 'interest', 'min'=>0,'max'=>20, 'attributes' => array('class' => 'form-control')) @endphp
            @include('fields.selectRange', $range)
        </div>
        <div class="input-group">
            @php $label = array('name' => 'dob', 'value' => 'Date of birth', 'attributes' => array('class' => 'input-group-text')) @endphp
            @include('fields.label', $label)
            @php $date = array('name' => 'dob', 'value' => '', 'attributes' => array('class' => 'form-control')) @endphp
            @include('fields.date', $date)
        </div>
        <div class="input-group">
            @php $label = array('name' => 'month', 'value' => 'Month', 'attributes' => array('class' => 'input-group-text')) @endphp
            @include('fields.label', $label)
            @php $month = array('name'=>'month','attributes'=> array('class' => 'form-select')) @endphp
            @include('fields.selectMonth', $month)
        </div>
        <div class="input-group">
            @php $label = array('name' => 'url', 'value' => 'website', 'attributes' => array('class' => 'input-group-text')) @endphp
            @include('fields.label', $label)
            @php $url = array('name'=>'website','value'=>'', 'attributes'=> array('class' => 'form-control')) @endphp
            @include('fields.url', $url)
        </div>
        <div class="input-group">
            @php $label = array('name' => 'photo', 'value' => 'photo', 'attributes' => array('class' => 'input-group-text')) @endphp
            @include('fields.label', $label)
            @php $file = array('name'=>'photo', 'attributes'=> array('class' => 'form-control form-control-lg')) @endphp
            @include('fields.file',$file)
        </div>
        <div class="mt-5 text-center">
            @php $file = array('value'=>'submit', 'attributes'=> array('class' => 'btn btn-primary w-50')) @endphp
            @include('fields.submit',$file)

        </div>
        {{ Form::close() }}
    </div>
</body>

</html>
