<?php
session_start();
unset($_SESSION[id]);
unset($_SESSION[password]);
header("location:login.php");
?>
