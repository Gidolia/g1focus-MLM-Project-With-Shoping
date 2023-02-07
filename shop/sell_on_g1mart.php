<?php include "config.php";?>
<!DOCTYPE html>
<html>
<head>
<title>G1mart - Sell on G1mart</title>
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
</head>
<body> 
	<!--header-->
	<?php include "include/header.php";?>
	<!---->
	<div class="container">
		
      	   <div class="account_grid">
			   <div class=" login-right">
			  	
                 <div class="reservation_top">          
            	<div class=" contact_right">
                <?php 
				if (isset($_GET[ad]))
				{echo "<h3>Advertisment Form</h3>";}
				else {echo "<h3>Seller Contact Form</h3>";}
				?>
            		<div class="contact-form">
							<form action="process_sell_on_g1mart.php" method="get">
								<input type="text" class="textbox" name="name" placeholder="Name" required>
								<input type="text" class="textbox" name="email" placeholder="Email" required>
                                <input type="text" class="textbox" name="mobile" placeholder="Mobile" required>							<input type="text" class="textbox" name="c_product" placeholder="Name the product That you Want Sell on G1mart" required>
								<textarea name="message" placeholder="Description" required></textarea>
								<input type="submit" value="Send" name="send">
								<div class="clearfix"> </div>
							</form>
							<address class="address">
                    <p>if you have any problem in filling form you can Call us</p><br>
                        Mobile:&nbsp;&nbsp; +91 7869470415<br>
                       
                   
                </address>
						</div>
            	</div>
            </div>

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