<?php include "config.php";
if(empty($_SESSION['carttr']))
{ header("location:/");}
else?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="images/gt.jpg" />
<title>G1focus - Confirmation of delivery</title>
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
		
     <?php   
     if($_GET['new1']=='1')
				 {?>  
        <form action="process_r&d_confirm.php" method="get">
        <?php } else{ ?><form action="online_payment_confirm.php" method="get"><?php } ?>
        
        
       
      	   <div class="account_grid">
			   <div class=" login-right">
			  	<h3>Confimation</h3>
        	    
       
					 </div>
                 <table>
                 <tr height="50"><th colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;Billing addreass</th></tr>
                 <tr height="30"><th>&nbsp;</th><th width="100">Name</th><td><input type="text" name="name" value="<?php echo $_GET[r_name];?>"></td></tr>
                 <tr height="30"><th>&nbsp;</th><th>Addreass</th><td><textarea name="addreass" rows="4"><?php echo $_GET[addreass];?></textarea></td></tr>
                 <tr height="30"><th>&nbsp;</th><th>Town/city</th><td> <input type="text" name="city" value="<?php echo $_GET[city];?>"></td></tr>
                 <tr height="30"><th>&nbsp;</th><th>State</th><td><input type="text" name="state" value="<?php echo $_GET[state];?>"></td></tr>
                 <tr height="30"><th>&nbsp;</th><th>pincode</th><td><input type="text" name="pincode" value="<?php echo $_GET[pincode];?>"></td></tr>
                 <tr height="30"><th>&nbsp;</th><th>Email</th><td><input type="email" name="email" value="<?php echo $_GET[email];?>"></td></tr>
                 <tr height="30"><th>&nbsp;</th><th>mobile</th><td><input type="text" name="mobile" value="<?php echo $_GET[mobile];?>"></td></tr>
                 <tr height="30"><th>&nbsp;</th><th>mobile alternative</th><td><input type="text" name="mobile2" value="<?php echo $_GET[mobile2];?>"></td></tr>
                 <tr height="30"><th>&nbsp;</th><th>Addreass Type</th><td><input type="text" name="addreasstype" value="<?php echo $_GET[addreasstype];?>"></td></tr>
                 
                 </table>
                 <br>

               <table class="table table-bordered table-striped table-condensed">
                <tr><th width="310" height="50">Product Name</th><th width="75">Rate</th><th width="90">Quantity</th><th width="75">Price</th><th width="90">B.V</th><th width="105"><a href='process_empty_cart.php'><font color='#FF0000'>Empty Cart</font></a></th></tr>
<?php
									$tot = 0;
									$i = 1;
									$total_price=0;
									$total_bv_pm=0;
									$totqty=0;
									if(isset($_SESSION['carttr']))
									{

									foreach($_SESSION['carttr'] as $id=>$x)
									{
									$query="select * from product where p_id='$x[p_id]'";
	
									$res=mysql_query($query) or die("Can't Execute Query...");
									$row=mysql_fetch_assoc($res);	
									$total=$x[qty]*$row[p_selling_price];	
                					$total_bv_p=$x[qty]*$row[p_bv];
									$totqty=$x[qty]+$totqty;
									$total_price=$total+$total_price;
									$total_bv_pm=$total_bv_pm+$total_bv_p;
				echo "<tr align='center' nowrap><td height='50' align='left'><h5>&nbsp;&nbsp;&nbsp;<a href='single.php?p_id=".$row['p_id']."&p_name=".$row['p_name']."</h5>'>".$row[p_name]."</a></td><td><h5>&#8377;&nbsp;".$row[p_selling_price]."</h5></td><td><h5>".$x[qty]."</h5></td><td><h5>&#8377;&nbsp;".$total."</h5></td><td><h5>B.V.&nbsp;&nbsp;".$total_bv_p."</h5></td><td><a href='del_cart_product.php?id=".$id."'><font color='#FF0000'><h5>Delete</h5></font></a></td></tr>";	
				$i++;
									
									}
				echo "<tr align='center' nowrap><td height='50' align='left'><h5>&nbsp;&nbsp;&nbsp;Delivery Charge</h5></td><td></td><td><h5></h5></td><td><h5>&#8377;&nbsp;30</h5></td><td><h5></h5></td><td><a href='del_cart_product.php?id=".$id."'></td></tr>";
				$total_price=$total_price+30;
				echo "<tr align='center' bgcolor='#CCCC99' nowrap><td height='50' align='left'><h4>&nbsp;&nbsp;&nbsp;Total</h4></td><td></td><td><h4>".$totqty."</h4></td><td><h4>&#8377;&nbsp;".$total_price."</h4></td><td><h5>B.V.&nbsp;&nbsp;".$total_bv_pm."</h5></td><td><a href='del_cart_product.php?id=".$id."'></td></tr>";
									}
									?>

                </table>
		<input type="hidden" name="price" value="<?php echo $total_price;?>">
                            <input type="hidden" name="bv" value="<?php echo $total_bv_pm;?>">	
                 <table class="table table-bordered table-striped table-condensed">
                 <tr><?php   
     if($_GET['new1']!='1')
				 {?>
                 <td><h5 align="center">Pay Online/Card payment<br>&nbsp;<br>
							
                            <input type="submit" class="btn-block" value="Pay and Confirm Order" name="pay_confirm">
                          
                            </h5></td><?php }?>
                 	<td><h5 align="center">C.O.D<br>&nbsp;<br>
							
                            <input type="submit" class="btn-block" value="Confirm Order" name="confirm">
                          
                            </h5></td></tr></table>
                
</form>              <div class="clearfix"> </div>
			 </div>
			 <div class="sub-cate">
               <h2 style="color:green;"><span style="font-family: wingdings; font-size: 200%;">&#10004;</span>Step 1</h2><span>Select Product</span><br>&nbsp;<br>
               <h2 style="color:green;"><span style="font-family: wingdings; font-size: 200%;">&#10004;</span>Step 2</h2><span>Check Product</span><br>&nbsp;<br>

               <h2 style="color:green;"><span style="font-family: wingdings; font-size: 200%;">&#10004;</span>Step 3</h2><span>delivery information</span><br>&nbsp;<br>
               <h2 style="color:orange;"><span style="font-family: wingdings; font-size: 200%;">&DoubleRightArrow;</span>Step 4</h2><span>Confirmation</span>
			</div>
			  <div class="clearfix"> </div>
      	 </div>
	<!---->
	<?php include "include/footer.php";?>
    </body>
</html>