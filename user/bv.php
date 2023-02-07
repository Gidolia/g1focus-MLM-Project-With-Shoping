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
    <title>G1focus-Downline</title>

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
<?php include_once("../../analyticstracking.php") ?>
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
          	<h3><i class="fa fa-angle-right"></i>Bussiness volume of this month</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                <div class="content-panel">
                Note:: B.V may increase or decrease on montly basis.<br>
		<form method="get">
		<div class="form-group">
                              
                              <div class="col-sm-5">
<input type="number" name="d_id" class="form-control" placeholder="distributor id"></div> <div class="col-sm-4"><input type="submit" class="btn btn-primary" value="check their business"></div></div></form>
		<br>&nbsp;<br>&nbsp;	<br>&nbsp;
                <?php

		if (empty($_GET[d_id]))
		{ $dcd=$_SESSION[id];
		}
		else
		{ $reg=mysql_query("select d_id,d_name from distributor where d_id=".$_GET[d_id]) or die ("query not executed");
		$leeg=mysql_fetch_assoc($reg);
		$dcd=$_GET[d_id];
		echo '<button class="btn-clear-g" onclick="window.history.back()">Go Back</button><h5><i class="fa fa-angle-right"></i>'.$leeg[d_name].'</h5><br>';

		}
				$re=mysql_query("select d_id,d_name from distributor where sponsor_no=".$dcd) or die ("query not executed");
				if (mysql_num_rows($re)>0)
				{
				?>
          		<p><table class="table table-hover table-bordered table-striped"><tr><th>name</th><th>their B.V</th><th>B.V</th><th>Total B.V</th></tr>
                <?php
					while($leg=mysql_fetch_assoc($re)) 
					{
					
?>
                	<tr><th><a href="bv.php?d_id=<?php echo $leg[d_id];?>"><?php echo $leg[d_name]."&nbsp;(".$leg[d_id];?>)</a></th><th><?php echo find_bv($leg[d_id])?></th><th>
                    <?php   echo find_under_bv($leg[d_id]);
							
							?></th><th><?php echo find_bv($leg[d_id])+find_under_bv($leg[d_id]);?></th></tr>
                    
        <?php   	}
				}
				else
				{ echo "<div class='alert alert-danger'>don't have any Joining . Should join atleast 2 person</div>";
				}?>
                   </table>
                </p>
</div>          		</div>
 <?php include_once("ad.php") ?>
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
