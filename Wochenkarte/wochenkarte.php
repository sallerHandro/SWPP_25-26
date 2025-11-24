<?php
session_start();

use model\User;

require_once "model/User.php";

if (!User::isLoggedIn()) {
    header("Location: index.php");
    exit;
}

$bilder = [
    "Montag" => "img\burger.jpeg",
    "Dienstag" => "img\schnitzel.jpeg",
    "Mittwoch" => "img\spaghetti.jpeg",
    "Donnerstag" => "img\pizza.jpeg",
    "Freitag" => "img\kaiserschmarrn.jpeg",
];
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Wochenkarte</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
        .menu-img { width: 100%; border-radius: 12px; }
        .day-title { font-size: 22px; margin-top: 20px; }
        .logout { font-size: 18px; }
    </style>
</head>

<body class="p-4">

<div class="container">

    <a class="logout" href="logout.php">← Logout</a>

    <h1 class="mt-3 mb-4">Wochenkarte</h1>

    <div class="row">

        <?php foreach ($bilder as $tag => $gericht): ?>
            <div class="col-12 col-md-4 mb-4">
                <div class="card p-3 shadow-sm">
                    <h5 class="mb-2"><?= $tag ?></h5>
                    <img src="<?= $gericht ?>" class="img-fluid rounded">
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

</body>
</html>
