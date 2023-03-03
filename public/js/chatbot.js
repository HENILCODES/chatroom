$("#chatbotText").on("keyup", function (element) {
    if (element.which == 13) {
        scrollBottom();
        $("#chatbotSend").click();
        $("#chatbotText").val("");
        $("#chatbotText").attr("readonly", true);
    }
});

$("#chatbotSend").click(function () {
    let chatbotText = $("#chatbotText").val();
    if (chatbotText.trim().length > 0) {
        displayMessage("user", chatbotText);
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
                let message = response["choices"][0]["message"]["content"];
                displayMessage(role, message);
            },
            error: function (jqXhr, textStatus, errorMessage) {
                console.log("Error" + errorMessage);
            },
        });
    }
});
function scrollBottom(){
    var $target = $("#msger-chat-bot");
    $target.animate({ scrollTop: $target.height() * 5 }, 1000); //use for scroll chat room    
}
function displayMessage(role, message) {
    $("#msger-chat-bot").append(
        `<div class="msg ${
            role === "assistant" ? "left-msg" : "right-msg" //check user name equal to session name
        }"><div class="msg-img shadow fw-bold" style="padding-top: 13px;padding-left:14px;background-image: url('http://127.0.0.1:8000/storage/profile/logo.png');"></div> <div class="msg-bubble" style="max-width: 674px !important;"> <div class="msg-info"> <div class="msg-info-name user-select-text">
        ${role === "assistant" ? "ChatBot" : ""}
        </div> <div class="msg-info-time user-select-text"></div> </div> <div class="msg-text user-select-text"> ${message} </div> </div> </div>`
    );
}
