<?php include "config.php";?>
<!DOCTYPE html>
<html>
<head>
<title>Forget password - G1focus</title>
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
			  	<h3>Know Your Distributor password</h3>
				   	<h2>			<?php
				if(isset($_POST["submitf"]))	
				{
				
				$q="select * from distributor where d_id='$_POST[id]'";
				$res=mysql_query($q);
				$c=mysql_num_rows($res);
				if($c!=0)
				{
					$tr=mysql_fetch_assoc($res);
					
					$dd='your%20code%20is%20'.$tr[password];

$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$tr[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
mysql_query("INSERT INTO `pass_recall` (`d_id`, `date`, `time`, `response`, `mobile`) VALUES ('$_POST[id]', '$date', '$time', '$response', '$tr[mobile]');");

					echo "Your Password Has been sent Sucessfully to your register mobile no. distributor id=$tr[d_id]";
				}
				else{echo "Please enter valid distributor id";}
				}
						?></h2>
				
				<form method="post">
				  <div>
					<span>Distributor Id<label>*</label></span>
					<input type="text" name="id" required> 
				  </div>				  
				  <input type="submit" value="Find ID" name="submitf">
                 
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