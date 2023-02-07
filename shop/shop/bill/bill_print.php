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
	left: 32px;
	top: 18px;
	width: 259px;
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
	left: 677px;
	top: 114px;
	width: 376px;
	height: 109px;
	z-index: 4;
}
#apDiv5 {
	position: absolute;
	left: 35px;
	top: 279px;
	width: 1026px;
	height: 189px;
	z-index: 5;
}
</style>
<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<style type="text/css">
#apDiv3 {
	position: absolute;
	left: 34px;
	top: 123px;
	width: 220px;
	height: 137px;
	z-index: 6;
}
#apDiv6 {
	position: absolute;
	left: 745px;
	top: 6px;
	width: 312px;
	height: 42px;
	z-index: 7;
}

</style>
</head>

<body>

<div id="apDiv1"><img src="../../images/logo.png" width="240" height="80" />
<br />
</div>
<div id="apDiv6"><input type="button" class="acount-btn" onClick="window.print()" value="Print This Page"/> || <a href="bills.php" class="acount-btn">Cut another bill</a>
<?php if(isset($_GET['new']))
{ ?>
<h2>sucessfully Registered </h2><?php } ?>
</div>
<?php 

include "../config.php";
error_reporting(1);
$qu="SELECT * FROM bill WHERE bill_id=$_GET[bill_id]";
$query=mysql_query($qu) or die ("query not performed");
while($fetch=mysql_fetch_assoc($query))
{
	$total_price=$fetch[price];
	$total_bv=$fetch[bv];
	?>

<div id="apDiv4">
   <table width="80%"  class="table table-bordered table-striped table-condensed">
<tr height="35"><td width="226">&nbsp;&nbsp;Order No.</td><td width="178">&nbsp;&nbsp;&nbsp;<?php echo $fetch[bill_id];?></td></tr>
   <tr height="35"><td>&nbsp;&nbsp;Order Date</td><td>&nbsp;&nbsp;&nbsp;<?php echo $fetch[o_date];?></td></tr>
      <tr height="35"><td>&nbsp;&nbsp;Distributor ID</td><th>&nbsp;&nbsp;&nbsp;<?php echo $fetch[d_id];?></th></tr>
      <tr height="35"><td>&nbsp;&nbsp;Shop ID</td><td>&nbsp;&nbsp;&nbsp;<?php echo $fetch[shop_id];?></td></tr>

   </table></div>
<?php } ?>
<div id="apDiv5"><table width="85%"  class="table table-bordered table-striped table-condensed">
  <tr>
    <th width="71%" align="left">&nbsp;Product</th>
    <th width="8%" align="left">&nbsp;QTY</th>
    <th width="8%" align="left">&nbsp;Price</th>
    <th width="8%" align="left">&nbsp;B.V</th>
    
<?php 		$qr="SELECT c.* , p.* FROM bill_detail c,product p WHERE c.p_id=p.p_id and c.bill_id=$_GET[bill_id]";
$queryr=mysql_query($qr) or die ("query not performed");
while($f=mysql_fetch_assoc($queryr))
{
	$price=$f[qty]*$f[p_selling_price];
	$bv=$f[p_bv]*$f[qty];
	$t_bv=$t_bv+$bv;
?>  
  <tr>
  	<td><?php echo $f[p_name];?></td>
    <td><?php echo $f[qty];?></td>
    <td><?php echo $price;?></td>
    <td><?php echo $bv;?></td>
    
    
  </tr><?php }?>
    <th colspan="2" align="left">&nbsp;TOTAL AMOUNT</th>

    <th width="8%" align="left">&#8377; <?php echo $total_price;?></th><th width="8%" align="left">&#8377; <?php echo $t_bv;?></th>
    <tr><td height="61" colspan="4" rowspan="2"><font size="1">Terms and Condition:<ul><li>While Receiving Product Please check all the product weather it seal pack or not if you found any unseal product please don't receive the order we will send replace product to you.</li>
    <li>Once you receive the product we are not responsible for defect product</li></ul></font></td></tr> 

</table>
</div>
<div id="apDiv3"><h4>Billed From</h4>
				G1FOCUS MARKETING PVT LTD.<br />
				D_550 New Suresh Nagar<br />
                Thathipur Morar<br />
                Gwalior 474006 (M.P)</div>


</body>
</html>