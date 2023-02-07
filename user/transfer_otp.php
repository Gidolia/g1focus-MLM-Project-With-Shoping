<?php include "config.php";
 			$d_id=$_GET[jasbfdsgifbt]-'8965668629986666589';
				$amount=$_GET[cvhgfbnvbfkjvbjhhshafbsgvhgfg]-'845452451845475124';
				$otp=$_GET[odfggrgrg]-'54152454465';
				
				$sql="SELECT * FROM distributor WHERE d_id = '".$d_id."'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
 
  
  
$select_named='select * from distributor where d_id='.$_SESSION[id];
				  $fghjd=mysql_query($select_named) or die ("Some thing went wrong");
				  $yuid=mysql_fetch_assoc($fghjd);
$dd='Your code is '.$otp.' of amount Rs '.$amount.' to '.$row[d_name];
$dd = str_replace(' ', '%20', $dd);
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$yuid[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
echo "<script>alert('Otp sended sucessfully to your register mobile number');</script>";

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
          	 
						
                   <div class="row mt">
          		<div class="col-lg-12"> 
			   <div class="content-panel">
					<p>
					<h3>Transfering amount detailed</h3>
		    <form class="form-horizontal style-form" method="post" action="process_transfer_amount.php">
			   <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><h4>ID</h4></label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="d_id" value="<?php echo $d_id;?>"  required readonly>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><h4>Name</h4></label>
                              <div class="col-sm-10">
                                                            
                                  <input type="text" class="form-control" name="name" value="<?php echo $row[d_name];?>"  required readonly>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><h4>amount</h4></label>
                              <div class="col-sm-10">                 
                                  <input type="text" class="form-control" name="amount" value="<?php echo $amount;?>"  required readonly>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><h4>OTP</h4></label>
                              <div class="col-sm-10">                 
                                  <input type="text" class="form-control" name="otp"  required>
                                  <span class="help-block"><a href="javascript:history.go(0)">Send again otp</a></span>

                              </div>
                          </div>
                          <input type="hidden" class="form-control" name="jkdnsfvojfdvjndfj" value="<?php echo $_GET[odfggrgrg];?>"  required>
                          <div class="form-group">
                              
                              <div class="col-sm-6">
                             
                                  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Transfer Amount" name="transfer">
                                
                              </div>
                              <div class="col-sm-6">
                             
                                <a href="transtion.php">  <button class="btn btn-danger btn-lg btn-block">Cancel</button></a>
                                
                              </div>
                          </div>
        </form> </p>
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
