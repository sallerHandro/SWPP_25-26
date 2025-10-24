<?php
include "lib/userdata.php";

$searchText = isset($_POST['suche']) ? strtolower(trim($_POST['suche'])) : '';

$filteredData = [];

if (!empty($searchText)) {
    foreach ($data as $user) {
        $fullName = strtolower($user['firstname'] . ' ' . $user['lastname']);
        $email = strtolower($user['email']);
        if (strpos($fullName, $searchText) !== false ||
                strpos($email, $searchText) !== false) {
            $filteredData[] = $user;
        }
    }
} else {
    $filteredData = $data;
}
?>

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
                       name="suche" 
                       value="<?= htmlspecialchars($searchText) ?>">
            </div>

            <div class="col-1">
                <input type="submit" 
                       class="btn btn-primary"
                       value="Suchen">
            </div>

            <div class="col-1">
                <a href="index.php" class="btn btn-secondary">Leeren</a>
            </div>

        </div>
        <br>
        <div class="row">

            <div class="col-12">

                <table class="table table-bordered table-striped w-100 text-center">
                    <thead>
                    <tr class="table table-primary">
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Telefonnummer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($filteredData as $user): ?>
                        <tr>
                            <td>
                                <a href="lib/detail.php?id=<?= $user['id'] ?>" class="text-decoration-none">
                                    <?= htmlspecialchars($user['firstname']) . " " . htmlspecialchars($user['lastname']) ?>
                                </a>
                            </td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td><?= htmlspecialchars($user['phone']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>


        </div>

    </form>


</div>
</body>
</html>
