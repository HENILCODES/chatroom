@php
    $form = [
        [['type' => 'label', 'name' => 'name', 'value' => 'Name', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'text', 'name' => 'name', 'value' => '', 'attributes' => ['class' => 'form-control w-50', 'id' => 'name', 'required' => true, 'placeholder' => 'Name']]],
        [['type' => 'label', 'name' => 'password', 'value' => 'Password', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'password', 'name' => 'password', 'attributes' => ['class' => 'form-control w-50', 'placeholder' => 'Password', 'id' => 'password', 'required' => 'true']]],
        [['type' => 'label', 'name' => 'email', 'value' => 'email', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'email', 'name' => 'email', 'value' => '', 'attributes' => ['class' => 'form-control w-50', 'placeholder' => 'email', 'id' => 'email']]],
        [['type' => 'label', 'name' => 'contact', 'value' => 'contact', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'tel', 'name' => 'contact', 'value' => '', 'attributes' => ['class' => 'form-control w-50', 'id' => 'contact', 'required' => true, 'placeholder' => 'enter contact']]],
        [['type' => 'label', 'name' => 'semester', 'value' => 'semeste', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'select', 'name' => 'semester', 'value' => ['1' => '1', '2' => '2'], 'attributes' => ['class' => 'form-select w-25', 'id' => 'semester']]],
        [['type' => 'label', 'name' => 'hobby', 'value' => 'hobby', 'attributes' => ['class' => 'input-group-text justify-content-center col-4']], ['type' => 'label', 'name' => 'programming', 'value' => 'programming', 'attributes' => ['class' => 'col-2']], ['type' => 'checkbox', 'name' => 'hobby[]', 'value' => 'programming', 'checked' => false, 'attributes' => ['class' => '', 'id' => 'programming']], ['type' => 'label', 'name' => 'cricket', 'value' => 'cricket', 'attributes' => ['class' => 'col-1']], ['type' => 'checkbox', 'name' => 'hobby[]', 'value' => 'cricket', 'checked' => true, 'attributes' => ['class' => '', 'id' => 'cricket']]],
        [['type' => 'label', 'name' => 'gender', 'value' => 'gender', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'label', 'name' => 'male', 'value' => 'male', 'attributes' => ['class' => 'col-1']], ['type' => 'radio', 'name' => 'gender', 'value' => 'male', 'checked' => false, 'attributes' => ['id' => 'male']], ['type' => 'label', 'name' => 'female', 'value' => 'female', 'attributes' => ['class' => 'col-1']], ['type' => 'radio', 'name' => 'gender', 'value' => 'female', 'checked' => false, 'attributes' => ['id' => 'female']], ['type' => 'label', 'name' => 'other', 'value' => 'other', 'attributes' => ['class' => 'col-1']], ['type' => 'radio', 'name' => 'gender', 'value' => 'other', 'checked' => false, 'attributes' => ['id' => 'other']]],
        [['type' => 'label', 'name' => 'color', 'value' => 'favorite color', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'color', 'name' => 'color', 'value' => '', 'attributes' => ['class' => 'form-control form-control-color w-25']]],
        [['type' => 'label', 'name' => 'interest', 'value' => 'Interest coding', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'selectRange', 'name' => 'interest', 'min' => 0, 'max' => 20, 'attributes' => ['class' => 'form-select']]],
        [['type' => 'label', 'name' => 'dob', 'value' => 'Date of birth', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'date', 'name' => 'dob', 'value' => '', 'attributes' => ['class' => 'form-control w-50']]],
        [['type' => 'label', 'name' => 'month', 'value' => 'Month', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'selectMonth', 'name' => 'month', 'attributes' => ['class' => 'form-select']]],
        [['type' => 'label', 'name' => 'url', 'value' => 'website', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'url', 'name' => 'url', 'value' => '', 'attributes' => ['class' => 'form-control w-50']]],
        [['type' => 'label', 'name' => 'photo', 'value' => 'photo', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'file', 'name' => 'photo', 'attributes' => ['class' => 'form-control w-50']]],
        [['type' => 'submit', 'value' => 'submit', 'attributes' => ['class' => 'btn btn-primary mt-4']]],
    ];
@endphp

{{-- @php
    
    $form = [
        [['type' => 'label', 'name' => 'name', 'value' => 'Name', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'text', 'name' => 'name', 'value' => $student->name, 'attributes' => ['class' => 'form-control w-50', 'id' => 'name', 'required' => true, 'placeholder' => 'Name']]],
        [['type' => 'label', 'name' => 'password', 'value' => 'Password', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'password', 'name' => 'password', 'attributes' => ['class' => 'form-control w-50', 'placeholder' => 'Password', 'id' => 'password', 'required' => 'true']]],
        [['type' => 'label', 'name' => 'email', 'value' => 'email', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'email', 'name' => 'email', 'value' => $student->email, 'attributes' => ['class' => 'form-control w-50', 'placeholder' => 'email', 'id' => 'email']]],
        [['type' => 'label', 'name' => 'contact', 'value' => 'contact', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'tel', 'name' => 'contact', 'value' => $student->contact, 'attributes' => ['class' => 'form-control w-50', 'id' => 'contact', 'required' => true, 'placeholder' => 'enter contact']]],
        [['type' => 'label', 'name' => 'semester', 'value' => 'semeste', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'select', 'name' => 'semester', 'value' => ['1' => '1', '2' => '2'], 'attributes' => ['class' => 'form-select w-25', 'id' => 'semester']]],
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
        ['type' => 'radio', 'name' => 'gender', 'value' => 'male','checked' => true, 'attributes' => ['id' => 'male']], 
        ['type' => 'label', 'name' => 'female', 'value' => 'female', 'attributes' => ['class' => 'col-1']],
        ['type' => 'radio', 'name' => 'gender', 'value' => 'female', 'checked' => false, 'attributes' => ['id' => 'female']],
        ['type' => 'label', 'name' => 'other', 'value' => 'other', 'attributes' => ['class' => 'col-1']],
        ['type' => 'radio', 'name' => 'gender', 'value' => 'other','checked' => false,  'attributes' => ['id' => 'other']], 
        ],
        [['type' => 'label', 'name' => 'color', 'value' => 'favorite color', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'color', 'name' => 'color', 'value' => $student->color, 'attributes' => ['class' => 'form-control form-control-color w-25']]],
        [['type' => 'label', 'name' => 'interest', 'value' => 'Interest coding', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'selectRange', 'name' => 'interest', 'min' => 0, 'max' => 20, 'attributes' => ['class' => 'form-select']]],
        [['type' => 'label', 'name' => 'dob', 'value' => 'Date of birth', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'date', 'name' => 'dob', 'value' => $student->dob, 'attributes' => ['class' => 'form-control w-50']]],
        [['type' => 'label', 'name' => 'month', 'value' => 'Month', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'selectMonth', 'name' => 'month', 'attributes' => ['class' => 'form-select']]],
        [['type' => 'label', 'name' => 'url', 'value' => 'website', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'url', 'name' => 'url', 'value' => $student->url, 'attributes' => ['class' => 'form-control w-50']]],
        [['type' => 'label', 'name' => 'photo', 'value' => 'photo', 'attributes' => ['class' => 'input-group-text justify-content-center col-4 ']], ['type' => 'file', 'name' => 'photo', 'attributes' => ['class' => 'form-control w-50']]],
        [['type'=>'submit','value'=>'submit','attributes'=>['class'=>'btn btn-primary mt-4']]],
    ];
@endphp --}}

@foreach ($form as $item)
    <div class="row my-2">
        @foreach ($item as $r)
            @include('fields.' . $r['type'], $r)
        @endforeach
    </div>
@endforeach