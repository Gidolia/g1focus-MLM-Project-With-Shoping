<?php include "config.php";
// Merchant key here as provided by Payu
$MERCHANT_KEY = "laLgRl6c";

// Merchant Salt as provided by Payu
$SALT = "4Kbw0hmna9";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}

?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>G1focus Meeting</title>
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

  
  <!-- FOR IE9 below -->
  <!--[if lte IE 9]>
  <script src="js/modernizr-2.6.2.min.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
<script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
</head>
<body class="fh5co-inner" onload="submitPayuForm()"><?php include_once("../../analyticstracking.php") ?>
<?php include "include/header.php";?>
  <div id="fh5co-page-title" style="background-image: url(images/slide_3.jpg)">
    <div class="overlay"></div>
    
      
    </div>
  </div>
  <main role="main" id="fh5co-main">
    <div class="container">
      <div class="row">
	  	<div class="col-md-12" id="fh5co-sidebar">


                <table class="table table-bordered table-hover table-responsive">
		  <tr><th>Name :: <?php echo $_GET[name];?></th></tr>
		  <tr><td><form action="<?php echo $action; ?>" method="post" name="payuForm">
<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <input name="amount" type="hidden" value="<?php echo (empty($posted['amount'])) ? '100' : $posted['amount'] ?>" />
	 <input type="hidden" name="firstname"  id="firstname" value="<?php echo (empty($posted['firstname'])) ? $_GET['name'] : $posted['firstname']; ?>" />
	 <input name="email" type="hidden" id="email"  value="<?php echo (empty($posted['email'])) ? $_GET['email'] : $posted['email']; ?>" />
	 <input type="hidden" name="phone"  value="<?php echo (empty($posted['phone'])) ? $_GET['mobile'] : $posted['phone']; ?>" />
     <input name="productinfo" type="hidden" value="<?php echo (empty($posted['productinfo'])) ? $_GET['d_id'] : $posted['productinfo'] ?>" />
     <?php $urlvars = parse_url($url); ?>
	 <input name="surl" type="hidden" value="<?php echo (empty($posted['surl'])) ? 'http://www.gidolia.com/g1focus/bs/process_sucess_register.php?sucess=1&amount=100&txn_id='.$txnid.'&'.$urlvars[query] : $posted['surl'] ?>" size="64" />
	 <input name="furl" type="hidden" value="<?php echo (empty($posted['furl'])) ? 'http://www.gidolia.com/g1focus/bs/transtion_confirm.php?fail=1&'.$urlvars[query] : $posted['furl'] ?>" size="64" />
	 <input type="hidden" name="service_provider" value="payu_paisa" size="64" />	
                 
                 	<h5 align="center">Pay 100 Rs And Register Online Now<br>&nbsp;<br><?php if(!$hash) { ?>
            <input type="submit" value="Submit and pay" class="btn btn-primary btn-md" />
          <?php }?></td></tr>
		  
	        </table>
		</div>
	  </div>
	   <?php include "../user/ad.php";?>
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
