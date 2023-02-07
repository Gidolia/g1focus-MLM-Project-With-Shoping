<table border="1">
<?php 
include "config.php";
for($i=1;$i<=50;$i++)
{
        $d=0;
        $amount=0;
	$g=mysql_query("SELECT * FROM `bid` WHERE `bid_no`=$i");
	while($t=mysql_fetch_assoc($g))
	{
		$d++;
		$amount=$amount+$t[amount];		
	}
	$tam=$tam+$amount;
	if($amount>0){$l='red';}else{$l='greenc';}
        echo "<tr bgcolor=".$l."><td>".$i."</td><td> ".$d."</td><td>".$amount."</td></tr>";
}
echo $tam;
?>
</table>
<form method="post">
<input type="number" name="final_number" placeholder="bidnumber" min="1" max="50">
<input type="password" name="password">
<input type="submit" name="submit">
</form>
<?php
if(isset($_POST[submit]))
{
	if($_POST[password]=='507501866')
	{
		for($i=1;$i<=50;$i++)
		{
		        $d=0;
		        $amount=0;
			$g=mysql_query("SELECT * FROM `bid` WHERE `bid_no`=$i");
			if(mysql_num_rows($g)>0){
			while($t=mysql_fetch_assoc($g))
			{
				$d++;
				$amount=$amount+$t[amount];
				if($_POST[final_number]==$t[bid_no]){$v='y'; $rop=$t[amount]*10;
				/////////////////////////////////////////////////////////////
				date_default_timezone_set('Asia/Calcutta');
$time=date("h:i:sa");
$o_date=date("Y-m-d");
$rtey=mysql_query("SELECT * FROM `distributor` WHERE `d_id`=".$t[d_id]);
	if(mysql_num_rows($rtey)>0)
	{ $tiy=mysql_fetch_assoc($rtey);
		$plus=$tiy[bal]+$rop;
		
			   
			  
        if($plus>0)
        {
        mysql_query("INSERT INTO `transition_history` (`10`, `20`, `50`, `100`, `500`, `1000`, `2000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `slip_no`, `slip_place`, `time`) VALUES ('$_POST[m10]', '$_POST[m20]', '$_POST[m50]', '$_POST[m100]', '$_POST[m500]', '', '$_POST[m2000]', '$rop', '$plus', '$t[d_id]', '$o_date', 'bid', '+', '$tiy[bal]', 'admin', '$_SESSION[e_id]', '$_POST[slip]', 'office', '$time')")or die("transtation not recorded");
		mysql_query("update distributor set bal=".$plus." where d_id=".$t[d_id]) or die("balance not updated");
		//////////////////////////////////////////////////////////
		$dd='Your%20a/c%20'.$t[d_id].'%20is%20Credited%20INR%20'.$rop.'%20on%20'.$date.'%20'.$time.'%20a/c%20Bal%20is%20INR%20'.$plus.'%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$tiy[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
////////////////////////////////////////////////////
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$t[d_id]', '$tiy[mobile]', '$text', '$response', '', '$date', '$time');");
        }
        else{echo "Sorry this cannot ,................(you dont have inof money)";}
	  
        
	}
	else
	{
		echo "customer_id not founded";
	}

				/////////////////////////////////////////////////////////////
				}else{$v='n';}
				mysql_query("INSERT INTO `bid_history` (`bid_h_id`, `date`, `time`, `d_id`, `bid_no`, `amount`, `bid_win`, `bid_result_no`, `bid_date`, `bid_time`) VALUES (NULL, '$date', '$time', '$t[d_id]', '$t[bid_no]', '$t[amount]', '$v', '$_POST[final_number]', '$t[date]', '$t[time]');")or die("sorry ");		
			}
			}
			$tam=$tam+$amount;
			
		}		
	}else{echo "password";}	
}else{echo "not clickef";}	
?>