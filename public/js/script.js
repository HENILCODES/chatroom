$(document).ready(function() {
     $('#chat-box').scrollTop($('#chat-box').height());
    getData();
    function getData() {
        $.ajax("http://127.0.0.1:8000/get", {
            type: 'POST',
            data: {
                _token: token,
                room_name: room_name,
            },
            success: function(data) {
                data.forEach(element => {
                    $('#chat-box').append(`<div class="bg-info my-3" style="width: 200px;">${element['id']} s <span>${element['users_id']}</span><br> <span>${element['chat']}</span><br> <span>${element['created_at']}</span> </div>`);
                });
            },
            error: function(jqXhr, textStatus, errorMessage) {
                console.log('Error' + errorMessage);
            }
        });
    }
    $('#send').click(function() {
        let users_id = 1;
        $.ajax("http://127.0.0.1:8000/send", {
            type: 'POST',
            data: {
                chat: chat,
                _token: token,
                rooms_name: room_name,
                users_id: users_id,
            },
            success: function(data) {
                getData();
            },
            error: function(jqXhr, textStatus, errorMessage) {
                console.log('Error' + errorMessage);
            }
        });
    })
});