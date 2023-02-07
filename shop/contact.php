<?php include "config.php";?>
<!DOCTYPE html>
<html>
<head>
<title>G1focus || Contact Us</title>
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
            		<h3>Contact Form</h3>
            		<div class="contact-form">
							<form action="process_contact.php" method="get">
								<input type="text" class="textbox" name="name" placeholder="Name" required>
								<input type="text" class="textbox" name="email" placeholder="Email" required>
                                <input type="text" class="textbox" name="mobile" placeholder="Mobile" required>
								<textarea name="message" placeholder="Message" required></textarea>
								<input type="submit" value="Send" name="send">
								<div class="clearfix"> </div>
							</form>
							<address class="address">
                    <dl>
                        <dt> </dt>
                        <dd>Mobile:&nbsp;&nbsp; +91 7869470415</dd>
                        <dd>E-mail:&nbsp;&nbsp; <a href="mailto:info@g1focus.com">info@g1focus.com</a></dd>
                    </dl>
                </address>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- bhb -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4116205144661782"
     data-ad-slot="4921670157"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
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