<?php 

//post data
$username = $_POST['username'];
print_r($username."<br>");
$password = md5($_POST['password']);
print_r($password."<br>");
print_r($_POST['password']."<br>");
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
            print_r($line1."<br>");
            $line2 = trim(fgets($file));
            print_r($line2."<br>");
            if ($line1 == $username && $line2 == $password) {
                //tu tworzymyplik
            }
        }
    }
    print_r('koniec'."<br>");
    
    // $local_uname = fgets($file);
    // $local_pass = md5(fgets($file));
    // if($local_uname == $username && $local_pass == $password) {
    //     $newfile = fopen("blogs/".$blogfile."/".$date."blg", 'w');
    //     file_put_contents('blogs/'.$blogfile.'/'.$date.'.blg', "heythere");
    // }
}
?>
