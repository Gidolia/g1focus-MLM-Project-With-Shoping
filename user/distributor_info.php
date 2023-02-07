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
          	<h3><i class="fa fa-angle-right"></i>Distributor Information</h3>
          	<div class="row mt">
          		<div class="col-lg-6">
                		<div class="content-panel">
				   <h3><i class="fa fa-angle-right"></i>Distributor info</h3>
                <p>
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
	$select = mysql_query('SELECT * FROM distributor WHERE d_id='.$_GET[d_id]) or die ("not performed"); 
$row = mysql_fetch_assoc($select);
$resulth=mysql_query("SELECT count(d_id) as total from distributor where proposer_no=".$_GET[d_id]);
$datag=mysql_fetch_assoc($resulth);
if (mysql_num_rows($select) > 0)
   {
   $selectdd = mysql_query('SELECT * FROM distributor WHERE d_id='.$row[sponsor_no]) or die ("not performed"); 
$rowdd = mysql_fetch_assoc($selectdd);
$selectddd = mysql_query('SELECT * FROM distributor WHERE d_id='.$row[proposer_no]) or die ("not performed"); 
$rowddd = mysql_fetch_assoc($selectddd);
 $rfb=mysql_query("SELECT date,time FROM site_open_info WHERE session_id='$_GET[d_id]' ORDER BY id DESC LIMIT 1;") or die(" sorry some thing failed");
   $game=mysql_fetch_assoc($rfb);
   $game_date = $game['date'];
$game_time = $game['time'];

$combined_date_and_time = $game_date . ' ' . $game_time;
				?>
                <table class="table table-hover">
                    <tr><th align="left">Distributor Id</th><th><?php echo $row[d_id];?></th></tr>
                    <tr><th align="left">Name</th><td><?php echo $row[d_name];?></td></tr>
                    <tr><th align="left">Sponsor name</th><td><?php echo $rowdd[d_name]." (".$row[sponsor_no].")";?></td></tr>
                    <tr><th align="left">Proposer name</th><td><?php echo $rowddd[d_name]." (".$row[proposer_no].")";?></td></tr>
                    <tr><th align="left">Lastactive date</th><td><?php echo $combined_date_and_time." (".time_elapsed_string($combined_date_and_time).")";?></td></tr>
                   <?php if($row[proposer_no]==$_SESSION[id]){?> <tr><th align="left">Date of birth</th><td><?php echo $row[d_dob];?></td></tr>
                    <tr><th align="left">Addreass</th><td><?php echo $row[house_addreass];?></td></tr>
                    <tr><th align="left">City</th><td><?php echo $row[city];?></td></tr>
                    <tr><th align="left">State</th><td><?php echo $row[state];?></td></tr>
                    <tr><th align="left">Pincode</th><td><?php echo $row[pincode];?></td></tr>
                    <tr><th align="left">Mobile no.</th><td><?php echo $row[mobile];?></td></tr>
                    <tr><th align="left">Alternate Mobile no.</th><td><?php echo $row[mobile2];?></td></tr>
                    <tr><th align="left">Email Id</th><td><?php echo $row[email];?></td></tr>
                    <tr><th align="left">Joining Date</th><td><?php echo $row[joining_date];?></td></tr><?php }else{echo "sorry only your proposal information is displayed";}?>
                    <tr><th align="left">Person Joined</th><td><?php echo $datag[total];?></td></tr>
                </table>
<?php  }?>            
                </p> 
				</div>          		
			</div>
			<div class="col-lg-6">
                		<div class="content-panel">
				<h3><i class="fa fa-angle-right"></i>Person Joined by them</h3>
				<table class="table table-hover table-striped">	
				<tr><th>S.No.</th><th>Name</th><th>B.V</th></tr>
                                 <?php
                                 $select = mysql_query('SELECT * FROM distributor WHERE proposer_no='.$_GET[d_id]) or die ("not performed"); 
if (mysql_num_rows($select) > 0)
   {
   while($row = mysql_fetch_assoc($select)){?>
   <tr><td></td><td><?php echo $row[d_name];?></td><td><?php echo find_bv($row[d_id]);?></td></tr><?php } } ?></table>
				</div>          		
			</div>
			 <?php include "ad.php";?>   <br> &nbsp;<br> &nbsp;<?php include "ad.php";?>   
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
