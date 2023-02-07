<?php
error_reporting(1);
mysql_connect("localhost","root","");
mysql_select_db("Gidolia_G1mart");
session_start();
if (empty($_SESSION[id])){ header("location:login.php");}

?>