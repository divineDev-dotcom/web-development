<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
</head>
<body>
    <div id="chat-box">
        <div id="chat-messages"></div>
        <input type="text" id="name" placeholder="Your Name">
<br/>
        <input type="text" id="message" placeholder="Type your message...">
<br/>
        <button onclick="sendMessage()">Send</button>
<br/>
<button id="clearChatBtn" onclick="clearChat()">Clear Chat</button>
    </div>
    <script src="script.js"></script>
</body>
</html>