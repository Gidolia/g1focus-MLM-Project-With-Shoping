<form method="get">
<input type="text" name="d_id" />
<input type="submit" name="submit_d_id" /></form>
 <?php include "config.php";?> 
 <?php if(isset($_GET[submit_d_id]))
 {?>
  <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">              				<table class="table table-bordered table-hover table-striped"><tr><th>Customer ID</th><th>name</th><th>mobile</th><th>bal</th><th>Share</th></tr>

                
                               <?php 
$qu="SELECT * FROM `distributor` WHERE `d_id`='$_GET[d_id]'";
$query=mysql_query($qu);
$rt=mysql_num_rows($query);
if($rt!=0)
{
$fetch=mysql_fetch_assoc($query);
$qud="SELECT * FROM `share` WHERE `d_id`='$_GET[d_id]'";
$queryd=mysql_query($qud);
$rtd=mysql_num_rows($queryd);
if($rtd!=0)
{
$fetchd=mysql_fetch_assoc($queryd);
?>

                		   <tr>
						   
						   
                                 
                                  <td><?php echo $fetch[d_id];?></td>
								  <td><?php echo $fetch[d_name];?></td>
                                  
                                  
                                  <td><?php echo $fetch[mobile];?> </td>
                                  <td><?php echo $fetch[bal];?></td> 
								  <td><?php echo $fetchd[share_no];?> </td>
                                  
                              </tr>                          

               <?php $tg=$tg+$fetch[bal];
			  ?>
			 <tr><th>Total</th><td></td><td></td><td><?php echo $tg;?></td></tr>
</table>

<a href="add_money.php?d_id=<?php echo $_GET[d_id];?>" target="b"><font color="green" size="+2">Add Money</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="sub_money.php?d_id=<?php echo $_GET[d_id];?>" target="b"><font color="red" size="+2">Subtract Money</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="transtion.php?d_id=<?php echo $_GET[d_id];?>" target="b"><font color="blue" size="+2">Transtion info</font></a><br>
<a href="add_shares.php?d_id=<?php echo $_GET[d_id];?>" target="b"><font color="green" size="+2">Add share</font>/<font color="red" size="+2">Subtract share</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="share_transtion.php?d_id=<?php echo $_GET[d_id];?>" target="b"><font color="blue" size="+2">share Transtion info</font></a><br><br><br>
<iframe name="b" height="400" width="800" align="middle"></iframe>
<?php
 }
 else{ echo "no record found in database";}
 }
 else{ echo "no record found in database";}
 }?>
