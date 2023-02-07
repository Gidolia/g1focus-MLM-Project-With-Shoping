<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>G1focus</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <?php include "include/header.php";?>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
         <?php 
		 include "include/sidebar.php"; ?>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      ********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i>Bill Detail</h3><br>
            <button onClick="window.history.back()">Go Back</button>
          	<div class="row mt">
          		<div class="col-lg-12">
                <div class="content-panel">
          		<p>
               	<table class="table table-hover"><tr><th>Bill ID</th><th>name</th><th>Addreass</th><th>Price</th><th>B.V</th><th>Order Date</th><th>Shiped Date</th></tr>

                <?php 
				
$qu="SELECT * FROM bill WHERE bill_id=".$_GET[bill_id];
$query=mysql_query($qu);
$fetch=mysql_fetch_assoc($query)

	?>

                    <tr>
                    	<td><?php echo $fetch[bill_id];?></td>
                        <td><?php echo $fetch[name];?></td>
                        <td class="hidden-phone"><?php echo $fetch[addreass];?></td>
                        <td>&#8377;&nbsp;<?php echo $fetch[price];?></td>
                        <td>B.V <?php echo $fetch[bv];?></td> 
                        <td><?php echo $fetch[o_date];?></td>
                        <td><?php echo $fetch[s_date];?></td>
                    </tr>                          
               
                         
</table>
Product Purchase
<br>
<table class="table table-hover table-striped ">
<tr><?php if($fetch['status']!='p'){?><th>Product Status</th><?php }?><th>Product</th><th>QTY</th></tr> 
	<?php		
								
	$query="SELECT c.* , p.* FROM bill_detail c,product p WHERE c.p_id=p.p_id and c.bill_id=".$_GET[bill_id];
			
											$res=mysql_query($query)or die ("bill product not selected");
							while($row=mysql_fetch_assoc($res))
											{
			$fdg=mysql_query("SELECT * FROM `shop_product` WHERE `p_id`='$row[p_id]'");
			$c=mysql_num_rows($fdg);
			$rowrr=mysql_fetch_assoc($fdg);
			if($c!=0){if($rowrr['qty']>=$row['qty']){$s="<span class='label label-success label-mini'>Founded</span>";}
			else{$s="<span class='label label-warning label-mini'>Not Founded</span>";}}
			else{$s="<span class='label label-warning label-mini'>Not Founded</span>";}
								?>
                           <?php if($fetch['status']!='p'){?> <td><?php echo $s;?></td><?php }?>
                        <td><?php echo $row[p_name];?></td>
                        <td><?php echo $row[qty];?></td>
                        
                        
                    </tr>   
                                            
<?php }?></table>
<?php if($fetch['status']!='p'){?><form method="post"><input type="hidden" name="bill_id" value="<?php echo $_GET[bill_id];?>"><input type="submit" class="bg-primary" name="submit_confirm" value="Confirm order packed and shiped"  onClick="return confirm(
  'Are you sure you have packed and shiped order?');"></form>
<?php }
if(isset($_POST[submit_confirm]))
{
	$queryf="SELECT c.* , p.* FROM bill_detail c,product p WHERE c.p_id=p.p_id and c.bill_id=".$_POST[bill_id];														
	$resf=mysql_query($queryf)or die ("bill product not selected");
	while($rowf=mysql_fetch_assoc($resf))
	{
		$fdgf=mysql_query("SELECT * FROM `shop_product` WHERE `p_id`='$rowf[p_id]'");
		$cf=mysql_num_rows($fdgf);
		if($cf==0){echo "<script>alert('You dont have products to delivered please contact in head quaters');
					location.href='delivery_info.php?bill_id=$_GET[bill_id]';</script>";}
		else{
			$qe="select * from shop_product where shop_id='$_SESSION[shop_id]' and p_id='$rowf[p_id]'";
			$rees=mysql_query($qe);
			$ce=mysql_fetch_assoc($rees);
			$nqty=$ce[qty]-$rowf[qty];
			if ($nqty==0){mysql_query("delete from shop_product where p_id=$rowf[p_id]") or die ("not deleted");}
			else{
			mysql_query("update shop_product set qty=".$nqty." where p_id=".$rowf[p_id]." and shop_id=".$_SESSION[shop_id]);}
  				}

	}
	
	mysql_query("update bill set status='p' where bill_id=".$_POST[bill_id]) or die("status not updated");
}
?>
					</div>
          		</div>
          	</div>
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
<?php include "include/footer.php";?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    <!--script for this page-->
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
