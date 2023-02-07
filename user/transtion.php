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
          	 <?php 
					  if(isset($_GET[sus]))
					  {?>
      									
							<div class="alert alert-success"><b>Sucess!</b> amount process sucessfully</div>
						<?php }?>
                        <?php 
					  if(isset($_GET[fail]))
					  {?>	
							<div class="alert alert-danger"><b>failed!</b>Some problem occour please try again</div><?php }?>
						
          	<div class="row mt">
          		
                <div class="col-lg-6 mb">
		
                
                <div class="white-panel pn">
								<div class="white-header">
									<h5>Current Balance RS <?php echo $ser[bal];?></h5>
								</div>
								<p><a href="sn_profile.php"><img src="<?php echo $fn;?>" class="img-circle" width="80"></a></p>
								<p><b><?php echo $yui[d_name];?></b></p>
								<div class="row">
									<div class="col-md-12">
										<p class="small mt">TOTAL BALANCE</p>
										<p>RS <?php echo $ser[bal];?></p>
									</div>
								</div>
							</div>

                             
                </div>
                <div class="col-lg-6 mb">
					<div class="white-panel pn">

          		
          		<div class="white-header"><h5> Transfer Amount to Friends account</h5></div>
          		<form class="form-horizontal style-form" method="post">
                          <div class="form-group">
                             
                              <div class="col-sm-12">
                                                            
                                  <input type="number" class="form-control" name="d_id" placeholder="Account id"  required>
                              </div>
                          
                             
                              <div class="col-sm-12">
                                                            
                                  <input type="number" class="form-control" name="amount" placeholder="Amount"  required>
                              </div>
                          </div>
                          <div class="form-group">
                              
                              <div class="col-sm-12">
                             
                                  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Transfer Amount to Other account" name="transfer_amount">
                                
                              </div>
                          </div>
               </form>
                
          	<?php
          	if(isset($_POST[transfer_amount]))
          	{
          		$d_id=$_POST[d_id]+'8965668629986666589';
          		$amount=$_POST[amount]+'845452451845475124';
          		$otp=rand(1000, 9999);
          		$enf=$otp+'54152454465';
          		echo "<script>location.href='transfer_otp.php?jasbfdsgifbt=$d_id&cvhgfbnvbfkjvbjhhshafbsgvhgfg=$amount&xchjbdhvjgfyjhbvfbgnh=hcgdjhgdfbuyvfgbrhvysghdfhdvcdgchsbf&odfggrgrg=$enf';</script>";
          		
          	}
          	?>	
                
                
                </div>
                </div>
                </div><div class="row mt">
          	<div class="col-lg-6">
					<div class="white-panel pn">

          		
          		<div class="white-header"><h5>Credit Balance</h5></div>
                <form class="form-horizontal style-form" action="transfer_confirm.php" method="get">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><h4>Amount</h4></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="amount"  required maxlength="10">
                              </div>
                          </div>
                          <div class="form-group">
                              
                              <div class="col-sm-12">
                             
                                  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Credit Amount in Current balance" name="credit">
                                
                              </div>
                          </div>
               </form>
               <h5>You can transfer Amount this amount back to bank account</h5>
            
                </div>
                </div>
                <div class="col-lg-6">
					<div class="white-panel pn">

          		
          		<div class="white-header"><h5>Balance Credit to bank account</h5></div>
                <form class="form-horizontal style-form" method="post">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><h4>Amount</h4></label>
                              <div class="col-sm-10">
                                                            
                                  <input type="text" class="form-control" name="number"  required min="500" disabled>
                              </div>
                          </div>
                          <div class="form-group">
                              
                              <div class="col-sm-12">
                             
                                  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Transfer Amount to bank account" name="send_sms" disabled>
                                
                              </div>
                          </div>
               </form>
                <h5>You can transfer Amount to your bank account after 500Rs in current Balance</h5>
                
                
                </div>
                </div></div>
                <div class="row mt">
          		<div class="col-lg-12">
					<div class="content-panel">
					<h3><i class="fa fa-angle-right"></i>Transition History</h3>
                <table class="table table-bordered table-hover table-striped"><tr><th>Transtion ID</th><th>Date</th><th>Method</th><th>Type</th><th>amount</th></tr>

                
                               <?php 
							   include "config.php";
							   $o_date=date("Y-m-d");
$qu="SELECT * FROM `transition_history` WHERE `d_id`='$_SESSION[id]'";
$query=mysql_query($qu);
while($fetch=mysql_fetch_assoc($query))
{?>

                		   <tr>                                 
                                  <td><?php echo $fetch[t_id];?></td>
								  <td><?php echo $fetch[date];?></td>
                                  <td><?php echo $fetch[method];?></td>
                                  <th><?php echo $fetch[type];?></th>
                                  <td class="hidden-phone"><?php echo $fetch[amount];?></td>
           
                                  
								 
                               
                              </tr>                          

              <?php 
			   if($fetch[type]=='+'){$to=$fetch[amount];}
			   else{$to=$fetch[amount]*(-1);}
			   $tg=$tg+$to;
			  }?>
			 <tr><th>Total</th><td></td><td></td><td></td><td><?php echo $tg;?></td></tr>
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
