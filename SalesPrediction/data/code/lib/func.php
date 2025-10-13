<?php

$errors = [];


function validateValues($tv, $radio, $newspaper){
    global $errors;

    if ($tv === "" || $radio === "" || $newspaper === ""){
        $errors[] = "Jedes Feld muss ausgefüllt sein!";
        return false;
    } elseif (!is_numeric($tv) || !is_numeric($radio) || !is_numeric($newspaper)){
        $errors[] = "Die Werte müssen Zahlen sein";
        return false;
    } elseif ($tv < 0 || $radio < 0 || $newspaper < 0){
        $errors[] = "Die Werte dürfen nicht im Minusbreich liegen!";
        return false;
    } else {
        return true;
    }
}

?>