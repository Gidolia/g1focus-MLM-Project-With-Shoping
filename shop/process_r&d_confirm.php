<?php
include "config.php";
if(isset($_SESSION['carttr']))
{
if (isset($_GET[confirm]))
{
$d_id=$_SESSION[id];
$name=$_GET[name];
$addreass=$_GET[addreass];
$addreasstype=$_GET[addreasstype];
$city=$_GET[city];
$state=$_GET[state];
$pincode=$_GET[pincode];
$mobile=$_GET[mobile];
$mobile2=$_GET[mobile2];
$status='w';
$o_date=date("Y-m-d");
$price=$_GET[price];
$bv=$_GET[bv];
$paid="n";
foreach($_SESSION['carttr'] as $idt=>$val)
{
	$query="select * from product where p_id='$val[p_id]'";
	$res=mysql_query($query) or die("Can't Execute Query...");
	$row=mysql_fetch_assoc($res);	
	$total=$x[qty]*$row[p_selling_price];	
	$total_bv_p=$x[qty]*$row[p_bv];
	$totqty=$x[qty]+$totqty;
	$total_price=$total+$total_price;
	$total_bv_pm=$total_bv_pm+$total_bv_p;
	
}
$que="select max(bill_id) as max from bill";
     $r=mysql_query($que) or die("query not performed");
if($r)
  {
  $row=mysql_fetch_array($r);  
  $bill_id=$row['max'];
  $bill_id=$bill_id+1;
  
  }
$ins="INSERT INTO bill(bill_id,d_id,o_date,name,addreass,mobile,mobile2,pincode,city,state,addreasstype,price,bv,status,paid,online) VALUES('$bill_id','$d_id','$o_date','$name','$addreass','$mobile','$mobile2','$pincode','$city','$state','$addreasstype','$price','$bv','$status','$paid','y')";
mysql_query($ins) or die("Try again query not executed");

foreach($_SESSION['carttr'] as $id=>$x)
{
	$insert="INSERT INTO bill_detail(bill_id,p_id,qty) VALUES('".$bill_id."','".$x[p_id]."','".$x[qty]."')";
	mysql_query($insert) or die("Try again value not inserted");
}
$ins="INSERT INTO distributor(d_id,sponsor_no,proposer_no,d_name,father_name,nominee_name,d_dob,nominee_dob,house_addreass,state,district,tehsil,post,city,pincode,mobile,mobile2,email,id_proof,addreass_proof,password,joining_date,kyc,new) VALUES('$_SESSION[id]','$_SESSION[s_no]','$_SESSION[p_no]','$_SESSION[d_name]','$_SESSION[father]','$_SESSION[nominee_name]','$_SESSION[dd_date]','$_SESSION[nominee_dob]','$_SESSION[d_add]','$_SESSION[state]','$_SESSION[district]','$_SESSION[tehsil]','$_SESSION[post]','$_SESSION[city]','$_SESSION[pincode]','$_SESSION[mobile]','$_SESSION[mobile2]','$_SESSION[email]','$_SESSION[idproof]','$_SESSION[addproof]','$_SESSION[passwordn]','$o_date','n','y')";
mysql_query($ins)or die ("values not inserted");
$msg = "Thankyou for registering in G1focus \n User ID =  $_SESSION[id] \n Please Login To Your Account";
// use wordwrap() if lines are longer than 120 characters
$msg = wordwrap($msg,120);

// send email
mail("$_SESSION[email]","G1focus Distributor NO.",$msg);
$dd='welcome%20to%20G1focus%20Your%20User%20ID='.$_SESSION[id].'%20%20%20%20%20please%20login%20your%20account%20%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$_SESSION[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$_SESSION[mobile]', '$text', '$response', '', '$date', '$time');");


$dd='welcome%20to%20G1focus%20Your%20User%20ID='.$_SESSION[id].'%20%20%20%20%20please%20login%20your%20account%20%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$_SESSION[mobile2].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$_SESSION[mobile]', '$text', '$response', '', '$date', '$time');");


  unset($_SESSION['carttr']);
unset($_SESSION['s_no']);
	unset($_SESSION['p_no']);
	unset($_SESSION['d_name']);
	unset($_SESSION['father']);
  header("location:include/bill.php?bill_id=".$bill_id."&d_id=".$d_id);
	
}
else{ echo "OOpS Sorry somthing went wrong1";}
}else{ echo "OOpS Sorry somthing went wrong2";}
?>