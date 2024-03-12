<?php
require 'database.php';

function getClasses() {
    global $pdo;
    $sql = "SELECT * FROM classes";
    $stmt = $pdo->query($sql);
    $classes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $classesArray = [];
    foreach ($classes as $class) {
        $classesArray[$class['ID']] = $class['Class'];
    }
    return $classesArray;
}

function insertClass($className) {
    global $pdo;

    $sql = "INSERT INTO classes (Class) VALUES (:className)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':className', $className, PDO::PARAM_STR);

    return $stmt->execute();
}

function deleteClass($classId) {
    global $pdo;

    $sql = "DELETE FROM classes WHERE ID = :classId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':classId', $classId, PDO::PARAM_INT);

    return $stmt->execute();
}
?>