@extends('header')
@section('body')
    <div class="container">
        <div class="my-5"></div>
        <div class="shadow w-75 m-auto px-3">
            <div class="w-100">
                <h1>ChatRoom : {{$room_name}}</h1>
            </div>
            <div class="">
                <div class="overflow-y-auto px-5 pt-3" style="height: 350px" id="chat-box">
                    {{-- @foreach ($chat as $item)
                        {{ $item }}
                    @endforeach --}}
                </div>
            </div>
            <div class="bg-light">
                <div class="row m-auto shadow g-3 ">
                    @csrf
                    <div class="col-8 shadow">
                        <input type="text" autocomplete="off" id="chat" required class="form-control">
                    </div>
                    <div class="col-4 shadow-lg">
                        <button type="submit" class="btn btn-primary" id="send">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var room_name = "<?php echo $room_name; ?>";
        var token = $("input[name='_token']").val();
        var chat= $('#chat').val();
        var users_id= 1;
    </script>
    <script src="/js/script.js"></script>
@endsection
