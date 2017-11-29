<?php 

//post data
$username = $_POST['username'];
$password = md5($_POST['password']);
$date = $_POST['date'];
$time = $_POST['time'];
$file1 = $_POST['file1'];
$file2 = $_POST['file2'];
$file3 = $_POST['file3'];

$blogs = scandir("blogs/");
foreach($blogs as $path) {
    if($path != "." && $path != ".." && is_dir("blogs/" . $path)) {
        if($file = fopen("blogs/".$path."/info.txt", 'r')) {
            $line1 = trim(fgets($file));
            $line2 = trim(fgets($file));
            $line3 = trim(fgets($file));
            if ($line1 == $username && $line2 == $password) {
                $filename = "";
                $filename .= preg_replace("/-/", "", $date);
                $filename .= preg_replace("/:/", "", $time);
                $filename .= date("s");
                $filename .= rand(10, 99);
                if (file_put_contents("blogs/" . $path . "/" . $filename, $_POST['text']) === true) {
                    print_r("file written");
                } else {
                    echo("error");
                }
            }
        }
    }
}
?>
