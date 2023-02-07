<?php include 'config.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <link rel="shortcut icon" href="../images/gt.jpg" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>G1focus user</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    
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

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <?php include 'include/header.php';?>
           <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
		<?php include 'include/sidebar.php';?>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-9">
                  <?php
				  if ($ser[kyc]!="n")
				  { $r= "<span class='label label-success label-mini'>Kyc Submited</span><br>";}
				  else{ $r= "<span class='label label-warning label-mini'>Not Submited</span><font color='#FF0000'>Please submit Your kyc otherwise you will not able to payout</font><br>";}
				
	
	?>
	

                  	<div class="row">
                  	<div class="col-lg-12">
				<div class="content-panel">
										
						<?php
$resulth=mysql_query("SELECT count(d_id) as total from distributor where proposer_no=".$_SESSION[id]);
$datag=mysql_fetch_assoc($resulth);
				?>
				<font color='green' size='+3'>&nbsp;&nbsp;&nbsp;&nbsp;Welcome <?php echo $yui[d_name];?></font>		
					<table class="table table-hover">
                    <tr><th align="left">Distributor Id</th><th><?php echo $yui[d_id];?></th></tr>
                    <tr><th align="left">Name</th><td><?php echo $yui[d_name];?></td></tr>
                    <tr><th align="left">Joining Date</th><td><?php echo $yui[joining_date];?></td></tr>
                    <tr><th align="left">Person You Joined</th><td><?php echo $datag[total];?></td></tr>
		    <tr><th align="left">KYC Status</th><td><?php echo $r;?></td></tr>
		   <tr bgcolor='#D6CAAD'><th align="left"><a href="transtion.php">Current Balance</a></th><th>Rs <?php echo $ser[bal];?></th></tr>
		    

           
                    </table>
						
						
							
					
				</div>
			</div></div>
 		  <div class="row mt">
			<div class="col-lg-6">
                <div class="content-panel">
					<table class="table table-hover">
					<tr><th align="left"><a href="alt.php">Alternate Balance</th></a><td><?php echo $alt;?></td></tr>
		    <tr><th align="left"><a href="pending_delivery.php">Own B.V</a></th><td><?php echo $o_bv;?></td></tr>
		    <tr><th align="left"><a href="bv.php">Downline B.V</a></th><td><?php echo $bv;?></td></tr></table>
				</div>
			</div>
			<?php 
				$retyyg=mysql_query("select * from c_month where d_id=".$_SESSION[id]) or die ("bal info not selected");  
				if (mysql_num_rows($retyyg)>0)
				{ while($rfvg=mysql_fetch_assoc($retyyg)){$rfgk=$rfgk+$rfvg[down_bv]; }}?>
			<div class="col-lg-6">
                <div class="content-panel">
			<table class="table table-hover">
					<tr><th align="left"><a href="transtion.php">My Account Balance</a></th><td><?php echo $ser[bal];?></td></tr>
		    <tr><th align="left">Current Month B.V</th><td><?php echo $o_bv+$bv;?></td></tr>
		    <tr><th align="left"><a href="payments.php">Total Months B.V</a></th><td><?php echo $rfgk+$o_bv+$bv;?></td></tr></table>
				</div>
			</div>
	
			</div>		
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
                  <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
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
           
          </section>
      </section>

      <!--main content end-->
      <!--footer start-->
      <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;
      <footer class="site-footer">
          <div class="text-center">
              &copy;Gidolia.All Right Reserve
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        

        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  <script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome to G1focus!',
            // (string | mandatory) the text inside the notification
            text: 'You have to complete approx 50 assignment in 7 days to receive payment',
            // (string | optional) the image to display on the left
            image: '../shop/images/g.png',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
	</script>

  </body>
</html>
