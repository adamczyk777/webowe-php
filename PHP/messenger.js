// Funkcje dla czatu
document.addEventListener("DOMContentLoaded", function (event) {
    getMessagesFromFile('chatConversationData', document.getElementById('messages'));
});

function sendMessage() {
    console.log("wyslane");
    var name = document.getElementById('nameField').value;
    var text = document.getElementsByName('message')[0].value;
    var message = name + ': ' + text;
    postMessage(message);
}

function postMessage(message) {
    var xhttp = new XMLHttpRequest();
    xhttp.open('POST', 'chatHandler.php', true);
    message = 'message=' + message;
    // when ajax executed
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            getMessagesFromFile('chatConversationData', document.getElementById('messages'));
        }
    };
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(message);
}

function getMessagesFromFile(file, target) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", file, true);
    xhttp.setRequestHeader("Cache-Control", "no-cache");
    xhttp.send();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            target.innerHTML = printMessages(this.responseText);
        }
    }
}

function printMessages(messagesString) {
    var splitedMesseges = messagesString.split(/\r?\n/);
    for (var i = 0; i < splitedMesseges.length; i++) {
        splitedMesseges[i] = '<div class="singleMessage">' + splitedMesseges[i] + '</div>';
    }

    return splitedMesseges.join("\n");
}

function toggleChat(checkbox) {
    if (checkbox.checked) {
        enableChat();
    } else {
        disableChat();
    }
}

function disableChat() {
    document.getElementById("nameField").disabled = true;
    document.getElementById("chatBox").disabled = true;
    document.getElementById("sendButton").onclick = null;
}

function enableChat() {
    document.getElementById("nameField").disabled = false;
    document.getElementById("chatBox").disabled = false;
    document.getElementById("sendButton").onclick = sendMessage;
}