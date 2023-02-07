<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<link rel="shortcut icon" href="../images/gt.jpg" />
    <title>G1focus-Distributor form</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="../bs/ajax.js"></script>
    <script>
function validateForm() {
var password = document.forms["myForm"]["password"].value;
    var cpassword = document.forms["myForm"]["cpassword"].value;
    if (password != cpassword) {
        alert("Password not matched confirmed password");
        document.forms["myForm"]["password"].focus();
        return false;}
	var p_no = document.forms["myForm"]["p_no"].value;
        if (p_no == "") {
        alert("Proposer number name must be filled out");
        document.forms["myForm"]["p_no"].focus();
        return false;
        }
        var p_name = document.forms["myForm"]["p_name"].value;
        if (p_name == " ") {
        alert("Proposer number you enter is not correct please check proposer number");
        document.forms["myForm"]["p_no"].focus();
        return false;
        }
        var s_no = document.forms["myForm"]["s_no"].value;
        if (s_no == "") {
        alert("Sponsor number must be filled");
        document.forms["myForm"]["s_no"].focus();
        return false;
        }
        var s_name = document.forms["myForm"]["s_name"].value;
        if (s_name == " ") {
        alert("Sponsor number you enter is not correct please check sponsor number");
        document.forms["myForm"]["s_no"].focus();
        return false;
        }
        var txtHint = document.forms["myForm"]["txtHint"].value;
        if (txtHint <'2') {
        alert("Sponsor number you enter is not correct please check sponsor numberd");
        document.forms["myForm"]["txtHint"].focus();
        return false;
        }
    var father = document.forms["myForm"]["father"].value;
    if (father == "") {
        alert("Father/husband name must be filled");
        document.forms["myForm"]["father"].focus();
        return false;
    }
    var nominee_name = document.forms["myForm"]["nominee_name"].value;
    if (nominee_name == "") {
        alert("Nominee name must be filled out");
        document.forms["myForm"]["nominee_name"].focus();
        return false;}
    var mobile = document.forms["myForm"]["mobile"].value;
    if (mobile == "") {
        alert("mobile must be filled out");
        document.forms["myForm"]["mobile"].focus();
        return false;}
    
    
        
        
    }

</script>
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <?php include "include/header.php";?>
            <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
         <?php include "include/sidebar.php"; ?>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i>Registration Form</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                <div class="content-panel">
                <?php if($ser[bal]<=100){ echo "<div class='alert alert-danger'>Your acount balance $ser[bal]. you should have more than 100Rs in current balance</div>";
                ?>
                <h4>Credit Balance to current balance by credit/debit/netbanking</h4>
                <form class="form-horizontal style-form" action="transfer_confirm.php" method="get">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label"><h4>Amount</h4></label>
                              <div class="col-sm-10">
                                                            
                                  <input type="text" class="form-control" name="amount"  required maxlength="10">
                              </div>
                          </div>
                          <div class="form-group">
                              
                              <div class="col-sm-12">
                             
                                  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Credit Amount in Current balance" name="credit">
                                
                              </div>
                          </div>
               </form>
                
                <?php }
                else{
                
					  if(isset($_GET[sus]))
					  {?>
      									
							<div class="alert alert-success"><b>Sucess!</b> Costumer register sucessfully his distributor id= <?php echo $_GET[d_id];?></div>
						<?php }?>
                        <?php 
					  if(isset($_GET[fail]))
					  {?>	
							<div class="alert alert-danger"><b>failed!</b>You Dont have Balance To use this Service</div><?php }?>
               <p>
               		<div class="register">
		  	  <form action="" method="post" name="myForm" onsubmit="return validateForm()">
				 <div class="  register-top-grid">
                 <h4>Application form to become a distributer</h4>
					<h4>
                    <p><font color="#FF0000">Note:Enter the Informations Very Carefully and Check the Spelling as per ID as the same will not be changed.</font></p></h4>
                    <p><font color="#FF0000">&nbsp;&nbsp;&nbsp;&nbsp;100 rs cut from your current balance. You can take it manually</font></p></h4>
                    <h3><font color="#FF0000">
                    <?php
					if (isset($_GET[s_no])){echo "Sponsor no. you enter is wrong";}
					elseif (isset($_GET[p_no])){echo "proposor no. you enter is wrong";}
					elseif (isset($_GET['count'])){echo "Sponsor Already have 2 person in his down";}
					?></font></h3>
					<div class="mation">
                        <span>Proposer No : <label>*</label></span><input type="text" name="p_no" class="form-control input-lg" value="<?php echo $_SESSION[id];?>"   onKeyUp="showUsert(this.value)" readonly>
                        <span>Proposer Name :<label></label></span><input type="text" name="p_name" id="p_name" class="form-control input-lg" value="<?php echo $yui[d_name];?>" readonly>
                        <span>Proposer Address :<label></label></span><input type="text" name="p_addreass" id="p_addreass" class="form-control input-lg" value="<?php echo $yui[house_addreass];?>" readonly>
                        <br>
                        					<div class="mation">
						<span>Sponsor No : <label>*</label></span><input type="text" name="s_no" class="form-control input-lg"   onKeyUp="showUser(this.value)" autofocus>
						
                        <span>Sponsor Name :<label></label></span><input type="text" id="s_name" name="s_name" class="form-control input-lg" readonly>
                        <span>Sponsor Address :<label></label></span><input type="text" id="s_addreass" name="s_addreass" class="form-control input-lg" readonly>
                        <span id="txtHint"></span>
                         <span id="txtResult"></span><br>&nbsp;<br>

                        <span>Applicant Name :<label>*</label></span><input type="text" name="d_name" class="form-control input-lg"  required>
        		<span>Password<label>*</label></span><input type="password" name="password" class="form-control input-lg"  required>
                <span>Confirm Password<label>*</label></span><input type="password" name="cpassword" class="form-control input-lg"  required>
                        <span>Father/Husband Name :<label>*</label></span><input type="text" name="father" class="form-control input-lg"  >
                        <span>Nominee Name :<label>*</label></span><input type="text" name="nominee_name" class="form-control input-lg"   >
                        <br>&nbsp;<br>
                      <div class="col-md-2">  <span>Applicant DOB :<label>*</label></span></div><div class="col-md-2"> <input type="number" max="31" min="1" name="date" placeholder="DD" class="form-control input-lg"  ></div><div class="col-md-2"> <input type="number" max="12" min="1" name="month" placeholder="MM" class="form-control input-lg"  ></div><div class="col-md-2"> <input type="number" class="form-control input-lg" max="2002" min="1920" name="year" placeholder="YYYY"  ></div>
                      <br>&nbsp;<br><br>&nbsp;<br>
                       <div class="col-md-2"> <span>Nominee DOB :<label>*</label></span></div><div class="col-md-2"><input type="number" class="form-control input-lg" max="31" min="1" name="n_date" placeholder="DD"  required></div><div class="col-md-2"><input type="number" class="form-control input-lg" max="12" min="1" name="n_month" placeholder="MM" required ></div><div class="col-md-2"><input type="number" class="form-control input-lg" max="2002" min="1920" name="n_year" placeholder="YYYY"  required></div><br>&nbsp;<br>
                        <hr>
                        <span>House No./Location :<label>*</label></span><textarea rows="6" cols="60" name="d_add" class="form-control input-lg"  required></textarea>
                        <span>State :<label>*</label></span><select name="state" class="form-control input-lg" style="border: 1px solid #999;
	outline-color:#FF5B36;
	width: 85%;
	font-size: 1em;
	padding: 0.5em;
	margin: 0.5em 0;">
				<option value="Andaman Nicobar">Andaman Nicobar</option>
				<option value="Andhra Pradesh">Andhra Pradesh</option>
				<option value="Arunachal Pradesh">Arunachal Pradesh</option>
				<option value="Assam">Assam</option>
				<option value="Bihar">Bihar</option>
				<option value="Chandigarh">Chandigarh</option>
				<option value="Chhattisgarh">Chhattisgarh</option>
				<option value="Dadar Nagar Haveli">Dadar Nagar Haveli</option>
				<option value="Daman Diu">Daman Diu</option>
				<option value="Delhi">Delhi</option>
				<option value="Goa">Goa</option>
				<option value="Gujarat">Gujarat</option>
				<option value="Haryana">Haryana</option>
				<option value="Himachal Pradesh">Himachal Pradesh</option>
				<option value="Jammu Kashmir">Jammu Kashmir</option>
				<option value="Jharkhand">Jharkhand</option>
				<option value="Karnataka">Karnataka</option>
				<option value="Kerala">Kerala</option>
				<option value="Lakshadweep">Lakshadweep</option>
				<option value="Madhya Pradesh" selected>Madhya Pradesh</option>
				<option value="Maharashtra">Maharashtra</option>
				<option value="Manipur">Manipur</option>
				<option value="Meghalaya">Meghalaya</option>
				<option value="Mizoram">Mizoram</option>
				<option value="Nagaland">Nagaland</option>
				<option value="Orissa">Orissa</option>
				<option value="Pondicherry">Pondicherry</option>
				<option value="Punjab">Punjab</option>
				<option value="Rajasthan">Rajasthan</option>
				<option value="Sikkim">Sikkim</option>
				<option value="Tamilnadu">Tamilnadu</option>
				<option value="Telangana">Telangana</option>
				<option value="Tripura">Tripura</option>
				<option value="Uttar Pradesh">Uttar Pradesh</option>
				<option value="Uttarakhand">Uttarakhand</option>
				<option value="West Bengal">West Bengal</option>

			</select><br>&nbsp;<br>
                        <span>District :<label></label></span><input type="text" class="form-control input-lg" name="district">
                        <span>Tehsil :<label></label></span><input type="text" class="form-control input-lg" name="tehsil">
                        <span>Post :<label></label></span><input type="text" class="form-control input-lg" name="post">
                        <span>City :<label>*</label></span><input type="text" class="form-control input-lg" name="city"  >
                        <span>Pincode :<label>*</label></span><input type="text" class="form-control input-lg" name="pincode"  >
                        <span>Mobile No :<label>*</label>(Only 10 Digit)</span><input type="text" class="form-control input-lg" name="mobile"   maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits">
                        <span>Other Mobile No :<label></label>(Only 10 Digit)</span><input type="text" class="form-control input-lg" name="mobile2" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits">
                        <span>Email Address :</span> <input type="email" class="form-control input-lg" name="email" style="border: 1px solid #999;
	outline-color:#FF5B36;
	width: 85%;
	font-size: 1em;
	padding: 0.5em;
	margin: 0.5em 0;">
                        <span>ID Proof Type:<label>*</label></span><select name="idproof" class="form-control input-lg" style="border: 1px solid #999;
	outline-color:#FF5B36;
	width: 85%;
	font-size: 1em;
	padding: 0.5em;
	margin: 0.5em 0;">
			<option value="18" selected="selected">Adhar Card</option>
			<option value="16">Central/State Government certified ID proof</option>
			<option value="17">Certification from any of the Authorities</option>
			<option value="15">Domicile certificate with communication address and photograph</option>
			<option value="10">Driving License (Valid)</option>
			<option value="11">Pan Card</option>
			<option value="13">Passport (Valid)</option>
			<option value="20">Ration Card With Photogarh</option>
			<option value="12">Voter Identity Card</option>
			<option value="14">Written confirmation from the banks certifying identity proof</option>

		</select>


                        <span>Address Proof Type:<label>*</label></span><select name="addreassproof" id="ddlAddProof" class="form-control input-lg" style="border: 1px solid #999;
	outline-color:#FF5B36;
	width: 85%;
	font-size: 1em;
	padding: 0.5em;
	margin: 0.5em 0;">
			<option value="22" selected="selected">Adhar Card</option>
			<option value="15">Bank account/Passbook With Photogarh</option>
			<option value="21">Central/State Government certified Address proof.</option>
			<option value="19">Current employer’s certificate mentioning residence</option>
			<option value="20">Domicile certificate with communication address and photograph</option>
			<option value="13">Driving License (Valid)</option>
			<option value="23">Electricity bill not older than 6 months</option>
			<option value="11">Electricity bill not older than six months</option>
			<option value="18">Lease agreement along with rent receipt not older than 3 months</option>
			<option value="12">Passport (Valid)</option>
			<option value="10">Ration Card</option>
			<option value="14">Telephone bill not older than 6 months</option>
			<option value="16">Voters Identity Card</option>
			<option value="17">Written confirmation from the banks (Attested by Bank)</option>

		</select>
					</div>
					 <div class="clearfix"> </div>
					   
						 <input type="checkbox" name="checkbox" required><i></i>I agree The Term and condition and ready to pay 100 Rs<a href="terms.php" target="_blank">Terms And Condition</a>
					 
					 </div>
				     <div class="  register-bottom-grid">

					 </div>

				<div class="clearfix"> </div>
				<div class="register-but">

					   <input type="submit" value="submit" name="register" id="submit" class="btn btn-primary btn-md">
					   <div class="clearfix"> </div>
				   </form>
				</div>

                </p><?php }?>
</div>          		</div>
  
 <br>&nbsp;<br>
          	</div>

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
<?php
if(isset($_POST[register]))
{
   
 $price='100';
$rtey=mysql_query("SELECT * FROM `distributor` WHERE `d_id`=".$_SESSION[id]);
	if(mysql_num_rows($rtey)>0)
	{ $tiy=mysql_fetch_assoc($rtey);
		$plus=$tiy[bal]-$price;
		
		$que="select max(bill_id) as max from bill";
     $r=mysql_query($que) or die("query not performed");
if($r)
  {
  $row=mysql_fetch_array($r);  
  $bill_id=$row['max'];


  $bill_id=$bill_id+1;
  
  }
        if($plus>0)
        {
        mysql_query("INSERT INTO `transition_history` (`10`, `20`, `50`, `100`, `500`, `1000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `chequeno`, `slip_no`, `time`) VALUES ('$_POST[m10]', '$_POST[m20]', '$_POST[m50]', '$_POST[m100]', '$_POST[m500]', '$_POST[m1000]', '$price', '$plus', '$_SESSION[id]', '$date', 'register', '-', '$tiy[bal]', 'software', 'software', '$_POST[cheno]', '$_POST[slip_no]', '$time')")or die("transtation not recorded");
		mysql_query("update distributor set bal=".$plus." where d_id=".$_SESSION[id]) or die("balance not updated");
//////////////////////////////////register process
$che=mysql_query("select * from distributor where mobile='$_POST[mobile]' and d_dob='$_POST[d_date]'")or die ("value not founded");
if (mysql_num_rows($che)>0){ 
	$r=mysql_fetch_assoc($che);
	header("location:form.php?d_id=$r[d_id]&mobile=$r[mobile]&name=$r[d_name]&dob=$r[d_dob]");
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
					  
					}
					$l="select * from level where d_id=$s_no";
					 $roww=mysql_query($l) or die ("level not generete");
					
					 $rot=mysql_fetch_assoc($roww);
					 if ($roww){
					 $level = $rot[level];
					 $level=$level + 1;
					 }
					
					$ins="INSERT INTO distributor(d_id,sponsor_no,proposer_no,d_name,father_name,nominee_name,d_dob,nominee_dob,house_addreass,state,district,tehsil,post,city,pincode,mobile,mobile2,email,id_proof,addreass_proof,password,joining_date,kyc,new) VALUES('$d_id','$s_no','$p_no','$d_name','$father','$nominee_name','$d_date','$nominee_dob','$d_add','$state','$district','$tehsil','$post','$city','$pincode','$mobile','$mobile2','$email','$idproof','$addproof','$password','$joining_date','n','y')";
					mysql_query($ins)or die ("values not inserted");
					$insl="INSERT INTO level (d_id,sponsor_no,level) VALUES('$d_id','$s_no','$level')";
					mysql_query($insl)or die ("values not inserted");
					mysql_query("INSERT INTO `transition_history` (`t_id`, `1`, `2`, `5`, `10`, `20`, `50`, `100`, `500`, `1000`, `2000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `slip_no`, `to`, `type`, `b_bal`, `branch_id`, `e_id`, `slip_place`, `slip_fileno`, `api_user_id`, `l_id`, `chequeno`, `costumer_name`, `by`, `time`, `bill_id`) VALUES (NULL, '', '', '', '', '', '', '', '', '', '', '100', '100', '$d_id', '$date', 'online transfer', '', '', '+', '0', '', '', '', '', '', '', '', '', '', '$time', '');");
$que="select max(bill_id) as max from bill";
 $r=mysql_query($que) or die("query not performed");
if($r)
  {
  $row=mysql_fetch_array($r);  
  $bill_id=$row['max'];
  $bill_id=$bill_id+1;
  }
mysql_query("INSERT INTO `transition_history` (`t_id`, `1`, `2`, `5`, `10`, `20`, `50`, `100`, `500`, `1000`, `2000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `slip_no`, `to`, `type`, `b_bal`, `branch_id`, `e_id`, `slip_place`, `slip_fileno`, `api_user_id`, `l_id`, `chequeno`, `costumer_name`, `by`, `time`, `bill_id`, `transtion_id`) VALUES (NULL, '', '', '', '', '', '', '', '', '', '', '100', '0', '$d_id', '$date', 'bv purchase', '', '', '-', '100', '', '', '', '', '', '', '', '', '', '$time', '$bill_id', '');");
mysql_query("INSERT INTO `bill` (`bill_id`, `d_id`, `o_date`, `s_date`, `name`, `addreass`, `mobile`, `mobile2`, `pincode`, `city`, `state`, `addreasstype`, `price`, `bv`, `status`, `paid`, `de_id`, `online`, `shop_id`, `method`) VALUES ('$bill_id', '$d_id', '$date', '$date', '', '', '', '', '', '', '', '', '100', '100', 'c', '', '', '', '', 'joining')");
$bill_id=$bill_id+1;
mysql_query("INSERT INTO `bill` (`bill_id`, `d_id`, `o_date`, `s_date`, `name`, `addreass`, `mobile`, `mobile2`, `pincode`, `city`, `state`, `addreasstype`, `price`, `bv`, `status`, `paid`, `de_id`, `online`, `shop_id`, `method`) VALUES ('$bill_id', '$p_no', '$date', '$date', '', '', '', '', '', '', '', '', '0', '10', 'c', '', '', '', '', 'joining bonus')");

					

					
$msg = "Thankyou for registering in G1focus \n User ID =  $d_id \n Please Login To Your Account";
// use wordwrap() if lines are longer than 120 characters
$msg = wordwrap($msg,120);

// send email
mail("$_SESSION[email]","G1focus Distributor NO.",$msg);
$dd='welcome%20to%20G1focus%20Your%20User%20ID='.$d_id.'%20%20%20%20%20please%20login%20your%20account%20%20Thankyou';
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
  

$dd='Your Proposal '.$d_name.' joined Sucessfully his user id '.$d_id.' and 10 bv credited to your account joining bonus G1focus';
$dd = str_replace(' ', '%20', $dd);
$url = 'http://sms.hspsms.com/sendSMS?username=cmd&message='.$dd.'&sendername=gonefs&smstype=TRANS&numbers='.$p_mob.'&apikey=e8ab1258-683f-45cf-ab3e-082efac6a9b3';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
$text = str_replace('%20', ' ', $dd);
mysql_query("INSERT INTO `send_sms` (`id`, `d_id`, `send_no`, `send_message`, `message_receipt`, `to_d_id`, `date`, `time`) VALUES (NULL, '$d_id', '$p_mob', '$text', '$response', '', '$date', '$time');");

echo "<script>alert('costumer added sucessfully');
			location.href='form.php?d_id=$d_id&name=$d_name&sus=1';</script>";
				
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

///////////////////////////////////////////////////////////////////////////////////////////////////////////

        }
        else{echo "<script>
			location.href='form.php?fail=1';</script>"; }        
	}
	else
	{
		echo "<script>alert('sorry error occour please try again');
			location.href='form.php?error=1';</script>";
	}

}

?>
      <!--main content end-->
      <!--footer start-->
      <?php include "include/footer.php";?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
