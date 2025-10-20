<?php
require "userdata.php";
function getAllData(){
    global $data;

    foreach($data as $row){
        $name = $row["firstname"] . " " . $row["lastname"];
        $email = $row["email"];
        $phone = $row["phone"];
        echo "<tr>";
    }
}

?>
