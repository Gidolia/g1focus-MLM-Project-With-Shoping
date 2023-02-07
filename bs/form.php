<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>G1focus Distributor Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="G1focus, Gidolia, Rohit Gidolia" />
    <meta name="keywords" content="G1focus, g1, G1, Gidolia, Rohit Gidolia, Mart, mart, g1focus, mlm , company, shopping, bussiness" />
    <meta name="author" content="gidolia.com" />

    <!-- Facebook and Twitter integration -->
  <meta property="og:title" content=""/>
  <meta property="og:image" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:site_name" content=""/>
  <meta property="og:description" content=""/>
  <meta name="twitter:title" content="" />
  <meta name="twitter:image" content="" />
  <meta name="twitter:url" content="" />
  <meta name="twitter:card" content="" />

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  <link rel="shortcut icon" href="favicon.ico">

  <!-- Google Webfont -->
  <link href='https://fonts.googleapis.com/css?family=PT+Mono' rel='stylesheet' type='text/css'>
  <!-- Themify Icons -->
  <link rel="stylesheet" href="css/themify-icons.css">
  <!-- Icomoon Icons -->
  <link rel="stylesheet" href="css/icomoon-icons.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- Owl Carousel -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <!-- Magnific Popup -->
  <link rel="stylesheet" href="css/magnific-popup.css">
  <!-- Easy Responsive Tabs -->
  <link rel="stylesheet" href="css/easy-responsive-tabs.css">
  <!-- Theme Style -->
  <link rel="stylesheet" href="css/style.css">
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
  
  <!-- FOR IE9 below -->
  <!--[if lte IE 9]>
  <script src="js/modernizr-2.6.2.min.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
<script src="ajax.js"></script>
</head>
<body class="fh5co-inner">
<?php include_once("../../analyticstracking.php") ?>
<?php include "include/header.php";?>
  <div id="fh5co-page-title" style="background-image: url(images/slide_3.jpg)">
    <div class="overlay"></div>
    <div class="container">
      <div class="text">
        <h1>Registration Form</h1>  
      </div>
      
    </div>
  </div>
  <main role="main" id="fh5co-main">
    <div class="container">
      <div class="row">
	  	<div class="col-md-12" id="fh5co-sidebar">
		<div class="col-md-2"></div><div class="col-md-8">
		<div class="register">
		  	  <form action="process_register.php" method="post" name="myForm" onsubmit="return validateForm()">
				 <div class="  register-top-grid">
                 <h4>Application form to become a distributer</h4>
					<h4>
                    <p><font color="#FF0000">Note:Enter the Informations Very Carefully and Check the Spelling as per ID as the same will not be changed.</font></p></h4>
                    <h3><font color="#FF0000">
                    <?php
					if (isset($_GET[s_no])){echo "Sponsor no. you enter is wrong";}
					elseif (isset($_GET[p_no])){echo "proposor no. you enter is wrong";}
					elseif (isset($_GET['count'])){echo "Sponsor Already have 2 person in his down";}
					?></font></h3>
					<div class="mation">
                        <span>Proposer No : <label>*</label></span><input type="text" name="p_no" class="form-control input-lg"   onKeyUp="showUsert(this.value)" autofocus>
                        <span>Proposer Name :<label></label></span><input type="text" name="p_name" id="p_name" class="form-control input-lg" readonly>
                        <span>Proposer Address :<label></label></span><input type="text" name="p_addreass" id="p_addreass" class="form-control input-lg" readonly>
                        <br>
                        					<div class="mation">
						<span>Sponsor No : <label>*</label></span><input type="text" name="s_no" class="form-control input-lg"   onKeyUp="showUser(this.value)">
						
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
                        <span>Email Address <label>*</label> :</span> <input type="email" class="form-control input-lg" name="email" style="border: 1px solid #999;
	outline-color:#FF5B36;
	width: 85%;
	font-size: 1em;
	padding: 0.5em;
	margin: 0.5em 0;" required>
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
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" required><i></i>I agree The Term and condition and ready to pay 100 Rs<a href="terms.php" target="_blank">Terms And Condition</a></label>
					   </a>
					 </div>
				     <div class="  register-bottom-grid">

					 </div>

				<div class="clearfix"> </div>
				<div class="register-but">

					   <input type="submit" value="submit" name="register" id="submit" class="btn btn-primary btn-md">
					   <div class="clearfix"> </div>
				   </form>
				</div>
		
		
		
		
		
		
		
		</div>
		</div>


		
		</div>
	  </div>
	</div>
  </main>
<?php include "include/footer.php";?>


  <!-- Go To Top -->
    <a href="#" class="fh5co-gotop"><i class="ti-shift-left"></i></a>
    
      
    <!-- jQuery -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <!-- jQuery Easing -->
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.js"></script>
    <!-- Owl carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Magnific Popup -->
    <script src="js/jquery.magnific-popup.min.js"></script>
    <!-- Easy Responsive Tabs -->
    <script src="js/easyResponsiveTabs.js"></script>
    <!-- FastClick for Mobile/Tablets -->
    <script src="js/fastclick.js"></script>

    <!-- Main JS -->
    <script src="js/main.js"></script>

</body>
</html>
		
		
		
		
		
		
		
		
		
		
		
		