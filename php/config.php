<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "helpdesk";

try {
    $conn = new PDO("mysql:host=$hostName;dbname=$dbName", $dbUser, $dbPassword);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}