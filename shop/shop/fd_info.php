 <?php include "config.php";?> 
  <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">     
     	<table class="table table-bordered table-hover table-striped">
    <tr><th>FD ID</th><th>Distributor ID</th><th>Amount</th><th>Percentage</th><th>clear amount</th><th>clear date</th><th>start date</th></tr>

                
                               <?php
                               if(isset($_GET[a]))
                               {$a="a";}else {$a="c";}
$qu="SELECT * FROM fd WHERE status='$a'";
$query=mysql_query($qu)or die("die");
while($fetch=mysql_fetch_assoc($query))
{?>
                		   <tr>
                                 <td><?php echo $fetch[fd_id];?></td>
                                 <td><?php echo $fetch[d_id];?></td>
								 <td><?php echo $fetch[amount];?></td>
                                 <td><?php echo $fetch[name];?></td>
                                 <td><?php echo $fetch[clear_amount];?> </td>
                                 <td><?php echo $fetch[mobile];?> </td>
                                 <td><?php echo $fetch[bal];?></td> 
                           </tr>                          

               <?php $tg=$tg+$fetch[bal];
			  }?>
			 <tr><th>Total</th><td></td><td></td><td></td><td></td><td><?php echo $tg;?></td></tr>
</table>
