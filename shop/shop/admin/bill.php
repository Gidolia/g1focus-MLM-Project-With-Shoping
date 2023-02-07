 <?php include "config.php";?> 
  <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">              				<table class="table table-bordered table-hover table-striped"><tr><th>Status</th><th>name</th><th>D ID</th><th>Price</th><th>B.V</th><th>Order Date</th><th>Shop ID</th></tr>

                
                               <?php 
$qu="SELECT * FROM bill WHERE status='t'";
$query=mysql_query($qu);
while($fetch=mysql_fetch_assoc($query))
{?>

                		   <tr>
                                  <td><span class="label label-info label-mini">In Process</span></td>
                                  <td><a href="bill_info.php?bill_id=<?php echo $fetch[bill_id];?>"><?php echo $fetch[name];?></a></td>
                                  <td class="hidden-phone"><?php echo $fetch[d_id];?></td>
                                  <td><?php echo $fetch[price];?> </td>
                                  <td>B.V <?php echo $fetch[bv];?></td> 
                                  <td><?php echo $fetch[o_date];?></td>
                                  <td><?php echo $fetch[shop_id];?></td>
                              </tr>                          

               <?php $tg=$tg+$fetch[price];
			   $bvd=$bvd+$fetch[bv];}?>
                               <?php 
$qu="SELECT * FROM bill WHERE status='c'";
$query=mysql_query($qu);
while($fetch=mysql_fetch_assoc($query))
{?>

                		   <tr>
                                  <td><span class="label label-success label-mini">Done</span></td>
                                  <td><a href="bill_info.php?bill_id=<?php echo $fetch[bill_id];?>"><?php echo $fetch[name];?></a></td>
                                  <td class="hidden-phone"><?php echo $fetch[d_id];?></td>
                                  <td><?php echo $fetch[price];?> </td>
                                  <td>B.V <?php echo $fetch[bv];?></td> 
                                  <td><?php echo $fetch[o_date];?></td>
                                  <td><?php echo $fetch[shop_id];?></td>
                              </tr>                          

               <?php $tg=$tg+$fetch[price];
			   $bvd=$bvd+$fetch[bv];}?>
               <tr><th>Total</th><td></td><td></td><td><?php echo $tg;?></td><td><?php echo $bvd;?></td></tr>

</table> </p>
