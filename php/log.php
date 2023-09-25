<?php
session_start();
include 'config.php';

if (isset($_POST['submit'])) {
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $sql = "SELECT id, username, password, status FROM users WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);

    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['status'] == 'Admin' ) {
        $_SESSION['status'] = 'Admin';
        header('Location: ../index.php?page=tv');
        
        exit();
    } elseif ($user && $user['status'] == 'Klant') {
        $_SESSION['status'] = 'Klant';
        header('Location: ../index.php?page=mobiel');
        exit();
    } elseif($user && $user['status'] == 'ICT'){
        $_SESSION['status'] = 'ICT';
        header('Location: ../index.php?page=contact');

    } elseif($user && $user['status'] == 'Helpdesk'){
        $_SESSION['status'] = 'Helpdesk';
        header('Location: ../index.php?page=entertainment');

    }
     else {
        echo 'Informatie klopt niet!';
    }
}
?>