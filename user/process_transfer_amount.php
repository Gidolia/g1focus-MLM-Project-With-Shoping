<?php
include "config.php";
echo $_POST[d_id];
if(isset($_POST[transfer]))
{
   $otp=$_POST[jkdnsfvojfdvjndfj]-'54152454465';
   if($_POST[otp]==$otp)
   {
///////////////////////////////////////////////////////////////////
$price=$_POST[amount];
$rtey=mysql_query("SELECT * FROM `distributor` WHERE `d_id`=".$_SESSION[id])or die("sorry some error please try again1");
	if(mysql_num_rows($rtey)>0)
	{ $tiy=mysql_fetch_assoc($rtey);
		$plus=$tiy[bal]-$price;
		
	if($plus>0)
        {
        $rteye=mysql_query("SELECT * FROM `distributor` WHERE `d_id`=".$_POST[d_id])or die("sorry some error please try again2");
	if(mysql_num_rows($rteye)>0)
	{ $tiye=mysql_fetch_assoc($rteye);
		$pluse=$tiye[bal]+$price;
		
	if($pluse>0)
        {
        mysql_query("INSERT INTO `transition_history` (`10`, `20`, `50`, `100`, `500`, `1000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `chequeno`, `slip_no`, `time`, `to`) VALUES ('$_POST[m10]', '$_POST[m20]', '$_POST[m50]', '$_POST[m100]', '$_POST[m500]', '$_POST[m1000]', '$price', '$plus', '$_SESSION[id]', '$date', 'transfer', '-', '$tiy[bal]', 'costumer', 'costumer', '$_POST[cheno]', '$_POST[slip_no]', '$time', '$_POST[d_id]')")or die("transtation not recorded");
		mysql_query("update distributor set bal=".$plus." where d_id=".$_SESSION[id]) or die("balance not updated");
		
	mysql_query("INSERT INTO `transition_history` (`10`, `20`, `50`, `100`, `500`, `1000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `chequeno`, `slip_no`, `time`, `by`) VALUES ('$_POST[m10]', '$_POST[m20]', '$_POST[m50]', '$_POST[m100]', '$_POST[m500]', '$_POST[m1000]', '$price', '$pluse', '$_POST[d_id]', '$date', 'transfer', '+', '$tiye[bal]', 'costumer', 'costumer', '$_POST[cheno]', '$_POST[slip_no]', '$time', '$_SESSION[id]')")or die("transtation not recorded");
		mysql_query("update distributor set bal=".$pluse." where d_id=".$_POST[d_id]) or die("balance not updated");
		
		
		$dd='Your%20a/c%20'.$_POST[d_id].'%20is%20Credited%20INR%20'.$price.'%20on%20'.$date.'%20'.$time.'%20a/c%20Bal%20is%20INR%20'.$pluse.'%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$tiye[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
////////////////////////////////////////////////////
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$_POST[d_id]', '$tiye[mobile]', '$text', '$response', '', '$date', '$time');");
///////////////////////////////////////////
$dd='Your%20a/c%20'.$_SESSION[id].'%20is%20Debited%20INR%20'.$price.'%20on%20'.$date.'%20'.$time.'%20a/c%20Bal%20is%20INR%20'.$plus.'%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$tiy[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
////////////////////////////////////////////////////
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$tiy[mobile]', '$text', '$response', '', '$date', '$time');");
		
		echo "<script>alert('transfer sucessfully');
			location.href='transtion.php?sus=1';</script>";
	}
        else{echo "<script>alert('you dont have balance to transfer');
			location.href='transtion.php?fail=1';</script>"; }
		
        
	}
	else
	{
		echo "customer_id not founded";
	}
	}
        else{echo "<script>alert('you dont have balance to transfer');
			location.href='transtion.php?fail=1';</script>"; }
		
        
	}
	else
	{
		echo "customer_id not founded";
	}

       
   }
   else{echo "<script>alert('otp you enter not match please try again'); location.href='transtion.php?fail=1';</script>";}
}