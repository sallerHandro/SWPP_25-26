<?php
require "userdata.php";
function getAllUsers(){
    global $data;

    $ergebnis = [];

    foreach($data as $row){
        $ergebnis [] = [
            ['name'] => $row["firstname"] . " " . $row["lastname"],
            ["email"] => $row["email"],
            ["telefonnummer"] => $row["phone"]
        ];
        return $ergebnis;
    }
}



?>
