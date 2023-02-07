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
    <title>G1focus</title>

     <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/jquery.js"></script>


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
        <?php   $select_name='select * from distributor where d_id='.$_SESSION[id];
				  $fghj=mysql_query($select_name) or die ("Some thing went wrong");
				  $yui=mysql_fetch_assoc($fghj);?>
          	<h3><i class="fa fa-angle-right"></i><?php echo $yui[d_name];?> Profile</h3>
          	<div class="row mt">
          	
          		<div class="col-lg-12">
                 <br>
		<?php if(isset($_GET[deleted]))
		{
		echo '<div class="alert alert-success"><b>Sucessfull!</b> You successfully deleted your profile pic.</div>';

		}
		if(isset($_GET[changed]))
		{
		echo '<div class="alert alert-success"><b>Sucessfull!</b> You successfully deleted your profile pic.</div>';

		}
		?>
		
           		
		<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 desc">
				<div class="project-wrapper">
		                    <div class="project">
		                        <div class="photo-wrapper">
		                            <div class="photo">
		                            <?php if($yui[profile_pic]=="")
		                            {$fn="photo/logo.jpg";}
		                            else{$fn=$yui[profile_pic];}?>
		                            	<a class="fancybox" href="<?php echo $fn;?>"><img class="img-responsive" src="<?php echo $fn;?>" alt="Profile pic" height="350" width="350"></a>
		                            </div>
		                            <div class="overlay"></div>
		                        </div>
		                    </div>
		                </div>
			
			<div class="col-sm-10">
			<a href="sn_photo_upload.php?change_profile_pic"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
			<a href="sn_profile.php?delete_profile=1" onClick="return confirm(
  'Are you sure you want to delete your profile pic?');"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
</a>
                      <?php
                      if(isset($_GET[delete_profile]))
                      {
                      	mysql_query("UPDATE `distributor` SET  `profile_pic` =  '' WHERE  `distributor`.`d_id` =  '$_SESSION[id]';")or die("sorry you profile pic not updated please try again");
                      	
                      	echo "<script>location.href='sn_profile.php?deleted=1';</script>";
                      }
                      ?>  

			</div>
		</div></div></div>
		<div class="row mt">
          		<div class="col-lg-12">
                 <br>
		<div class="content-panel">			
		           <p>
		           		
           		<form class="form-horizontal style-form" method="post" action="">
           		<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><h4>Name</h4></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="name" value="<?php echo $yui[d_name];?>" readonly>
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><h4>Nickname</h4></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nickname" value="<?php echo $yui[nickname];?>">
                              </div>
                        </div>
                        
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" class="btn btn-primary" name="submit">
                              </div>
                        </div>
                        
</form>
                </p>
                <?php
                if(isset($_POST[submit]))
                {
                	mysql_query("UPDATE `distributor` SET  `nickname` =  '$_POST[nickname]' WHERE  `distributor`.`d_id` =  '$_SESSION[id]';")or die("sorry you profile pic not updated please try again");
                	echo "<script>location.href='sn_profile.php?changed=1';</script>";
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
	<script src="assets/js/fancybox/jquery.fancybox.js"></script>    
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
  
  <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

  </script>
  
  <script>
      //custom select box

      $(function(){
          $("select.styled").customSelect();
      });

  </script>


  </body>
</html>
