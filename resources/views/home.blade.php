<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <script src="{{ url('js/jquery-3.6.3.js') }}" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/chatroom.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
</head>

<body>
    @include('room.create-room')
    @include('room.add-member')
    <div id="root" class="containers">
        <div class="main-box">
            <div class="box">
                <div class="left-box">
                    <header class="d-flex">
                        <div class="Himg">
                            <div class="imgBox">
                                <img src="{{ url('storage/profile/user/' . Auth::user()->photo) }}"
                                    alt="{{ Auth::user()->photo }}" title="{{ Auth::user()->name }}" class="c-pointer">
                            </div>
                        </div>
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
                        <div class="block background" id="room-default-block"> {{-- use id value in script file in load message in chat room use room id --}}
                            <div class="friend-block d-flex"> {{-- its use for load room name in chat room when click room-block in script.js --}}
                                <div class="imgB">
                                    <div class="friend-img"><img src="storage/profile/room/logo.png">
                                    </div>
                                </div>
                                <div class="friend-detail w-100">
                                    <div class="friend-name d-flex">
                                        <div class="f-name"> <span class="fw-bold">ChatBot</span> <i
                                                class="bi bi-patch-check-fill fs-5 ms-2 text-primary"></i></div>
                                        <div class="f-active"> <span class="lig-color">02-Mar-2023 09:47:02 am</span>
                                        </div>
                                    </div>
                                    <div class="friend-last-chat d-flex">
                                        <div class="left"><i class="bi bi-check2"></i><span
                                                class="lig-color Prchat">Hello</span></div>
                                        <div class="right">
                                            {{-- <i class="bi bi-chevron-down" id="chat_more_op"></i> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- $rooms in get user_rooms and room name value  --}}
                        @foreach ($rooms as $room)
                            {{-- it's check user id in user_rooms table with session user id if it equal than print group name --}}
                            <div class="block room-block background" data-room-id="{{ $room->room_id }}"
                                data-room-name="{{ $room->name }}" data-room-photo="{{ $room->photo }}">
                                {{-- use id value in script file in load message in chat room use room id --}}
                                <div class="friend-block d-flex"> {{-- its use for load room name in chat room when click room-block in script.js --}}
                                    <div class="imgB">
                                        <div class="friend-img"><img
                                                src="{{ url('storage/profile/room/' . $room->photo) }}"
                                                alt="{{ $room->photo }}">
                                        </div>
                                    </div>
                                    <div class="friend-detail w-100">
                                        <div class="friend-name d-flex">
                                            <div class="f-name"> <span>{{ $room->name }}</span></div>
                                            <div class="f-active"> <span
                                                    class="lig-color">{{ $room->created_at }}</span></div>
                                        </div>
                                        <div class="friend-last-chat d-flex">
                                            <div class="left"><i class="bi bi-check2"></i><span
                                                    class="lig-color Prchat">Hello</span></div>
                                            <div class="right">
                                                <i class="bi bi-chevron-down" id="chat_more_op"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="w-100">
                <div class="right-box">
                    @include('room.chat-room')
                    @include('room.bot-room')
                    @include('room.default')
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="active-user-id" value="{{ Auth::user()->id }}"" /> {{-- user name access in script file --}}
    <input type="hidden" id="active-user-photo" value="{{ Auth::user()->photo }}"" /> {{-- user name access in script file --}}
    <script>
        var token = $("input[name='_token']").val(); // use for send and get message using token value
        var user_id = $("#active-user-id").val(); //stroe session value in that virable for access script.js file
        var user_photo = $("#active-user-photo").val(); //stroe session value in that virable for access script.js file
    </script>
    <script src="{{ url('js/bootstrap.bundle.js') }}"></script>
    <script defer="defer" src="/js/script.js"></script>
</body>
