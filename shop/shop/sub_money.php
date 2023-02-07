<body bgcolor='#FFA6A8'><h2><font color="red">Sub money</font></h2>
<form method="post">
<input type="hidden" name="d_id" value="<?php include "config.php"; echo $_GET[d_id];?>"  />
amount:: <input type="number" name="bal" required /><br><br>
1x:: <input type="number" name="m1" /><br><br>
2x:: <input type="number" name="m2" /><br><br>
5x:: <input type="number" name="m5" /><br><br>
10x:: <input type="number" name="m10" /><br><br>
20x:: <input type="number" name="m20" /><br><br>
50x:: <input type="number" name="m50" /><br><br>
100x:: <input type="number" name="m100" /><br><br>
500x:: <input type="number" name="m500" /><br><br>
1000x:: <input type="number" name="m1000" /><br><br>
2000x:: <input type="number" name="m2000" /><br><br>
method:: <select name="method"><option value="cash">cash</option>
				 <option value="cheque">cheque</option>
		 </select><br /><br />
Chequeno::<input type="number" name="cheno" /><br /><br />
slip_no::<input type="number" name="slip_no" required /><br /><br />
<input type="submit" name="submit_d_id" onClick="return confirm(
  'Are you sure you want to delete your account?');" />
</form>
<?php
include "config.php";
if(isset($_POST[submit_d_id]))
{$m1=$_POST[m1]*1;
$m2=$_POST[m2]*2;
$m5=$_POST[m5]*5;
$m10=$_POST[m10]*10;
$m20=$_POST[m20]*20;
$m50=$_POST[m50]*50;
$m100=$_POST[m100]*100;
$m500=$_POST[m500]*500;
$m1000=$_POST[m1000]*1000;
$m2000=$_POST[m2000]*2000;
$total=$m1+$m2+$m5+$m10+$m20+$m50+$m100+$m500+$m1000+$m2000;
if($total==$_POST[bal])
{
date_default_timezone_set('Asia/Calcutta');
$time=date("h:i:sa");
$o_date=date("Y-m-d");
$rtey=mysql_query("SELECT * FROM `distributor` WHERE `d_id`=".$_POST[d_id]);
	if(mysql_num_rows($rtey)>0)
	{ $tiy=mysql_fetch_assoc($rtey);
		$plus=$tiy[bal]-$_POST[bal];
		
        if($plus>=0)
        {
        mysql_query("INSERT INTO `transition_history` (`1`, `2`, `5`, `10`, `20`, `50`, `100`, `500`, `1000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `chequeno`, `slip_no`, `time`) VALUES ('$_POST[m1]', '$_POST[m2]', '$_POST[m5]', '$_POST[m10]', '$_POST[m20]', '$_POST[m50]', '$_POST[m100]', '$_POST[m500]', '$_POST[m1000]', '$_POST[bal]', '$plus', '$_POST[d_id]', '$o_date', '$_POST[method]', '-', '$tiy[bal]', '$_SESSION[shop_id]', '$_SESSION[e_id]', '$_POST[cheno]', '$_POST[slip_no]', '$time')")or die("transtation not recorded");
		mysql_query("update distributor set bal=".$plus." where d_id=".$_POST[d_id]) or die("balance not updated");
		//////////////////////////////////////////////////////////
		$dd='Your%20a/c%20'.$_POST[d_id].'%20is%20Debited%20INR%20'.$_POST[bal].'%20on%20'.$date.'%20'.$time.'%20a/c%20Bal%20is%20INR%20'.$plus.'%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$tiy[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
////////////////////////////////////////////////////
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$tiy[mobile]', '$text', '$response', '', '$date', '$time');");
		echo "<script>alert('money Submited Succesfully');window.parent.location.reload();</script>"; 
        }
        else{echo "Sorry this cannot ,................(you dont have inof money)";}
		
        
	}
	else
	{
		echo "customer_id not founded";
	}
	
} 
else{echo "<script>alert('amount you enter doesnt match note');
			location.href='sub_money.php?d_id=$_GET[d_id]';</script>";}
}?>