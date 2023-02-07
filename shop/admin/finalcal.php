<?php
include "config.php";
include "to_bv.php";
$o_date=date("Y-m-d");
if(isset($_SESSION[k]))
{
$sel1=mysql_query("select d_id,bal,mobile,mobile2 from distributor") or die("value not selected1");
while($fet1=mysql_fetch_assoc($sel1))
{ 
 	$later=alter_bal($fet1[d_id]);
	$grand_totalt=$grand_totalt+$later;
	$down_bv=find_under_bv($fet1[d_id]);
	$ownt_bv=find_bv($fet1[d_id]);
	$downre=array();
	$sel1e=mysql_query("select d_id from distributor where sponsor_no=".$fet1[d_id]) or die("value not selected");
	while($fet1e=mysql_fetch_assoc($sel1e))
	{ $downre[]=find_bv($fet1e[d_id])+find_under_bv($fet1e[d_id]);}
	$resultr=mysql_query("SELECT count(d_id) as total from distributor where proposer_no=".$fet1[d_id]." and new='Y'");
		$datar=mysql_fetch_assoc($resultr);
		
	echo $fet1[d_id]."   ".$later."<br>";
		$rtyb=$datar['total']*0;
	//mysql_query("INSERT INTO c_month(d_id,f_date,bv1,bv2,bv3,own_bv,down_bv,m_amount,clear,person_joined,join_amount) VALUES('".$fet1[d_id]."','".$o_date."','".$downre[0]."','".$downre[1]."','".$downre[2]."','".$ownt_bv."','".$down_bv."','".$later."','n','".$datar[total]."','".$rtyb."')");
		$plus=$fet1[bal]+$later;
		//mysql_query("update distributor set bal=".$plus." where d_id=".$fet1[d_id]);
		//mysql_query("update distributor set new='n' where d_id=".$fet1[d_id]);
		
				  
        
  // mysql_query("INSERT INTO `transition_history` (`10`, `20`, `50`, `100`, `500`, `1000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `slip_no`, `slip_place`, `time`) VALUES ('', '', '', '', '', '', '$later', '$plus', '$fet1[d_id]', '$o_date', 'G1focus commision', '+', '$fet1[bal]', 'software', 'software', '', '', '$time')")or die("transtation not recorded");
       
//////////////////////////////////////////////////////////

if($fet1[mobile]>0)
{		$dd='Your%20a/c%20'.$fet1[d_id].'%20is%20Credited%20INR%20'.$later.'%20on%20'.$date.'%20'.$time.'%20a/c%20Bal%20is%20INR%20'.$fet1[bal].'%20G1focus%20commision%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$fet1[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
mysql_query("INSERT INTO `mobile_message_d_id` (`id`, `d_id`) VALUES (NULL, '$fet1[d_id]');");
echo $response.$fet1[d_id]."<br>";
$text = str_replace('%20', ' ', $dd);
////////////////////////////////////////////////////
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$fet1[d_id]', '$fet1[mobile]', '$text', '$response', '', '$date', '$time');")or die("message not recorded");
}
/*
if($fet1[mobile2]>0)
{
////////////////////////
$dd='Your%20a/c%20'.$fet1[d_id].'%20is%20Credited%20INR%20'.$later.'%20on%20'.$date.'%20'.$time.'%20a/c%20Bal%20is%20INR%20'.$plus.'%20G1focus%20commision%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$fet1[mobile2].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
////////////////////////////////////////////////////
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$fet1[d_id]', '$fet1[mobile2]', '$text', '$response', '', '$date', '$time');");
}*/}
$_SESSION[k]=1;
$sdd=$grand_totalt;
	  	$w = "select sum(bv) as total_bv from bill where status='c'";
	   	$rest = mysql_query($w) or die ("query not executed");
	if (mysql_num_rows($rest)>0)
	{
        while ($row2 = mysql_fetch_assoc($rest))
		{
          echo $row2["total_bv"]."total bv calculated from business volume<br>";
		  $drtf=$row2["total_bv"];
		  $tyu=$row2["total_bv"]-$sdd."total profit";
		}
		
		echo "<script>
			location.href='echo.php?total=$tyu&distri=$grand_totalt&colected=$drtf';</script>";
		
	}
}

?>