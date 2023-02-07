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
    <title>G1mart-Downline</title>

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
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i>List of Downline</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                <div class="content-panel">
                <table class="table table-hover table-bordered table-striped">
                <tr><th>Own bv Status</th><th>Distributor ID</th><th>Name</th><th>Own B.V</th><th>Mobile No.</th></tr>
                
<?php
mysql_query("CREATE TABLE downa$_SESSION[id](a varchar(255))");
mysql_query("CREATE TABLE downb$_SESSION[id](b varchar(255))");

$sel1=mysql_query("select * from distributor where sponsor_no=".$_SESSION[id]) or die("value not selected1");
while($fet1=mysql_fetch_assoc($sel1))
{
    $bvtds=0;
    $bvtds=find_bv($fet1[d_id]);
    if($bvtds<351)
    {
    $yde="<td><span class='label label-warning label-mini'>Pending</span></td>";}
    else{$yde="<td><span class='label label-success label-mini'>Completed</span></td>";}
	echo "<tr>".$yde."<td>".$fet1[d_id]."</td><td>".$fet1[d_name]."</td><td>".$bvtds."</td><td>".$fet1[mobile]."</td></tr>";
	mysql_query("INSERT INTO downa$_SESSION[id](a) VALUES('".$fet1[d_id]."')") or die("value not inserted");
}
$sel14=mysql_query("select max(level) as max_level from level") or die("value not selected5");
$fet14=mysql_fetch_assoc($sel14);
$fetc14=$fet14[max_level];
for ($x = 0; $x <= $fetc14; $x++)
{
$sel2=mysql_query("select a from downa$_SESSION[id]") or die("value not selected");
while($fet2=mysql_fetch_assoc($sel2))
{
    $sel3=mysql_query("select * from distributor where sponsor_no=".$fet2[a]) or die("value not selected2");
    while($fet3=mysql_fetch_assoc($sel3))
    {
        $bvtds=0;
    $bvtds=find_bv($fet3[d_id]);
    if($bvtds<351)
    {
    $yde="<td><span class='label label-warning label-mini'>Pending</span></td>";}
    else{$yde="<td><span class='label label-success label-mini'>Completed</span></td>";}
	   echo "<tr>".$yde."<td>".$fet3[d_id]."</td><td>".$fet3[d_name]."</td><td>".$bvtds."</td><td>".$fet3[mobile]."</td></tr>";
	   mysql_query("INSERT INTO downb$_SESSION[id](b) VALUES('".$fet3[d_id]."')") or die("value not inserted");
    }
}
mysql_query("delete from downa$_SESSION[id]") or die ("not deleted");
$sel4=mysql_query("select b from downb$_SESSION[id]") or die("value not selected");
while($fet4=mysql_fetch_assoc($sel4))
{
    $sel5=mysql_query("select * from distributor where sponsor_no=".$fet4[b]) or die("value not selected");
    while($fet5=mysql_fetch_assoc($sel5))
    {
        $bvtds=0;
    $bvtds=find_bv($fet5[d_id]);
    if($bvtds<351)
    {
    $yde="<td><span class='label label-warning label-mini'>Pending</span></td>";}
    else{$yde="<td><span class='label label-success label-mini'>Completed</span></td>";}
	   echo "<tr>".$yde."<td>".$fet5[d_id]."</td><td>".$fet5[d_name]."</td><td>".$bvtds."</td><td>".$fet5[mobile]."</td></tr>";
	   mysql_query("INSERT INTO downa$_SESSION[id](a) VALUES('".$fet5[d_id]."')") or die("value not inserted");
    }
}
mysql_query("delete from downb$_SESSION[id]") or die ("not deleted");
}
mysql_query("drop table if exists downb$_SESSION[id]");
mysql_query("drop table if exists downa$_SESSION[id]");
?></table>
</div>          		</div>
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
