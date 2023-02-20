@extends('header')
@section('body')
    <link rel="stylesheet" href="{{ url('css/chatroom.css') }}">
    <div class="box">
        <section class="msger">
            <header class="msger-header">
                <div class="msger-header-title fs-4 fw-bold">
                    <i class="fas fa-comment-alt"></i> <i class="bi bi-chat-square-fill"></i> {{ $room_name }}
                </div>
                <div class="msger-header-options">
                    <span class="p-2">
                        <i class="fs-4 mt-2 fa-solid fa-ellipsis-vertical"></i>
                    </span>
                    {{-- <span><i class="fas fa-cog"></i></span> --}}
                </div>
            </header>
            <main class="msger-chat" id="msger-chat">
            </main>
            <div class="msger-inputarea">
                @csrf
                <input type="text" autocomplete="off" class="msger-input form-control" id="chat"
                    placeholder="Enter your message...">
                <button type="submit" class="msger-send-btn" id="send">Send</button>
            </div>
        </section>
    </div>
    <script>
        var element = document.getElementById("msger-chat");
        element.scrollTop = element.scrollHeight;
        var room_name = "<?php echo $room_name; ?>";
        var token = $("input[name='_token']").val();
        var users_id = 2;
    </script>
    <script src="/js/script.js"></script>
@endsection
