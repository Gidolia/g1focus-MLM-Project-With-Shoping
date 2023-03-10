<?php include "config.php";
 ?>
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
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Change Password</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel" style="white-space:nowrap;">
                  <br>&nbsp;<br>
                  	  <!-- ALERTS EXAMPLES -->
                      <?php 
					  if(isset($_GET[sus]))
					  {?>
      									
							<div class="alert alert-success"><b>Sucess!</b> You successfully Change Password.</div>
						<?php }?>
                        <?php 
					  if(isset($_GET[pass]))
					  {?>	
							<div class="alert alert-danger"><b>failed!</b>Current password you enter is wrong</div><?php }?>
						 <?php 
					  if(isset($_GET[emptty]))
					  {?>	<div class="alert alert-warning"><b>Warning!</b>Please fill new password box</div><?php }?>
                     <?php if(isset($_GET[confirm]))
					  {?>	<div class="alert alert-warning"><b>Warning!</b>current password did'nt match new pass </div><?php }?>
							     				
      				
      				
      				<!-- DISMISSABLE ALERT -->
                      <form class="form-horizontal style-form" method="post" action="process_changepass.php">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><h4>Current Password</h4></label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="cupass" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><h4>New Password</h4></label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="pass" required>
                                 
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><h4>Confirm Password</h4></label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="cpass" required>
                                 
                              </div>
                          </div>
                          <div class="form-group">
                              
                              <div class="col-sm-10">
                                  <input type="submit" class="btn btn-primary" value="Change password" name="submit">
                                
                              </div>
                          </div>
               </form>
          		</div>
          	</div>
            <br>
            &nbsp;<br>&nbsp;<br>&nbsp;<br>

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
