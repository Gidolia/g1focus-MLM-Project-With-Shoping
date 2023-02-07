<?php
error_reporting(1);
if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
   {$fvbnm=1;
   $browser="Internet explorer";}
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
    {$fvbnm=1; $browser="Internet explorer";}
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
   {$fvbnm=1; $browser="Mozilla Firefox";}
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
   {$fvbnm=1; $browser="Google Chrome";}
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
   {$fvbnm=1; $browser="Opera Mini";}
 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
   {$fvbnm=1; $browser="Opera";}
 else
   {echo "<h3>Sorry this website can open in Mozilla, Google Chrome, Internet Explorer </h3>";}
   if($fvbnm=='1')
   
mysql_connect("localhost","Gidolia","Gidolia50750")or die("database not connected");
mysql_select_db("G1focus")or die("database not selected");
session_start();
if (empty($_SESSION[id]) and empty($_SESSION[password]))
{ header ('location:login.php');}
$res=mysql_query("SELECT * FROM `distributor` WHERE `d_id`='$_SESSION[id]' AND `password`='$_SESSION[password]'")or die("sorry some problem occour");
$c=mysql_num_rows($res);
if($c==0)
{ unset($_SESSION[id]);
	unset($_SESSION[password]);
header ('location:login.php');}

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
mysql_query("INSERT INTO `site_open_info` (`url`, `date`, `time`, `session_id`, `ip_addreass`, `browser`) VALUES ('$url', '$date', '$time', '$_SESSION[id]', '$ipad', '$browser')");
//include "cal_alt.php";
?>