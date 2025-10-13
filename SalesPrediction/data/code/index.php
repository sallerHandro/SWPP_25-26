<html>
<head>
    <title>Sales Prediction</title>
    <meta charset=utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
<div class="container">

    <h1 class="mt-5 mb-3">Sales Prediction</h1>

    <?php

    require "lib/func.php";

    $tv = "";
    $radio = "";
    $newspaper = "";

    if (isset($_POST["submit"])) {
        $tv = isset($_POST["tv"]) ? $_POST["tv"] : "";
        $radio = isset($_POST["radio"]) ? $_POST["radio"] : "";
        $newspaper = isset($_POST["newspaper"]) ? $_POST["newspaper"] : "";


        if (validateValues($tv, $radio, $newspaper)) {
            echo "<p class='alert alert-success'>Die eingegebenen Daten sind in Ordnung</p>";

            $data = array(
                    "tv" => $tv,
                    "radio" => $radio,
                    "newspaper" => $newspaper
            );


            $jsonData = json_encode($data);
            $ch = curl_init("http://127.0.0.1:5000/predict");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            $response = curl_exec($ch);
            curl_close($ch);

            $result = json_decode($response, true);
            echo "<p class='text-bg-success'> Vorhersage: " . $result['predicted_sales'] . "</p>";
        } else {
            echo "<div class='alert alert-danger'><p>Die eingegebenen Daten sind fehlerhaft</p><ul>";

            foreach ($errors as $error) {
                echo "<li>" . $error . "</li>";
            }
            echo "</ul></div>";
        }
    }

    ?>


    <form method="post" action="index.php">

        <div class="row">

            <div class="col-sm-12 mb-3">
                <label for="tv">Tv-Budget (in 1000 Dollar)</label>
                <input type="number"
                       step="0.01"
                       min="0"
                       required="required"
                       name="tv"
                       class="form-control"
                >
            </div>

        </div>

        <div class="row">

            <div class="col-sm-12 mb-3">
                <label for="radio">Radio-Budget (in 1000 Dollar)</label>
                <input type="number"
                       step="0.01"
                       min="0"
                       required="required"
                       name="radio"
                       class="form-control"
                >
            </div>

        </div>

        <div class="row">

            <div class="col-sm-12 mb-3">
                <label for="newspaper">Zeitung-Budget (in 1000 Dollar)</label>
                <input type="number"
                       step="0.01"
                       min="0"
                       required="required"
                       name="newspaper"
                       class="form-control"
                >
            </div>

        </div>

        <div class="row">

            <div class="col-sm-12 mb-3">
                <input type="submit"
                       name="submit"
                       value="Vorhersage der Umsätze"
                       class="btn btn-primary w-100">
            </div>

        </div>

    </form>

</div>






</body>
</html>

<?php
?>
