<?php error_reporting(1);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="../images/gt.jpg" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>G1Mart</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 41px;
	top: 31px;
	width: 240px;
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
	left: 690px;
	top: 164px;
	width: 376px;
	height: 117px;
	z-index: 4;
}
#apDiv5 {
	position: absolute;
	left: 40px;
	top: 410px;
	width: 1021px;
	height: 189px;
	z-index: 5;
}
</style>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<style type="text/css">
#apDiv3 {
	position: absolute;
	left: 283px;
	top: 166px;
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
#apDiv8 {
	position: absolute;
	left: 158px;
	top: 698px;
	width: 565px;
	height: 191px;
	z-index: 9;
	color:green;
}
</style>
</head>

<body>

<div id="apDiv1"><img src="../images/logo.png" width="230" height="80" /><br />
</div>
<h4><?php if (isset($_GET[d_id]))
{ echo "You are sucessfully register Your Distributor id is ".$_GET[d_id];}?></h4>
<div id="apDiv6"><a href="/g1focus" class="acount-btn">Go Back to Shop</a>||<a href="/g1focus/user" class="acount-btn">My account</a>||<input type="button" class="acount-btn" onClick="window.print()" value="Print This Page"/>
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
<div id="apDiv2"><h4>Billed To</h4>
				<?php echo $fetch[name];?><br />
                <?php echo $fetch[d_id];?><br />
                <?php echo $fetch[addreass];?><br />
                <?php echo $fetch[city];?><br />
                <?php echo $fetch[state];?> a India<br />
                <?php echo $fetch[pincode];?><br />
</div>
   <div id="apDiv4">
   <table width="80%"  class="table table-bordered table-striped table-condensed">
<tr height="45"><td width="226">&nbsp;&nbsp;Order No.</td><td width="178">&nbsp;&nbsp;&nbsp;<?php echo $fetch[bill_id];?></td></tr>
   <tr height="45"><td>&nbsp;&nbsp;Order Date</td><td>&nbsp;&nbsp;&nbsp;<?php echo $fetch[o_date];?></td></tr>
   <tr height="45"><td>&nbsp;&nbsp;Payment</td><td>&nbsp;&nbsp;&nbsp;<?php if($fetch[paid]=="y"){echo "Done";}else{echo "C.O.D";}?></td></tr>
   <tr height="45"><td>&nbsp;&nbsp;Amount</td><td>&nbsp;&nbsp;&nbsp;&#8377; <?php echo $fetch[price];?></td></tr>
      <tr height="45"><td>&nbsp;&nbsp;Delivery Time</td><td>&nbsp;&nbsp;&nbsp;With in 24 Hours</td></tr>

   </table></div>
<?php } ?>
<div id="apDiv5"><table width="85%"  class="table table-bordered table-striped table-condensed">
  <tr>
    <th width="71%" align="left">&nbsp;Product</th>
    <th width="8%" align="left">&nbsp;QTY</th>
    <th width="8%" align="left">&nbsp;Price</th>
    <th width="8%" align="left">&nbsp;B.V</th></tr>
<?php 		$qr="SELECT c.* , p.* FROM bill_detail c,product p WHERE c.p_id=p.p_id and c.bill_id=$_GET[bill_id]";
$queryr=mysql_query($qr) or die ("query not performed");
while($f=mysql_fetch_assoc($queryr))
{
	$price=$f[qty]*$f[p_selling_price];
	$bv=$f[p_bv]*$f[qty]
?>  
  <tr>
  	<td><?php echo $f[p_name];?></td>
    <td><?php echo $f[qty];?></td>
    <td><?php echo $price;?></td>
    <td><?php echo $bv;?></td>
    
  </tr><?php }?>
    <tr>
    <th colspan="2" align="left">&nbsp;Delivery Charges</th>

    <th width="8%" align="left">&#8377; 30</th>
    <th width="8%" align="left">&nbsp;</th></tr>

    <tr>
    <th colspan="2" align="left">&nbsp;TOTAL AMOUNT</th>

    <th width="8%" align="left">&#8377; <?php echo $total_price;?></th>
    <th width="8%" align="left">&nbsp;<?php echo $total_bv;?></th></tr>
    <tr><td rowspan="2" colspan="4"><font size="2">Terms and Condition:<ul><li>While Receiving Product Please check all the product weather it seal pack or not if you found any unseal product please don't receive the order we will send replace product to you.</li>
    <li>when you satisfy the quality of product then pay bill amount(if not paid)</li> <li>Once you receive the product we are not responsible for defect product</li></ul></font></td></tr> 

</table>
</div>
<div id="apDiv3"><h4>Billed From</h4>
				G1focus marketing pvt ltd.<br />
				D_550 New suresh Nagar<br />
                Thathipur Morar<br />
                Gwalior(M.P)<br />
474006</div>

<div id="apDiv8"><?php if (isset($_GET[amt]))
{
$fdg=mysql_query("select * from de_amt where de_amt_id=$_GET[amt]") or die("balance not selected");
if(mysql_num_rows($fdg)>0)
{$ty=mysql_fetch_assoc($fdg);}?>
Your a/c <?php echo $ty[b_amt];?>Rs is debited INR <?php echo $ty[amount];?> on <?php echo $ty[de_date];?><br /> Now your balance is <?php echo $ty[a_amt];?>Rs.<?php }?>
</div>
</body>
</html>