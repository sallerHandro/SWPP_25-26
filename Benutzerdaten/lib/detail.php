<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id === null || !isset($personen[$id])) {
    echo "<p>Person nicht gefunden.</p>";
    exit;
}

$person = $data[$id];
?>



<html>
<head>
    <title>Detailansicht</title>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
</head>
<body>

    <div class="container">
        <h1 class="mt-5 mb-3">Detailansicht</h1>

        <div class="row">
            <div class="col-1">
                <a href="index.php" class="link-primary text-decoration-none">zurück</a>
            </div>

        </div>

        <div class="row">
            <?php
            include "userdata.php"


            ?>
            <div class="col-12">
                <table class="table table-bordered">
                    <?php foreach ($data as $feld => $wert): ?>
                        <tr>
                            <th><?= htmlspecialchars($feld) ?></th>
                            <td><?= htmlspecialchars($wert) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>

        </div>
    </div>


</body>
</html>
