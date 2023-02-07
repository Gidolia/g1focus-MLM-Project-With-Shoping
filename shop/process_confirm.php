<?php
include "config.php";
if(isset($_SESSION['carttr']))
{
if (isset($_GET[confirm]) or isset($_GET[pay_confirm]))
{
$que="select max(bill_id) as max from bill";
     $r=mysql_query($que) or die("query not performed");
if($r)
  {
  $row=mysql_fetch_array($r);  
  $bill_id=$row['max'];
  $bill_id=$bill_id+1;
  
  }

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

if(isset($_GET[paid])){$paid="y"; $payment_id=$_GET[txn_id]; $payment_mode="payumoney";
}else{$paid="n";}
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
$ins="INSERT INTO bill(bill_id,d_id,o_date,name,addreass,mobile,mobile2,pincode,city,state,addreasstype,price,bv,status,paid,online,payment_id,payment_mode) VALUES('$bill_id','$d_id','$o_date','$name','$addreass','$mobile','$mobile2','$pincode','$city','$state','$addreasstype','$price','$bv','$status','$paid','y','$payment_id','$payment_mode')";
mysql_query($ins) or die("Try again query not executed");

foreach($_SESSION['carttr'] as $id=>$x)
{
	$insert="INSERT INTO bill_detail(bill_id,p_id,qty) VALUES('".$bill_id."','".$x[p_id]."','".$x[qty]."')";
	mysql_query($insert) or die("Try again value not inserted");
}
  unset($_SESSION['carttr']);
  $dd='Your a/c '.$d_id.' Order placed sucessfully Amount Rs '.$price.' order arrives in 24 hr';
  $dd = str_replace(' ', '%20', $dd);
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$mobile.'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$mobile', '$text', '$response', '', '$date', '$time');");

  if(isset($_GET[paid])){
header("location:include/bill.php?bill_id=".$bill_id."&paid=1");}
else{header("location:include/bill.php?bill_id=".$bill_id);}
	
}
else{ echo "OOpS Sorry somthing went wrong1";}
}
?>