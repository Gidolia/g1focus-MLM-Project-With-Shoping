 <?php include "config.php";?> 
  <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">              				<table class="table table-bordered table-hover table-striped"><tr><th>D ID</th><th>D Name</th><th>Share</th><th>Date</th></tr>

                
                               <?php 
$qu="SELECT * FROM share";
$query=mysql_query($qu);
while($fetch=mysql_fetch_assoc($query))
{
$qu3="SELECT * FROM distributor WHERE d_id=$fetch[d_id]";
$query3=mysql_query($qu3);
$fetch3=mysql_fetch_assoc($query3);?>

                		   <tr>
                                 
                                  <td><?php echo $fetch[d_id];?></td>
                                  <td class="hidden-phone"><?php echo $fetch3[d_name];?></td>
                                  <td><?php echo $fetch[share_no];?> </td>
                                  <td><?php echo $fetch[acc_o_date];?> </td>
                                 
                                  
                              </tr>                          

               <?php $tg=$tg+$fetch[share_no];
			   }?>
			   <tr><th>Total</th><th></th><th><?php echo $tg;?></th><th></th></tr>
</table>