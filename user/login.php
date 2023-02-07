<!DOCTYPE html>
<?php error_reporting(1);
session_start();
if(isset($_SESSION[id]) and isset($_SESSION[password]))
{ header ('location:index.php');}
else{
unset($_SESSION[id]);
unset($_SESSION[password]);}
mysql_connect("localhost","Gidolia","Gidolia50750")or die("database not connected");
mysql_select_db("G1focus")or die("database not selected");
date_default_timezone_set('Asia/Calcutta');
$time=date("h:i:sa");
$date=date("Y-m-d");
$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
mysql_query("INSERT INTO `site_open_info` (`url`, `date`, `time`, `session_id`) VALUES ('$url', '$date', '$time', '$_SESSION[id]')");?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="G1focus, Login, distributor login, gidolia">

    <title>G1focus Login</title>

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
<?php include_once("../../analyticstracking.php") ?>
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" method="post">
		        <h2 class="form-login-heading">sign in now</h2>
		        <div class="login-wrap">
		        <h2>			<?php
				if(isset($_POST["submitf"]))	
				{
				
				$q="select * from distributor where email='$_POST[id]'";
				$res=mysql_query($q);
				$c=mysql_num_rows($res);
				if($c!=0)
				{
					$tr=mysql_fetch_assoc($res);
					echo "Your Distributor ID is ".$tr[d_id];
					
				}
				else{echo "Email Id you enter is not in Our registry Please Enter email id that you enter at time of registration";}
				}
				
				
				if(isset($_POST["submitfm"]))	
				{
				
				$q="select * from distributor where mobile='$_POST[mobile]'";
				$res=mysql_query($q);
				$c=mysql_num_rows($res);
				if($c!=0)
				{
					$tr=mysql_fetch_assoc($res);
					echo "Your Distributor ID is ".$tr[d_id];
				}
				else{echo "Mobile No. you enter is not in Our registry Please Enter Mob No. that you enter at time of registration";}
				}
				if(isset($_POST["submitfp"]))	
				{
				
				$q="select * from distributor where d_id='$_POST[id]'";
				$res=mysql_query($q);
				$c=mysql_num_rows($res);
				if($c!=0)
				{
					$tr=mysql_fetch_assoc($res);
					
					$dd='your%20code%20is%20'.$tr[password];

$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$tr[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
mysql_query("INSERT INTO `pass_recall` (`d_id`, `date`, `time`, `response`, `mobile`) VALUES ('$_POST[id]', '$date', '$time', '$response', '$tr[mobile]');");

					echo "Your Password Has been sent Sucessfully to your register mobile no. distributor id=$tr[d_id]";
				}
				else{echo "Please enter valid distributor id";}
				}
						?></h2>
		            <input type="text" class="form-control" placeholder="User ID" autofocus name="id">
		            <br>
		            <input type="password" class="form-control" placeholder="Password" name="password">
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
		                 
		
		                </span>
		                 <span class="pull-left">
		                    <a data-toggle="modal" href="#myModald"> Forgot Distributor ID?</a>
		                 
		
		                </span>
		            </label>
		            <input type="submit" name="login" class="btn btn-theme btn-block" value='SIGN IN'>
		            </form>
					<hr> <span class="pull-right">
		                    <a data-toggle="modal" href="http://www.gidolia.com/g1focus/shop"> Go to Shop</a>
		
		                </span>
		                <span class="pull-left">
		                    <a data-toggle="modal" href="http://www.gidolia.com/g1focus/"> Go to Home</a>
		
		                </span>
		            
		            
		          <?php

if(isset($_POST["login"]))	
{ 
	
	$q="select * from distributor where d_id='$_POST[id]' and password='$_POST[password]'";
	$res=mysql_query($q);
	$c=mysql_num_rows($res);
	if($c!=0)
	{
		$_SESSION["id"]=$_POST["id"];
		$_SESSION["password"]=$_POST["password"];

		
		echo "<script>
			location.href='index.php?time=7';</script>";
	}
	else
	{
		echo "<script>alert('Invalid user name or Password');
		location.href='login.php';</script>";
	}
}
?>  

		
		        </div>
		        <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;
<?php include_once("ad.php") ?><br>&nbsp;<br>&nbsp;<br><?php include_once("ad.php") ?> <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModald" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Ditributor ID ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>
		                          <form method="post">
				  <div>
					<span>Register Email Id<label>*</label></span>
					<input type="text" name="id" class="form-control" required> 
				  </div>				  
				  <input type="submit" value="Find ID" name="submitf" class="btn btn-theme btn-block">
                 
			    </form>
				 <div class="clearfix"> </div>
				   <h3>OR</h3>
				   <div class="clearfix"> </div>
				   <form method="post">
				  <div>
					<span>Register Mobile No.<label>*</label></span>
					<input type="text" name="mobile" class="form-control" required> 
				  </div>				  
				  <input type="submit" value="Find ID" name="submitfm" class="btn btn-theme btn-block">
                 
			    </form>
		                          </p>
		                          
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button data-dismiss="modal" class="btn btn-theme" type="button">Ok</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>
		                          <form method="post">
				  <div>
					<span>Distributor Id<label>*</label></span>
					<input type="text" name="id" class="form-control" required> 
				  </div>				  
				  <input type="submit" value="Find ID" name="submitfp" class="btn btn-theme btn-block">
                 
			    </form>
		                          
		                          </p>
		                          
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button data-dismiss="modal" class="btn btn-theme" type="button">Ok</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		
		      </form>	  	
	  	
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
