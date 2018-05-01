<?php
/**
 * Created by IntelliJ IDEA.
 * User: jadamczyk
 * Date: 06/01/2018
 * Time: 11:14
 */

print_r($_POST['message']);
file_put_contents("chatConversationData", $_POST['message'] . "\n", FILE_APPEND);

