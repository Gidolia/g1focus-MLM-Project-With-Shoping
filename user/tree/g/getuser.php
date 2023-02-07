<?php

include "../config.php";

$q = intval($_GET['q']);

        


$sel1=mysql_query("select * from distributor where sponsor_no=$_GET[q]") or die("value not selected1");
while($fet1=mysql_fetch_assoc($sel1))
{ ?>
	    <tr>
	
			<td>
				<div class="tt" data-tt-id="<?php echo $fet1[d_id];?>" data-tt-parent="<?php echo $_GET[q];?>" onClick="showUserr(this.value)"><?php echo $fet1[d_name]."(".$fet1[d_id].")";?></div>
                <div id="s_name"></div>
			</td>
                 
		</tr>
     
    <?php 

}
?>	   
                      
		
