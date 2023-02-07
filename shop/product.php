<?php include "config.php";
$cat=$_GET['subcat_id'];?>

<!DOCTYPE html>
<html>
<head>
<title>G1focus</title>
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


<!--script-->
</head>
<body> 
	<!--header-->
<?php include "include/header.php";?>
	<!---->
	<!-- start content -->
	<div class="container">
		
	<div class="women-product">
		<div class=" w_content">
			<div class="women">
				<a href="#"><h4><?php echo $_GET['subcat_name'];?></h4></a>
 			     <div class="clearfix"> </div>	
			</div>
		</div>
		<!-- grids_of_4 -->
        <div class="grid-product">
        <?php
											
												$query="select * from product where subcat_id='$cat'";
	
												$res=mysql_query($query) or die("Can't Execute Query...");
	
												
												while($row=mysql_fetch_assoc($res))
												{
													?>

                                                    <?php
													if($count==0)
													{
														echo '<tr>';
													}
													if($row[p_mrp]!=$row[p_selling_price])
													{ 
													   $d="<span class='reducedfrom'>Rs.&nbsp;".$row[p_mrp]."</span>"; 
													}	
													echo '
		<div class="product-grid">
			<div class="content_box"><a href="#">
			   	<div class="left-grid-view grid-view-left">														<a href="single.php?p_id='.$row['p_id'].'&p_name='.$_GET['p_name'].'">
													<img src="'.$row['p_main_pic'].'" class="img-responsive watch-right" alt="" height="200px" width="232px" />
				   	   	<div class="mask">
	                        <div class="info">Quick View</div>
			            </div>
				   	  
				</div>
														<h4>'.$row['p_name'].'</h4></a><p>It is a long established fact that a reader</p>
					<span class="actual">Rs.&nbsp;'.$row['p_selling_price'].'</span>
				     '.$d.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B.V&nbsp;'.$row['p_bv'];?><h6><form action="process_add_cart.php" method="get"> <input type="hidden" name="p_id" value="<?php echo $row[p_id]; unset($d);?>">
                   Quantity&nbsp;:&nbsp;:&nbsp;&nbsp;&nbsp;<input type="number" size="2" name="quantity" value="1" style="height:25px; width:50px" min="1" maxlength="2">
                   <input type="submit" value="ADD TO CART">
                   </form>
</h6><br>&nbsp;
			   </div></div>
              <?php }?>
					 
			 			<div class="clearfix"> </div></div>
                        <div class="clearfix"> </div></div>
		
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