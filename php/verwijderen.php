<?php
include 'config.php';

if (isset($_POST['delete'])) {
    $userId = $_POST['delete'];

    $deleteSql = "DELETE FROM users WHERE id = :id";
    $deleteStmt = $conn->prepare($deleteSql);
    $deleteStmt->bindParam(':id', $userId);

    if ($deleteStmt->execute()) {
        header("Location: ".$_SERVER['REQUEST_URI']);
        exit();
    } else {
        header('Location: ../index.php?page=overzicht_a');
        echo 'Something went wrong!';
        exit();
    }
} else {
    header('Location: ../index.php?page=overzicht_a');
    exit();
}
?>
