<?php
session_start();
unset($_SESSION['id-ad']);
unset($_SESSION['email-ad']);
header("Location:login.php");
?>

