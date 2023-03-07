<div class="modal fade" id="CreateRoom" tabindex="-1" aria-labelledby="CreateRoomLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="CreateRoomLabel">Create Room</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => 'create-room', 'autocomplete' => 'off', 'files' => true]) }}
                {{ Form::token() }}
                <div class="mb-3">
                    {{ Form::text('name', '', ['class' => 'form-control fs-5 mt-2', 'maxlength' => 20, 'placeholder' => 'type hear', 'id' => 'create', 'required' => true]) }}
                    {{ Form::file('photo', ['class' => 'form-control fs-5 mt-2', 'id' => 'photo', 'required' => true]) }}
                </div>
                @error('name')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{ Form::submit('Let\'s Create', ['class' => 'btn btn-primary']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>