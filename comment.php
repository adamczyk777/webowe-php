<?php
	echo(file_get_contents("header.html"));
	echo(file_get_contents("navigation.php"));
	$post = $_GET['postno'];
	$blog = $_GET['blogname'];
?>
<head>
	<title>Komentarz</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <link rel="stylesheet" type="text/css" href="index.css" />
    <script type="application/javascript" src="./messenger.js"></script>
</head>

<body>
	<form method="post" action="koment.php">
		Typ komentarza:<br>
		<select name="commentType" id="selectType">
			<option value="negative">Negatywny</option>
			<option selected="selected" value="neutral">Neutralny</option>
			<option value="positive">Pozytywny</option>
		</select><br>
		Komentarz:<br>
		<textarea name="comment"></textarea><br>
		Imię/Pseudonim/Nazwisko:<br>
		<input type="text" name="commenterName"><br>
		<input type="hidden" name="postno" value="<?php echo($post)?>" />
		<input type="hidden" name="blogname" value="<?php echo($blog)?>" />
		<input type="submit" value="Skomentuj">
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