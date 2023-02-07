<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>G1focus shop Login</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" method="post">
		        <h2 class="form-login-heading">Shop Login</h2>
		        <div class="login-wrap">
		            
		            <br>
					<input type="text" class="form-control" name="e_id" placeholder="Employe ID" autofocus>
		            <br>
		            <input type="password" class="form-control" placeholder="Password" name="password">
		            
		            <input class="btn btn-theme btn-block" name="login" type="submit">
		            <hr>
		           
		
		        </div>
		
		          <!-- Modal -->
		         
		          <!-- modal -->
		
		      </form>	  	
	<?php
	mysql_connect("localhost","Gidolia","Gidolia50750")or die("database not connected");
mysql_select_db("G1focus")or die("database not selected");
session_start();
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
mysql_query("INSERT INTO `site_open_info` (`url`, `date`, `time`, `session_id`, `ip_addreass`) VALUES ('$url', '$date', '$time', '$_SESSION[id]', '$ipad')");

	if(isset($_POST["login"]))	
{
$q="SELECT * FROM `employee` WHERE password='$_POST[password]' and e_id='$_POST[e_id]'";
$res=mysql_query($q) or die("not selected");
$c=mysql_num_rows($res);
if($c!=0)
{

$_SESSION["e_id"]=$_POST["e_id"];
$_SESSION["password"]=$_POST["password"];

echo "<script>
			location.href='index.php';</script>";

}
else
{

echo "<script>alert('Invalid user ID or Password');
location.href='login.php';</script>";
}
}
?>
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>


  </body>
</html>
