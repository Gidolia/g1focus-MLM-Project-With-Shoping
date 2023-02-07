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
    <title>G1focus</title>

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
          	<h3><i class="fa fa-angle-right"></i>RD FD</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
					<div class="content-panel">

          		<p>
                      <table class="table table-bordered table-hover table-striped"><tr><th>RD ID</th><th>bal</th><th>Start date</th><th>End date</th><th>Installment Received</th><th>Clear Amount</th><th>Clear Date</th><th>Month</th><th>Percentage</th><th>Per Installment</tr>

<?php 
$qu="SELECT * FROM `rd` WHERE `d_id`='$_SESSION[id]' and `rd_status`='a'";
$query=mysql_query($qu)or die("value not selected");
if(mysql_num_rows($query)>0)
{
while($fetch=mysql_fetch_assoc($query))
{
?>

                		      <tr>
				   <td><a href="rd_installment.php?rd_id=<?php echo $fetch[rd_id];?>&d_id=<?php echo $fetch[d_id];?>"><?php echo $fetch[rd_id];?></a></td>
                                  <td class="hidden-phone"><?php echo $fetch[bal];?></td>
                                  <td><?php echo $fetch[start_date];?> </td>
                                  <td><?php echo $fetch[end_date];?> </td>
                                  <td><?php echo $fetch[received];?></td>
                                  <td><?php echo $fetch[clear_amount];?></td>
                                  <td><?php echo $fetch[clear_date];?></td>
                                  <td><?php echo $fetch[month];?></td>
                                  <td><?php echo $fetch[percentage];?></td>
                                  <td><?php echo $fetch[per_installment];?></td>
                                 
                                  
                              </tr>     <?php }}else{echo "you don't have any rd";}?>                     

               
               
               </table>


                </p>
                </div></div>
                <div class="col-lg-12">
					<div class="content-panel">
                <p>
                <table class="table table-bordered table-hover table-striped"><tr><th>FD ID</th><th>Amount</th><th>Clear Amount</th><th>Start date</th><th>End Date</th><th>FD Month</th><th>Percentage</th></tr>

<?php 

$qu="SELECT * FROM `fd` WHERE `d_id`='$_SESSION[id]' and `status`='a'";
$query=mysql_query($qu);
while($fetch=mysql_fetch_assoc($query))
{
?>

                		       <tr>
                                  <td><?php echo $fetch[fd_id];?></td>
								  <td><?php echo $fetch[amount];?></td>
                                  <td><?php echo $fetch[clear_amount];?> </td>
                                  <td><?php echo $fetch[start_date];?></td> 
                                  <td><?php echo $fetch[end_date];?></td>
                                  <td><?php echo $fetch[fd_month];?></td> 
                                  <td><?php echo $fetch[percentage];?></td>
								   
                              </tr><?php }?>                     

               
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
