<?php include "config.php";
if (isset($_SESSION[id])){ 
	$q="select * from distributor where d_id='$_SESSION[id]'";
	$res=mysql_query($q);
	$c=mysql_num_rows($res);
	if($c!=0)
	{header("location:checkout.php");
	}
	else{header("location:checkout.php?new1=1");}
}?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="images/gt.jpg" />
<title>G1focus</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="js/jquery.min.js"></script>
</head>
<body> 
	<!--header-->
	<?php include "include/header.php";?>
	<!---->
	<div class="container">
		
      	   <div class="account_grid">
			  <table class="table-bordered table-hover table">
              <tr><td>
			 <h4>Distributor login</h4></td><td><h5 align="left"><a href="login.php?url=checkout.php" class="acount-btn">Proceed checkout</a></h5></td></tr>
        	     
			 <tr><td><h4>New customer</h4></td><td><h5 align="left"><a href="checkout.php" class="acount-btn">Proceed checkout</a></h5></td></tr>
        	   <?php 
			   if ($total_bv_pm>99)
			   {?>  
			<tr><td> <h4>Applicant To Become Distributor</h4></td><td><h5 align="left"><a href="register_mlm.php" class="acount-btn">Proceed checkout</a></h5></td></tr>
        	 <?php }?>    </table>
              <div class="clearfix"> </div>
			 </div>
			 <div class="sub-cate">
               <h2 style="color:green;"><span style="font-family: wingdings; font-size: 200%;">&#10004;</span>Step 1</h2><span>Select Product</span><br>&nbsp;<br>
               <h2 style="color:green;"><span style="font-family: wingdings; font-size: 200%;">&#10004;</span>Step 2</h2><span>Check Product</span><br>&nbsp;<br>

               <h2 style="color:orange;"><span style="font-family: wingdings; font-size: 200%;">&DoubleRightArrow;</span>Step 3</h2><span>delivery information & Confirmation</span><br>&nbsp;<br>
               <h2 style="color:red;"><span style="font-family: wingdings; font-size: 200%;">&#8299;</span>Step 4</h2><span>Confirmation</span>
              
			</div>
			  <div class="clearfix"> </div>
      	 </div>
	<!---->
	<?php include "include/footer.php";?>
    </body>
</html>