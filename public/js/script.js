$(document).ready(function () {
    //     var user_name = document.getElementById("#active-user-name").value; //stroe session value in that virable for access script.js file
    $("#right-chat-box").hide(); // its use for hide onload chat box in right sied

    // its use for toggle option
    $("#option-icon").click(function () {
        $("#option-chat").slideToggle();
    });
    $("#action-user-option").click(function () {
        $("#option-user").slideToggle();
    });

    $("#chat").on("keyup", function (element) {
        if (element.which == 13) {
            //when user click enter send message
            $("#send").click();
        }
    });
    $("#send").click(function () {
        sendMessage(); //triggre function on click button send
    });

    $(".room-block").click(function () {
        $("#right-default-box").hide();
        $("#right-chat-box").show(); //when click block show cht box

        let room_name = $(this).children().attr("id"); //get room name in use id attributes
        $("#chat-room-name").html(room_name); // set chat room name

        let room_id = $(this).attr("id"); //get room id use id attributes
        getMessage(room_id); // send group id to function and display message
    });

    function getMessage(roomid) {
        $(".chat-room-id").val(roomid);
        // $("#get-room-id").val(roomid); //stroe value of room id for send message
        // $("#add-member-form").val(roomid); //stroe value of room id for add member in room
        $("#room-image").attr("src", "http://127.0.0.1:8000/storage/henil.jpg"); //stroe group image

        $.ajax("http://127.0.0.1:8000/get", {
            type: "POST",
            data: {
                _token: token,
                room_id: roomid,
            },
            success: function (data) {
                var $target = $("#msger-chat");
                $target.animate({ scrollTop: $target.height() * 5 }, 1000); //use for scroll chat room
                $("#msger-chat").empty(); // befor load message clear div and load again
                displayMessage(data); // load all message
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
                    element["user_name"] === user_name
                        ? "right-msg"
                        : "left-msg" //check user name equal to session name
                }"> 
                <div class="msg-img shadow fw-bold" style="padding-top: 13px;padding-left:14px;background-image: url('http://127.0.0.1:8000/storage/henil.jpg');"></div> <div class="msg-bubble"> <div class="msg-info"> <div class="msg-info-name user-select-text">
                ${
                    element["user_name"] === user_name
                        ? ""
                        : element["user_name"]
                }
                </div> <div class="msg-info-time user-select-text">${
                    element["created_at"]
                }</div> </div> <div class="msg-text user-select-text"> ${
                    element["chat"]
                } </div> </div> </div>`
            );
        });
    }
    function sendMessage() {
        var chat = $("#chat").val();
        let room_id = $(".chat-room-id").val();

        if (chat.trim().length > 0) {
            $.ajax("http://127.0.0.1:8000/send", {
                type: "POST",
                data: {
                    _token: token,
                    chat: chat,
                    room_id: room_id,
                    user_name: user_name,
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
