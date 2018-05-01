<?php file_get_contents("header.html");
echo(file_get_contents("navigation.php")); ?>
<head>
	<title>Dodaj Wpis</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <link rel="stylesheet" type="text/css" href="index.css" />
    <script type="application/javascript" src="./messenger.js"></script>
	<script src="./dateFormatter.js"></script>
	<script src="./validateForm.js"></script>
	<script>
		console.log('test');
		var now = new Date();
		var date = getCurrentDate();
		var time = getCurrentTime();
		console.log(date);
		console.log(time);
		document.addEventListener("DOMContentLoaded", function(event) { 
			document.getElementById('dateInput').value = date;
			document.getElementById('timeInput').value = time;
			console.log(document.getElementById('dateInput'));
		});
	</script>
</head>

<body>
	<form method="POST" id="addBlog" onsubmit="return validateForm()" action="wpis.php" enctype="multipart/form-data">
		Nazwa użytkownika:<br>
		<input type="text" name="username" required><br>
		Hasło:<br>
		<input type="password" name="password" required><br>
		Wpis<br>
		<textarea name="text" required></textarea><br>
		Data:<br>
		<input id="dateInput" type="text" placeholder="RRRR-MM-DD" name="date" required><br>
		Czas:<br>
		<input id="timeInput" type="time" name="time" required><br>
		Załączniki:<br>
		Plik 1:<br>
		<input type="file" name="file1"><br>
		Plik 2:<br>
		<input type="file" name="file2"><br>
		Plik 3:<br>
		<input type="file" name="file3"><br>
		<input type="submit" value="Wyślij">
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