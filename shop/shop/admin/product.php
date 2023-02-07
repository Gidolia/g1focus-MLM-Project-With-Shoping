 <?php include "config.php";?> 
  <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">              				<table class="table table-bordered table-hover table-striped"><tr><th>Product ID</th><th>name</th><th>Price</th><th>D.P.</th><th>B.V</th></tr>

                
                               <?php 
$qu="SELECT * FROM product";
$query=mysql_query($qu);
while($fetch=mysql_fetch_assoc($query))
{?>

                		   <tr>
                                 
                                  <td><?php echo $fetch[p_id];?></td>
                                  <td class="hidden-phone"><?php echo $fetch[p_name];?></td>
                                  <td><?php echo $fetch[p_mrp];?> </td>
                                  <td><?php echo $fetch[p_selling_price];?> </td>
                                  <td>B.V <?php echo $fetch[p_bv];?></td> 
                                  
                              </tr>                          

               <?php $tg=$tg+$fetch[price];
			   $bvd=$bvd+$fetch[bv];}?>
</table>