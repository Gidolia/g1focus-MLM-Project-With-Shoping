<?php
include "config.php";
$g=mysql_query("select * from pre_distributor where d_id=$_GET[d_id]")or die("some thing went wrong please contact company no. 7869470415. txn id=$_GET[txn_id]");
$d=mysql_fetch_assoc($g);
mysql_query("INSERT INTO distributor(d_id,sponsor_no,proposer_no,d_name,father_name,nominee_name,d_dob,nominee_dob,house_addreass,state,district,tehsil,post,city,pincode,mobile,mobile2,email,id_proof,addreass_proof,password,joining_date,kyc,new,joining_transtion_id) VALUES('$d[d_id]','$d[sponsor_no]','$d[proposer_no]','$d[d_name]','$d[father_name]','$d[nominee_name]','$d[d_dob]','$d[nominee_dob]','$d[house_addreass]','$d[state]','$d[district]','$d[tehsil]','$d[post]','$d[city]','$d[pincode]','$d[mobile]','$d[mobile2]','$d[email]','$d[id_proof]','$d[addreass_proof]','$d[password]','$d[joining_date]','$d[kyc]','$d[new]','$_GET[txn_id]')")or die("some thing went wrong please contact company no. 7869470415. txn id $_GET[txn_id] ");
mysql_query("INSERT INTO `transition_history` (`t_id`, `1`, `2`, `5`, `10`, `20`, `50`, `100`, `500`, `1000`, `2000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `slip_no`, `to`, `type`, `b_bal`, `branch_id`, `e_id`, `slip_place`, `slip_fileno`, `api_user_id`, `l_id`, `chequeno`, `costumer_name`, `by`, `time`, `bill_id`) VALUES (NULL, '', '', '', '', '', '', '', '', '', '', '100', '100', '$_GET[d_id]', '$date', 'online transfer', '', '', '+', '0', '', '', '', '', '', '', '', '', '', '$time', '');");
$que="select max(bill_id) as max from bill";
 $r=mysql_query($que) or die("query not performed");
if($r)
  {
  $row=mysql_fetch_array($r);  
  $bill_id=$row['max'];
  $bill_id=$bill_id+1;
  }
mysql_query("INSERT INTO `transition_history` (`t_id`, `1`, `2`, `5`, `10`, `20`, `50`, `100`, `500`, `1000`, `2000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `slip_no`, `to`, `type`, `b_bal`, `branch_id`, `e_id`, `slip_place`, `slip_fileno`, `api_user_id`, `l_id`, `chequeno`, `costumer_name`, `by`, `time`, `bill_id`, `transtion_id`) VALUES (NULL, '', '', '', '', '', '', '', '', '', '', '100', '0', '$_GET[d_id]', '$date', 'bv purchase', '', '', '-', '100', '', '', '', '', '', '', '', '', '', '$time', '$bill_id', '$_GET[txn_id]');");
mysql_query("INSERT INTO `bill` (`bill_id`, `d_id`, `o_date`, `s_date`, `name`, `addreass`, `mobile`, `mobile2`, `pincode`, `city`, `state`, `addreasstype`, `price`, `bv`, `status`, `paid`, `de_id`, `online`, `shop_id`, `method`) VALUES ('$bill_id', '$_GET[d_id]', '$date', '$date', '', '', '', '', '', '', '', '', '100', '100', 'c', '', '', '', '', 'joining')");
$bill_id=$bill_id+1;
mysql_query("INSERT INTO `bill` (`bill_id`, `d_id`, `o_date`, `s_date`, `name`, `addreass`, `mobile`, `mobile2`, `pincode`, `city`, `state`, `addreasstype`, `price`, `bv`, `status`, `paid`, `de_id`, `online`, `shop_id`, `method`) VALUES ('$bill_id', '$d[proposer_no]', '$date', '$date', '', '', '', '', '', '', '', '', '0', '10', 'c', '', '', '', '', 'joining bonus')");

                                           $l="select * from level where d_id=$d[sponsor_no]";
					 $roww=mysql_query($l);
					
					 $rot=mysql_fetch_assoc($roww);
					 if ($roww){
					 $level = $rot[level];
					 $level=$level + 1;
					 }
					 $insl="INSERT INTO level (d_id,sponsor_no,level) VALUES('$d_id','$s_no','$level')";
					mysql_query($insl)or die ("values not inserted");
					$d_id=$d[d_id];
$msg = "Thankyou for registering in G1focus \n User ID =  $d_id \n Please Login To Your Account";
// use wordwrap() if lines are longer than 120 characters
$msg = wordwrap($msg,120);

// send email
mail("$_SESSION[email]","G1focus Distributor NO.",$msg);
$dd='welcome%20to%20G1focus%20Your%20User%20ID='.$d[d_id].'   Big Company, Bright Future, Big Commission, Dont Miss';
$dd = str_replace(' ', '%20', $dd);
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$d[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d[d_id]', '$d[mobile]', '$text', '$response', '', '$date', '$time');");


$dd='welcome%20to%20G1focus%20Your%20User%20ID='.$d[d_id].'%20%20%20%20%20please%20login%20your%20account%20%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$d[mobile2].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d[d_id]', '$d[mobile2]', '$text', '$response', '', '$date', '$time');");
/////////////////////////////////proposal id

$sql="SELECT * FROM distributor WHERE d_id = '".$d[proposer_no]."'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
 
  $p_mob = $row['mobile'];
  

$dd='Your Proposal '.$d[d_name].' joined Sucessfully his user id '.$d[d_id].' and 10 bv credited to your account joining bonus G1focus';
$dd = str_replace(' ', '%20', $dd);
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$p_mob.'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d[proposer_no]', '$p_mob', '$text', '$response', '', '$date', '$time');");

mysql_query("DELETE FROM `pre_distributor` WHERE `pre_distributor`.`d_id` = '$_GET[d_id]';");
header("location:register_s.php?d_id=$d[d_id]");


?>