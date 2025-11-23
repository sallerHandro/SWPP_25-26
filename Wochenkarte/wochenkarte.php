<?php
session_start();

use model\User;

require_once "model/User.php";

// Zugriffsschutz:
if (!User::isLoggedIn()) {
    header("Location: index.php");
    exit;
}
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

        <?php
        $tage = ["Montag","Dienstag","Mittwoch","Donnerstag","Freitag"];

        foreach ($tage as $tag): ?>
            <div class="col-md-4 col-sm-6 mb-4">
                <h3 class="day-title"><?= $tag ?></h3>
                <img src="https://picsum.photos/400/250?random=<?= rand(1,1000) ?>" class="menu-img">
            </div>
        <?php endforeach; ?>

    </div>
</div>

</body>
</html>
