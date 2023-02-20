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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="{{ url('css/chatroom.css') }}">
</head>
<body>
    <div class="box">
        <section class="msger">
            <header class="msger-header">
                <div class="msger-header-title fs-4 fw-bold">
                    <i class="fas fa-comment-alt"></i> <i class="bi bi-chat-square-fill"></i> {{ $room_name }}
                </div>
                <div class="msger-header-options">
                    <span class="p-2" id="option-icon" style="cursor: pointer;">
                        <i class="fs-4 mt-1 me-1 fa-solid fa-ellipsis-vertical"></i>
                    </span>
                    <ul class="list-group position-fixed shadow" id="option-chat"
                        style="display:none;width: 200px;margin-left: -185px;margin-top: 10px;">
                        <a href="/" class="list-group-item list-group-item-action text-muted"
                            style="letter-spacing: 2px;">Exite Group</a>
                    </ul>
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
    <script src="{{ url('js/bootstrap.bundle.js') }}"></script>
    <script src="/js/script.js"></script>
</body>
