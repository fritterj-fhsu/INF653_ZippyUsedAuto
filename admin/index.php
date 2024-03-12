<?php
require_once '../model/vehicles_db.php';
require_once '../model/makes_db.php';
require_once '../model/types_db.php';
require_once '../model/classes_db.php';

$action = $_GET['action'] ?? 'default';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? $action;
}
$sort = $_GET['sort'] ?? 'price';

$view = $_GET['view'] ?? (isset($view) ? $view : 'vehicles');

$makes = getMakes();
$types = getTypes();
$classes = getClasses();

switch ($action) {
    case 'add_make':
        $newMakeName = $_POST['new_make'] ?? '';
        if (!empty($newMakeName)) {
            insertMake($newMakeName);
            $makes = getMakes();
        }
        header('Location: ' . $_SERVER['PHP_SELF'] . '?action=list_makes');
        exit();
        break;
    case 'delete_make':
        $makeId = $_POST['make_id'] ?? null;
        if (!empty($makeId)) {
            deleteMake($makeId);
            $makes = getMakes();
        }
        header('Location: ' . $_SERVER['PHP_SELF'] . '?action=list_makes');
        exit();
        break;
    case 'list_makes':
        $view = 'makes';
        break;
    case 'add_type':
        $newTypeName = $_POST['new_type'] ?? '';
        if (!empty($newTypeName)) {
            insertType($newTypeName);
            $types = getTypes();
        }
        header('Location: ' . $_SERVER['PHP_SELF'] . '?action=list_types');
        exit();
        break;
    case 'delete_type':
        $typeId = $_POST['type_id'] ?? null;
        if (!empty($typeId)) {
            deleteType($typeId);
            $types = getTypes();
        }
        header('Location: ' . $_SERVER['PHP_SELF'] . '?action=list_types');
        exit();
        break;
    case 'list_types':
        $view = 'types';
        break;
    case 'add_class':
        $newClassName = $_POST['new_class'] ?? '';
        if (!empty($newClassName)) {
            insertClass($newClassName);
            $classes = getClasses();
        }
        header('Location: ' . $_SERVER['PHP_SELF'] . '?action=list_classes');
        exit();
        break;
    case 'delete_class':
        $classId = $_POST['class_id'] ?? null;
        if (!empty($classId)) {
            deleteClass($classId);
            $classes = getClasses();
        }
        header('Location: ' . $_SERVER['PHP_SELF'] . '?action=list_classes');
        exit();
        break;
    case 'list_classes':
        $view = 'classes';
        break;
    case 'add_vehicle':
        $newYear = $_POST['new_year'] ?? '';
        $newMakeId = $_POST['new_make_id'] ?? '';
        $newModel = $_POST['new_model'] ?? '';
        $newTypeId = $_POST['new_type_id'] ?? '';
        $newClassId = $_POST['new_class_id'] ?? '';
        $newPrice = $_POST['new_price'] ?? '';
        if ($newYear && $newMakeId && $newModel && $newTypeId && $newClassId && $newPrice) {
            insertVehicle($newYear, $newModel, $newPrice, $newTypeId, $newClassId, $newMakeId);
        }
        header('Location: ' . $_SERVER['PHP_SELF'] . '?action=list_vehicles');
        exit();
        break;
    case 'delete_vehicle':
        $vehicle_id = $_POST['vehicle_id'] ?? null;
        if (!empty($vehicle_id)) {
            deleteVehicle($vehicle_id);
        }
        header('Location: ' . $_SERVER['PHP_SELF'] . '?action=list_vehicles');
        break;
    case 'list_vehicles':
    default:
        $make_id = ($_GET['make_id'] ?? 0) != 0 ? $_GET['make_id'] : null;
        $type_id = ($_GET['type_id'] ?? 0) != 0 ? $_GET['type_id'] : null;
        $class_id = ($_GET['class_id'] ?? 0) != 0 ? $_GET['class_id'] : null;

        if (isset($_GET['sort'])) {$sort = $_GET['sort'];}

        $vehicles = getVehicles($make_id, $type_id, $class_id);
        if ($sort === 'price') {
            usort($vehicles, function ($a, $b) {
                return $b['price'] - $a['price'];
            });
        } elseif ($sort === 'year') {
            usort($vehicles, function ($a, $b) {
                return $b['year'] - $a['year'];
            });
        }
        $view = 'vehicles';
        break;
}

switch($view) {
    case 'makes':
        $viewPath = 'view/makes_list.php';
        break;
    
    case 'types':
        $viewPath = 'view/types_list.php';
        break;
    
    case 'classes':
        $viewPath = 'view/classes_list.php';
        break;

    default:
        $viewPath = 'view/vehicles_list.php';
}

include 'view/header.php';
include $viewPath;
include 'view/footer.php';
?>