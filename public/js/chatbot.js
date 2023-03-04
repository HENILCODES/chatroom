$("#room-default-block").click(function () {
    $("#default-box").hide();
});
$("#chatbotText").on("keyup", function (element) {
    if (element.which == 13) {
        scrollBottom();
        $("#chatbotSend").click();
        $("#chatbotText").val("");
    }
});

$("#chatbotSend").click(function () {
    let API_KEY = $("#API_KEY").val();
    let chatbotText = $("#chatbotText").val();
    let chatbotType = $("#chatBotType").val();

    if (chatbotText.trim().length > 0) {
        readonlyInput(true);
        displayMessage("user", chatbotText);

        switch (chatbotType) {
            case "search":
                $.ajax("https://api.openai.com/v1/chat/completions", {
                    type: "POST",
                    async: true,
                    crossDomain: true,
                    headers: {
                        "Content-Type": "application/json",
                        Authorization: `Bearer ${API_KEY}`,
                    },
                    processData: false,
                    data: `{"model":"gpt-3.5-turbo","messages":[{"role":"user","content":"${chatbotText}"}],"temperature":0}`,
                    success: function (response) {
                        scrollBottom();
                        let role = response["choices"][0]["message"]["role"];
                        let message = response["choices"][0]["message"]["content"];
                        displayMessage(role, message);
                        readonlyInput(false);
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        errorMessageDisplay(errorMessage);
                    },
                });
                break;
            case "image":
                $.ajax("https://api.openai.com/v1/images/generations", {
                    type: "POST",
                    async: true,
                    crossDomain: true,
                    headers: {
                        "Content-Type": "application/json",
                        Authorization: `Bearer ${API_KEY}`,
                    },
                    processData: false,
                    data: `{"prompt":"${chatbotText}","n":1,"size":"1024x1024"}`,
                    success: function (response) {
                        scrollBottom();
                        let images = response["data"][0]["url"];
                        displayImages(images);
                        readonlyInput(false);
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        errorMessageDisplay(errorMessage);
                    },
                });
                break;
            case "mistakes":
                $.ajax("https://api.openai.com/v1/edits", {
                    type: "POST",
                    async: true,
                    crossDomain: true,
                    headers: {
                        "Content-Type": "application/json",
                        Authorization: `Bearer ${API_KEY}`,
                    },
                    processData: false,
                    data: `{"model":"text-davinci-edit-001","input":"${chatbotText}","instruction":"Fix the spelling mistakes"}`,
                    success: function (response) {
                        scrollBottom();
                        let text = response["choices"][0]["text"];
                        displayMessage("assistant", text);
                        readonlyInput(false);
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        errorMessageDisplay(errorMessage);
                    },
                });
                break;
        }
    }
});
function readonlyInput(value) {
    $("#chatbotText").attr("readonly", value);
}
function scrollBottom() {
    var $target = $("#msger-chat-bot");
    $target.animate({ scrollTop: $target.height() * 5 }, 1000); //use for scroll chat room
}
function displayImages(image) {
    $("#msger-chat-bot").append(
        `<div class="msg left-msg"><div class="msg-img shadow fw-bold" style="padding-top: 13px;padding-left:14px;background-image: url('http://127.0.0.1:8000/storage/profile/logo.png');"
        "></div> <div class="msg-bubble"> <div class="msg-info"> <div class="msg-info-name user-select-text"> ChatBot </div> <div class="msg-info-time user-select-text"></div> </div> <div class="msg-text user-select-text"> <img src="${image}" width="82%" ></div> </div> </div>`
    );
}
function errorMessageDisplay(message) {
    readonlyInput(false);
    $("#msger-chat-bot").append(
        `<div class="msg left-msg"><div class="msg-img shadow fw-bold" style="padding-top: 13px;padding-left:14px;background-image: url('http://127.0.0.1:8000/storage/profile/logo.png');"
        "></div> <div class="msg-bubble"> <div class="msg-info"> <div class="msg-info-name user-select-text"> ChatBot </div> <div class="msg-info-time user-select-text"></div> </div> <div class="msg-text user-select-text text-danger fw-bold">${message} </div> </div> </div>`
    );
}
function displayMessage(role, message) {
    $("#msger-chat-bot").append(
        `<div class="msg ${
            role === "assistant" ? "left-msg" : "right-msg" //check user name equal to session name
        }"><div class="msg-img shadow fw-bold" style="padding-top: 13px;padding-left:14px; ${
            role === "assistant"
                ? "background-image: url('http://127.0.0.1:8000/storage/profile/logo.png');"
                : "background-image: url('http://127.0.0.1:8000/storage/profile/Henil.jpeg');"
        }"></div> <div class="msg-bubble"><div class="msg-info"><div class="msg-info-name user-select-text">
        ${role === "assistant" ? "ChatBot" : ""}
        </div> <div class="msg-info-time user-select-text"></div> </div> <div class="msg-text user-select-text"> ${message.trim()} </div> </div> </div>`
    );
}
