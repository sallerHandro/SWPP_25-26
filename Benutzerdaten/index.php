<html>
<head>
    <title>Benutzerdaten</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">

        <h1 class="mt-5 mb-3">Benutzerdaten</h1>

        <form method="post">

            <div class="row">

                <div class="col-1">
                    <label for="suche" class="col-form-label">Suche: </label>
                </div>

                <div class="col-4">
                    <input type="text"
                           class="form-control"
                           id="suche"
                           name="suche">
                </div>

                <div class="col-1">
                    <input type="submit"
                           class="btn btn-primary"
                           value="Suchen">
                </div>

                <div class="col-1">
                    <a href="index.php" class="btn btn-secondary btn-block">Leeren</a>
                </div>

            </div>
        <br>
            <div class="row">
                <table class="table table-primary">
                    <tr class="table table-primary">
                        <th class="table table-primary">Name</th>
                        <th class="table table-primary">E-Mail</th>
                        <th class="table table-primary">Telefonnummer</th>
                    </tr>
                    <tr class="table table-primary">
                        <?php
                            require func.php;
                            require userdata.php;

                            foreach ($data as $row) {
                                echo "<tr>";
                            }

                        ?>
                    </tr>
                </table>

            </div>

        </form>



    </div>
</body>
</html>
