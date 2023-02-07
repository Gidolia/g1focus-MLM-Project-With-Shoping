<?php 
include "config.php";
if (isset($_GET[send]))
{
$ins="INSERT INTO sell_on_g1mart(name,email,mobile,c_product,message) VALUES ('$_GET[name]','$_GET[email]','$_GET[mobile]','$_GET[c_product]','$_GET[message]')";
mysql_query($ins) or die ("message not sended");
						echo "<script>alert('Message Sended');
location.href='contact.php';</script>";

}
?>
