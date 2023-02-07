 <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
	
	<h2 align="center">G1focus Commission Calculation </h2>
	<div class="content-panel">        
	<?php
include "config.php";
include "to_bv.php";
$resultf = mysql_query("SELECT * FROM `c_month` WHERE m_id=".$_GET[id]);
$rowf = mysql_fetch_assoc($resultf)
?>

<table class="table">
<tr><th></th><th>B.V.</th><th>Percentage</th><th>Amount</th></tr>
<tr><th>Total Amount</th><th><?php echo $rowf[down_bv]+$rowf[own_bv];?></th><th><?php echo slab_selection($rowf[down_bv]+$rowf[own_bv]);?></th><th><?php echo ($rowf[down_bv]+$rowf[own_bv])*slab_selection($rowf[down_bv]+$rowf[own_bv])/100;?></th></tr>
<tr><th>1 leg</th><th><?php echo $rowf[bv1];?></th><th><?php echo slab_selection($rowf[bv1]);?></th><th>-<?php echo  $rowf[bv1]*slab_selection($rowf[bv1])/100;?></th></tr>
<tr><th>2 leg</th><th><?php echo $rowf[bv2];?></th><th><?php echo slab_selection($rowf[bv2]);?></th><th>-<?php echo  $rowf[bv2]*slab_selection($rowf[bv2])/100;?></th></tr>
<tr><th>3 leg</th><th><?php echo $rowf[bv3];?></th><th><?php echo slab_selection($rowf[bv3]);?></th><th>-<?php echo  $rowf[bv3]*slab_selection($rowf[bv3])/100;?></th></tr>
<tr><th>Own B.V</th><th><?php echo $rowf[own_bv];?></th><th></th><th></th></tr>
<tr><th>Person You Joined This Month</th><th><?php echo $rowf[person_joined];?></th><th></th><th><?php echo  $rowf[join_amount];?></th></tr>
<tr><th>Total Amount</th><th></th><th></th><th><?php echo  $rowf[m_amount];?> Rs</th></tr></table></div>
<br>
<br>
 Calculation ID :: <?php echo $_GET[id];?>