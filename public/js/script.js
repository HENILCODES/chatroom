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
                data.forEach((element) => {
                    $("#chat-box").append(
                        `<div class="bg-info my-3" style="width: 200px;"><span>${element["users_id"]}</span><br> <span>${element["chat"]}</span><br> <span>${element["created_at"]}</span> </div>`
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
        
        $.ajax("http://127.0.0.1:8000/send", {
            type: "POST",
            data: {
                _token: token,
                chat: chat,
                rooms_name: room_name,
                users_id: 1,
            },
            success: function () {
                $("#chat").val("");
                getData();
            },
            error: function (jqXhr, textStatus, errorMessage) {
                console.log("Error :" + errorMessage);
            },
        });
    }
});
