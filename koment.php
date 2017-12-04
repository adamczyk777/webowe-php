<?php
//mock post
$blog_name = $_POST['blogname'];
$post_no = $_POST['postno'];
//edn mock
if(!file_exists("blogs/" . $blog_name . "/" . $post_no . ".k")) {
    mkdir("blogs/" . $blog_name ."/". $post_no . ".k");
}
$current_no = sizeof(scandir("blogs/" . $blog_name ."/". $post_no . ".k/")) - 2;
file_put_contents("blogs/" . $blog_name ."/". $post_no . ".k/".$current_no, 
    $_POST['commentType'] . "\n" . date("Y-m-d, H:i:s") . "\n" . $_POST['commenterName'] . "\n" . $_POST['comment']);
header("refresh:5;url=blog.php?nazwa=" . $blog_name);
?>