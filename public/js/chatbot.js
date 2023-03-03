$("#chatbotText").on("keyup", function (element) {
    if (element.which == 13) {
        scrollBottom();
        $("#chatbotSend").click();
        $("#chatbotText").val("");
    }
});

$("#chatbotSend").click(function () {
    let chatbotText = $("#chatbotText").val();
    let chatbotType = $("#chatBotType").val();
    if (chatbotText.trim().length > 0) {
        $("#chatbotText").attr("readonly", true);
        displayMessage("user", chatbotText);
        switch (chatbotType) {
            case "search":
                $.ajax("https://api.openai.com/v1/chat/completions", {
                    type: "POST",
                    async: true,
                    crossDomain: true,
                    headers: {
                        "Content-Type": "application/json",
                        Authorization:
                            "Bearer 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",
                    },
                    processData: false,
                    data: `{"model":"gpt-3.5-turbo","messages":[{"role":"user","content":"${chatbotText}"}],"temperature":0}`,
                    success: function (response) {
                        scrollBottom();
                        $("#chatbotText").attr("readonly", false);
                        let role = response["choices"][0]["message"]["role"];
                        let message =
                            response["choices"][0]["message"]["content"];
                        displayMessage(role, message);
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        console.log("Error" + errorMessage);
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
                        Authorization:
                            "Bearer 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",
                    },
                    processData: false,
                    // data: `{"prompt":"A cute baby sea otter","n":2,"size":"1024x1024"}`,
                    data: `{"prompt":"${chatbotText}","n":1,"size":"1024x1024"}`,
                    success: function (response) {
                        scrollBottom();
                        $("#chatbotText").attr("readonly", false);
                        let images =response["data"][0]["url"];
                        displayImages(images);
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        console.log("Error" + errorMessage);
                    },
                });
        }
    }
});
function scrollBottom() {
    var $target = $("#msger-chat-bot");
    $target.animate({ scrollTop: $target.height() * 5 }, 1000); //use for scroll chat room
}
function displayImages(image) {
    $("#msger-chat-bot").append(
        `<div class="msg left-msg"><div class="msg-img shadow fw-bold" style="padding-top: 13px;padding-left:14px;background-image: url('http://127.0.0.1:8000/storage/profile/logo.png');"
        "></div> <div class="msg-bubble" style="max-width: 674px !important;"> <div class="msg-info"> <div class="msg-info-name user-select-text"> ChatBot </div> <div class="msg-info-time user-select-text"></div> </div> <div class="msg-text user-select-text"> <img src="${image}" width="85%" ></div> </div> </div>`
    );
}
function displayMessage(role, message) {
    $("#msger-chat-bot").append(
        `<div class="msg ${
            role === "assistant" ? "left-msg" : "right-msg" //check user name equal to session name
        }"><div class="msg-img shadow fw-bold" style="padding-top: 13px;padding-left:14px; ${
            role === "assistant"
                ? "background-image: url('http://127.0.0.1:8000/storage/profile/logo.png');"
                : "background-image: url('http://127.0.0.1:8000/storage/henil.jpg');"
        }"></div> <div class="msg-bubble" style="max-width: 674px !important;"> <div class="msg-info"> <div class="msg-info-name user-select-text">
        ${role === "assistant" ? "ChatBot" : ""}
        </div> <div class="msg-info-time user-select-text"></div> </div> <div class="msg-text user-select-text"> <pre class='pre'> ${message} </pr></div> </div> </div>`
    );
}
