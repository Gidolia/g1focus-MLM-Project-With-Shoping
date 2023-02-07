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
    <link href="assets/css/style-responsive.css" rel="stylesheet">              				<table class="table table-bordered table-hover table-striped"><tr><th>Customer ID</th><th>name</th><th>mobile</th><th>bal</th></tr>

           <?php 
$qu="SELECT * FROM `distributor` WHERE `d_id`='$_GET[d_id]'";
$query=mysql_query($qu);
while($fetch=mysql_fetch_assoc($query))
{?>

                		   <tr>
						   
						   
                                 
                                  <td><?php echo $fetch[d_id];?></td>
								  
                                  <td class="hidden-phone"><?php echo $fetch[d_name];?></td>
                                  
                                  <td><?php echo $fetch[mobile];?> </td>
                                  <td><?php echo $fetch[bal];?></td> 
                                  
                              </tr>                          

               <?php $tg=$tg+$fetch[bal];
			  }?>
			 <tr><th>Total</th><td></td><td></td><td><?php echo $tg;?></td></tr>
</table>

<a href="add_money.php?d_id=<?php echo $_GET[d_id];?>" target="b"><font color="green" size="+2">Add Money</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="sub_money.php?d_id=<?php echo $_GET[d_id];?>" target="b"><font color="red" size="+2">Subtract Money</font></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="transtion.php?d_id=<?php echo $_GET[d_id];?>" target="b"><font color="blue" size="+2">Transtion info</font></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="rd.php?d_id=<?php echo $_GET[d_id];?>" target="b"><font color="blue" size="+2">RD</font></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="fd_cos.php?d_id=<?php echo $_GET[d_id];?>" target="b"><font color="blue" size="+2">FD</font></a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="final.php?d_id=<?php echo $_GET[d_id];?>" target="b"><font color="blue" size="+2">Final percentage</font></a><br><br><br>
<iframe name="b" height="400" width="1000" align="middle"></iframe>
<a><font color="red" size="+2">Close account</font></a>
<?php
}?>