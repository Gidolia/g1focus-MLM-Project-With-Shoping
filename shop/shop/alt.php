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
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i>Alternate balance calculator</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
					<div class="content-panel">

               
          		<p><table class="table table-hover table-bordered table-striped"><tr><?php
include "to_bv.php";
////////////////////////////////////////////////////whole cut ammount
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$crt=81465;

mysql_query("delete from t") or die ("not deleted");
mysql_query("delete from t1") or die ("not deleted 1");
$grand_totalt=0;

$sel1=mysql_query("select d_id from distributor where sponsor_no=".$crt) or die("value not selected");
while($fet1=mysql_fetch_assoc($sel1))
{
	//echo $fet1[d_id];
	mysql_query("INSERT INTO t(a) VALUES('".$fet1[d_id]."')") or die("value not inserted");
	//echo "&nbsp;B.V".find_bv($fet1[d_id])."<br>";
	$grand_totalt=$grand_totalt+alter_bal($fet1[d_id]);

}

//echo $grand_totalt,"first<br>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sel2=mysql_query("select a from t") or die("value not selected2");
while($fet2=mysql_fetch_assoc($sel2))
{
	//echo $fet2[a];
	$sel3=mysql_query("select d_id from distributor where sponsor_no=".$fet2[a]) or die("value not selected");
	while($fet3=mysql_fetch_assoc($sel3))
	{
		//echo $fet3[d_id];
		mysql_query("INSERT INTO t1(b) VALUES('".$fet3[d_id]."')") or die("value not inserted");
		//echo "&nbsp;B.V".find_bv($fet3[d_id])."<br>";
		$grand_totalt=$grand_totalt+alter_bal($fet3[d_id]);
	}
}
mysql_query("delete from t") or die ("not deleted");

//echo $grand_totalt,"second<br>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sel4=mysql_query("select b from t1") or die("value not selected3");
while($fet4=mysql_fetch_assoc($sel4))
{
	//echo $fet4[b];
	$sel5=mysql_query("select d_id from distributor where sponsor_no=".$fet4[b]) or die("value not selected3.1");
	while($fet5=mysql_fetch_assoc($sel5))
	{
		//echo $fet5[d_id];
		mysql_query("INSERT INTO t(a) VALUES('".$fet5[d_id]."')") or die("value not inserted");
		//echo "&nbsp;B.V".find_bv($fet5[d_id])."<br>";
		$grand_totalt=$grand_totalt+alter_bal($fet5[d_id]);
	}
}
mysql_query("delete from t1") or die ("not deleted");

//echo $grand_totalt,"thi<br>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





$sel14=mysql_query("select max(level) as max_level from level") or die("value not selected5");
$fet14=mysql_fetch_assoc($sel14);
$fetc14=$fet14[max_level];
for ($x = 0; $x <= $fetc14; $x++)
{   //echo "level".$x."mle";
	$sel12=mysql_query("select a from t") or die("value not selected2");
	while($fet12=mysql_fetch_assoc($sel12))
	{
	//echo $fet12[a];
	$sel13=mysql_query("select d_id from distributor where sponsor_no=".$fet12[a]) or die("value not selected");
	while($fet13=mysql_fetch_assoc($sel13))
	{
		//echo $fet13[d_id];
		mysql_query("INSERT INTO t1(b) VALUES('".$fet13[d_id]."')") or die("value not inserted");
		//echo "&nbsp;B.V".find_bv($fet13[d_id])."<br>";
		$grand_totalt=$grand_totalt+alter_bal($fet13[d_id]);
	}
	}
	mysql_query("delete from t") or die ("not deleted");
	  
	  //echo $grand_total,"<br>";
	  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	  $sel14=mysql_query("select b from t1") or die("value not selected3");
	  while($fet14=mysql_fetch_assoc($sel14))
	  {
		  //echo $fet14[b];
		  $sel5=mysql_query("select d_id from distributor where sponsor_no=".$fet14[b]) or die("value not selected3.1");
		  while($fet15=mysql_fetch_assoc($sel5))
		  {
			  //echo $fet15[d_id];
			  mysql_query("INSERT INTO t(a) VALUES('".$fet15[d_id]."')") or die("value not inserted");
			  //echo "&nbsp;B.V".find_bv($fet15[d_id])."<br>";
			  $grand_totalt=$grand_totalt+alter_bal($fet15[d_id]);
		  }
	  }
	  mysql_query("delete from t1") or die ("not deleted");
	  

    
	
}$sdd=$grand_totalt+alter_bal($crt);
	  
	  
	  	$w = "select sum(bv) as total_bv from bill where status='c'";
	   	$rest = mysql_query($w) or die ("query not executed");
	if (mysql_num_rows($rest)>0)
	{
        while ($row2 = mysql_fetch_assoc($rest))
		{  
          $total_amt=$row2["total_bv"];
		  $total_profit=$row2["total_bv"]-$sdd;
		}
	}

$tfg=$total_profit*55/100;
$w = "select sum(money) as total_bv from company_spend";
	   	$rest = mysql_query($w) or die ("query not executed");
	if (mysql_num_rows($rest)>0)
	{
        while ($row2 = mysql_fetch_assoc($rest))
		{  
          $rttttt=$row2["total_bv"];
		}
	}
?>
                <tr><th>Total B.V</th><th></th><th><?php echo $total_amt;?></th></tr>
               <tr> <th>Distributed Amount</th><th></th><th><?php echo $sdd;?></th></tr>
               <tr> <th>Left Amount</th><th></th><th><?php echo $total_profit;?></th></tr>
               <tr> <th>Company Expenses</th><th></th><th><?php echo $rttttt;?></th></tr>
                <tr><th>Total Company Profit</th><th></th><th><?php echo $total_profit-$rttttt;?></th></tr>
                <tr><th>Company Future Balance</th><th><?php echo $total_profit-$rttttt;?>*30/100</th><th><?php echo ($total_profit-$rttttt)*30/100;$rff=($total_profit-$rttttt)*30/100;?></th></tr>
			  <tr> <th>Final Ammount</th><th></th><th><?php $fa=($total_profit-$rttttt-$rff)*45/100; echo $fa;?></th></tr>
			<tr><th>Your B.V</th><th></th><th><?php echo find_under_bv($_SESSION[id]);?></th></tr>
			<tr><th>Percentage You get</th><th><?php echo find_under_bv($_SESSION[id]);?>*100/<?php echo $total_amt;?></th><th><?php $per=find_under_bv($_SESSION[id])*100/$total_amt; echo $per;?></th></tr>
            <tr><th><h3>Your Profit</h3></th><th><?php echo $fa;?>*<?php echo $per;?>/100</th><th><h3><?php echo $fa*$per/100?></h3></th></tr>
                   </table>
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
