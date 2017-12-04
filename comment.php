<?php
	echo(file_get_contents("header.html"));
	$post = $_GET['postno'];
	$blog = $_GET['blogname'];
?>
<head>
	<title>Komentarz</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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

</body>

</html>