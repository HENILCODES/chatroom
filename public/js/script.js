$(document).ready(function () {
    $("#right-chat-box").hide();

    $("#option-icon").click(function () {
        $("#option-chat").slideToggle();
    });
    $("#action-user-option").click(function () {
        $("#option-user").slideToggle();
    });
    $("#chat").on("keyup", function (element) {
        if (element.which == 13) {
            $("#send").click();
        }
    });
    $("#send").click(function () {
        sendMessage();
    });

    $(".block").click(function () {
        $("#right-default-box").hide();
        $("#right-chat-box").show();
        let room_name = $(this).children().attr("id");
        $("#room-name").html(room_name);

        let room_id = $(this).attr("id");
        getMessage(room_id);
    });

    function getMessage(room) {
        $("#get-room-id").val(room);
        $("#room-image").attr("src", "http://127.0.0.1:8000/storage/henil.jpg");

        $.ajax("http://127.0.0.1:8000/get", {
            type: "POST",
            data: {
                _token: token,
                room_id: room,
            },
            success: function (data) {
                var $target = $("#msger-chat");
                $target.animate({ scrollTop: $target.height() * 5 }, 1000);
                $("#msger-chat").empty();
                displayMessage(data);
            },
            error: function (jqXhr, textStatus, errorMessage) {
                console.log("Error" + errorMessage);
            },
        });
    }
    function displayMessage(data) {
        data.forEach((element) => {
            $("#msger-chat").append(
                `<div class="msg ${
                    element["user_id"] == user_id ? "right-msg" : "left-msg"
                }"> 
                <div class="msg-img shadow fw-bold" style="padding-top: 13px;padding-left:14px;background-image: url('http://127.0.0.1:8000/storage/henil.jpg');"></div> <div class="msg-bubble"> <div class="msg-info"> <div class="msg-info-name">
                ${element["user_id"] == user_id ? "" : element["sender"]}
                </div> <div class="msg-info-time">${
                    element["created_at"]
                }</div> </div> <div class="msg-text"> ${
                    element["chat"]
                } </div> </div> </div>`
            );
        });
    }
    function sendMessage() {
        var chat = $("#chat").val();
        let room_id = $("#get-room-id").val();

        if (chat.trim().length > 0) {
            $.ajax("http://127.0.0.1:8000/send", {
                type: "POST",
                data: {
                    _token: token,
                    chat: chat,
                    room_id: room_id,
                    user_id: user_id,
                },
                success: function () {
                    getMessage(room_id);
                    $("#chat").val("");
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    console.log("Error :" + errorMessage);
                },
            });
        }
    }
});
