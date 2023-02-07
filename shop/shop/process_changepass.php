<?php
include "config.php";
if (isset($_POST[submit]))
{

$sel="select * from shop where shop_id=$_SESSION[shop_id] and password=$_POST[cupass]";
$selt=mysql_query($sel)or die ("select query not selected");
if (mysql_num_rows($selt)>0)
{
	if(isset($_POST[pass]) and isset($_POST[cpass]))
	{
		if ($_POST[pass]===$_POST[cpass])
		{
			$sql = "UPDATE shop SET password='$_POST[pass]' WHERE shop_id=$_SESSION[shop_id]";
			mysql_query($sql) or die ("not updated");
			$_SESSION[id]=$_SESSION[id];
			$_SESSION[password]=$_POST[pass];
			header("location:changepass.php?sus=1");
			
		}
		else{ header("location:changepass.php?confirm=1");}
	}else{ header("location:changepass.php?emptty=1");}
}else{ header("location:changepass.php?pass=1");}
}
?>
			