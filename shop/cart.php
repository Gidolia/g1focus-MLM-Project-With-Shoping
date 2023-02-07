<?php include "config.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>G1focus - Cart</title>
<link rel="shortcut icon" href="images/gt.jpg" />
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
<script>
function showHint(str , qty) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?p_id=" + str + "&qty=" + qty , true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>
	<!--header-->
	<?php include "include/header.php"; $session=$_SESSION['id'];?>
	<!---->
	<div class="container">
		
      	   <div class="account_grid">
			   <div class=" login-right">
			  	<h3>Your cart</h3>
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
				echo "<form action='process_add_cart.php' method='get'><input type='hidden' name='p_id' value='".$row[p_id]."'><tr align='center' nowrap><td height='50' align='left'><h5>&nbsp;&nbsp;&nbsp;<a href='single.php?p_id=".$row['p_id']."&p_name=".$row['p_name']."</h5>'>".$row[p_name]."</a></td><td><h5>&#8377;&nbsp;".$row[p_selling_price]."</h5></td><td><h5><input type='number' onChange='this.form.submit();' name='quantity' value='".$x[qty]."' min='1' size='2'></h5></td><td><h5>&#8377;&nbsp;".$total."</h5></td><td><h5>B.V.&nbsp;&nbsp;".$total_bv_p."</h5></td><td><a href='del_cart_product.php?id=".$id."'><font color='#FF0000'><h5>Delete</h5></font></a></td></tr></form>";	
				$i++;
									
									}
				echo "<tr align='center' nowrap><td height='50' align='left'><h5>&nbsp;&nbsp;&nbsp;Delivery Charge</h5></td><td></td><td><h5></h5></td><td><h5>&#8377;&nbsp;30</h5></td><td><h5></h5></td><td><a href='del_cart_product.php?id=".$id."'></td></tr>";
				$total_price=$total_price+30;
				echo "<tr align='center' bgcolor='#CCCC99' nowrap><td height='50' align='left'><h4>&nbsp;&nbsp;&nbsp;Total</h4></td><td></td><td><h4>".$totqty."</h4></td><td><h4>&#8377;&nbsp;".$total_price."</h4></td><td><h5>B.V.&nbsp;&nbsp;".$total_bv_pm."</h5></td><td><a href='del_cart_product.php?id=".$id."'></td></tr>";
									}
									?>

                </table>
                <?php if($total_price>499){?> <h4 align="right"><a href="ask.php" class="acount-btn">Proceed To CheckOut</a></h4><br><?php } else{ echo "<h4>Order cannot proceed Under 500Rs </h4>";}?>

       	     </div>
              <div class="clearfix"> </div>
			 </div>
			 <div class="sub-cate">
				<?php include "include/categories.php";?>
				<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>
					 	
			</div>
			  <div class="clearfix"> </div>
      	 </div>
	<!---->
	<?php include "include/footer.php";?>
    </body>
</html>