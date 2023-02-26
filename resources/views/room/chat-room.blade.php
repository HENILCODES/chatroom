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
    <div id="root" class="containers">
        <div class="main-box">
            <div class="box">
                <div class="left-box">
                    <header class="d-flex">
                        <div class="Himg">
                            <div class="imgBox">
                                {{-- <img src="{{ url('storage/henil.jpg') }}" alt="useer" class="c-pointer"> --}}
                                {{ Auth::user()->name }}
                            </div>
                        </div>
                        <div class="option d-flex">
                            <div class="option-icon p-r">
                                <img src="{{ url('storage/status.png') }}" alt="Status" class="c-pointer">
                            </div>
                            <div class="option-icon p-r"><i class="bi bi-chat-left-text-fill"></i></div>
                            <div class="option-icon"><i class="bi bi-three-dots-vertical"></i></div>
                        </div>
                    </header>
                    <div class="center-search-box d-flex">
                        <div class="input-search d-flex w-100">
                            <div class="icon"><i class="bi bi-search"></i></div><input class="input"
                                placeholder="Search or start new chat" contenteditable="true">
                        </div>
                        <div class="filter"><i class="bi bi-filter"></i></div>
                    </div>
                    <div class="user-friend">
                        @forelse ($rooms as $room)
                            <div class="block" id="{{ $room->name }}">
                                <div class="friend-block d-flex">
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
                                            <div class="right"><i class="bi bi-chevron-down" id="chat_more_op"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <h1>Not Found</h1>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="w-100">
                <div class="right-box">
                    <section class="msger">
                        <header class="msger-header">
                            <div class="msger-header-title fs-4 fw-bold d-flex">
                                <div class="group-img"><img id="room-image"></div>
                                <span class="ms-3" id="room-name">Global Chat</span>
                            </div>
                            <div class="msger-header-options">
                                <span class="p-2" id="option-icon" style="cursor: pointer;">
                                    <i class="fs-4 mt-1 bi bi-three-dots-vertical"></i>
                                </span>
                                <ul class="list-group position-fixed shadow" id="option-chat"
                                    style="display:none;width: 200px;margin-left: -185px;margin-top: 10px;">
                                    <div class="nav-link">
                                        {{ Form::open(['route' => 'logout']) }}
                                        {{ Form::token() }}
                                        {{ Form::submit('log out', ['class' => 'btn btn-light text-start text-decoration-none text-muted w-100']) }}
                                        {{ Form::close() }}
                                    </div>
                                </ul>
                            </div>
                        </header>
                        <main class="msger-chat" id="msger-chat">
                        </main>
                        <div class="msger-inputarea">
                            <button class="msger-option-btn shadow bi bi-link-45deg"></button>
                            {{ Form::token() }}
                            {{ Form::text('name', '', ['class' => 'msger-input shadow', 'id' => 'chat', 'placeholder' => 'type hear.... ', 'autocomplete' => 'off']) }}
                            <button class="msger-send-btn shadow" id="send"><i
                                    class="bi bi-send-fill fs-6"></i></button>
                        </div>
                    </section>
                    {{-- <div class="center-box center">
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
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        var token = $("input[name='_token']").val();
        var users_id = {{ Auth::user()->id }};
    </script>
    <script src="{{ url('js/bootstrap.bundle.js') }}"></script>
    <script src="/js/script.js"></script>
</body>
