$(document).ready(function () {
    getData();
    $("#chat").on("keyup", function (element) {
        if (element.which == 13) {
            $("#send").click();
        }
    });
    $("#send").click(function () {
        sendData();
    });
    function getData() {
        $.ajax("http://127.0.0.1:8000/get", {
            type: "POST",
            data: {
                _token: token,
                room_name: room_name,
            },
            success: function (data) {
                $("#msger-chat").empty();
                data.forEach((element) => {
                    $("#msger-chat").append(
                        '<div class="msg left-msg"> <div class="msg-img fw-bold" style="padding-top: 13px;padding-left:14px;"> HP </div> <div class="msg-bubble"> <div class="msg-info"> <div class="msg-info-name">BOT</div> <div class="msg-info-time">12:45</div> </div> <div class="msg-text"> Hi, welcome to SimpleChat! Go ahead and send me a message. 😄 </div> </div> </div>'
                     );
                });
            },
            error: function (jqXhr, textStatus, errorMessage) {
                console.log("Error" + errorMessage);
            },
        });
    }
    function sendData() {
        var chat = $("#chat").val();
        if (chat.trim().length > 0) {
            $.ajax("http://127.0.0.1:8000/send", {
                type: "POST",
                data: {
                    _token: token,
                    chat: chat,
                    rooms_name: room_name,
                    users_id: 1,
                },
                success: function () {
                    getData();
                    $("#chat").val("");
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    console.log("Error :" + errorMessage);
                },
            });
        }
    }
});
