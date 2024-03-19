<?php
$host = "icopoghru9oezxh8.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "xt6horhpk9vxvanq";
$password = "ssbi522j99c93g56";
$database = "zb1rp9uqnkb75pya";

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$database";
    $pdo = new PDO($dsn, $username, $password);
    // Set PDO to throw exceptions on error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $error_message = "Database Error: " . $e->getMessage();
    include('view/error.php');
    exit();
}
?>
