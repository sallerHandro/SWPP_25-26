<?php
session_start();
use model\User;
require "model/User.php";

if (!User::isLoggedIn()) {
    header("Location:index.php");
    exit;
}

$bilder = [
    "Montag" => "https://picsum.photos/seed/m1/400/300",
    "Dienstag" => "https://picsum.photos/seed/m2/400/300",
    "Mittwoch" => "https://picsum.photos/seed/m3/400/300",
    "Donnerstag" => "https://picsum.photos/seed/m4/400/300",
    "Freitag" => "https://picsum.photos/seed/m5/400/300",
];
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Wochenkarte</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container py-3">

    <a href="logout.php" class="small mb-3 d-block">Logout</a>

    <h1 class="text-center mb-4">Wochenkarte</h1>

    <div class="row text-center">

        <?php foreach ($bilder as $tag => $url): ?>
            <div class="col-12 col-md-4 mb-4">
                <div class="card p-3 shadow-sm">
                    <h5 class="mb-2"><?= $tag ?></h5>
                    <img src="<?= $url ?>" class="img-fluid rounded">
                </div>
            </div>
        <?php endforeach; ?>

    </div>

</div>

</body>
</html>
