<?php

echo('<pre>');
print_r('koment.php');
//mock post
$blog_name = 'kuba';
$post_no = '1911111111115565';
//edn mock
if(!file_exists("blogs/" . $blog_name . $post_no)) {
    mkdir("blogs/" . $blog_name ."/". $post_no . ".k");
}

?>