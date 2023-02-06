@extends('header')
@section('body')
    <div class="container">
        <div class="my-5"></div>
        <div class="shadow w-75 m-auto px-3">
            <div class="w-100">
                <h1>Chat</h1>
            </div>
            <div class="">
                <div class="overflow-y-auto px-5 pt-3" style="height: 350px" id="chat-box">
                </div>
            </div>
            <div class="">
                <div class="row m-auto shadow g-3 ">
                    @csrf
                    <div class="col-8 shadow">
                        <input type="text" id="chat" autocomplete="off" id="chat" required name="chat"
                            class="form-control">
                    </div>
                    <div class="col-4 shadow-lg">
                        <button class="btn btn-primary" id="send">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var rooms_id = {{ $room_id }};
            getData();

            function getData() {
                $.ajax('{{ route('get-chat') }}', {
                    type: 'POST',
                    data: {
                        _token: 'ijFX6Kk6ekkSoIMnV89MRVKc0tpKez4buKqz19Sh',
                        room_id: rooms_id,
                    },
                    success: function(data, status, xhr) {
                        data.forEach(element => {
                            $('#chat-box').append(`<div class="bg-info my-3" style="width: 200px;">${element['id']} <span>${element['users_id']}</span><br> <span>${element['chat']}</span><br> <span>${element['created_at']}</span> </div>`);
                        });
                    },
                    error: function(jqXhr, textStatus, errorMessage) {
                        console.log('Error' + errorMessage);
                    }
                });
            }
            $('#send').click(function() {
                let chat = $('#chat').val();
                let users_id = 1;
                $.ajax('{{ route('send-chat') }}', {
                    type: 'POST',
                    data: {
                        chat: chat,
                        _token: 'ijFX6Kk6ekkSoIMnV89MRVKc0tpKez4buKqz19Sh',
                        rooms_id: rooms_id,
                        users_id: users_id
                    },
                    success: function(data, status, xhr) {
                        getData();
                    },
                    error: function(jqXhr, textStatus, errorMessage) {
                        console.log('Error' + errorMessage);
                    }
                });
            })
        });
    </script>
@endsection
