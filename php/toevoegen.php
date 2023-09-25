<?php
    include 'config.php';
?>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = !empty($_POST['name']) ? trim($_POST['name']) : null;
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $status = !empty($_POST['status']) ? trim($_POST['status']) : null;


    $sql = "INSERT INTO users (name, email, username, password, status) VALUES (:name, :email, :username, :password, :status)";
    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
    $stmt->bindValue(':status', $status);
}
if ($stmt->execute()) {

    header('location: ../index.php?page=overzicht_a');
    exit();
} else {
    header('location: ../index.php?page=overzicht_a');
    echo 'Informatie klopt niet!';
    exit();
}
?>