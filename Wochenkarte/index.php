<?php

use model\CookieHelper;

session_start();
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

        if (CookieHelper::isCookieSet()) {
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

            <?php
            }else {
            ?>

            <h2 class="mt-5 mb-3">Willkommen</h2>
            <p>Diese Website verwendet Cookies</p>

            <?php
            }
            ?>

        </form>

</div>
</body>
</html>
