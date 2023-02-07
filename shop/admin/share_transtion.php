
  <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">              				<table class="table table-bordered table-hover table-striped"><tr><th>Share ID</th><th>Date</th><th>share</th><th>before share</th><th>after share</th><th>st id</th></tr>

                
                               <?php 
							   include "config.php";
							   $o_date=date("Y/m/d");
$qu="SELECT * FROM `share_info` WHERE `d_id`='$_GET[d_id]'";
$query=mysql_query($qu);
while($fetch=mysql_fetch_assoc($query))
{?>

                		   <tr>                                 
                                  <td><?php echo $fetch[d_id];?></td>
								  <td><?php echo $fetch[date];?></td>
                                  <td class="hidden-phone"><?php echo $fetch[share];?></td>
                                  <td><?php echo $fetch[b_share];?> </td>
                                  <td><?php echo $fetch[a_share];?> </td>
                                  <td><?php echo $fetch[st_id];?></td>
								  
                               
                              </tr>                          

               <?php $tg=$tg+$fetch[share];
			  }?>
			 <tr><th>Total</th><td></td><td></td><td></td><td></td><td><?php echo $tg;?></td></tr>
</table>

