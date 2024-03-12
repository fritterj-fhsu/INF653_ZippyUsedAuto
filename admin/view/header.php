<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy Admin</title>
    <link rel="stylesheet" type="text/css" href="../view/css/main.css">
</head>

<body>
    <header>
        <h1 class="container"><a href="index.php">Zippy Admin</a></h1>
        <hr>
    </header>
    <nav class="navbar">
        <ul>
            <li><a href="index.php?view=vehicles&action=list_vehicles" class="<?= $view === 'vehicles' ? 'active' : '' ?>">Vehicles</a></li>
            <li><a href="index.php?view=makes&action=list_makes" class="<?= $view === 'makes' ? 'active' : '' ?>">Makes</a></li>
            <li><a href="index.php?view=types&action=list_types" class="<?= $view === 'types' ? 'active' : '' ?>">Types</a></li>
            <li><a href="index.php?view=classes&action=list_classes" class="<?= $view === 'classes' ? 'active' : '' ?>">Classes</a></li>
        </ul>
    </nav>
    <div class="container">