<?php
$blog_folders = array_diff(scandir("blogs"), array(".", ".."));
$flag_already_exists = FALSE;
$blog_name = $_POST['blogName'];
$blog_name = strtolower($blog_name);
$blog_name = preg_replace("/[^a-zA-Z0-9]+/", "_", $blog_name);
foreach($blog_folders as $blog) {
    $file = fopen("blogs/" . $blog . "/" . "info.txt", "r");
    $line1 = trim(fgets($file)); //user
    $line2 = trim(fgets($file)); //pass
    if ($_POST['username'] == $line1 and md5($_POST['password']) == $line2) {
        $flag_already_exists = TRUE;
    }
}
if(!file_exists('./blogs/'.$blog_name) and !$flag_already_exists and $_POST['username'] != "" and $_POST['password'] != "" and $_POST['blogName'] != "") {
    mkdir('./blogs/'.$blog_name, 0755, true);
    $info = $_POST['username']."\n".md5($_POST['password'])."\n".$_POST['description'];
    file_put_contents('blogs/'.$blog_name.'/info.txt', $info);
    echo("Utworzono blog");
} else {
    echo("Katalog już istnieje, lub użytkownik posiada już bloga :)");
}
header("refresh:2;url=blog.php?nazwa=" . $_POST['blogName']);
?>