<?php include "../config.php";
if(isset($_POST[submit]))
{
	
	$que="select max(bill_id) as max from bill";
     $r=mysql_query($que) or die("query not performed");
if($r)
  {
  $row=mysql_fetch_array($r);  
  $bill_id=$row['max'];

  $bill_id=$bill_id+1;
  
  }
if($_POST[d_id]<81464){$status='t';}
else{$status='c';}
$o_date=date("Y-m-d");
foreach($_SESSION['carttrr'] as $idt=>$val)
{
	$query="select * from product where p_id='$val[p_id]'";
	$res=mysql_query($query) or die("Can't Execute Query...");
	$row=mysql_fetch_assoc($res);	
	$total=$val[qty]*$row[p_selling_price];	
	$total_bv_p=$val[qty]*$row[p_bv];
	
	$total_price=$total+$total_price;
	$total_bv_pm=$total_bv_pm+$total_bv_p;
}

$ins="INSERT INTO bill(bill_id,d_id,o_date,name,addreass,mobile,mobile2,pincode,city,state,addreasstype,price,bv,status,paid,shop_id) VALUES('$bill_id','$_POST[d_id]','$o_date','$name','$addreass','$mobile','$mobile2','$pincode','$city','$state','$addreasstype','".$total_price."','".$total_bv_pm."','$status','cash','$_SESSION[shop_id]')";
mysql_query($ins) or die("Try again query not executed");

foreach($_SESSION['carttrr'] as $id=>$x)
{

	$insert="INSERT INTO bill_detail(bill_id,p_id,qty) VALUES('".$bill_id."','".$x[p_id]."','".$x[qty]."')";
	mysql_query($insert) or die("Try again value not inserted");
	$qe="select * from shop_product where shop_id='$_SESSION[shop_id]' and p_id='$x[p_id]'";
$rees=mysql_query($qe);
$ce=mysql_fetch_assoc($rees);
$nqty=$ce[qty]-$x[qty];
if ($nqty==0){mysql_query("delete from shop_product where p_id=$x[p_id]") or die ("not deleted");}
else{
	mysql_query("update shop_product set qty=".$nqty." where p_id=".$x[p_id]." and shop_id=".$_SESSION[shop_id]);
	}
	
  } unset($_SESSION[carttrr]);
  /////////////////////send sms
  
  if($status=='c')
  {
  include 'to_bv.php';
  $o_bv=find_bv($_POST[d_id]);
  $fdg=mysql_query("select mobile from distributor where d_id=".$_POST[d_id]);
		  		$ser=mysql_fetch_assoc($fdg);
  $dd='Your%20ID%20'.$_POST[d_id].'%20BV%20Credited%20by%20'.$total_bv_pm.'%20Total%20BV%20'.$o_bv.'%20%20%20G1focus';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$ser[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$ser[mobile]', '$text', '$response', '', '$date', '$time');");}
//////////////////////////////////////////////////////////////////////

  header("location:bill_print.php?bill_id=$bill_id");
  echo "<script>location.href='bill_print.php?bill_id=$bill_id';</script>";
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  elseif(isset($_POST[joinsubmit])){	$que="select max(bill_id) as max from bill";
     $r=mysql_query($que) or die("query not performed");
if($r)
  {
  $row=mysql_fetch_array($r);  
  $bill_id=$row['max'];

  $bill_id=$bill_id+1;
  
  }
if($_POST[d_id]<81464){$status='t';}
else{$status='c';}
$o_date=date("Y-m-d");
foreach($_SESSION['carttrr'] as $idt=>$val)
{
	
	$query="select * from product where p_id='$val[p_id]'";
	$res=mysql_query($query) or die("Can't Execute Query...");
	$row=mysql_fetch_assoc($res);	
	$total=$val[qty]*$row[p_selling_price];	
	$total_bv_p=$val[qty]*$row[p_bv];
	
	$total_price=$total+$total_price;
	$total_bv_pm=$total_bv_pm+$total_bv_p;
}

$ins="INSERT INTO bill(bill_id,d_id,o_date,name,addreass,mobile,mobile2,pincode,city,state,addreasstype,price,bv,status,paid,shop_id) VALUES('$bill_id','$_POST[d_id]','$o_date','$name','$addreass','$mobile','$mobile2','$pincode','$city','$state','$addreasstype','".$total_price."','".$total_bv_pm."','$status','cash','$_SESSION[shop_id]')";
mysql_query($ins) or die("Try again query not executed");

foreach($_SESSION['carttrr'] as $id=>$x)
{

	$insert="INSERT INTO bill_detail(bill_id,p_id,qty) VALUES('".$bill_id."','".$x[p_id]."','".$x[qty]."')";
	mysql_query($insert) or die("Try again value not inserted");
	$qe="select * from shop_product where shop_id='$_SESSION[shop_id]' and p_id='$x[p_id]'";
$rees=mysql_query($qe);
$ce=mysql_fetch_assoc($rees);
$nqty=$ce[qty]-$x[qty];
if ($nqty==0){mysql_query("delete from shop_product where p_id=$x[p_id]") or die ("not deleted");}
else{
	mysql_query("update shop_product set qty=".$nqty." where p_id=".$x[p_id]." and shop_id=".$_SESSION[shop_id]);}
	
  } unset($_SESSION[carttrr]);
   $ins="INSERT INTO distributor(d_id,sponsor_no,proposer_no,d_name,father_name,nominee_name,d_dob,nominee_dob,house_addreass,state,district,tehsil,post,city,pincode,mobile,mobile2,email,id_proof,addreass_proof,password,joining_date,kyc,new) VALUES('$_POST[d_id]','$_SESSION[s_no]','$_SESSION[p_no]','$_SESSION[d_name]','$_SESSION[father]','$_SESSION[nominee_name]','$_SESSION[dd_date]','$_SESSION[nominee_dob]','$_SESSION[d_add]','$_SESSION[state]','$_SESSION[district]','$_SESSION[tehsil]','$_SESSION[post]','$_SESSION[city]','$_SESSION[pincode]','$_SESSION[mobile]','$_SESSION[mobile2]','$_SESSION[email]','$_SESSION[idproof]','$_SESSION[addproof]','$_SESSION[passwordn]','$o_date','n','y')";
					mysql_query($ins)or die ("values not inserted");
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
						$msg = "Thankyou for registering in G1focus \n User ID =  $_POST[d_id] \n Please Login To Your Account";

// use wordwrap() if lines are longer than 120 characters
$msg = wordwrap($msg,120);

// send email
mail("$_POST[email]","G1focus ID NO.",$msg);

$dd='welcome%20to%20G1focus%20Your%20User%20ID='.$_POST[d_id].'%20%20%20%20%20Your%20bal::%200%20%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$_SESSION[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$_SESSION[mobile]', '$text', '$response', '', '$date', '$time');");
if($_SESSION[mobile2]>0)
{
$dd='welcome%20to%20G1focus%20Your%20User%20ID='.$_POST[d_id].'%20%20%20%20%20Your%20bal::%200%20%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$_SESSION[mobile2].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$_SESSION[mobile2]', '$text', '$response', '', '$date', '$time');");
}
$dd='Your%20ID%20'.$_POST[d_id].'%20BV%20Credited%20by%20'.$total_bv_pm.'%20%20%20G1focus';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$_SESSION[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$_SESSION[mobile]', '$text', '$response', '', '$date', '$time');");

					

  header("location:bill_print.php?bill_id=$bill_id&new=1");
  echo "<script>location.href='bill_print.php?bill_id=$bill_id&new=1';</script>";}
  
  /////////////////////////////////////////////paid
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 elseif(isset($_GET[paid]))
{
foreach($_SESSION['carttrr'] as $idt=>$val)
{
	$query="select * from product where p_id='$val[p_id]'";
	$res=mysql_query($query) or die("Can't Execute Query...");
	$row=mysql_fetch_assoc($res);	
	$total=$val[qty]*$row[p_selling_price];	
	$total_bv_p=$val[qty]*$row[p_bv];
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
/////////////////////payment
date_default_timezone_set('Asia/Calcutta');
$time=date("h:i:sa");
$o_date=date("Y-m-d");
$rtey=mysql_query("SELECT * FROM `distributor` WHERE `d_id`=".$_GET[d_id]);
	if(mysql_num_rows($rtey)>0)
	{ $tiy=mysql_fetch_assoc($rtey);
		$plus=$tiy[bal]-$total_price;
		
        if($plus>=0)
        {
        mysql_query("INSERT INTO `transition_history` (`1`, `2`, `5`, `10`, `20`, `50`, `100`, `500`, `1000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `chequeno`, `slip_no`, `time`, `bill_id`) VALUES ('$_POST[m1]', '$_POST[m2]', '$_POST[m5]', '$_POST[m10]', '$_POST[m20]', '$_POST[m50]', '$_POST[m100]', '$_POST[m500]', '$_POST[m1000]', '$total_price', '$plus', '$_GET[d_id]', '$o_date', 'Purchase', '-', '$tiy[bal]', '$_SESSION[shop_id]', '$_SESSION[e_id]', '$_POST[cheno]', '$_POST[slip_no]', '$time', '$bill_id')")or die("transtation not recorded");
		mysql_query("update distributor set bal=".$plus." where d_id=".$_GET[d_id]) or die("balance not updated");

$status='c';
$ins="INSERT INTO bill(bill_id,d_id,o_date,name,addreass,mobile,mobile2,pincode,city,state,addreasstype,price,bv,status,paid,shop_id,payment_id,payment_mode) VALUES('$bill_id','$_GET[d_id]','$o_date','$name','$addreass','$mobile','$mobile2','$pincode','$city','$state','$addreasstype','".$total_price."','".$total_bv_pm."','$status','Paid','$_SESSION[shop_id]','','G1focus')";
mysql_query($ins) or die("Try again query not executed");

	foreach($_SESSION['carttrr'] as $id=>$x)
	{

	$insert="INSERT INTO bill_detail(bill_id,p_id,qty) VALUES('".$bill_id."','".$x[p_id]."','".$x[qty]."')";
	mysql_query($insert) or die("Try again value not inserted");
	$qe="select * from shop_product where shop_id='$_SESSION[shop_id]' and p_id='$x[p_id]'";
$rees=mysql_query($qe);
$ce=mysql_fetch_assoc($rees);
$nqty=$ce[qty]-$x[qty];
if ($nqty==0){mysql_query("delete from shop_product where p_id=$x[p_id]") or die ("not deleted");}
else{
	mysql_query("update shop_product set qty=".$nqty." where p_id=".$x[p_id]." and shop_id=".$_SESSION[shop_id]);
	}
	
  	} unset($_SESSION[carttrr]);
  /////////////////////send sms
  
  if($status=='c')
  {
  include 'to_bv.php';
  $o_bv=find_bv($_GET[d_id]);
  $fdg=mysql_query("select mobile from distributor where d_id=".$_GET[d_id]);
		  		$ser=mysql_fetch_assoc($fdg);
  $dd='Your%20ID%20'.$_GET[d_id].'%20BV%20Credited%20by%20'.$total_bv_pm.'%20Total%20BV%20'.$o_bv.'%20%20%20G1focus';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$ser[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$_GET[d_id]', '$ser[mobile]', '$text', '$response', '', '$date', '$time');");}
/////////////////////////////////////////////////////////////////////
		//////////////////////////////////////////////////////////
		$dd='Your%20a/c%20'.$_GET[d_id].'%20is%20Debited%20INR%20'.$total_price.'%20on%20'.$date.'%20'.$time.'%20a/c%20Bal%20is%20INR%20'.$plus.'%20G1focus%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$tiy[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
////////////////////////////////////////////////////
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$_GET[d_id]', '$tiy[mobile]', '$text', '$response', '', '$date', '$time');");
		header("location:bill_print.php?bill_id=$bill_id");
  echo "<script>location.href='bill_print.php?bill_id=$bill_id';</script>";
        }
        else{echo "<script>alert('Sorry this cannot ,................(you dont have inof money in g1focus account)');location.href='bills.php';</script>";}
		
        
	}
	else
	{
		echo "<script>alert('customer_id not founded please try again');location.href='bills.php';</script>";
	}


  
}
  
  
  else{echo "<script>alert('something went wrong please try again');location.href='bills.php';</script>";}
  
?>