<?php file_get_contents("header.html");
echo(file_get_contents("navigation.php")); ?>
<head>
	<title>Dodaj Wpis</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
</body>

</html>