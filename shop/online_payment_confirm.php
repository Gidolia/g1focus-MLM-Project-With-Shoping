<?php include "config.php";
if(empty($_SESSION['carttr']))
{ header("location:/");}
elseif(isset($_GET['confirm'])){
$rtk= parse_url($url);

header("location:http://www.gidolia.com/g1focus/shop/process_confirm.php?".$rtk[query]);
}


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
?>
<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="images/gt.jpg" />
<title>G1focus - Confirmation of delivery</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
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
<!--fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--//fonts-->
<script src="js/jquery.min.js"></script>
</head>
<body onload="submitPayuForm()"> 
	<!--header-->
	<?php include "include/header.php";?>
	<!---->
	<div class="container">
		
     
        
        
        <form action="<?php echo $action; ?>" method="post" name="payuForm">
      	   <div class="account_grid">
			   <div class=" login-right">
			  	<h3>Pay online Confimation</h3>
        	    
       
					 </div>
                
                 <br>

               
<?php
									$tot = 0;
									$i = 1;
									$total_price=0;
									$total_bv_pm=0;
									$totqty=0;
									if(isset($_SESSION['carttr']))
									{

									foreach($_SESSION['carttr'] as $id=>$x)
									{
									$query="select * from product where p_id='$x[p_id]'";
	
									$res=mysql_query($query) or die("Can't Execute Query...");
									$row=mysql_fetch_assoc($res);	
									$total=$x[qty]*$row[p_selling_price];	
                					$total_bv_p=$x[qty]*$row[p_bv];
									$totqty=$x[qty]+$totqty;
									$total_price=$total+$total_price;
									$total_bv_pm=$total_bv_pm+$total_bv_p;
				
				$i++;
									
									}
				
				$total_price=$total_price+30;
				
									}
									?>

                
		<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <input name="amount" type="hidden" value="<?php echo (empty($posted['amount'])) ? $total_price : $posted['amount'] ?>" />
	 <input type="hidden" name="firstname"  id="firstname" value="<?php echo (empty($posted['firstname'])) ? $_GET[name] : $posted['firstname']; ?>" />
	 <input name="email" type="hidden" id="email"  value="<?php echo (empty($posted['email'])) ? 'g1martgidolia@gmail.com' : $posted['email']; ?>" />
	 <input type="hidden" name="phone"  value="<?php echo (empty($posted['phone'])) ? $_GET[mobile] : $posted['phone']; ?>" />
     <input name="productinfo" type="hidden" value="<?php echo (empty($posted['productinfo'])) ? 'h' : $posted['productinfo'] ?>" />
     <?php $urlvars = parse_url($url); ?>
	 <input name="surl" type="hidden" value="<?php echo (empty($posted['surl'])) ? 'http://www.gidolia.com/g1focus/shop/process_confirm.php?paid=1&txn_id='.$txnid.'&'.$urlvars[query] : $posted['surl'] ?>" size="64" />
	 <input name="furl" type="hidden" value="<?php echo (empty($posted['furl'])) ? 'http://www.gidolia.com/g1focus/shop/cart.php?fail=1' : $posted['furl'] ?>" size="64" />
	 <input type="hidden" name="service_provider" value="payu_paisa" size="64" />	
                 <table class="table table-bordered table-striped table-condensed">
                 <tr>
                 	<td><h5 align="center">Pay Online<br>&nbsp;<br><?php if(!$hash) { ?>
            <input type="submit" value="Submit and pay" />
          <?php } ?></form>
                            
                          
                            </h5></td></tr></table>
                
</form>              <div class="clearfix"> </div>
			 </div>
			 <div class="sub-cate">
               <h2 style="color:green;"><span style="font-family: wingdings; font-size: 200%;">&#10004;</span>Step 1</h2><span>Select Product</span><br>&nbsp;<br>
               <h2 style="color:green;"><span style="font-family: wingdings; font-size: 200%;">&#10004;</span>Step 2</h2><span>Check Product</span><br>&nbsp;<br>

               <h2 style="color:green;"><span style="font-family: wingdings; font-size: 200%;">&#10004;</span>Step 3</h2><span>delivery information</span><br>&nbsp;<br>
               <h2 style="color:orange;"><span style="font-family: wingdings; font-size: 200%;">&DoubleRightArrow;</span>Step 4</h2><span>Confirmation</span>
			</div>
			  <div class="clearfix"> </div>
      	 </div>
	<!---->
	<?php include "include/footer.php";?>
    </body>
</html>