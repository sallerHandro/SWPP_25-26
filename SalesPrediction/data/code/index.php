<html>
<head>
    <title>Sales Prediction</title>
    <meta charset=utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
<div class="container">

    <h1 class="mt-5 mb-3">Sales Prediction</h1>

    <form method="POST" action="index.php">

        <div class="row">

            <div class="col-12">
                <label for="tv">Tv-Budget (in 1000 Dollar)</label>
                <input type="number"
                       step="0.01"
                       min="1"
                       name="tv"
                       class="form-control"
                >
            </div>

        </div>

        <div class="row">

            <div class="col-12">
                <label for="radio">Radio-Budget (in 1000 Dollar)</label>
                <input type="number"
                       step="0.01"
                       min="1"
                       name="radio"
                       class="form-control"
                >
            </div>

        </div>

        <div class="row">

            <div class="col-12">
                <label for="newspaper">Zeitung-Budget (in 1000 Dollar)</label>
                <input type="number"
                       step="0.01"
                       min="1"
                       name="newspaper"
                       class="form-control"
                >
            </div>

        </div>

        <div class="row">

            <div class="col-12">
                <button type="submit" class="btn btn-primary w-100">Vorhersage der Ümsätze</button>
            </div>

        </div>

    </form>

</div>






</body>
</html>

<?php
?>
