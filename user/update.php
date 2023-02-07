<?php
if ($_SESSION[id]) 
{

mysql_query("UPDATE distributor SET lastActiveTime = NOW() WHERE d_id = 
$_SESSION[id]") or die(mysql_error());
}

?>