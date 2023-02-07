<?php

if(isset($_POST["login"]))	
{
include "config.php";
$q="select * from distributor where d_id='$_POST[id]' and password='$_POST[password]'";
$res=mysql_query($q);
$c=mysql_num_rows($res);
if($c!=0)
{
$_SESSION["id"]=$_POST["id"];
$_SESSION["password"]=$_POST["password"];

header("location:index.php");

}
else
{

echo "<script>alert('Invalid user name or Password');
location.href='login.php';</script>";
}
}
if(isset($_POST["loginaccount"]))	
{
	include "config.php";
	$q="select * from distributor where d_id='$_POST[id]' and password='$_POST[password]'";
	$res=mysql_query($q);
	$c=mysql_num_rows($res);
	if($c!=0)
	{
		$_SESSION["id"]=$_POST["id"];
		$_SESSION["password"]=$_POST["password"];

		
		header("location:../user");
	}
	else
	{
		echo "<script>alert('Invalid user name or Password');
		location.href='login.php';</script>";
	}
}
if(isset($_POST["logincheck"]))	
{
include "config.php";
$q="select * from distributor where d_id='$_POST[id]' and password='$_POST[password]'";
$res=mysql_query($q);
$c=mysql_num_rows($res);
if($c!=0)
{
$_SESSION["id"]=$_POST["id"];
$_SESSION["password"]=$_POST["password"];

header("location:checkout.php");

}
else
{

echo "<script>alert('Invalid user name or Password');
location.href='login.php';</script>";
}
}

?>