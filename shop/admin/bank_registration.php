<?php include "config.php";?>
<script src="ajaxs.js"></script>
<form method="post">
account type :: <select name="acc_type">
											<?php
											
														
													$query="select * from account_type ";
					
													$res=mysql_query($query);
													
													while($row=mysql_fetch_assoc($res))
													{
														echo "<option value='".$row['acc_name']."'>".$row['acc_name'];
													}
											?>
										</select><br><br>
Sponsor no.:: <input type="text" name="s_no" required onKeyUp="showUser(this.value)"><br><br>
<span>Sponsor Name :<label></label></span><input type="text" id="s_name" name="s_name" readonly><br><br>
                        <span>Sponsor Address :<label></label></span><input type="text" id="s_addreass" name="s_addreass" readonly><br><br>
                        <span id="txtHint"></span><br><br>
                         <span id="txtResult"></span><br><br>
                        <span>Proposer No : <label>*</label></span><input type="text" name="p_no" required onKeyUp="showUsert(this.value)"><br><br>
                        <span>Proposer Name :<label></label></span><input type="text" name="p_name" id="p_name" readonly><br><br>
                        <span>Proposer Address :<label></label></span><input type="text" name="p_addreass" id="p_addreass" readonly><br><br>
								
Name:: <input type="text" name="name" required /><br><br>
Father_name:: <input type="text" name="father_name" required /><br><br>
dob:: <input type="date" name="dob" required /><br><br>
email:: <input type="email" name="email" /><br><br>
mobile:: <input type="text" name="mobile" required /><br><br>
mobile alt:: <input type="text" name="mobile_alt" /><br><br>
addreass:: <input type="text" name="addreass" required /><br><br>
city:: <input type="text" name="city" required /><br><br>
state:: <input type="text" name="state" required /><br><br>
pincode:: <input type="number" name="pincode" required /><br><br>
<hr />
password:: <input type="password" name="password" /><br><br>


Nominee:: <input type="text" name="nominee" required /><br><br>
Nominee dob:: <input type="date" name="nominee_dob" required /><br><br>
amount:: <input type="number" name="bal" required /><br><br>
10x:: <input type="number" name="m10" /><br><br>
20x:: <input type="number" name="m20" /><br><br>
50x:: <input type="number" name="m50" /><br><br>
100x:: <input type="number" name="m100" /><br><br>
500x:: <input type="number" name="m500" /><br><br>
2000x:: <input type="number" name="m2000" /><br><br>
method:: <select name="method"><option value="cash">cash</option>
				 <option value="cheque">cheque</option>
		 </select><br /><br />
Form no.:: <input type="text" name="file_no" /><br><br>
slip no.:: <input type="number" name="slip" required /><br><br>
<input type="submit" name="add_customer_submit">
</form>
<?php
if(isset($_POST[add_customer_submit]))
{
$m10=$_POST[m10]*10;
$m20=$_POST[m20]*20;
$m50=$_POST[m50]*50;
$m100=$_POST[m100]*100;
$m500=$_POST[m500]*500;
$m2000=$_POST[m2000]*2000;
$total=$m10+$m20+$m50+$m100+$m500+$m2000;
if($total==$_POST[bal])
{
      if($_POST[s_no]>0){$f="y";}else{$f="n";}
	$que="select max(d_id) as max from distributor";
	$r=mysql_query($que) or die("query not performed");
	if($r)
	{
		$row=mysql_fetch_array($r);
		$d_id=$row['max'];
		$d_id=$d_id+1;
	}
	mysql_query("INSERT INTO `distributor` (`d_id`, `sponsor_no`, `proposer_no`, `d_name`, `father_name`, `nominee_name`, `d_dob`, `nominee_dob`, `house_addreass`, `state`, `district`, `tehsil`, `post`, `city`, `pincode`, `mobile`, `mobile2`, `email`, `id_proof`, `addreass_proof`, `password`, `joining_date`, `kyc`, `new`, `c_id`, `bal`, `pin_id`, `distributor`, `acc_type`) VALUES ('$d_id', '$_POST[s_no]', '$_POST[p_no]', '$_POST[name]', '$_POST[father_name]', '$_POST[nominee]', '$_POST[dob]', '$_POST[nominee_dob]', '$_POST[addreass]', '$_POST[state]', '', '', '', '$_POST[city]', '$_POST[pincode]', '$_POST[mobile]', '$_POST[mobile_alt]', '$_POST[email]', '', '', '$_POST[password]', '$date', '', 'n', '', '$_POST[bal]', '', '$f', '$_POST[acc_type]')")or die("Distributor not added");
	mysql_query("INSERT INTO `transition_history` (`10`, `20`, `50`, `100`, `500`, `1000`, `2000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `slip_no`, `slip_place`, `time`) VALUES ('$_POST[m10]', '$_POST[m20]', '$_POST[m50]', '$_POST[m100]', '$_POST[m500]', '', '$_POST[m2000]', '$_POST[bal]', '$_POST[bal]', '$d_id', '$date', '$_POST[method]', '+', '$_POST[bal]', 'admin', 'admin', '$_POST[slip]', 'office', '$time')")or die("transtation not recorded");
if($_POST[mobile]>0)
{
$msg = "Thankyou for registering in kalyaan shak shekari snsatha \n User ID =  $d_id \n";

// use wordwrap() if lines are longer than 120 characters
$msg = wordwrap($msg,120);

// send email
mail("$_POST[email]","kalyaan shak shekari snsatha ID NO.",$msg);
$dd='welcome%20to%20kalyaan%20shak%20shekari%20snsatha%20Your%20A/C%20ID='.$d_id.'%20%20%20%20%20Your%20bal::%20'.$_POST[bal].'%20%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$_POST[mobile].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$_SESSION[mobile]', '$text', '$response', '', '$date', '$time');");

$dd='welcome%20to%20kalyaan%20shak%20shekari%20snsatha%20Your%20User%20ID='.$d_id.'%20%20%20%20%20Your%20bal::%20'.$_POST[bal].'%20%20Thankyou';
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$_POST[mobile_alt].'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$_SESSION[mobile]', '$text', '$response', '', '$date', '$time');");
}
}
}
