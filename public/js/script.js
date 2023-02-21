$(document).ready(function () {
    $("#option-icon").click(function () {
        $("#option-chat").slideToggle();
    });
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
                var $target = $("#msger-chat");
                $target.animate({ scrollTop: $target.height() * 8 }, 3000);
                $("#msger-chat").empty();
                Display_Chat(data);
            },
            error: function (jqXhr, textStatus, errorMessage) {
                console.log("Error" + errorMessage);
            },
        });
    }
    function Display_Chat(data) {
        data.forEach((element) => {
            $("#msger-chat").append(
                `<div class="msg ${
                    element["users_id"] == users_id ? "right-msg" : "left-msg"
                }"> <div class="msg-img shadow fw-bold" style="padding-top: 13px;padding-left:14px;"> HP </div> <div class="msg-bubble"> <div class="msg-info"> <div class="msg-info-name">${
                    element["users_id"]
                }</div> <div class="msg-info-time">${
                    element["created_at"]
                }</div> </div> <div class="msg-text"> ${
                    element["chat"]
                } </div> </div> </div>`
            );
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
                    users_id: users_id,
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
