<?php
require 'database.php';

function getMakes() {
    global $pdo;
    $sql = "SELECT * FROM makes";
    $stmt = $pdo->query($sql);
    $makes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $makesArray = [];
    foreach ($makes as $make) {
        $makesArray[$make['ID']] = $make['Make'];
    }
    return $makesArray;
}

function insertMake($makeName) {
    global $pdo;

    $sql = "INSERT INTO makes (Make) VALUES (:makeName)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':makeName', $makeName, PDO::PARAM_STR);

    return $stmt->execute();
}

function deleteMake($makeId) {
    global $pdo;

    $sql = "DELETE FROM makes WHERE id = :makeId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':makeId', $makeId, PDO::PARAM_INT);

    return $stmt->execute();
}
?>