  <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">              				<table class="table table-bordered table-hover table-striped"><tr><th>RD ID</th><th>bal</th><th>Start date</th><th>End date</th><th>Installment Received</th><th>Clear Amount</th><th>Clear Date</th><th>Month</th><th>Percentage</th><th>Per Installment</tr>

<?php 
include "config.php";
include "to_bv.php";
$qu="SELECT * FROM `rd` WHERE `d_id`='$_GET[d_id]' and `rd_status`='a'";
$query=mysql_query($qu);
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
                                 
                                  
                              </tr>     <?php }?>                     

               
               
               </table>
               <h2>Start RD Form</h2>
<form method="post">
Per installment amount:: <input type="number" name="amount" /><br />
<input type="hidden" name="d_id" value="<?php echo $_GET[d_id];?>" />
month:: <input type="number" name="month" /><br />
form no.:: <input type="number" name="formno" /><br />
percentage:: <input type="text" name="percent" /><br />



<input type="submit" name="start_rd" />
</form>
<?phP
if(isset($_POST[start_rd]))
{
	$o_date=date("Y-m-d");
	$date=date_create(date("Y-m-d"));
	$fg=$_POST[month]-1;
	date_add($date,date_interval_create_from_date_string("$_POST[month] months")); 
	$date=date_format($date,"Y-m-d");
	$y=$_POST[amount];
	
	$rj=$_POST[percent]/12;
	/////////////////////////////////////////////////RD Calculator
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$a=$_POST[amount];
$d=$_POST[month];
$r=$_POST[percent];
$re=$r/12;
$c=1;
$f=1;
for($x=1; $x<$d+1; $x++)
{
   $v=$v+$a;
   $pe=$v * $re/100;
   
   echo $df . " ".$pe." ".$v."<br>";
   if($f==$c)
   {
	  $f=0;
	  $v=$v+$pe;
   }
   $df=$df+$pe;
   $f++;
}
$dfgh=$a*$d;
$fin=$dfgh+intval($df);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$bv_amount=$_POST[amount]*11/100;
	$rty=$fin;
	$datee=date_create(date("Y-m-d"));
	date_add($datee,date_interval_create_from_date_string("$fg months"));
	$datee=date_format($datee,"Y-m-d");
	
			
	$rtey=mysql_query("SELECT * FROM `distributor` WHERE `d_id`=".$_POST[d_id]) or die("costumer not selected");
	if(mysql_num_rows($rtey)>0)
	{ $tiy=mysql_fetch_assoc($rtey);			
   	$pluse=$tiy[bal]-$_POST[amount];
	////////////////////////////
	
  /////////////////////
  

			if($pluse>=0)
			{
$quer="select max(rd_id) as maxh from rd";
$rr=mysql_query($quer) or die("max rd_id not selected");
if($rr)
  {
  $rowr=mysql_fetch_array($rr);  
  $rd_id=$rowr['maxh'];


  $rd_id=$rd_id+1;
  
  }

			mysql_query("INSERT INTO `rd` (`rd_id`, `d_id`, `start_date`, `end_date`, `percentage`, `month`, `days`, `clear_amount`, `bal`, `installment_period`, `installment_qty`, `clear_date`, `received`, `per_installment`, 	`rd_slip_no.`, `e_id`, `rd_status`) VALUES ('$rd_id', '$_POST[d_id]', '$o_date', '$datee', '$_POST[percent]', '$_POST[month]', '', '$rty', '$_POST[amount]', 'monthly', '$_POST[month]', '$date', '1', '$_POST[amount]', '$_POST[formno]', 'admin', 'a')")or die("Rd info not selected");
			
			mysql_query("INSERT INTO `rd_info` (`rd_id`, `date`, `due_days`, `late_install_charge`, `charge_percantage`, `amount`, `d_id`) VALUES ('$rd_id', '$o_date', '0', '0', '2', '$_POST[amount]', '$_POST[d_id]')")or die("not inserted");
			
		
			mysql_query("INSERT INTO `transition_history` (`10`, `20`, `50`, `100`, `500`, `1000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `to`, `time`) VALUES ('', '', '', '', '', '', '$_POST[amount]', '$pluse', '$_POST[d_id]', '$o_date', 'transfer RD', '-', '$tiy[bal]', 'admin', 'admin', 'RD', '$time')")or die("transtation not recorded");
			
			mysql_query("update distributor set bal=".$pluse." where d_id=".$_POST[d_id]) or die("balance not updated");
			$que="select max(bill_id) as max from bill";
     $r=mysql_query($que) or die("query not performed");
if($r)
  {
  $row=mysql_fetch_array($r);  
  $bill_id=$row['max'];


  $bill_id=$bill_id+1;
  
  }
			mysql_query("INSERT INTO `bill` (`bill_id`, `d_id`, `o_date`, `s_date`, `name`, `addreass`, `mobile`, `mobile2`, `pincode`, `city`, `state`, `addreasstype`, `price`, `bv`, `status`, `paid`, `de_id`, `online`, `shop_id`, `method`, `bv_met`) VALUES ('$bill_id', '$_POST[d_id]', '$o_date', '$o_date', '', '', '', '', '', '', '', '', '$_POST[amount]', '$bv_amount', 'c', '', '', '', '', 'RD', '1')");
	$o_bv=find_bv($_POST[d_id]);			
					$dd='Your%20a/c%20'.$_POST[d_id].'%20is%20Debited%20INR%20'.$_POST[amount].'%20on%20'.$date.'%20'.$time.'%20a/c%20Bal%20is%20INR%20'.$pluse.'%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$tiy[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
////////////////////////////////////////////////////
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$tiy[mobile]', '$text', '$response', '', '$date', '$time');");

$dd='Your%20a/c%20'.$_POST[d_id].'%20Your%20RD%20Started%20sucessfully%20RD%20no.%20'.$rd_id.'.%20%201st%20installment%20received%20'.$_POST[amount].'%20Your%20RD%20Bal%20'.$_POST[amount].'%20%20%20Your%20BV%20bal%20'.$o_bv.'%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$tiy[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
////////////////////////////////////////////////////
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$tiy[mobile]', '$text', '$response', '', '$date', '$time');");
		echo "<script>alert('RD Started and money subtracted sucessfully');window.parent.location.reload();</script>";}
			}
			else{echo "Sorry this cannot ,................(you dont have inof money)";}
		}
	
?>

