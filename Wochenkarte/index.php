<?php
session_start();

use model\CookieHelper;
use model\User;

require "model/User.php";
require "model/CookieHelper.php";

// =========================
// Login Logik
// =========================

$error = "";

// Wurde Cookie akzeptiert?
$cookieAllowed = CookieHelper::isCookieSet("allowed");

// Login-Formular abgeschickt?
if ($cookieAllowed && isset($_POST['login'])) {

    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    $user = User::get($email, $password);

    if ($user) {
        $user->login();
        header("Location: wochenkarte.php"); // interne Seite
        exit;
    } else {
        $error = "Ungültige E-Mail oder Passwort.";
    }
}

// Cookie neu setzen
if (isset($_POST['cookies'])) {
    CookieHelper::setCookie("allowed", "true", time() + 3600 * 24 * 7); // 1 Woche gültig
    header("Location: index.php");
    exit;
}

?>

<html>
<head>
    <meta charset="utf-8">
    <title>Wochenkarte</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <?php if ($cookieAllowed): ?>

        <div class="card shadow p-5 mx-auto" style="max-width:420px;">
            <h1 class="mb-4 text-center">Wochenkarte</h1>
            <h4 class="mb-4">Bitte anmelden</h4>

            <?php if (!empty($error)): ?>
                <small class="text-danger d-block mb-2">Zugangsdaten ungültig</small>
            <?php endif; ?>

            <form method="post" action="">
                <div class="mb-3">
                    <input type="email"
                           name="email"
                           placeholder="E-Mail"
                           class="form-control"
                           style="background:#fff9c4;"
                           required>
                </div>

                <div class="mb-3">
                    <input type="password"
                           name="password"
                           placeholder="Passwort"
                           class="form-control"
                           style="background:#fff9c4;"
                           required>
                </div>

                <button type="submit" name="login"
                        class="btn btn-primary w-100 py-2"
                        style="font-size:1.1rem;">
                    Anmelden
                </button>
            </form>
        </div>

    <?php else: ?>

        <div class="card shadow p-5 text-center mx-auto" style="max-width:420px;">
            <h1 class="mb-4">Wochenkarte</h1>

            <h3 class="mb-3">Willkommen</h3>
            <p>Diese Website verwendet Cookies.</p>

            <form method="post" action="">
                <button type="submit" name="cookies"
                        class="btn btn-warning px-5 py-2"
                        style="font-size:1.2rem;">
                    Akzeptieren
                </button>
            </form>
        </div>

    <?php endif; ?>

</div>
</body>
</html>
