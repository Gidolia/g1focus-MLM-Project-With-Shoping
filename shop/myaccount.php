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
         <?php include "include/sidebar.php"; ?>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      ********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i>My Account Info.</h3>
          	<div class="row mt">
          		<div class="col-lg-8">
          		<p><?php
	$select = mysql_query('SELECT * FROM distributor 	WHERE d_id='.$_SESSION[id]) or die ("not performed"); 
$row = mysql_fetch_assoc($select);
$resulth=mysql_query("SELECT count(d_id) as total from distributor where proposer_no=".$_SESSION[id]);
$datag=mysql_fetch_assoc($resulth);
if (mysql_num_rows($select) > 0)
   {
				?>
                	<table class="table table-hover">
                    <tr><th align="left">Distributor Id</th><th><?php echo $row[d_id];?></th></tr>
                    <tr><th align="left">Name</th><td><?php echo $row[d_name];?></td></tr>
                    <tr><th align="left">Father/Husband Name</th><td><?php echo $row[father_name];?></td></tr>
                    <tr><th align="left">Nominee Name</th><td><?php echo $row[nominee_name];?></td></tr>
                    <tr><th align="left">Date of birth</th><td><?php echo $row[d_dob];?></td></tr>
                    <tr><th align="left">Addreass</th><td><?php echo $row[house_addreass];?></td></tr>
                    <tr><th align="left">City</th><td><?php echo $row[city];?></td></tr>
                    <tr><th align="left">State</th><td><?php echo $row[state];?></td></tr>
                    <tr><th align="left">Pincode</th><td><?php echo $row[pincode];?></td></tr>
                    <tr><th align="left">Mobile no.</th><td><?php echo $row[mobile];?></td></tr>
                    <tr><th align="left">Alternate Mobile no.</th><td><?php echo $row[mobile2];?></td></tr>
                    <tr><th align="left">Email Id</th><td><?php echo $row[email];?></td></tr>
                    <tr><th align="left">Joining Date</th><td><?php echo $row[joining_date];?></td></tr>
                    <tr><th align="left">Person You Joined</th><td><?php echo $datag[total];?></td></tr>

           
                    </table>
                    If you want to change any information then plese call on customer care no.(+91 7869470415)
                
<?php  }?>            
                </p>
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
