<?php include "config.php";?>
<!DOCTYPE html>
<html>
<head>
<title>G1focus || Our Team</title>
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
            		<h3>About Company</h3>
            		<div class="contact-form">
							
							
                    <p>
					<table class="table">
					<tr><th>Founder and CMD</th><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rohit Gidolia</td></tr>
					
					<tr><th>&nbsp;</th><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
					<tr><th>Responsblity Directors&nbsp;</th><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Devendra Batham</td></tr>
					
					<tr><th>&nbsp;</th><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gulab Singh Mandeliya</td></tr>
					
					<tr><th>&nbsp;</th><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
					
					<tr><th>Leadership Director</th><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dolat Batham</td></tr>
					<tr><th>&nbsp;</th><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
					
					<tr><th>supported by &nbsp;</th><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://www.gidolia.com'>Gidolia Pvt Ltd</a></td></tr>
					</table></p>
		
          
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