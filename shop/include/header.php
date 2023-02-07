<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-84294144-1', 'auto');
  ga('send', 'pageview');

</script>
<!--header-->
	<div class="header">
		<div class="top-header">
			<div class="container">
				<div class="top-header-left">
					<ul class="support">
						<li><a href="#"><label> </label></a></li>
						<li><a href="#">24x7 Live<span class="live"> Support</span></a></li>
					</ul>
                    <ul class="support">
						<li class="van"><a href="#"><label> </label></a></li>
						<li><a href="#"><span class="live">Shipping Within 24 Hours On Grocery Product</span></a></li>
					</ul>
					
				</div>
       			
				<div class="clearfix"> </div>		
			</div>
		</div>
		<div class="bottom-header">
			<div class="container">
				<div class="header-bottom-left">
					<div class="logo">
						<a href="http://www.gidolia.com/g1focus"><img src="images/logo.png" alt="G1focus" height="81" width="240px" /></a>
					</div>
					
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">				
						<div class="account"><?php if (isset($_SESSION[id])){echo '<a href="../user"><span> </span>YOUR ACCOUNT ('.$_SESSION[id].')</a>';}?></div>
							<ul class="login">
								<?php if (isset($_SESSION[id])){echo '<li><a href="logout.php"><span> </span>LOGOUT</a></li>';} else { echo '<li><a href="login.php"> <span> </span>Login</a></li>';}?>
                                
							</ul>
                            <?php
									$tot = 0;
									$i = 1;
									$totqty=0;	
									if(isset($_SESSION['carttr']))
									{

									foreach($_SESSION['carttr'] as $id=>$x)
									{
									$query="select * from product where p_id='$x[p_id]'";
	
									$res=mysql_query($query) or die("Can't Execute Query...");
									$rowf=mysql_fetch_assoc($res);	
									$total=$x[qty]*$rowf[p_selling_price];	
                					$total_bv_p=$x[qty]*$rowf[p_bv];
									$totqty=$x[qty]+$totqty;
									$total_price=$total+$total_price;
									$total_bv_pm=$total_bv_pm+$total_bv_p;
									}
									}
									?>
						<div class="cart"><a href="cart.php"><span></span>CART <?php echo "(".$totqty.")";?><?php echo "(B.V".$total_bv_pm.")";?></a></div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>	
			</div>
		</div>
	</div>