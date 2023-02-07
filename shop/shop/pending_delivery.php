<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>G1mart</title>

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
         <?php include "include/sidebar.php"; ?>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      ********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i>Order Status</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
            	<div class="content-panel">
          		<p>
                				<table class="table table-hover"><tr><th>Status</th><th>name</th><th>Addreass</th><th></th><th>Price</th><th>B.V</th><th>Order Date</th></tr>


                               <?php 
$qu="SELECT * FROM bill WHERE shop_id='$_SESSION[shop_id]'";
$query=mysql_query($qu);
while($fetch=mysql_fetch_assoc($query))
{
	if($fetch[status]=='c' or $fetch[status]=='t')
	{
	$toty=$toty+$fetch[price];
	$totybv=$totybv+$fetch[bv];?>

                		   <tr>
                                  <td><span class="label label-success label-mini">Order Delivered</span></td>
                                  <th><a href="bill_info.php?bill_id=<?php echo $fetch[bill_id];?>"><?php echo $fetch[bill_id];?></a></th>
                                  <td><?php echo $fetch[name];?></td>
                                  <td class="hidden-phone"><?php echo $fetch[addreass];?></td>
                                  <td>&#8377;&nbsp;<?php echo $fetch[price];?> </td>
                                  <td>B.V <?php echo $fetch[bv];?></td> 
                                  <td><?php echo $fetch[o_date];?></td>
                                  <td><?php echo $fetch[s_date];?></td>
                              </tr> 
                                                     

               <?php } }?>
               <tr>
                           <td></td><td></td>   <th>Total</th><td></td><th> &#8377;&nbsp; <?php echo $toty;?></th><th>B.V <?php echo $totybv;?></th><td></td></tr>

</table> </p></div>
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
