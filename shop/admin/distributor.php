<?php include "config.php";
include "to_bv.php";?> 
  <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet"> 
    <table class="table table-bordered table-condensed table-hover table-striped">
    <tr><th>New/Old</th><th>D ID</th><th>Name</th><th>sponsor no.</th><th>proposer no</th><th>city</th><th>addreass</th><th>d_dob</th><th>password</th><th>mobile</th><th>Purchased</th><th>Balance</th></tr>
    <?php 
$qu="SELECT * FROM distributor";
$query=mysql_query($qu);
while($fetch=mysql_fetch_assoc($query))
{?>
							   <tr>
                               <td><?php if($fetch['new']=='y'){?><span class="label label-info label-mini">New</span><?php }else{?><span class="label label-success label-mini">Old</span><?php }?></td>
                                 
                                  <td><?php echo $fetch[d_id];?></td>
                                  <td class="hidden-phone"><?php echo $fetch[d_name];?></td>
                                  <td><?php echo $fetch[sponsor_no];?> </td>
                                  <td><?php echo $fetch[proposer_no];?> </td>
                                  <td><?php echo $fetch[city];?></td>
                                  <td><?php echo $fetch[addreass];?></td>
                                  <td><?php echo $fetch[d_dob];?></td>
                                  <td><?php echo $fetch[password];?></td>
                                  <td><?php echo $fetch[mobile];?></td>
                                  <td><?php if(find_bv($fetch[d_id])>99) 
								  { ?><span class="label label-success label-mini">Done</span><?php }else{?><span class="label label-danger label-mini">not done</span><?php }?></td>
				  <td><?php echo $fetch[bal]; $rtr=$rtr+$fetch[bal];?></td>
                                  
                                  
                              </tr>                          

<?php }?>
<tr><th>Total</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th><?php echo $rtr;?></th></tr></table>