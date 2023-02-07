<?php include "config.php";?><html>
<head><style type="text/css">
#apDiv1 {
	position: absolute;
	left: 79px;
	top: 40px;
	width: 747px;
	height: 124px;
	z-index: 1;
}
</style>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<style type="text/css">
#apDiv2 {
	position: absolute;
	left: 79px;
	top: 105px;
	width: 450px;
	height: 41px;
	z-index: 2;
}
</style><link rel="shortcut icon" href="images/gt.jpg" />
</head><body>
<div id="apDiv1"><a href="../shop" class="acount-btn">Login</a>||<a href="register_mlm.php" class="acount-btn">Another Joinning</a>||<a href="index.php" class="acount-btn">Go Back To Shop</a></div>
<div id="apDiv2">
<?php if (isset($_GET[mobile]))
{echo "You are register<br>
		Distributor id=".$_GET[d_id]."<br>
		Name=".$_GET[name]."<br>
		D.O.B=".$_GET[dob]."<br>
		mobile=".$_GET[mobile]."<br>
		Was That you Then Login To Your Account<br>
		Note:: Wrote down Your distributor id carefully";}
else{?>
		  You Are Sucessfully Register Please Purchase of 50 B.v Product<br>
Your Login Id(<?php echo $_GET[d_id];?>)<br>
NOTE::CareFully  wrotedown login Id <?php }?></div>
</body></html>