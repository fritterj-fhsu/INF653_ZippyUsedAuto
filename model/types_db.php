<?php
require 'database.php';

function getTypes() {
    global $pdo;
    $sql = "SELECT * FROM types";
    $stmt = $pdo->query($sql);
    $types = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $typesArray = [];
    foreach ($types as $type) {
        $typesArray[$type['id']] = $type['type'];
    }
    return $typesArray;
}

function insertType($typeName) {
    global $pdo;

    $sql = "INSERT INTO types (type_name) VALUES (:typeName)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':typeName', $typeName, PDO::PARAM_STR);

    return $stmt->execute();
}

function deleteType($typeId) {
    global $pdo;

    $sql = "DELETE FROM types WHERE id = :typeId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':typeId', $typeId, PDO::PARAM_INT);

    return $stmt->execute();
}
?>