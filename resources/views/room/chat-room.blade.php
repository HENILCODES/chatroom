<section class="msger" style="display: none;" id="right-chat-box">
    <header class="msger-header">
        <div class="msger-header-title d-flex">
            <div class="group-img"><img id="room-image"></div>
            <span class="ms-3 fw-bold fs-4 user-select-text" id="chat-room-name"></span>
            {{-- that id use for display room name --}}

            {{-- <span class="text-muted" id="group-user-name">1,2</span> --}}
        </div>
        <div class="msger-header-options">
            <span class="p-2" id="option-icon" style="cursor: pointer;">
                <i class="fs-4 mt-1 bi bi-three-dots-vertical"></i>
            </span>
            <input type="hidden" id="get-room-id"> {{-- it's input use for send message it access by room id in script.js  --}}
            <ul class="list-group position-fixed shadow" id="option-chat"
                style="display:none;width: 200px;margin-left: -185px;margin-top: 10px;">
                {{-- its use for logout --}}
                <li class="nav-link">
                    <button class="btn btn-light w-100 text-start" data-bs-toggle="modal"
                        data-bs-target="#AddMember">Add Member</button>
                </li>
                <li class="nav-link">
                    <form action="{{ route('logout-room') }}" method="POST">
                        @method('delete')
                        @csrf
                        <input type="hidden" name="room_id" class="chat-room-id">
                        <button type="submit" class="btn btn-light text-start w-100">logout
                            Group</button>
                    </form>
                </li>
            </ul>
        </div>
    </header>
    <main class="msger-chat">
        {{-- <h1>fd</h1> --}}
        <div id="msger-chat">
        </div>
        <span id="scroll-bottom-chat"></span>
    </main>
    <div class="msger-inputarea">
        <button class="msger-option-btn shadow bi bi-link-45deg"></button>
        {{ Form::token() }}
        {{ Form::text('chat', '', ['class' => 'msger-input shadow', 'id' => 'chat', 'spellcheck' => 'true', 'placeholder' => 'type hear.... ', 'autocomplete' => 'off']) }}
        <button class="msger-send-btn shadow" id="send"><i class="bi bi-send-fill fs-6"></i></button>
    </div>
</section>
