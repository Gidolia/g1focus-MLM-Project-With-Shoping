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
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script type="text/javascript">
  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {

      title:{
      text: "Your Joining in downline Chart"
      },
       data: [
      {
        type: "line",

        dataPoints: [
        <?php
      $t=array();
        $temp=array();
$temp1=array();
$sel1=mysql_query("SELECT `d_id`,`joining_date` FROM `distributor` WHERE `sponsor_no`='$_SESSION[id]'") or die("value not selected");
while($fet1=mysql_fetch_assoc($sel1))
{
	$temp[]=$fet1[d_id];
	$t[]=$fet1[joining_date];
	

}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
for($x=0;$x<count($temp);$x++)
{
	$sel3=mysql_query("select d_id,joining_date from distributor where sponsor_no=".$temp[$x]) or die("value not selected");
	while($fet3=mysql_fetch_assoc($sel3))
	{
		$temp1[]=$fet3[d_id];
		$t[]=$fet3[joining_date];
	}
}
unset($temp);
$temp=array();
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
for($x=0;$x<count($temp1);$x++)
{
	$sel5=mysql_query("select d_id,joining_date from distributor where sponsor_no=".$temp1[$x]) or die("value not selected3.1");
	while($fet5=mysql_fetch_assoc($sel5))
	{
	
		$temp[]=$fet5[d_id];
		
		$t[]=$fet5[joining_date];
	}
}
unset($temp1);
$temp1=array();
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




$sel14=mysql_query("select max(level) as max_level from level") or die("value not selected5");
$fet14=mysql_fetch_assoc($sel14);
$fetc14=$fet14[max_level];
for ($rff = 0; $rff <= $fetc14; $rff++)
{   
	for($x=0;$x<count($temp);$x++)
	{

	$sel13=mysql_query("select d_id,joining_date from distributor where sponsor_no=".$temp[$x]) or die("value not selected");
	while($fet13=mysql_fetch_assoc($sel13))
	{
		
		$temp1[]=$fet13[d_id];
		
		$t[]=$fet13[joining_date];
	}
	}
unset($temp);
$temp=array();
	  
	 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	  for($x=0;$x<count($temp1);$x++)
	  {
		 
		  $sel5=mysql_query("select d_id,joining_date from distributor where sponsor_no=".$temp1[$x]) or die("value not selected3.1");
		  while($fet15=mysql_fetch_assoc($sel5))
		  {
			  $temp[]=$fet15[d_id];
			  $t[]=$fet15[joining_date];
	
		  }
	  }
unset($temp1);
$temp1=array();
}

if($_GET[time]==7){$date = date("Y-m-d");  $date = date ("Y-m-d", strtotime("-7 day", strtotime($date))); $a="selected";
$dated= date ("Y-m-d", strtotime("-38 day", strtotime(date('Y-m-d')))); }
elseif($_GET[time]==30){$date = date("Y-m-d");  $date = date ("Y-m-d", strtotime("-30 day", strtotime($date))); $b="selected";
$dated= date ("Y-m-d", strtotime("-61 day", strtotime(date('Y-m-d')))); }
elseif($_GET[time]=='60'){$date = date("Y-m-d");  $date = date ("Y-m-d", strtotime("-60 day", strtotime($date))); $h="selected";
$dated= date ("Y-m-d", strtotime("-91 day", strtotime(date('Y-m-d')))); }
elseif($_GET[time]=='90'){$date = date("Y-m-d");  $date = date ("Y-m-d", strtotime("-90 day", strtotime($date))); $l="selected";
$dated= date ("Y-m-d", strtotime("-121 day", strtotime(date('Y-m-d')))); }

  else{ $d="selected";
  $sel1d=mysql_query("SELECT `joining_date` FROM `distributor` WHERE `d_id`='$_SESSION[id]'") or die("value not selected");
$fet1d=mysql_fetch_assoc($sel1d);
	$df=$fet1d[joining_date];
  $sourcee = $df;
        $dateee = new DateTime($sourcee);
        $f=$dateee->format('20y-m-d');
        
        $date = $f;
        $dated= date ("Y-m-d", strtotime("-341 day", strtotime(date('Y-m-d'))));}
	// End date
	
	$end_date =date("Y-m-d");

	while (strtotime($date) <= strtotime($end_date)) {
	$fg=0;
	$source = $date;
        $datee = new DateTime($source);
        $f=$datee->format('20y/m/d');
        $sourced = $dated;
        $dateed = new DateTime($sourced);
        $fd=$dateed->format('20y/m/d');
        
		$sel1=mysql_query("select * from distributor where joining_date='$f'") or die("value not selected1");
		//while($fet1=mysql_fetch_assoc($sel1))
		
		for($x=0;$x<count($t);$x++)
	  {
	  if($t[$x]==$f){
			$fg++;}
			
		}
		echo "{ x: new Date(".$dateed->format('20y').", ".$dateed->format('m').", ".$dateed->format('d')."), y: $fg },";
		$date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
		$dated = date ("Y-m-d", strtotime("+1 day", strtotime($dated)));
		}

		?>
     
        ]
      }
      ]
    });

    chart.render();
  }
	</script>
	<script src="canvasjs.min.js"></script>
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
      ********************************************************************************************************************************************************** -->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          <h3><i class="fa fa-angle-right"></i>Your performance Report</h3>
              <!-- page start-->
              <div id="morris">
                  <div class="row mt">
                      <div class="col-lg-12">
                          <div class="content-panel">
                              <h4><i class="fa fa-angle-right"></i>Joining Report</h4>
                              <form method="get" onchange="this.form.submit()">
                              <select class="form-control" name="time" onchange="this.form.submit()">
						  
						  <option value='7' <?php echo $a;?>>Last 7 Days</option>
						  <option value='30'<?php echo $b;?>>Last 30 Days</option>
						  <option value='60'<?php echo $h;?>>Last 60 Days</option>
						  <option value='90'<?php echo $l;?>>Last 90 Days</option>
						  <option value='all'<?php echo $d;?>>All Time</option>
						</select></form>
                              <div class="panel-body">
                                  <div id="chartContainer" style="height: 400px; width: 100%;"></div>
                                  
                              </div>
                          </div>
                      </div>
                  </div>
                   <?php include "ad.php"; ?>
              </div>
  
              <!-- page end-->
          </section>
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
           <?php include "include/footer.php";?>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
   <!-- <script src="assets/js/morris-conf.js"></script>-->
  
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
