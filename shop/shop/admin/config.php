<?php
error_reporting(1);
session_start();
mysql_connect("localhost","root","")or die("database not connected");
mysql_select_db("G1focus")or die("database not selected");
if (empty($_SESSION[sdidg1mart]) and empty($_SESSION[sdpasswordg1mart]))
{ header("location:login.php");}
elseif($_SESSION[sdidg1mart]!="Gidolia50750" and $_SESSION[sdpasswordg1mart]!="Gidolia507501866")
{ header("location:login.php");}else
date_default_timezone_set('Asia/Calcutta');
$time=date("h:i:sa");
$date=date("Y-m-d");
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
mysql_query("INSERT INTO `site_open_info` (`url`, `date`, `time`, `session_id`) VALUES ('$url', '$date', '$time', '$_SESSION[id]')");

?>