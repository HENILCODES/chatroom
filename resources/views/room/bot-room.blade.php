<section class="right-box" style="display: none;" id="right-bot-box">
    <section class="msger">
        <header class="msger-header">
            <div class="msger-header-title d-flex">
                <div class="group-img"><img src="storage/profile/room/logo.png"></div>
                <span class="ms-3 fw-bold fs-4 user-select-text"> ChatBot</span> <i
                    class="bi bi-patch-check-fill fs-4 ms-2 text-primary"></i>
            </div>
        </header>
        <main class="msger-chat" id="msger-chat-bot">
            <input type="hidden" value="{{ env('OPENAI_API_KEY') }}" id="API_KEY">
        </main>
        <div class="msger-inputarea">
            <select name="" class="control-select" id="chatBotType">
                <option value="search">/search</option>
                <option value="image">/image</option>
                <option value="mistakes">/spelling</option>
            </select>
            {{ Form::text('chat', '', ['class' => 'msger-input shadow', 'id' => 'chatbotText', 'autofocus' => true, 'placeholder' => 'hello .... ', 'autocomplete' => 'off']) }}
            <button class="msger-send-btn shadow" id="chatbotSend"><i
                    class="bi bi-send-fill fs-6"></i></button>
        </div>
        <script src="{{ url('js/chatbot.js') }}"></script>
    </section>
</section>