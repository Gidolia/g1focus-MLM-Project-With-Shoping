<?php include "config.php";
include "to_bv.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>G1Focus</title>

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

    <table class="table table-bordered table-condensed table-hover table-striped">
    <th>D ID</th><th>Name</th><th>sponsor no.</th><th>proposer no</th><th>d_dob</th><th>mobile</th><th>Balance</th><th>city</th><th>addreass</th><th>Purchased</th></tr>
    <?php 
$qu="SELECT * FROM distributor";
$query=mysql_query($qu);
while($fetch=mysql_fetch_assoc($query))
{?>
							   <tr>
                               
                                 
                                  <td><?php echo $fetch[d_id];?></td>
                                  <td class="hidden-phone"><?php echo $fetch[d_name];?></td>
                                  <td><?php echo $fetch[sponsor_no];?> </td>
                                  <td><?php echo $fetch[proposer_no];?> </td>
                                  
                                  <td><?php echo $fetch[d_dob];?></td>
                                  
                                  <td><?php echo $fetch[mobile];?></td>
                                  
				  <td><?php echo $fetch[bal]; $rtr=$rtr+$fetch[bal];?></td>
                                  
				  <td><?php echo $fetch[city];?></td>
                                  <td><?php echo $fetch[house_addreass];?></td>
                                  <td><?php if(find_bv($fetch[d_id])>99) 
								  { ?><span class="label label-success label-mini">Done</span><?php }else{?><span class="label label-danger label-mini">not done</span><?php }?></td>
                                  
                              </tr>                          

<?php }?>
<tr><th>Total</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th><?php echo $rtr;?></th><th></th></tr></table>
 </p></div>
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
