<?php file_get_contents("header.html"); ?>
<head>
	<title>Dodaj Wpis</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
</head>

<body>
	<form method="POST" id="addBlog" action="wpis.php" enctype="multipart/form-data">
		Nazwa użytkownika:<br>
		<input type="text" name="username" required><br>
		Hasło:<br>
		<input type="password" name="password" required><br>
		Wpis<br>
		<textarea name="text" required></textarea><br>
		Data:<br>
		<input type="date" name="date" required><br>
		Czas:<br>
		<input type="time" name="time" required><br>
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
</body>

</html>