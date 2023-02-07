<?php 
include "config.php";
if (isset($_GET[send]))
{
$ins="INSERT INTO contact(name,email,mobile,message) VALUES ('$_GET[name]','$_GET[email]','$_GET[mobile]','$_GET[message]')";
mysql_query($ins);
						echo "<script>alert('Message Sended');
location.href='contact.php';</script>";

}
?>
