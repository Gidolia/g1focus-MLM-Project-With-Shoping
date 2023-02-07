
  <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">     
	<div class="content-panel">
	         				<table class="table table-bordered table-hover table-striped"><tr><th>Sr No.</th><th>Customer ID</th><th>Date</th><th>Type</th><th>amount</th><th>Method</th><th>after bal</th><th>t id</th><th>Delete</th></tr>

                
                               <?php 
							   include "config.php";
							   $o_date=date("Y-m-d");
							   
$qu="SELECT * FROM `transition_history` WHERE `d_id`='$_GET[d_id]'";
$query=mysql_query($qu);
while($fetch=mysql_fetch_assoc($query))
{
$aa=$aa+1;?>

                		   <tr>                                 
                                  <td><?php echo $aa;?></td>
								  <td><?php echo $fetch[d_id];?></td>
								  <td><?php echo $fetch[date];?></td>
                                  <th><?php echo $fetch[type];?></th>
                                  <td class="hidden-phone"><?php echo $fetch[amount];?></td>
                                  <td><?php echo $fetch[method];?> </td>
                                  <td><?php echo $fetch[a_bal];?> </td>
                                  <td><?php echo $fetch[t_id];?></td>
								  <?php if($o_date==$fetch[date]){?><td><form action="delete_transtion.php" method="post"><input type="hidden" name="t_id" value="<?php echo $fetch[t_id];?>"><input type="submit" name="t_id_submit" value="Delete" class="btn-danger" onClick="return confirm(
  'Are you sure you want to delete?');"></form></td><?php }?>
                               
                              </tr>                          

              <?php 
			   if($fetch[type]=='+'){$to=$fetch[amount];}
			   else{$to=$fetch[amount]*(-1);}
			   $tg=$tg+$to;
			  }?>
			 <tr><th>Total</th><td></td><td></td><td></td><td><?php echo $tg;?></td><td></td><td></td><td></td><td></td></tr>
</table></div>

