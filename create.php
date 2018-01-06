<?php 
file_get_contents("header.html");
include("navigation.php");
?>

<head>
	<title>Załóż Bloga</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <link rel="stylesheet" type="text/css" href="index.css" />
    <script type="application/javascript" src="./messenger.js"></script>
</head>

<body>
	<form method="POST" action="nowy.php" id="addBlog">
		Nazwa bloga:<br>
		<input type="text" name="blogName" required><br>
		Nazwa użytkownika:<br>
		<input type="text" name="username" required><br>
		Hasło:<br>
		<input type="password" name="password" required><br>
		Opis bloga:<br>
		<textarea name="description" required></textarea><br>
		<input type="submit">
		<input type="reset" value="Wyczyść">
	</form>

    <br/>
    <div class="chatContainer">
        <div class="userData">

            <p>Włącz Czat</p>
            <input id="chatActivator" type="checkbox" checked onclick="toggleChat(this)">

            <h1>CZAT</h1>

            <label>Imię:</label>
            <input id="nameField" type="text" name="name"><br/>

        </div>

        <div id="messages" class="chatConversation">

        </div>

        <div class="footer">
            <label>Wiadomość:</label>
            <textarea id="chatBox" name="message" placeholder="Co u Ciebie?"></textarea>
            <br><button id="sendButton" onclick="sendMessage(this)">> WYŚLIJ ></button>

        </div>
    </div>
</body>

</html>

