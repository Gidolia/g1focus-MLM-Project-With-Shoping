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
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Send SMS</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel" style="white-space:nowrap;">
                  <br>&nbsp;<br>
                  	  <!-- ALERTS EXAMPLES -->
                      <?php 
					  if(isset($_GET[sus]))
					  {?>
      									
							<div class="alert alert-success"><b>Sucess!</b> Your Message Sended Successfully</div>
						<?php }?>
                        <?php 
					  if(isset($_GET[fail]))
					  {?>	
							<div class="alert alert-danger"><b>failed!</b>You Dont have Balance To use this Service</div><?php }?>
						 
                    
							     				
      				
      				
      				<!-- DISMISSABLE ALERT -->
                      <form class="form-horizontal style-form" method="post">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><h4>Number</h4></label>
                              <div class="col-sm-10">
                              <?php if(isset($_GET[mob_no])){$sc="value='".$_GET[mob_no]."'";}?>
                              
                                  <input type="text" class="form-control" name="number" <?php echo $sc;?> required maxlength="10" pattern="\d{10}"  title="Please enter exactly 10 digits">
                              </div>
                          </div>
                          
                          
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><h4>Message</h4></label>
                              <div class="col-sm-10">
                                  <textarea name="message" class="form-control" rows="5"></textarea>
                                
                              </div>
                          </div>
                          <div class="form-group">
                              
                              <div class="col-sm-10">
                                  <input type="submit" class="btn btn-primary" value="Send SMS" name="send_sms">
                                
                              </div>
                          </div>
               </form>
			   <?php
if(isset($_POST[send_sms]))
{

$price=1;
$rtey=mysql_query("SELECT * FROM `distributor` WHERE `d_id`=".$_SESSION[id]);
	if(mysql_num_rows($rtey)>0)
	{ $tiy=mysql_fetch_assoc($rtey);
		$plus=$tiy[bal]-$price;
		
		$que="select max(bill_id) as max from bill";
     $r=mysql_query($que) or die("query not performed");
if($r)
  {
  $row=mysql_fetch_array($r);  
  $bill_id=$row['max'];


  $bill_id=$bill_id+1;
  
  }
        if($plus>0)
        {
        mysql_query("INSERT INTO `transition_history` (`10`, `20`, `50`, `100`, `500`, `1000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `chequeno`, `slip_no`, `time`) VALUES ('$_POST[m10]', '$_POST[m20]', '$_POST[m50]', '$_POST[m100]', '$_POST[m500]', '$_POST[m1000]', '$price', '$plus', '$_SESSION[id]', '$date', 'sms', '-', '$tiy[bal]', 'admin', 'admin', '$_POST[cheno]', '$_POST[slip_no]', '$time')")or die("transtation not recorded");
		mysql_query("update distributor set bal=".$plus." where d_id=".$_SESSION[id]) or die("balance not updated");
		mysql_query("INSERT INTO `bill` (`bill_id`, `d_id`, `o_date`, `s_date`, `name`, `addreass`, `mobile`, `mobile2`, `pincode`, `city`, `state`, `addreasstype`, `price`, `bv`, `status`, `paid`, `de_id`, `online`, `shop_id`, `method`) VALUES ('$bill_id', '$_SESSION[id]', '$date', '$date', '', '', '', '', '', '', '', '', '$price', '$price', 'c', '', '', '', '', 'sms')");
		$fr=$_POST[message].' From '.$tiy[d_name].' G1focus';
		$dd=str_replace(' ', '%20', $fr);

$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$_POST[number].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

echo $response;
		mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`, `sended_by`) VALUES (NULL, '$_SESSION[id]', '$_POST[number]', '$_POST[message]', '$response', '', '$date', '$time', 'distributor')");
		
		
		
		echo "<script>
			location.href='send_sms.php?sus=1';</script>"; 
        }
        else{echo "<script>
			location.href='send_sms.php?fail=1';</script>"; }
		
        
	}
	else
	{
		echo "customer_id not founded";
	}
}
?>
          		</div>
          	</div>
            <br>
            &nbsp;<br>&nbsp;<br>&nbsp;<br>

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
