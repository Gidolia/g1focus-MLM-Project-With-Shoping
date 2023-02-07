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
          	<h3><i class="fa fa-angle-right"></i>Bidding pannel</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                <div class="content-panel">
                <h3><i class="fa fa-angle-right"></i>Current Bidding</h3>
                <?php 
					  if(isset($_GET[sus]))
					  {?>	
							<div class="alert alert-success"><b>Sucess!</b> you sucessfully bidded</div>
						<?php }?>
                        <?php 
					  if(isset($_GET[fail]))
					  {?>	
							<div class="alert alert-danger"><b>failed!</b>You Dont have Balance To use this Service</div><?php }?>
               <p>
               <?php $gr=mysql_query("SELECT * FROM `bid` WHERE `d_id`='$_SESSION[id]'")or die("sorry some problem occour");
               $gf=mysql_fetch_assoc($gr);
               if(mysql_num_rows($gr)>'0'){ ?>
               <table class="table table-bordered table-hover table-striped">
               <tr><th>Bid Number</th><td><?php echo $gf[bid_no];?></td></tr>
               <tr><th>Bid Amount</th><td>Rs <?php echo $gf[amount];?></td></tr>
               <tr><th>Returning Amount</th><td>Rs <?php echo $gf[amount]*10;?></td></tr>      
               <tr><th>Results Declared date</th><td>Tomorow  8:00 AM</td></tr>             
               </table>
               <?php }else{?>
                             <form method="post">
               Select biding no.
               
               <select class="form-control" name="bidding_no">
               <?php
               for($i=1;$i<=50;$i++)
               {
                  echo "<option value='$i'>$i</option>";
               }?></select>
               Bidding Amount (must be more than 10rs)
               <input type="number" class="form-control" name="amount" min="10" required>
               <input type="submit" class="btn btn-primary" value="Bid Number" name="submit"></form><?php }?>
               Note::
               <ul><li>By bidding you also get 100% B.V Weather you win or lose</li>
               <li>You get 10x times of bidding amount</li>
               <li>This is bidding you may win or lose the amount</li>
               <li>Winning Number is declared on given Date (date will be displayed after bidding)</li>
               </ul>
                </p>
</div>          		</div>
  
 <br>&nbsp;<br>
          	</div>
                <div class="row mt">
          		<div class="col-lg-12">
                <div class="content-panel">
                <h3><i class="fa fa-angle-right"></i>Bidding History</h3>
                <p>
                <table class="table table-bordered table-hover table-striped">
               <tr><th>Sr No.</th><th>Your bid no.</th><th>Bid Result</th><th>Results Date</th><th>Won</th></tr>
                         <?php $d=0;
                         $grc=mysql_query("SELECT * FROM `bid_history` WHERE `d_id`='$_SESSION[id]'")or die("sorry some problem occour");
                         while($gfc=mysql_fetch_assoc($grc))
                         {
                         $d++;
                         	echo "<tr><td>".$d."</td><td>".$gfc[bid_no]."</td><td>".$gfc[bid_result_no]."</td><td>".$gfc[date]."</td><td>".$gfc[bid_win]."</td></tr>";
                         }
                         ?>
               </table>
                </p>
                </div>
                </div>
                </div>
                
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
<?php
if(isset($_POST[submit]))
{
   
    $price=$_POST[amount];
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
        mysql_query("INSERT INTO `transition_history` (`10`, `20`, `50`, `100`, `500`, `1000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `chequeno`, `slip_no`, `time`) VALUES ('$_POST[m10]', '$_POST[m20]', '$_POST[m50]', '$_POST[m100]', '$_POST[m500]', '$_POST[m1000]', '$price', '$plus', '$_SESSION[id]', '$date', 'bid', '-', '$tiy[bal]', 'software', 'software', '$_POST[cheno]', '$_POST[slip_no]', '$time')")or die("transtation not recorded");
		mysql_query("update distributor set bal=".$plus." where d_id=".$_SESSION[id]) or die("balance not updated");
		mysql_query("INSERT INTO `bill` (`bill_id`, `d_id`, `o_date`, `s_date`, `name`, `addreass`, `mobile`, `mobile2`, `pincode`, `city`, `state`, `addreasstype`, `price`, `bv`, `status`, `paid`, `de_id`, `online`, `shop_id`, `method`) VALUES ('$bill_id', '$_SESSION[id]', '$date', '$date', '', '', '', '', '', '', '', '', '$price', '$price', 'c', '', '', '', '', 'bid')");
		 mysql_query("INSERT INTO `bid` (`bid_id`, `bid_no`, `d_id`, `date`, `time`, `amount`) VALUES (NULL, '$_POST[bidding_no]', '$_SESSION[id]', '$date', '$time', '$_POST[amount]');");
		$dd='Your%20a/c%20'.$_SESSION[id].'%20is%20Debited%20INR%20'.$_POST[amount].'%20on%20'.$date.'%20'.$time.'%20a/c%20Bal%20is%20INR%20'.$plus.'%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$tiy[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
////////////////////////////////////////////////////
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$tiy[mobile]', '$text', '$response', '', '$date', '$time');");		
		echo "<script>
			location.href='bid_number.php?sus=1';</script>"; 
        }
        else{echo "<script>
			location.href='bid_number.php?fail=1';</script>"; }
		
        
	}
	else
	{
		echo "<script>
			location.href='bid_number.php?error=1';</script>";
	}

}
?>
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
