<?php
include "config.php";
if(isset($_POST[t_id_submit]))
{

$qu="SELECT * FROM `transition_history` WHERE `t_id`='$_POST[t_id]'";
$query=mysql_query($qu);
$fetch=mysql_fetch_assoc($query);
$rtey=mysql_query("SELECT * FROM `distributor` WHERE `d_id`=".$fetch[d_id])or die("not selected");
	
	 $tiy=mysql_fetch_assoc($rtey);
	if($fetch[type]=='+'){$plus=$tiy[bal]-$fetch[amount]; $a="Debited";}
	elseif($fetch[type]=='-'){$plus=$tiy[bal]+$fetch[amount]; $a="Credited";}
if($fetch[b_bal]==$plus)
{
mysql_query("DELETE FROM `transition_history` WHERE `t_id`='$_POST[t_id]'")or die("sorry some error occur this cannot be deleted");
mysql_query("INSERT INTO `delete_transtion_history` (`t_id`, `d_e_id`, `1`, `2`, `5`, `10`, `20`, `50`, `100`, `500`, `1000`, `2000`, `amount`, `api_user_id`, `a_bal`, `branch_id`, `by`, `b_bal`, `chequeno`, `costumer_name`, `date`, `d_id`, `e_id`, `method`, `slip_fileno`, `slip_no`, `slip_place`, `time`, `to`, `type`, `d_time`, `d_date`) VALUES ('$fetch[t_id]', '$_SESSION[e_id]', '$fetch[1]', '$fetch[2]', '$fetch[5]', '$fetch[10]', '$fetch[20]', '$fetch[50]', '$fetch[100]', '$fetch[500]', '$fetch[1000]', '$fetch[2000]', '$fetch[amount]', '$fetch[api_user_id]', '$fetch[a_bal]', '$fetch[branch_id]', '$fetch[by]', '$fetch[b_bal]', '$fetch[chequeno]', '$fetch[costumer_name]', '$fetch[date]', '$fetch[d_id]', '$fetch[e_id]', '$fetch[method]', '$fetch[slip_fileno]', '$fetch[slip_no]', '$fetch[slip_place]', '$fetch[time]', '$fetch[to]', '$fetch[type]', '$time', '$date');")or die("deleted not recorded");
mysql_query("update distributor set bal=".$plus." where d_id=".$fetch[d_id]) or die("balance not updated");
//////////////////////////////////////////////////////////
		$dd='Your%20a/c%20'.$_POST[d_id].'%20is%20'.$a.'%20INR%20'.$_POST[bal].'%20on%20'.$date.'%20'.$time.'%20a/c%20Bal%20is%20INR%20'.$plus.'%20Due%20to%20unknown%20Transtion%20T%20ID%20::%20'.$_POST[t_id].'%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$tiy[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
////////////////////////////////////////////////////
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$tiy[mobile]', '$text', '$response', '', '$date', '$time');");
echo "<script>alert('Deleted sucessfully');
window.parent.location.reload();</script>";
}
else{echo "<script>alert('this cannot be deleted you can only delete last transtion only or something went wrong');
			location.href='transtion.php?d_id=$fetch[d_id]';</script>";}
}