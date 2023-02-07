 <?php include "config.php";?> 
  <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet"> 
<form method="get">
<input type="number" name="shop_id" /><input type="submit" name="id_submit" /></form><br /><br />
<?php if(isset($_GET[shop_id]))
{?>
<table class="table-bordered table table-condensed table-striped table-hover"><tr><th>Product ID</th><th>Product Name</th><th>Quantity</th><th>Expiry</th></tr> <?php 
	$qu="SELECT c.* , p.* FROM shop_product c,product p WHERE c.p_id=p.p_id and c.shop_id=".$_GET[shop_id];
$query=mysql_query($qu) or die("dfg");
while($fetchtg=mysql_fetch_assoc($query))
{
	?>
    <tr>
    	<td><?php echo $fetchtg[p_id];?></td>
    	<td><?php echo $fetchtg[p_name];?></td>
        <td><?php echo $fetchtg[qty];?></td>
        <td><?php echo $fetchtg[expiry];?></td></tr><?php 
        $rff=$fetchtg[qty]*$fetchtg[p_selling_price];
        $fgt=$fgt+$rff;}
        echo $fgt;}
        ?></table>
