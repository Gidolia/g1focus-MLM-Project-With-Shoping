<?php error_reporting(1);include "../config.php";?>
<link href="../assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../assets/css/table-responsive.css" rel="stylesheet" type="text/css" />
<script>
function showHint(str , qty) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?p_id=" + str + "&qty=" + qty , true);
        xmlhttp.send();
    }
}
</script>
<table class="table-bordered table table-condensed table-striped">
<tr><th>P.ID</th><th>Name</th><th>MRP</th><th>D.P</th><th>QTY</th><th>Price</th><th><a href="process_empty_cart.php">Empty Cart</a></th></tr><?php
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
				echo "<form action='pr_add.php' method='get'><input type='hidden' name='p_id' value='".$row[p_id]."'><tr nowrap><td height='50' align='left'><h5>&nbsp;&nbsp;&nbsp;".$row[p_id]."</td><td><h5>&nbsp;".$row[p_name]."</h5></td><td><h5>&#8377;".$row[p_mrp]."</h5></td><td><h5>&#8377;&nbsp;".$row[p_selling_price]."</h5></td><td><input type='number' onChange='this.form.submit();' name='qty' value='".$x[qty]."' min='1' size='2'></td><td>&#8377;".$total."</td><td><a href='del_cart_product.php?id=".$id."'><font color='#FF0000'><h5>Delete</h5></font></a></td></tr></form>";	
				$i++;
									
									}
			echo "<tr><td></td><td></td><td></td><td></td><th>Total</th><th>&#8377;".$total_price."</th><td>B.V ".$total_bv_pm."</td></tr>";				
									}?></table>
                                   