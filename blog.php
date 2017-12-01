<?php
include_once("navigation.php");
if(array_key_exists('nazwa', $_GET) && file_exists("blogs/" . $_GET['nazwa'] . "")) {
    $files = scandir("blogs/". $_GET['nazwa']);
    echo("<h1>".$_GET['nazwa']."</h1>");
    echo('<p>posty:</p>');
    $files = array_diff($files, array('.', '..', 'info.txt'));
    echo("<ul>");
    foreach($files as $post) {
        if(strlen($post) === 16) {
            echo("<li>");
            echo("<p>".file_get_contents("blogs/".$_GET['nazwa']."/".$post));
            echo("<br> załączniki:");
            echo("<br> komentarze:");
            echo("<br>");
            echo('<a href="./koment.php?postno='.$post."&blogname=".$_GET['nazwa'].'">Komentuj</a>');
            echo("</p>");
            echo("</li>");
        }
    }
    echo("</ul>");

} else {
    $blogs = scandir('blogs/');
    $blogs = array_diff($blogs, array('.', '..'));
    foreach($blogs as $blog) {
        $file = fopen("blogs/" . $blog . "/info.txt", "r");
        echo("<h1>" . $blog . "</h1>");
        echo("<p>Autor: " . fgets($file) . "</p>");
        fgets($file);
        echo("<p>Opis: " . fgets($file) . "</p>");
        echo('<a href="blog.php?nazwa='. $blog . '">Link</a>');
    }
}
?>