<?php error_reporting(1);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../images/gt.jpg" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>G1focus</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 41px;
	top: 25px;
	width: 211px;
	height: 59px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 43px;
	top: 163px;
	width: 190px;
	height: 157px;
	z-index: 2;
}
#apDiv4 {
	position: absolute;
	left: 688px;
	top: 144px;
	width: 376px;
	height: 97px;
	z-index: 4;
}
#apDiv5 {
	position: absolute;
	left: 36px;
	top: 332px;
	width: 1021px;
	height: 189px;
	z-index: 5;
}
</style>
<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<style type="text/css">
#apDiv3 {
	position: absolute;
	left: 43px;
	top: 142px;
	width: 210px;
	height: 156px;
	z-index: 6;
}
#apDiv6 {
	position: absolute;
	left: 745px;
	top: 6px;
	width: 500px;
	height: 57px;
	z-index: 7;
}
</style>
</head>

<body>

</div>
<?php 

include "../config.php";
error_reporting(1);
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="acount-btn" onclick="window.history.back()">Go Back</button>
<form action="final_bill.php" method="post">
<div id="apDiv4">
   <table width="80%"  class="table table-bordered table-striped table-condensed">
<tr height="40"><td width="226">&nbsp;&nbsp;Distributor ID</td><td width="178">&nbsp;&nbsp;&nbsp;<?php echo $_GET[d_id];?></td></tr>
<input name="d_id" value="<?php echo $_GET[d_id];?>" type="hidden" />
   <tr height="40"><td>&nbsp;&nbsp;Date</td><td>&nbsp;&nbsp;&nbsp;<?php echo date("Y/m/d");?></td></tr>
   <tr height="40"><td>&nbsp;&nbsp;Shop ID</td><td>&nbsp;&nbsp;&nbsp;<?php echo $_SESSION[shop_id];?></td></tr>
   <tr height="40"><td>&nbsp;&nbsp;Final check out</td><td>&nbsp;&nbsp;&nbsp;<input type="submit" name="joinsubmit" value="Check out" /></td></tr>
     </form>

   </table></div>

<div id="apDiv5"><table width="85%"  class="table table-bordered table-striped table-condensed">
  <tr>
    <th width="71%" align="left">&nbsp;Product</th>
    <th width="8%" align="left">&nbsp;MRP</th>
    <th width="8%" align="left">&nbsp;DP</th>
    <th width="8%" align="left">&nbsp;QTY</th>
    <th width="8%" align="left">&nbsp;Price</th></tr>

  <?php
									$tot = 0;
									$i = 1;
									$total_price=0;
									$total_bv_pm=0;
									$totqty=0;
									if(isset($_SESSION['carttrr']))
									{

									foreach($_SESSION['carttrr'] as $id=>$x)
									{
									$query="select * from product where p_id='$x[p_id]'";
	
									$res=mysql_query($query);
									$row=mysql_fetch_assoc($res);	
									$total=$x[qty]*$row[p_selling_price];	
                					$total_bv_p=$x[qty]*$row[p_bv];
									$totqty=$x[qty]+$totqty;
									$total_price=$total+$total_price;
									$total_bv_pm=$total_bv_pm+$total_bv_p;
				echo "<form action='pr_add.php' method='get'><input type='hidden' name='p_id' value='".$row[p_id]."'><tr nowrap><td><h5>&nbsp;".$row[p_name]."</h5></td><td><h5>&#8377;".$row[p_mrp]."</h5></td><td><h5>&#8377;&nbsp;".$row[p_selling_price]."</h5></td><td><input type='number' onChange='this.form.submit();' name='qty' value='".$x[qty]."' min='1' size='2'></td><td>&#8377;".$total."</td><td><a href='del_cart_product.php?id=".$id."&bill_ask=1'><font color='#FF0000'><h5>Delete</h5></font></a></td></tr></form>";	
				$i++;
									
									}
			echo "<tr><td></td><td></td><td></td><th>Total</th><th>&#8377;".$total_price."</th><td>B.V ".$total_bv_pm."</td></tr>";				
									}?>
    <tr><td rowspan="2" colspan="5"><font size="2">Terms and Condition:<ul><li>While Receiving Product Please check all the product weather it seal pack or not if you found any unseal product please don't receive the order we will send replace product for you.</li>
   <li>Once you receive the product we are not responsible for defect product</li></ul></font></td></tr> 

</table>
</div>
<div id="apDiv3"><h4>Billed From</h4>
				G1focus pvt ltd.<br />
				Shop ID :: <?php echo $_SESSION[shop_id];?><br />
                Gwalior(M.P)</div>


</body>
</html>