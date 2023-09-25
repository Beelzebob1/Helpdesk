<?php 
include 'php/config.php';
session_start();

if (isset($_SESSION['status']))
{
    destroySession();
    
    header('Location: index.php?page=mobiel');
    exit();
}
else {
    echo "<div class='main'><br />" .
          "You cannot log out because you are not logged in";
}

function destroySession() {
    $_SESSION = array();

    session_destroy();
}
?>
