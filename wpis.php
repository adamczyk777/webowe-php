<?php 

//post data
$username = $_POST['username'];
$password = md5($_POST['password']);
$date = $_POST['date'];
$time = $_POST['time'];
$file1 = $_POST['file1'];
$file2 = $_POST['file2'];
$file3 = $_POST['file3'];

$blogs = scandir("./blogs");
foreach($blogs as $blogfile) {
    $file = fopen("./".$blogfile."/info.txt");
    $local_uname = fgets($file);
    $local_pass = md5(fgets($file));
    if($local_uname == $username && $local_pass == $password) {
        $newfile = fopen('./blogs/'.$blogfile.'/'.$date.'.blg', 'w');
        file_put_contents('./blogs/'.$blogfile.'/'.$date.'.blg', "heythere");
}
?>