<?php
echo('<pre>');

print_r($_GET);

if(array_key_exists('nazwa', $_GET)) {
    print_r($_GET['nazwa']);
} else {
    $blogs = scandir('blogs/');
    $blogs = array_diff($blogs, array('.', '..'));
    foreach($blogs as $blog) {
        print_r(scandir("blogs/" . $blog . "/"));
    }
}

?>