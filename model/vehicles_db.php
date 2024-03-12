<?php
require 'database.php';

function getVehicles($make = null, $type = null, $class = null) {
    global $pdo;

    $sql = "SELECT * FROM vehicles WHERE 1";

    if ($make !== null) {
        $sql .= " AND make_id = :make";
    }
    if ($type !== null) {
        $sql .= " AND type_id = :type";
    }
    if ($class !== null) {
        $sql .= " AND class_id = :class";
    }

    $stmt = $pdo->prepare($sql);

    if ($make !== null) {
        $stmt->bindParam(':make', $make, PDO::PARAM_INT);
    }
    if ($type !== null) {
        $stmt->bindParam(':type', $type, PDO::PARAM_INT);
    }
    if ($class !== null) {
        $stmt->bindParam(':class', $class, PDO::PARAM_INT);
    }

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertVehicle($year, $model, $price, $typeId, $classId, $makeId) {
    global $pdo;

    $sql = "INSERT INTO vehicles (year, model, price, type_id, class_id, make_id) VALUES (:year, :model, :price, :typeId, :classId, :makeId)";
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':year', $year, PDO::PARAM_INT);
    $stmt->bindParam(':model', $model, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    $stmt->bindParam(':typeId', $typeId, PDO::PARAM_INT);
    $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);
    $stmt->bindParam(':makeId', $makeId, PDO::PARAM_INT);

    return $stmt->execute();
}

function deleteVehicle($vehicleId) {
    global $pdo;

    $sql = "DELETE FROM vehicles WHERE ID = :vehicleId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':vehicleId', $vehicleId, PDO::PARAM_INT);

    return $stmt->execute();
}
?>