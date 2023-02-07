<?php include "config.php";?>
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
           <?php if(isset($_SESSION[id])&isset($_SESSION[password]))
				 {?>
			   <div class=" login-right">
			  	<h3>Check Addreass</h3><h5 align="left"><a href="cart.php" class="acount-btn">Change in Cart</a></h5>
                
                <form action="delivery_confirmed.php" method="get">
                
                <?php
                $query="SELECT * FROM distributor WHERE d_id=".$_SESSION['id'];
											$res=mysql_query($query);
											while($row=mysql_fetch_assoc($res))
											{
				?>
	 			<table class="table table-bordered table-striped table-condensed">
                <tr><td>Full Name<sup>*</sup></td><td><input type="text" name="r_name" value="<?php echo $row[d_name];?>" required></td></tr>
                <tr><td>Addreass Line 1<sup>*</sup></td><td><textarea name="addreass" rows="4" required><?php echo $row[house_addreass];?></textarea></td></tr>
                <tr><td>Town/City<sup>*</sup></td><td><input type="text" name="city" value="<?php echo $row[city];?>" required></td></tr>
                <tr><td>State<sup>*</sup></td><td><input type="text" name="state" value="<?php echo $row[state];?>" required></td></tr>
                <tr><td>pincode<sup>*</sup></td><td><input type="text" name="pincode" value="<?php echo $row[pincode];?>" required></td></tr>
                <tr><td>Country:</td><td><input type="text" name="country" value="India" disabled></td></tr>
                <tr><td>Mobile<sup>*</sup></td><td><input type="text" name="mobile" value="<?php echo $row[mobile];?>" required></td></tr>
                <tr><td>Mobile alternative</td><td><input type="text" name="mobile2" value="<?php echo $row[mobile2];?>"></td></tr>
                <tr><td>Addreass type</td><td><select name="addreasstype">
                							<option value="home">Home</option>
                                            <option value="office">Office/Commercial</option>
                                            </select></td></tr></table><?php }?>
                <h4 align="right"><input type="submit" align="right" value="continue"></h4>
                </form>
        	     </div><?php }
				  elseif(empty($_SESSION[id]))
				 {?>
                 <div class=" login-right">
			  	<h3>Addreass</h3><h5 align="left"><a href="cart.php" class="acount-btn">Change in Cart</a></h5>
                <font color='#FF0000'><h3>Note If you a distributor of G1focus than please <a href="login.php?url=checkout.php">login</a></h3></font> 
                <form action="delivery_confirmed.php" method="get">
                
                
	 			<table class="table table-bordered table-striped table-condensed">
                <tr><td>Full Name<sup>*</sup></td><td><input type="text" name="r_name" required></td></tr>
                <tr><td>Addreass Line 1<sup>*</sup></td><td><textarea name="addreass" rows="4" required></textarea></td></tr>
                <tr><td>Town/City<sup>*</sup></td><td><input type="text" name="city" required></td></tr>
                <tr><td>State<sup>*</sup></td><td><input type="text" name="state" required></td></tr>
                <tr><td>pincode<sup>*</sup></td><td><input type="text" name="pincode" required></td></tr>
                <tr><td>Country:</td><td><input type="text" name="country" value="India" disabled></td></tr>
                <tr><td>Mobile<sup>*</sup></td><td><input type="text" name="mobile" required maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits"></td></tr>
                <tr><td>Mobile alternative</td><td><input type="text" name="mobile2" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits"></td></tr>
                <tr><td>Addreass type</td><td><select name="addreasstype">
                							<option value="home">Home</option>
                                            <option value="office">Office/Commercial</option>
                                            </select></td></tr></table>
                <h4 align="right"><input type="submit" align="right" value="continue"></h4>
                </form>
        	     </div>
<?php }
				  elseif($_GET['new1']=='1')
				 {?>
                 			  	<h3>Check Addreass (New Joining purchasing)</h3><h5 align="left"><a href="cart.php" class="acount-btn">Change in Cart</a></h5>
                <form action="delivery_confirmed.php" method="get">

                 	 			<table class="table table-bordered table-striped table-condensed">
                <tr><td>Full Name<sup>*</sup></td><td><input type="text" name="r_name" value="<?php echo $_SESSION[d_name];?>" required></td></tr>
                <tr><td>Addreass Line 1<sup>*</sup></td><td><textarea name="addreass" rows="4" required><?php echo $_SESSION[d_add];?></textarea></td></tr>
                <tr><td>Town/City<sup>*</sup></td><td><input type="text" name="city" value="<?php echo $_SESSION[city];?>" required></td></tr>
                <tr><td>State<sup>*</sup></td><td><input type="text" name="state" value="<?php echo $_SESSION[state];?>" required></td></tr>
                <tr><td>pincode<sup>*</sup></td><td><input type="text" name="pincode" value="<?php echo $_SESSION[pincode];?>" required></td></tr>
                <tr><td>Country:</td><td><input type="text" name="country" value="India" disabled></td></tr>
                <tr><td>Mobile<sup>*</sup></td><td><input type="text" name="mobile" value="<?php echo $_SESSION[mobile];?>" required></td></tr>
                <tr><td>Mobile alternative</td><td><input type="text" name="mobile2" value="<?php echo $_SESSION[mobile2];?>"></td></tr><input type="hidden" name="new1" value="1">
                <tr><td>Addreass type</td><td><select name="addreasstype">
                							<option value="home">Home</option>
                                            <option value="office">Office/Commercial</option>
                                            </select></td></tr></table>
                <h4 align="right"><input type="submit" align="right" value="continue"></h4>
                </form>
             <?php }
			 else{ echo "<h3>Error 404 some thing went wrong please logout and try again</h3>";}  ?>   
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