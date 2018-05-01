<?php file_get_contents("header.html"); ?>

<head>
    <title>Blogi</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <link rel="stylesheet" type="text/css" href="index.css" />
    <script type="application/javascript" src="./messenger.js"></script>
</head>
<body>
<?php
include_once("navigation.php");
if (array_key_exists('nazwa', $_GET) and file_exists("blogs/" . $_GET['nazwa']) and $_GET['nazwa'] !== "") {
    $files = scandir("blogs/" . $_GET['nazwa']);
    echo("<h1>" . $_GET['nazwa'] . "</h1>");
    echo('<p>posty:</p>');
    $files = array_diff($files, array('.', '..', 'info.txt'));
    echo("<ul>");
    foreach ($files as $post) {
        if (strlen($post) === 16) {
            echo("<li>");
            echo("<p>" . file_get_contents("blogs/" . $_GET['nazwa'] . "/" . $post));
            echo("<br> załączniki:");
            $attachments = scandir("blogs/" . $_GET['nazwa'] . "/");
            $attachments = preg_grep("/^(" . $post . ".\.).*/", $attachments);
            foreach ($attachments as $attachment) {
                echo('<a href="' . "blogs/" . $_GET['nazwa'] . "/" . $attachment . '" download>' . $attachment . '</a>');
            }
            echo("<br> komentarze:");
            if (file_exists("blogs/" . $_GET['nazwa'] . "/" . $post . ".k")) {
                $comments = array_diff(scandir("blogs/" . $_GET['nazwa'] . "/" . $post . ".k"), array('.', '..'));
                foreach ($comments as $comment) {
                    $file = fopen("blogs/" . $_GET['nazwa'] . "/" . $post . ".k/" . $comment, "r");
                    echo("<br>" . "Typ Komentarza: " . fgets($fuile) . ", Data dodania:" . fgets($file) . ", Autor: " . fgets($file) . ", Komentarz: " . fgets($file));
                }
            } else {
                echo("Nie zamieszczono jeszcze żadnych komentarzy");
            }
            echo("<br>");
            echo('<a href="./comment.php?postno=' . $post . "&blogname=" . $_GET['nazwa'] . '">Komentuj</a>');
            echo("</p>");
            echo("</li>");
        }
    }
    echo("</ul>");

} else if (array_key_exists('nazwa', $_GET) && !file_exists("blogs/" . $_GET['nazwa']) && $_GET['nazwa'] !== "") {
    echo("<br> nie ma takiego bloga");
    header("refresh:3;url=blog.php");
} else {
    $blogs = scandir("blogs/");
    $blogs = array_diff($blogs, array('.', '..'));
    foreach ($blogs as $blog) {
        $file = fopen("blogs/" . $blog . "/info.txt", "r");
        echo("<h1>" . $blog . "</h1>");
        echo("<p>Autor: " . fgets($file) . "</p>");
        fgets($file);
        echo("<p>Opis: " . fgets($file) . "</p>");
        echo('<a href="blog.php?nazwa=' . $blog . '">Link</a>');
    }
}
?>
<br/>
<div class="chatContainer">
    <div class="userData">

        <p>Włącz Czat</p>
        <input id="chatActivator" type="checkbox" checked onclick="toggleChat(this)">

        <h1>CZAT</h1>

        <label>Imię:</label>
        <input id="nameField" type="text" name="name"><br/>

    </div>

    <div id="messages" class="chatConversation">

    </div>

    <div class="footer">
        <label>Wiadomość:</label>
        <textarea id="chatBox" name="message" placeholder="Co u Ciebie?"></textarea>
        <br><button id="sendButton" onclick="sendMessage(this)">> WYŚLIJ ></button>

    </div>
</div>
</body>