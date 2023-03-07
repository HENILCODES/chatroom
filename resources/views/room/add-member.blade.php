
<div class="modal fade" id="AddMember" tabindex="-1" aria-labelledby="AddMemberLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="AddMemberLabel">Add Member</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ Form::open(['route' => 'addMember-room', 'autocomplete' => 'off']) }}
                {{ Form::token() }}
                <div class="mb-3">
                    {{ Form::text('name', '', ['class' => 'form-control fs-5 mt-2', 'placeholder' => 'type user name', 'id' => 'join', 'required' => true]) }}
                    <input type="hidden" name="room_id" class="chat-room-id">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{ Form::submit('Add', ['class' => 'btn btn-primary']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
