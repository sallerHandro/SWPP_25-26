<?php
session_start();

use model\CookieHelper;
use model\User;

require_once "model/CookieHelper.php";
require_once "model/User.php";
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Wochenkarte</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body { background: #f2f2f2; }
        .card {
            max-width: 450px;
            margin: 70px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.2);
        }
        input.form-control { background: #fff7cc; }
    </style>
</head>

<body>
<div class="container">

    <div class="card">
        <h3 class="text-center">Wochenkarte</h3>

        <?php

        if (!CookieHelper::isCookieSet("allowed")) {
            ?>
            <h4 class="mt-4">Willkommen</h4>
            <p>Diese Website verwendet Cookies.</p>

            <form method="post">
                <button class="btn btn-warning btn-lg w-100" name="accept">Akzeptieren</button>
            </form>

            <?php
            if (isset($_POST["accept"])) {
                CookieHelper::setCookie("allowed", "true");
                header("Location: index.php");
                exit;
            }

        } else {

            // LOGIN PROCESSING
            $error = "";

            if (!empty($_POST["email"]) && !empty($_POST["password"])) {
                $user = User::get($_POST["email"], $_POST["password"]);

                if ($user) {
                    $user->login();
                    header("Location: wochenkarte.php");
                    exit;
                } else {
                    $error = "E-Mail oder Passwort falsch.";
                }
            }
            ?>

            <h4 class="mt-4 mb-3">Bitte anmelden</h4>

            <form method="post">

                <label class="mt-2">E-Mail</label>
                <input type="email" class="form-control" name="email" required>

                <label class="mt-3">Passwort</label>
                <input type="password" class="form-control" name="password" required>

                <?php if ($error): ?>
                    <div class="alert alert-danger mt-3"><?= $error ?></div>
                <?php endif; ?>

                <button class="btn btn-primary btn-lg w-100 mt-4">Anmelden</button>
            </form>

        <?php } ?>

    </div>

</div>
</body>
</html>
