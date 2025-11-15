<?php
$host = "localhost";
$dbname = "rencehart";
$user = "root"; // palitan kung may ibang user ka
$pass = "";     // palitan kung may password ka

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
