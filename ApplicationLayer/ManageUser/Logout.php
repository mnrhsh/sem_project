<?php
session_start();
session_destroy();
unset($_SESSION["id"]);
unset($_SESSION["loggedin"]);
unset($_SESSION["status"]);
unset($_SESSION["user_id"]);
unset($_SESSION["name"]);
header("Location:../../ApplicationLayer/Home/Homepage.php");
?>