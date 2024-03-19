<?php

if (strpos($_SERVER['REQUEST_URI'], '/admin') !== false) {
    include 'admin/index.php';
    exit();
}

require_once 'model/vehicles_db.php';
require_once 'model/makes_db.php';
require_once 'model/types_db.php';
require_once 'model/classes_db.php';

$make_id = $_GET['make_id'] ?? null;
$type_id = $_GET['type_id'] ?? null;
$class_id = $_GET['class_id'] ?? null;
$sort = $_GET['sort'] ?? 'price';

if (isset($_GET['submit'])) {
    $make_id = ($_GET['make_id'] ?? 0) != 0 ? $_GET['make_id'] : null;
    $type_id = ($_GET['type_id'] ?? 0) != 0 ? $_GET['type_id'] : null;
    $class_id = ($_GET['class_id'] ?? 0) != 0 ? $_GET['class_id'] : null;
    if (isset($_GET['sort'])) { $sort = $_GET['sort'];}

    $vehicles = getVehicles($make_id, $type_id, $class_id);
} else {
    $vehicles = getVehicles();
}

if ($sort === 'price') {
    usort($vehicles, function ($a, $b) {
        return $b['price'] - $a['price'];
    });
} elseif ($sort === 'year') {
    usort($vehicles, function ($a, $b) {
        return $b['year'] - $a['year'];
    });
}

$makes = getMakes();
$types = getTypes();
$classes = getClasses();

include 'view/vehicles_list.php';
?>
