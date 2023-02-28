<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <script src="{{ url('js/jquery-3.6.3.js') }}" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ url('css/chatroom.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
</head>

<body>
    <div class="modal fade" id="CreateRoom" tabindex="-1" aria-labelledby="CreateRoomLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="CreateRoomLabel">Create Room</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ Form::open(['route' => 'create-room', 'autocomplete' => 'off']) }}
                    {{ Form::token() }}
                    <div class="mb-3">
                        {{ Form::text('name', '', ['class' => 'form-control fs-5 mt-2', 'placeholder' => 'type hear', 'id' => 'create', 'required' => true]) }}
                        {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> --}}
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



    <div id="root" class="containers">
        <div class="main-box">
            <div class="box">
                <div class="left-box">
                    <header class="d-flex">
                        <div class="Himg">
                            <div class="imgBox">
                                {{-- <img src="{{ url('storage/henil.jpg') }}" alt="useer" class="c-pointer"> --}}
                                <span>{{ Auth::user()->name }}</span>
                            </div>
                        </div>
                        <input type="hidden" id="active-user-name" value="{{ Auth::user()->name }}">
                        <div class="option d-flex">
                            <div class="option-icon p-r">
                                <img src="{{ url('storage/status.png') }}" alt="Status" class="c-pointer">
                            </div>
                            <div class="option-icon p-r"><i class="bi bi-chat-left-text-fill"></i></div>
                            <div class="option-icon"><i class="bi bi-three-dots-vertical" id="action-user-option"></i>
                            </div>
                        </div>
                        <ul class="list-group position-fixed shadow mt-5" id="option-user"
                            style="display:none;width: 200px;margin-left: -185px;margin-top: 10px;">
                            <button type="button" class="btn btn-light text-start" data-bs-toggle="modal"
                                data-bs-target="#CreateRoom">Create Group </button>
                            <div class="nav-link">
                                {{ Form::open(['route' => 'logout']) }}
                                {{ Form::token() }}
                                {{ Form::submit('log out', ['class' => 'btn btn-light text-start text-decoration-none text-muted w-100']) }}
                                {{ Form::close() }}
                            </div>
                        </ul>
                    </header>
                    <div class="center-search-box d-flex">
                        <div class="input-search d-flex w-100">
                            <div class="icon"><i class="bi bi-search"></i></div><input class="input"
                                placeholder="Search or start new chat" contenteditable="true">
                        </div>
                        <div class="filter"><i class="bi bi-filter"></i></div>
                    </div>
                    <div class="user-friend">
                        {{-- $rooms in get user_rooms and room name value  --}}
                        @foreach ($rooms as $room)
                            {{-- it's check user id in user_rooms table with session user id if it equal than print group name --}}
                            @if ($room->user_name === Auth::user()->name)
                                <div class="block room-block" id="{{ $room->room_id }}"> {{-- use id value in script file in load message in chat room use room id --}}
                                    <div class="friend-block d-flex" id="{{ $room->name }}"> {{-- its use for load room name in chat room when click room-block in script.js --}}
                                        <div class="imgB">
                                            <div class="friend-img"><img src="{{ url('storage/henil.jpg') }}"
                                                    alt="H">
                                            </div>
                                        </div>
                                        <div class="friend-detail w-100">
                                            <div class="friend-name d-flex">
                                                <div class="f-name"> <span>{{ $room->name }}</span></div>
                                                <div class="f-active"> <span class="lig-color">9:30 am</span></div>
                                            </div>
                                            <div class="friend-last-chat d-flex">
                                                <div class="left"><i class="bi bi-check2"></i><span
                                                        class="lig-color Prchat">Hello</span></div>
                                                <div class="right"><i class="bi bi-chevron-down" id="chat_more_op">
                                                        {{-- <ul class="list-group position-fixed shadow"
                                                            id="option-room-block"
                                                            style="display:none;width:200px;margin-left: -185px;">
                                                            <div class="nav-link">
                                                                
                                                            </div>
                                                        </ul> --}}
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="w-100">
                <div class="right-box">
                    <section class="msger" style="display: none;" id="right-chat-box">
                        <header class="msger-header">
                            <div class="msger-header-title d-flex">
                                <div class="group-img"><img id="room-image"></div>
                                <span class="ms-3 fw-bold fs-4" id="chat-room-name"></span> {{-- that id use for display room name --}}
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
                                        <form action="{{ route('delete-room') }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" name="room_id" class="chat-room-id">
                                            <button type="submit" class="btn btn-light text-start w-100">Delete
                                                Group</button>
                                        </form>
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
                        <main class="msger-chat" id="msger-chat">
                        </main>
                        <div class="msger-inputarea">
                            <button class="msger-option-btn shadow bi bi-link-45deg"></button>
                            {{ Form::token() }}
                            {{ Form::text('chat', '', ['class' => 'msger-input shadow', 'id' => 'chat', 'placeholder' => 'type hear.... ', 'autocomplete' => 'off']) }}
                            <button class="msger-send-btn shadow" id="send"><i
                                    class="bi bi-send-fill fs-6"></i></button>
                        </div>
                    </section>

                    <div class="center-box center" id="right-default-box">
                        <div class="icon-box">
                            <img src="{{ url('storage/DefaultLogo.png') }}" alt="Logo" />
                        </div>
                        <div class="detail">
                            <div class="head">
                                <span class="title">WhatsApp Web</span>
                            </div>
                            <div class="data">
                                Send and receive messages without keeping your
                                phone online.<br />Use WhatsApp on up to 4 linked devices and 1 phone at the same
                                time.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var token = $("input[name='_token']").val(); // use for send and get message using token value
        var user_name = $("#active-user-name").val(); //stroe session value in that virable for access script.js file
    </script>
    <script src="{{ url('js/bootstrap.bundle.js') }}"></script>
    <script src="/js/script.js"></script>
</body>
