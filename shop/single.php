<?php include"config.php";?>
<?php session_start();
	$id=$_GET[p_id];
	
	$q="select * from product where p_id=$_GET[p_id]";
	
	$res=mysql_query($q) or die("Can't Execute Query..");
	$row=mysql_fetch_assoc($res);
	
?>
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
	 	
	 	<div class=" single_top">
	      <div class="single_grid">
				<div class="grid images_3_of_2">
					<div class="flexslider">
							        <!-- FlexSlider -->
										<script src="js/imagezoom.js"></script>
										  <script defer src="js/jquery.flexslider.js"></script>
										<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

										<script>
										// Can also be used with $(document).ready()
										$(window).load(function() {
										  $('.flexslider').flexslider({
											animation: "slide",
											controlNav: "thumbnails"
										  });
										});
										</script>
									<!-- //FlexSlider-->
							  <ul class="slides">
								<li data-thumb="<?php echo $row['p_main_pic'];?>">
									<div class="thumb-image"> <img src="<?php echo $row['p_main_pic'];?>" data-imagezoom="true" class="img-responsive"> </div>
								</li>
							  </ul>
							<div class="clearfix"></div>
					</div>						
				</div> 
				  <div class="desc1 span_3_of_2">
				  					
					<h4><?php echo $row['p_name'];?></h4>
				<div class="cart-b">
					<div class="left-n ">Rs.<?php echo $row['p_selling_price'];?>&nbsp;&nbsp;<font size="0"><span class="reducedfrom"><?php echo $row['p_mrp'];?></span></font></div><br><br>
                    <div class="left-n ">B.V.<?php echo $row['p_bv'];?></div><br><br>
					<div class="left-n ">Delivery Time: <?php echo $row['product_b_discription'];?></div>
				    <div class="clearfix"></div>
				 </div>
				 <h6><form action='process_add_cart.php' method="get"> <input type="hidden" name="p_id" value="<?php echo $row[p_id];?>">
                   Quantity&nbsp;:&nbsp;:&nbsp;&nbsp;&nbsp;<input type="number" size="2" name="quantity" value="1" style="height:38px; width:55px" min="1" maxlength="2">
                   <input type="submit" value="ADD TO CART">
                   </form>
</h6>
<hr>
			   	<p><?php echo $row['p_description'];?><br>
                Weight: <?php echo $row['p_weight'];?></p>
			   
				
				</div>
          	    <div class="clearfix"> </div>
          	   </div>
          	   
          	    	<div class="toogle">
				     	<h3 class="m_3"></h3>
				     	
				     </div>	
          	   </div>
          	   
          	   <!---->
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