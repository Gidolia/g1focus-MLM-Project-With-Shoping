<?php include "config.php";?>
<!DOCTYPE html>
<html>
<head>
<title>Forget Distributor id - G1focus</title>
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
			  	<h3>Know Your Distributor Id</h3>
				   	<h2>			<?php
				if(isset($_POST["submitf"]))	
				{
				
				$q="select * from distributor where email='$_POST[id]'";
				$res=mysql_query($q);
				$c=mysql_num_rows($res);
				if($c!=0)
				{
					$tr=mysql_fetch_assoc($res);
					echo "Your Distributor ID is ".$tr[d_id];
				}
				else{echo "Email Id you enter is not in Our registry Please Enter email id that you enter at time of registration";}
				}
				
				
				if(isset($_POST["submitfm"]))	
				{
				
				$q="select * from distributor where mobile='$_POST[mobile]'";
				$res=mysql_query($q);
				$c=mysql_num_rows($res);
				if($c!=0)
				{
					$tr=mysql_fetch_assoc($res);
					echo "Your Distributor ID is ".$tr[d_id];
				}
				else{echo "Mobile No. you enter is not in Our registry Please Enter Mob No. that you enter at time of registration";}
				}
						?></h2>
				
				<form method="post">
				  <div>
					<span>Register Email Id<label>*</label></span>
					<input type="text" name="id" required> 
				  </div>				  
				  <input type="submit" value="Find ID" name="submitf">
                 
			    </form>
				 <div class="clearfix"> </div>
				   <h3>OR</h3>
				   <div class="clearfix"> </div>
				   <form method="post">
				  <div>
					<span>Register Mobile No.<label>*</label></span>
					<input type="text" name="mobile" required> 
				  </div>				  
				  <input type="submit" value="Find ID" name="submitfm">
                 
			    </form>

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