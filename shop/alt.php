<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<link rel="shortcut icon" href="../images/gt.jpg" />
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
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i>Alternate balance calculator</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
					<div class="content-panel">
               
          		<p><table class="table table-hover table-bordered"><tr><th>B.V Per Leg</th><th></th><th>B.V</th><th>Percentage Calculate</th><th>Amount</th></tr>
                <?php
$result = mysql_query("SELECT d_id,sponsor_no FROM distributor WHERE sponsor_no=".$_SESSION[id]);
		
		while($row = mysql_fetch_assoc($result))
		{
		$rtyo=find_under_bv($row[d_id])+find_bv($row[d_id]);
		?>
                	<tr><th><a href="bv.php?d_id=<?php echo $row[d_id];?>"><?php echo "&nbsp;".$row[d_id];?></a></th><th></th><th><?php echo $rtyo;?></th><th><?php echo slab_selection($rtyo)."%";?>     </th><th>-<?php echo intval($rtyo*slab_selection($rtyo)/100);?></th></tr>
                    
       <?php }?>
        <tr><th>Own B.V</th><th></th><th><?php echo $o_bv;?></th><th></th><th>
        <tr><th>Total B.V</th><th></th><th><?php echo $bv+$o_bv;?></th><th><?php echo slab_selection($bv+$o_bv)."%";?></th><th><?php echo ($bv+$o_bv)*slab_selection($bv+$o_bv)/100;?></th></tr>
              
                
                <tr><th><h4>Total Performance Bonus</h4></th><th></th><th></th><th></th><th><h4><?php echo $alt;?></h4></th></tr>

                   </table>
                </p>
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
