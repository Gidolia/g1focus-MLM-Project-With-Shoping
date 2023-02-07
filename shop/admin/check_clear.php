 <?php include "config.php";?> 
  <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">              				<table class="table table-bordered table-hover table-striped"><tr><th>sr no.</th><th>D ID</th><th>name</th><th>Addreass</th><th>Own B.V</th><th>Downline B.V</th><th>amount</th></tr>

                
                               <?php 
                               $d=0;
$qu="SELECT c.* , p.* FROM c_month c,distributor p WHERE c.d_id=p.d_id and c.clear='n' and p.distributor=''";
$query=mysql_query($qu) or die("sorry this cant execute");
while($fetch=mysql_fetch_assoc($query))
{$d++;?>

                		   <tr>
                                  <td><?php echo $d;?> </td>
                                  <td><a href="d_check.php?id=<?php echo $fetch[m_id];?>"><?php echo $fetch[d_id];?></a></td>
                                  <td class="hidden-phone"><?php echo $fetch[d_name];?></td>
                                  <td><?php echo $fetch[house_addreass];?> </td>
                                  <td><?php echo $fetch[own_bv];?> </td>
                                  <td><?php echo $fetch[down_bv];?> </td>
                                  <td><?php echo $fetch[m_amount];?> </td>
                                  
                                  
                              </tr>                          

               <?php $tg=$tg+$fetch[m_amount];
			   $bvd=$bvd+$fetch[own_bv];}?>
			   <tr><td></td><td></td><td></td><th>TOTAL</th><td></td><td><?php echo $bvd;?></td><td><?php echo $tg;?></td></tr>
</table>