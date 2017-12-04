<?php 

//post data
$username = $_POST['username'];
$password = md5($_POST['password']);
$date = $_POST['date'];
$time = $_POST['time'];
$blogs = scandir("blogs/");
// iteracja po wszystkich blogach i szukanie takiego aby nazwa uzytkownika zgadzała sie z tym co chcemy znalezc
foreach($blogs as $path) {
    if($path != "." && $path != ".." && is_dir("blogs/" . $path)) {
        if($file = fopen("blogs/".$path."/info.txt", 'r')) {
            // czytanie pierwszych trzech linijek pliku info
            $line1 = trim(fgets($file));
            $line2 = trim(fgets($file));
            $line3 = trim(fgets($file));
            if ($line1 == $username && $line2 == $password) {
                // sklejanie nazwy pliku ze wpisem
                $filename = "";
                $filename .= preg_replace("/-/", "", $date);
                $filename .= preg_replace("/:/", "", $time);
                $filename .= date("s");
                $filename .= rand(10, 99);
                if (file_put_contents("blogs/" . $path . "/" . $filename, $_POST['text']) === false) {
                    echo("Błąd zapisu do pliku");
                } else {
                    $counter = 0;
                    foreach($_FILES as $uploadedFile) {
                        if ($uploadedFile['error'] === 0) {
                            $info = pathinfo($uploadedFile['name']);
                            $uploadedName = $filename . $counter . "." .$info['extension'];
    
                            $targetLocation = "blogs/" . $path . "/" . $uploadedName;
                            move_uploaded_file($uploadedFile['tmp_name'], $targetLocation);
                            $counter += 1;
                        }
                    }
                }
                echo("Dodano Wpis");
            }
        }
    }
}
header("refresh:5;url=blog.php");
?>
