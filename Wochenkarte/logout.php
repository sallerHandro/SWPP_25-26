<?php
session_start();

use model\User;
require_once "model/User.php";

User::logout();
header("Location: index.php");
exit;
?>
