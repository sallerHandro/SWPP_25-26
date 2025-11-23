<?php
use model\User;

require_once "model/User.php";

session_start();
User::logout();
header("Location: index.php");
exit;
?>
