<?php include "config.php";?>
<!DOCTYPE html>
<html>
<head>
<title>G1focus || Distributor Information</title>
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
            		<h3>Distributor Information</h3>
            		<div class="contact-form">
							<form action="distributor_info.php" method="get">
								<input type="text" class="textbox" name="d_id" placeholder="Distributor Id" required>
								<input type="submit" value="Send" name="send">
								<div class="clearfix"> </div>
							</form>
							
                    <p><?php 
					if (isset($_GET[d_id]))
					{
					$r=mysql_query("select * from distributor where d_id=".$_GET[d_id]) or die ("query not execut");
					if(mysql_num_rows($r)>0){
						
					$fet=mysql_fetch_assoc($r);
					?>  
                 <table><tr height="50"><th width="140">Distributor</th><th><?php echo $fet[d_id];?></th></tr>
                 	<tr height="50"><th>Name</th><td><?php echo $fet[d_name];?></td></tr>
                    <tr height="50"><th>City</th><td><?php echo $fet[city];?></td></tr>
                    <tr height="50"><th>State</th><td><?php echo $fet[state];?></td></tr>
                 </table>   
                    
                    <?php 
					}
					else{ echo "<script>alert('Distributor Id Not founded');
location.href='distributor_info.php';</script>";}
}?></p>
          
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