@extends('header')
@section('body')
    <link rel="stylesheet" href="{{ url('css/chatroom.css') }}">
    <div class="box">
        <section class="msger">
            <header class="msger-header">
                <div class="msger-header-title fs-4 fw-bold">
                    <i class="fas fa-comment-alt"></i> {{ $room_name }}
                </div>
                <div class="msger-header-options">
                    <span><i class="fas fa-cog"></i></span>
                </div>
            </header>

            <main class="msger-chat" id="msger-chat">
                <div class="msg left-msg">
                    <div class="msg-img fw-bold" style="padding-top: 13px;padding-left:14px;"> HP </div>
                    <div class="msg-bubble">
                        <div class="msg-info">
                            <div class="msg-info-name">BOT</div>
                            <div class="msg-info-time">12:45</div>
                        </div>
                        <div class="msg-text">
                            Hi, welcome to SimpleChat! Go ahead and send me a message. 😄
                        </div>
                    </div>
                </div>
                <div class="msg right-msg">
                    <div class="msg-img fw-bold" style="padding-top: 13px;padding-left:14px;"> HC </div>
                    <div class="msg-bubble">
                        <div class="msg-info">
                            <div class="msg-info-name">Sajad</div>
                            <div class="msg-info-time">12:46</div>
                        </div>
                        <div class="msg-text">
                            You can change your name in JS section!
                        </div>
                    </div>
                </div>
            </main>
            <div class="msger-inputarea">
                @csrf
                <input type="text" class="msger-input form-control" id="chat" placeholder="Enter your message...">
                <button type="submit" class="msger-send-btn" id="send">Send</button>
            </div>
        </section>
    </div>
    <script>
        var element = document.getElementById("msger-chat");

        element.scrollTop = element.scrollHeight;

        var room_name = "<?php echo $room_name; ?>";
        var token = $("input[name='_token']").val();
        var users_id = 1;
    </script>
    <script src="/js/script.js"></script>
@endsection
