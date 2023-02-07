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
	<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
<style>
body
{
    counter-reset: Serial;           /* Set the Serial counter to 0 */
}

table
{
    
}

tr td:first-child:before
{
  counter-increment: Serial;      /* Increment the Serial counter */
  content: counter(Serial); /* Display the counter */
}
</style>

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
          	<h3><i class="fa fa-angle-right"></i>List of Downline</h3>
			Search ::<input type="text" class="form-control" onkeyup="showHint(this.value)" autofocus="autofocus">
          	<div class="row mt">
          		<div class="col-lg-12">
                <div class="content-panel">
					<span id="txtHint"></span>
      					<h4><i class="fa fa-angle-right"></i> Filter</h4>
						<div class="btn-group btn-group-justified">
						  <div class="btn-group">
						    <a href="downline_list.php?downline=1" type="button" class="btn btn-theme">Downline list</a>
						  </div>
						  <div class="btn-group">
						   <a href="downline_list.php?proposer=1" type="button" class="btn btn-theme">your propose List</a>
						  </div>
						</div>      				
      				
                <table class="table table-hover table-bordered table-striped">
                <tr><th>No.</th><th>Own bv Status</th><th>Distributor ID</th><th>Name</th><th>Own B.V</th><th>City</th><th>State</th><th>Mobile No.</th><th>joining(propose)</th><th>New/Old</th><th>Send sms</th><th>Last Active</th></tr>
                

 <?php
 function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : ' ';
}
if(isset($_GET[downline]))
{
     //$_SESSION[id]   $d_idtree=$_SESSION[id]; 
                   
function printtree($sponsor_no,$dv)
{
	if($sponsor_no==0)
	{$tr=$_SESSION[id];}else{$tr=$sponsor_no;}
$sel1=mysql_query("select d_id,sponsor_no,proposer_no,city,state,new,mobile,d_name from distributor where sponsor_no=".$tr) or die("value not selected1");
while($fet1=mysql_fetch_assoc($sel1))
{ 
$ed=mysql_query("SELECT COUNT(d_id) AS cout FROM `distributor` WHERE `proposer_no`='$fet1[d_id]'");
	$ef=mysql_fetch_assoc($ed);
	$bvtds=0;
    $bvtds=find_bv($fet1[d_id]);
  $rfb=mysql_query("SELECT date,time FROM site_open_info WHERE session_id='$fet1[d_id]' ORDER BY id DESC LIMIT 1") or die(" sorry some thing failed");
   $game=mysql_fetch_assoc($rfb);
   $game_date = $game['date'];
$game_time = $game['time'];

$combined_date_and_time = $game_date . ' ' . $game_time;
    if($bvtds<49)
    {
    $yde="<td><span class='label label-warning label-mini'>Pending</span></td>";}
    else{$yde="<td><span class='label label-success label-mini'>Completed</span></td>";}
     if($fet1['new']=='y'){$ert='<td><span class="label label-info label-mini">New</span></td>'; }else{$ert='<td><span class="label label-success label-mini">Old</span></td>'; }
     if($fet1[proposer_no]==$_SESSION[id]){$mob=$fet1[mobile];}
    else{$mob=0;}
	echo "<tr><td></td>".$yde."<td>".$fet1[d_id]."</td><td><a href='distributor_info.php?d_id=".$fet1[d_id]."'>".$fet1[d_name]."</a></td><td>".$bvtds."</td><td>".$fet1[city]."</td><td>".$fet1[state]."</td><td>".$mob."</td><td>".$ef[cout]."</td>".$ert."<td><a href='send_sms.php?mob_no=".$fet1[mobile]."'>Send sms</a></td><td>". time_elapsed_string($combined_date_and_time)."</td></tr>";
	printtree($fet1[d_id],$dv);
	}
}
 echo printtree($_SESSION[id]);
 }
 if(isset($_GET[proposer]))
 {
 $sel1=mysql_query("select d_id,sponsor_no,proposer_no,city,state,new,mobile,d_name from distributor where proposer_no=".$_SESSION[id]) or die("value not selected1");
while($fet1=mysql_fetch_assoc($sel1))
{ 
$ed=mysql_query("SELECT COUNT(d_id) AS cout FROM `distributor` WHERE `proposer_no`='$fet1[d_id]'");
	$ef=mysql_fetch_assoc($ed);
if($fet1['new']=='y'){$ert='<td><span class="label label-info label-mini">New</span></td>'; }else{$ert='<td><span class="label label-success label-mini">Old</span></td>'; }
	$bvtds=0;
	$rfb=mysql_query("SELECT date,time,MAX(id) as max FROM site_open_info WHERE session_id='$fet1[d_id]' ORDER BY session_id LIMIT 1;") or die(" sorry some thing failed");
   $game=mysql_fetch_assoc($rfb);
   $game_date = $game['date'];
$game_time = $game['time'];

$combined_date_and_time = $game_date . ' ' . $game_time;
    $bvtds=find_bv($fet1[d_id]);
    if($bvtds<49)
    {
    $yde="<td><span class='label label-warning label-mini'>Pending</span></td>";}
    else{$yde="<td><span class='label label-success label-mini'>Completed</span></td>";}
	echo "<tr><td></td>".$yde."<td>".$fet1[d_id]."</td><td><a href='distributor_info.php?d_id=".$fet1[d_id]."'>".$fet1[d_name]."</a></td><td>".$bvtds."</td><td>".$fet1[city]."</td><td>".$fet1[state]."</td><td>".$fet1[mobile]."</td><td>".$ef[cout]."</td>".$ert."<td><a href='send_sms.php?mob_no=".$fet1[mobile]."'>Send sms</a></td><td>". time_elapsed_string($combined_date_and_time)."</td></tr>";
	}

 }
 ?>
</table>
</div>       <?php include "ad.php";?>   		</div>
          	</div>

		</section><!--/wrapper -->
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
