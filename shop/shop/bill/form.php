<?php include "../config.php";?>
<!DOCTYPE html>
<html>
<head>
<title>G1focus Registration</title>
<link rel="shortcut icon" href="../images/gt.jpg" />
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<script src="ajax.js"></script>
<!--theme-style-->
<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="../../js/jquery.min.js"></script>
</head>
<body>
	<!--header-->
	<!---->
	<div class="container">

		<div class="register">
		  	  <form action="process_register.php" method="post">
				 <div class="  register-top-grid">
                 <h4>Application form to become a distributer</h4>
                  

					<h3>
                    <p><font color="#FF0000">Note:Enter the Informations Very Carefully and Check the Spelling as per ID as the same will not be changed.</font></p></h3>
                    <h3><font color="#FF0000">
                    <?php
					if (isset($_GET[s_no])){echo "Sponsor no. you enter is wrong";}
					elseif (isset($_GET[p_no])){echo "proposor no. you enter is wrong";}
					elseif (isset($_GET['count'])){echo "Sponsor Already have 3 person in his down";}
					?></font></h3>
					<div class="mation">
						<span>Sponsor No : <label>*</label></span><input type="text" name="s_no" required onKeyUp="showUserr(this.value)" autofocus>
                        <span>Sponsor Name :<label></label></span><input type="text" id="s_name" name="s_name" value="" readonly required>
                        <span>Sponsor Address :<label></label></span><input type="text" id="s_addreass" name="s_addreass" readonly>
                        <span id="txtHint"></span>
                         <span id="txtResult"></span>
                        <span>Proposer No : <label>*</label></span><input type="text" name="p_no" required onKeyUp="showUsert(this.value)">
                        <span>Proposer Name :<label></label></span><input type="text" name="p_name" id="p_name" value="" readonly required>
                        <span>Proposer Address :<label></label></span><input type="text" name="p_addreass" id="p_addreass" readonly required>
                        <span>Applicant Name :<label>*</label></span><input type="text" name="d_name" required>
        		<span>Password<label>*</label></span><input type="password" name="password" required>
                <span>Confirm Password<label>*</label></span><input type="password" name="cpassword" required>
                        <span>Father/Husband Name :<label>*</label></span><input type="text" name="father" required>
                        <span>Nominee Name :<label>*</label></span><input type="text" name="nominee_name" required>
                        <span>Applicant DOB :<label>*</label></span><input type="number" max="31" min="1" name="date" placeholder="DD" required><input type="number" max="12" min="1" name="month" placeholder="MM" required><input type="number" max="2002" min="1920" name="year" placeholder="YYYY" required>
                        <span>Nominee DOB :<label>*</label></span><input type="number" max="31" min="1" name="n_date" placeholder="DD" required><input type="number" max="12" min="1" name="n_month" placeholder="MM" required><input type="number" max="2002" min="1920" name="n_year" placeholder="YYYY" required>
                        <hr>
                        <span>House No./Location :<label>*</label></span><textarea rows="6" cols="60" name="d_add" required></textarea>
                        <span>State :<label>*</label></span><select name="state" style="border: 1px solid #999;
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
                        <span>District :<label></label></span><input type="text" name="district">
                        <span>Tehsil :<label></label></span><input type="text" name="tehsil">
                        <span>Post :<label></label></span><input type="text" name="post">
                        <span>City :<label>*</label></span><input type="text" name="city" value="Gwalior" required>
                        <span>Pincode :<label>*</label></span><input type="text" name="pincode" required>
                        <span>Mobile No :<label>*</label>(Only 10 Digit)</span><input type="text" name="mobile" required maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits">
                        <span>Other Mobile No :<label></label>(Only 10 Digit)</span><input type="text" name="mobile2" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits">
                        <span>Email Address :<label>*</label></span> <input type="email" name="email" style="border: 1px solid #999;
	outline-color:#FF5B36;
	width: 85%;
	font-size: 1em;
	padding: 0.5em;
	margin: 0.5em 0;" required>
                        <span>ID Proof Type:<label>*</label></span><select name="idproof" style="border: 1px solid #999;
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
			<option value="12">Voter's Identity Card</option>
			<option value="14">Written confirmation from the banks certifying identity proof</option>

		</select>


                        <span>Address Proof Type:<label>*</label></span><select name="addreassproof" id="ddlAddProof" style="border: 1px solid #999;
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
			<option value="16">Voter's Identity Card</option>
			<option value="17">Written confirmation from the banks (Attested by Bank)</option>

		</select>
					</div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" required><i></i>I agree The Term and condition<a href="terms.php" target="_blank">Terms And Condition</a></label>
					   </a>
					 </div>
				     <div class="  register-bottom-grid">

					 </div>

				<div class="clearfix"> </div>
				<div class="register-but">

					   <input type="submit" value="submit" name="register">
					   <div class="clearfix"> </div>
				   </form>
				</div>
		   </div>
	</div>
	
</body>
</html>