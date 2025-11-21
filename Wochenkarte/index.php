<?php
session_start();
use model\CookieHelper;
use model\User;
require "model/User.php";

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

        <?php
        include "model/CookieHelper.php";

        if (CookieHelper::isCookieSet("allowed")) {
        ?>

        <h2 class="mt-5 mb-3">Bitte anmelden</h2>

        <form id="form_login" method="post" action="">

            <div class="row">

                <div class="col-sm-6">
                    <label for="email">E-Mail</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           minlength="5"
                           maxlength="30"
                           required="required"
                           value=""
                    />
                </div>

            </div>

            <div class="row">

                <div class="col-sm-6">
                    <label for="password">Passwort</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           minlength="5"
                           maxlength="20"
                           required="required"
                           value=""
                    />
                </div>

            </div>

        </form>

            <?php
            }else {
            ?>

            <h2 class="mt-5 mb-3">Willkommen</h2>
            <p>Diese Website verwendet Cookies</p>
            <form method="post" action="">

                <input type="submit"
                       name="cookies"
                       class="btn btn-primary"
                       value="Akzeptieren"
                />

            </form>

            <?php
            if (isset($_POST['cookies'])) {
                CookieHelper::setCookie("allowed", "true");
            }
            ?>

            <?php
            }
            ?>



</div>
</body>
</html>
