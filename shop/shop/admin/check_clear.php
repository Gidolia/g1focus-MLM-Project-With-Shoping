 <?php include "config.php";?> 
  <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">              				<table class="table table-bordered table-hover table-striped"><tr><th>D ID</th><th>name</th><th>Addreass</th><th>amount</th></tr>

                
                               <?php 
$qu="SELECT c.* , p.* FROM c_month c,distributor p WHERE c.d_id=p.d_id and c.clear='n'";
$query=mysql_query($qu) or die("sorry this cant execute");
while($fetch=mysql_fetch_assoc($query))
{?>

                		   <tr>
                                 
                                  <td><a href="d_check.php?id=<?php echo $fetch[m_id];?>"><?php echo $fetch[d_id];?></a></td>
                                  <td class="hidden-phone"><?php echo $fetch[d_name];?></td>
                                  <td><?php echo $fetch[house_addreass];?> </td>
                                  <td><?php echo $fetch[m_amount];?> </td>
                                  
                                  
                              </tr>                          

               <?php $tg=$tg+$fetch[price];
			   $bvd=$bvd+$fetch[bv];}?>
</table>