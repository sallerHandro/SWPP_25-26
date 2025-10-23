<?php
include "userdata.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

$person = null;
foreach ($data as $user) {
    if (isset($user['id']) && $user['id'] === $id) {
        $person = $user;
        break;
    }
}

if ($person === null) {
    echo "<p>Person nicht gefunden.</p>";
    exit;
}
?>

<html>
<head>
    <title>Detailansicht</title>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" />
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-3">Detailansicht</h1>

        <div class="row">
            <div class="col-12 mb-3">
                <a href="../index.php" class="btn btn-secondary">Zurück zur Übersicht</a>
            </div>
        </div>

        <div class="row">

            <div class="col-12">

                <table class="table table-bordered table-striped w-100">
                    <tr>
                        <th>Vorname</th>
                        <td><?= htmlspecialchars($person['firstname']) ?></td>
                    </tr>
                    <tr>
                        <th>Nachname</th>
                        <td><?= htmlspecialchars($person['lastname']) ?></td>
                    </tr>
                    <tr>
                        <th>E-Mail</th>
                        <td><?= htmlspecialchars($person['email']) ?></td>
                    </tr>
                    <tr>
                        <th>Telefon</th>
                        <td><?= htmlspecialchars($person['phone']) ?></td>
                    </tr>
                    <tr>
                        <th>Geburtsdatum</th>
                        <td><?= htmlspecialchars($person['birthdate']) ?></td>
                    </tr>
                    <tr>
                        <th>Straße</th>
                        <td><?= htmlspecialchars($person['street']) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
