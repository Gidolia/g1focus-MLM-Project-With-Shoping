<?php 
include "config.php";


$che=mysql_query("select * from distributor where mobile='$_POST[mobile]' and d_dob='$_POST[d_date]'")or die ("value not founded");
if (mysql_num_rows($che)>0){ 
	$r=mysql_fetch_assoc($che);
	header("location:register_s.php?d_id=$r[d_id]&mobile=$r[mobile]&name=$r[d_name]&dob=$r[d_dob]");
}else{
$selt=mysql_query("SELECT d_id FROM distributor WHERE d_id=$_POST[s_no]");
if (mysql_num_rows($selt)!=0)
{
	$seltt=mysql_query("SELECT d_id FROM distributor WHERE d_id=$_POST[p_no]");
	if (mysql_num_rows($seltt)!=0)
	{

		
		$resultcount=mysql_query("SELECT count(*) as total from distributor where sponsor_no=".$_POST[s_no]) or die ("not counted");
		$datacount=mysql_fetch_assoc($resultcount);
	
		if (isset($_POST[register]))
		{
			if ($_POST[password]==$_POST[cpassword])
			{ 
				if($datacount[total]<3)
				{
					
										$s_no=$_POST[s_no];
					$p_no=$_POST[p_no];
					$d_name=$_POST[d_name];
					$father=$_POST[father];
					$nominee_name=$_POST[nominee_name];
					$d_date=$_POST[year]."/".$_POST[month]."/".$_POST[date];
					$nominee_dob=$_POST[n_year]."/".$_POST[n_month]."/".$_POST[n_date];
					$d_add=$_POST[d_add];
					$state=$_POST[state];
					$district=$_POST[district];
					$tehsil=$_POST[tehsil];
					$post=$_POST[post];
					$city=$_POST[city];
					$pincode=$_POST[pincode];
					$mobile=$_POST[mobile];
					$mobile2=$_POST[mobile2];
					$post=$_POST[post];
					$email=$_POST[email];
					$idproof=$_POST[idproof];
					$addproof=$_POST[addreassproof];
					$password=$_POST[password];
					$joining_date=date("Y/m/d");
					$que="select max(d_id) as max from distributor";
						 $r=mysql_query($que) or die("query not performed");
					if($r)
					{
					  $row=mysql_fetch_array($r);  
					  $d_id=$row['max'];
					
					
					  $d_id=$d_id+1;
					  
					  $quee="select max(d_id) as max from new_form";
						 	$re=mysql_query($quee) or die("query not performed");
							if($re)
							{
							  $rowe=mysql_fetch_array($re);
							  if($rowe['max']>=$d_id)
							  {
							  						 
								  $d_id=$rowe['max']+1;
								  $_SESSION[id]=$d_id;
							  }
							  else{$_SESSION[id]=$d_id; }					 
							  
							}
					mysql_query("INSERT INTO `new_form` (`d_id`, `sponsor_no`, `proposor_no`) VALUES ('$d_id', '$_POST[s_no]', '$_POST[p_no]');")or die ("oops someting went wrong please try again"); 
					  
					}
					$l="select * from level where d_id=$s_no";
					 $roww=mysql_query($l) or die ("level not generete");
					
					 $rot=mysql_fetch_assoc($roww);
					 if ($roww){
					 $level = $rot[level];
					 $level=$level + 1;
					 }
					
					$ins="INSERT INTO pre_distributor(d_id,sponsor_no,proposer_no,d_name,father_name,nominee_name,d_dob,nominee_dob,house_addreass,state,district,tehsil,post,city,pincode,mobile,mobile2,email,id_proof,addreass_proof,password,joining_date,kyc,new) VALUES('$d_id','$s_no','$p_no','$d_name','$father','$nominee_name','$d_date','$nominee_dob','$d_add','$state','$district','$tehsil','$post','$city','$pincode','$mobile','$mobile2','$email','$idproof','$addproof','$password','$joining_date','n','y')";
					mysql_query($ins)or die ("values not inserted");
/*					$insl="INSERT INTO level (d_id,sponsor_no,level) VALUES('$d_id','$s_no','$level')";
					mysql_query($insl)or die ("values not inserted");
					

					
$msg = "Thankyou for registering in G1focus \n User ID =  $d_id \n Please Login To Your Account";
// use wordwrap() if lines are longer than 120 characters
$msg = wordwrap($msg,120);

// send email
mail("$_SESSION[email]","G1focus Distributor NO.",$msg);
$dd='welcome%20to%20G1focus%20Your%20User%20ID='.$d_id.'   Big Company, Bright Future, Big Commission, Dont Miss';
$dd = str_replace(' ', '%20', $dd);
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$mobile.'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$mobile', '$text', '$response', '', '$date', '$time');");


$dd='welcome%20to%20G1focus%20Your%20User%20ID='.$d_id.'%20%20%20%20%20please%20login%20your%20account%20%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$mobile2.'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$mobile2', '$text', '$response', '', '$date', '$time');");
/////////////////////////////////proposal id

$sql="SELECT * FROM distributor WHERE d_id = '".$p_no."'";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);
 
  $p_mob = $row['mobile'];
  

$dd='Your Proposal '.$d_name.' joined Sucessfully his user id '.$d_id.' G1focus';
$dd = str_replace(' ', '%20', $dd);
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$p_mob.'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$p_mob', '$text', '$response', '', '$date', '$time');");*/

					header("location:transtion_confirm.php?d_id=$d_id&name=$d_name&mobile=$mobile&email=$email");
				
				}else{ echo "<script>alert('person already have 2 person in his downline');
				location.href='form.php?count=3';</script>";}
			 }
		else{ echo "<script>alert('Confirm Password and Password Not match');
		location.href='form.php?pass=not';</script>";}
		}
	}
	else{echo "<script>alert('proposer no. you enter is not in our dictory');
			location.href='form.php?p_no=$_POST[p_no]';</script>";}

}
else{echo "<script>alert('sponsor no you enter is not in our dictory');
			location.href='form.php?s_no=$_POST[s_no]';</script>";}
}
?>
