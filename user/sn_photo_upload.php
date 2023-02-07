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
		<div class="content-panel">
		           <p>
		           		
           		<form class="form-horizontal style-form" method="post" enctype="multipart/form-data">
           		<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><h4>Choose Photo</h4></label>
                              <div class="col-sm-10">
                                  <input type="file" class="form-control" name="pic" required>
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><h4>Any Status</h4></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="status">
                              </div>
                        </div>
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <input type="submit" class="btn btn-primary" name="submit_profile_pic">
                              </div>
                        </div>
                        
</form>
                </p>
                </div>
          		</div>
          	</div>
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

<?php
if(isset($_POST[submit_profile_pic]))
{
	function photo_id()
	{
		$que="select max(photo_no) as max from post";
	        $r=mysql_query($que) or die("query not performed");
		if($r)
		{
		  $row=mysql_fetch_array($r);  
		  $photo_id=$row['max'];
		  $photo_id=$photo_id+1;  
		}
	        return $photo_id;
	}
	if (file_exists("photo/" .photo_id().".jpg"))
        {$a=photo_id()+1;
        if (file_exists("photo/" .$a.".jpg"))
        { $a=photo_id()+2;}}
        else{$a=photo_id();}
        
       if (file_exists("photo/" .$a.".jpg"))
        {
          $a=photo_id()+3;
        }
        elseif(move_uploaded_file($_FILES["pic"]["tmp_name"], "photo/".$a.".jpg"))
	{
		$pic="photo/".$a.".jpg";
        	mysql_query("INSERT INTO `post` (`id`, `d_id`, `photo`, `share`, `written`, `type`, `page_id`, `photo_no`, `post_what`) VALUES (NULL, '$_SESSION[id]', '$pic', '', '$_POST[status]', '', '', '$a', 'Changed profile pic');")or die("sorry you profile pic not stored please try again");
        	mysql_query("UPDATE `distributor` SET  `profile_pic` =  '$pic' WHERE  `distributor`.`d_id` =  '$_SESSION[id]';")or die("sorry you profile pic not updated please try again");
        		
        }
        else{echo "sorry some thing went wrong";}	
}?>
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
