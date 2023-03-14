<div class="modal fade" id="UploadFile" tabindex="-1" aria-labelledby="UploadFile" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="UploadFile">Upload Files</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{ Form::open(['route' => 'upload-file', 'autocomplete' => 'off', 'files' => true]) }}
            <div class="modal-body">
                {{ Form::token() }}
                <div class="mb-3">
                    {{ Form::file('name', ['class' => 'form-control fs-5 mt-2', 'required' => true]) }}
                    <input type="hidden" name="room_id" class="chat-room-id">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                {{ Form::submit('Upload', ['class' => 'btn btn-primary']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
