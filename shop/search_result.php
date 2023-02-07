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
			   <div class=" login-right">
			  	<h3>Search Results</h3>
 	<?php 
	$search=$_GET['search'];
	$d="select * from product where  p_name like '%$search%'";
	$result=mysql_query($d);
	if(mysql_num_rows($result)>0)
	{
    echo '<table class="table table-bordered table-striped table-condensed">
                <tr><th width="310" height="50">Product Name</th><th width="75">Rate</th><th width="90">B.V</th><td></td></tr>';
    
	while ($p=mysql_fetch_assoc($result))
{
	?>
    <tr><td><a href='single.php?p_id=<?php echo $p['p_id']; ?>'><?php echo $p[p_name];?></a></td><td>&#8377;&nbsp;&nbsp;<?php echo $p[p_mrp];?></td><td>B.V&nbsp;&nbsp;<?php echo $p[p_bv];?></td><td><form action="process_add_cart.php" method="get"><input type="number" size="2" name="quantity" value="1" style="height:25px; width:50px;" min="1" maxlength="2"> <input type="hidden" name="p_id" value="<?php echo $p[p_id];?>">
                   <input type="submit" value="ADD TO CART">
                   </form></td></tr>
    <?php }
	}
	else{ echo "OOps No results founded, or check spelling and try again";
		}?>
	                </table>
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