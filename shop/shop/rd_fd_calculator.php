<?php include "config.php";
/////////////////////RD calculator
if(isset($_GET[rd_submit]))
{
$fhj=intval($_GET[duration]/12);

$a=$_GET[installment];
$d=$_GET[duration];
$r=$_GET[percentage];
$re=$r/12;
$c=1;
$f=1;
for($x=1; $x<$d+1; $x++)
{
	$v=$v+$a;
   $pe=$v * $re/100;
   
   if($f==$c)
   {
   
	  $f=0;
	  $v=$v+$pe;
   }
   $df=$df+$pe;
   $f++;
}
$v=$v+$df-$pe;
$fin=($a*$d)+intval($df);
$rda="value='".$_GET[installment]."'";
$rdb="value='".$_GET[duration]."'";
$rdc="value='".$_GET[percentage]."'";
$rdd="value='".$fin."'";
}
///////////////////////////////////////////
/////////////////////RD calculator
if(isset($_GET[fd_submit]))
{
$y=$_GET[amount];
$fg=$_GET[duration];
$rj=$_GET[percentage];
$fghk=$y;
$f=1;
for($x=0; $x<$fg; $x++)
{
if($f=='12'){
	$t=($fghk*$rj/100);
	$r=$r+$t;
	$fghk=$fghk+$t;
	
	$f=0;
	}
$f++;
}
$fda="value='".$_GET[amount]."'";
$fdb="value='".$_GET[duration]."'";
$fdc="value='".$_GET[percentage]."'";
$fdd="value='".round($y+$r)."'";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>G1kalyaan</title>

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
          	<h3><i class="fa fa-angle-right"></i>Calculator</h3>
          	<div class="row mt">
          		<div class="col-lg-6">
            	<div class="content-panel">
          		<p>
          		<h3><i class="fa fa-angle-right"></i>RD Calculator</h3>
          		<form class="form-horizontal style-form" method="get">
                          <div class="form-group">
                              
                              <div class="col-sm-12">
                              Installment Amount
                                  <input type="text" class="form-control" name="installment" placeholder="Installment Amount" <?php echo $rda;?> >
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-sm-12">
                              Duration(in month)
                                  <input type="text" class="form-control" name="duration" placeholder="Duration" <?php echo $rdb;?>>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-sm-12">
                                 Percentage <input type="text" class="form-control" name="percentage" placeholder="Percentage" <?php echo $rdc;?>>
                              </div>
                          </div>
                          <div class="form-group">
                              
                              <div class="col-sm-12">
                                 Maturity Value <input type="text" class="form-control" name="maturity" placeholder="Maturity Amount" <?php echo $rdd;?>>
                              </div>
                          </div>
                          <div class="form-group">
                              
                              <div class="col-sm-12">
                                  <input type="submit" class="btn btn-primary btn-lg btn-block" name="rd_submit"  value="Calculate">
                              </div>
                          </div>
                      </form>         		
          		</p>
          	</div>
          		</div>
          
          	
          		<div class="col-lg-6">
            	<div class="content-panel">
          		<p>
          		<h3><i class="fa fa-angle-right"></i>FD Calculator</h3>
          		<form class="form-horizontal style-form" method="get">
                          <div class="form-group">
                              
                              <div class="col-sm-12">
                              Amount
                                  <input type="text" class="form-control" name="amount" placeholder="FD Amount" <?php echo $fda;?>>
                              </div>
                              </div>
                           <div class="form-group">
                              <div class="col-sm-12">
                              Duration(in month)
                                  <input type="text" class="form-control" name="duration" placeholder="Duration" <?php echo $fdb;?>>
                              </div>
                          </div>
                           <div class="form-group">
                              <div class="col-sm-12">
                                 Percentage <input type="text" class="form-control" name="percentage" placeholder="Percentage" <?php echo $fdc;?>>
                              </div>
                          </div>
                          <div class="form-group">
                              
                              <div class="col-sm-12">
                              Maturity Value
                                  <input type="text" class="form-control" name="maturity" placeholder="Maturity Amount" <?php echo $fdd;?>>
                              </div>
                          </div>
                          <div class="form-group">
                              
                              <div class="col-sm-12">
                              
                                  <input type="submit" class="btn btn-primary btn-lg btn-block" name="fd_submit" value="Calculate">
                              </div>
                          </div>
                      </form>         		
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
