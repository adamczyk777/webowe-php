<?php
if(!file_exists('./blogs/'.$_POST['blogName'])) {
    mkdir('./blogs/'.$_POST['blogName'], 0755, true);
    $info = $_POST['username']."\n".md5($_POST['password'])."\n".$_POST['description'];
    file_put_contents('blogs/'.$_POST['blogName'].'/info.txt', $info);
    echo("Utworzono blog");
} else {
    echo("Katalog już istnieje :)");
}
header("refresh:5;url=blog.php?nazwa=" . $_POST['blogName']);
?>