<?php
require "/userdata.php"; // <-- Holt das Array $data

// 1️⃣ ID aus URL holen
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// 2️⃣ Benutzer suchen
$user = null;
/*foreach ($data as $u) {
    if ($u['id'] === $id) {
        $user = $u;
        break;
    }
}

// 3️⃣ Ausgabe
if ($user) {
    echo "<h1>Benutzerdetails</h1>";
    echo "<p><strong>Name:</strong> {$user['firstname']} {$user['lastname']}</p>";
    echo "<p><strong>Email:</strong> {$user['email']}</p>";
    echo "<p><strong>Telefon:</strong> {$user['phone']}</p>";
    echo "<p><strong>Geburtsdatum:</strong> {$user['birthdate']}</p>";
    echo "<p><strong>Straße:</strong> {$user['street']}</p>";
} else {
    echo "<p>Kein Benutzer mit dieser ID gefunden.</p>";
}
?>
