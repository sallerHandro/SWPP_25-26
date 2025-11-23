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

    <h1 class="mt-5 mb-3">Wochenkarte</h1>

    <?php if ($cookieAllowed): ?>

        <h2 class="mt-5 mb-3">Bitte anmelden</h2>

        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form id="form_login" method="post" action="">

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label for="email">E-Mail</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           minlength="5"
                           maxlength="30"
                           required
                    />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-6">
                    <label for="password">Passwort</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           minlength="5"
                           maxlength="20"
                           required
                    />
                </div>
            </div>

            <input type="submit"
                   name="login"
                   class="btn btn-primary"
                   value="Anmelden"
            />

        </form>

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
