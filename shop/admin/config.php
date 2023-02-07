<?php
error_reporting(1);
session_start();
mysql_connect("localhost","Gidolia","Gidolia50750")or die("database not connected");
mysql_select_db("G1focus")or die("database not selected");
if (empty($_SESSION[e_id]))
{ header("location:login.php");}
else
date_default_timezone_set('Asia/Calcutta');
$time=date("h:i:sa");
$date=date("Y-m-d");
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
$ipad=get_client_ip();
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
mysql_query("INSERT INTO `site_open_info` (`url`, `date`, `time`, `session_id`, `ip_addreass`, `e_id`) VALUES ('$url', '$date', '$time', '$_SESSION[id]', '$ipad', '$_SESSION[e_id]')");
?>