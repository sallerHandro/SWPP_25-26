<?php

$errors = [];


function validateValues($tv, $radio, $newspaper){
    global $errors;
    $errors = []; // evtl. alte Fehler leeren

    // Leerprüfung
    if ($tv === "" || $radio === "" || $newspaper === "") {
        $errors[] = "Jedes Feld muss ausgefüllt sein!";
    }

    // Numerisch-Prüfung
    if (!is_numeric($tv) || !is_numeric($radio) || !is_numeric($newspaper)) {
        $errors[] = "Alle Werte müssen numerisch sein!";
    }

    // Negativ-Prüfung
    if ($tv < 0 || $radio < 0 || $newspaper < 0) {
        $errors[] = "Die Werte dürfen nicht im Minusbereich liegen!";
    }

    // Rückgabe abhängig von vorhandenen Fehlern
    return empty($errors);
}

?>