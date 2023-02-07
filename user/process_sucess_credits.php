<?php
include "config.php";
if(isset($_GET[sucess]))
{
    if(isset($_GET[amount]))
    {
        date_default_timezone_set('Asia/Calcutta');
$time=date("h:i:sa");
$o_date=date("Y-m-d");
$rtey=mysql_query("SELECT * FROM `distributor` WHERE `d_id`=".$_SESSION[id]);
	if(mysql_num_rows($rtey)>0)
	{ $tiy=mysql_fetch_assoc($rtey);
		$plus=$tiy[bal]+$_GET[amount];
		
			   
			  
        if($plus>0)
        {
        mysql_query("INSERT INTO `transition_history` (`10`, `20`, `50`, `100`, `500`, `1000`, `2000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `slip_no`, `slip_place`, `time`) VALUES ('$_POST[m10]', '$_POST[m20]', '$_POST[m50]', '$_POST[m100]', '$_POST[m500]', '', '$_POST[m2000]', '$_GET[amount]', '$plus', '$_SESSION[id]', '$o_date', 'online transfer', '+', '$tiy[bal]', '', '', '$_POST[slip]', '', '$time')")or die("transtation not recorded");
		mysql_query("update distributor set bal=".$plus." where d_id=".$_SESSION[id]) or die("balance not updated");
		//////////////////////////////////////////////////////////
		$dd='Your%20a/c%20'.$_SESSION[id].'%20is%20Credited%20INR%20'.$_GET[amount].'%20on%20'.$date.'%20'.$time.'%20a/c%20Bal%20is%20INR%20'.$plus.'%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$tiy[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
////////////////////////////////////////////////////
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$_SESSION[id]', '$tiy[mobile]', '$text', '$response', '', '$date', '$time');");
		echo "<script>location.href='transtion.php?sus=1'</script>"; 
        }
        else{echo "Sorry this cannot ,................(you dont have inof money)";}
	  
        
	}
	else
	{
		echo "customer_id not founded";
	}

    }
}
?>

