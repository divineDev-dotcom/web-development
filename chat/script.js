function loadChat() {
    const chatMessages = document.getElementById("chat-messages");
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "getMessages.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            chatMessages.innerHTML = xhr.responseText;
        }
    };
    xhr.send();
}
setInterval(loadChat, 3000);
function sendMessage() {
    const name = document.getElementById("name").value;
    const message = document.getElementById("message").value;
    if (name === "" || message === "") {
        alert("Please enter your name and message.");
        return;
    }
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "sendMessage.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("message").value = "";
            loadChat();
        }
    };
    xhr.send(`name=${name}&message=${message}`);
}

function clearChat() {
    const name = document.getElementById("name").value;
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "clearChat.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Reload the chat to reflect the cleared chat history
            loadChat();
        }
    };
    xhr.send(`name=${name}`);
}

window.onload = loadChat;
