<?php include "config.php";
if (isset($_SESSION[id])){ header("location:user/");}?>
<!DOCTYPE html>
<html>
<head>
<title>Login - G1focus</title>
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
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-84294144-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body> 
	<!--header-->
	<?php include "include/header.php";?>
	<!---->
	<div class="container">
		
      	   <div class="account_grid">
			   <div class=" login-right">
			  	<h3>Login</h3>
				<p>If you have an account with us, then log in.</p>
                <span>To Become a Member of G1focus then call us (+91 7869470415)</span>
				<form action="process_login.php" method="post">
				  <div>
					<span>Id<label>*</label></span>
					<input type="text" name="id" required> 
				  </div>
				  <div>
					<span>Password<label>*</label></span>
					<input type="password" name="password" required> 
				  </div>
				  <?php if($_GET[url]=="checkout.php"){echo '<input type="submit" value="Login to proceed" name="logincheck">
';}
else{?>				  <input type="submit" value="Login to Shop" name="login">
                  <input type="submit" value="Login to Account" name="loginaccount"><?php }?>
			    </form>
				   <a href="forget_d_id.php"><button class="acount-btn">Forgot Distributor id</button></a>
                <a href="forgot_pass.php"><button class="acount-btn">Forgot password</button></a>
                
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
			    <div class=" login-left">
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