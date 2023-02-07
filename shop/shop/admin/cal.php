<table border="1"><?php
include "config.php";
include "to_bv.php";
////////////////////////////////////////////////////whole cut ammount
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$grand_totalt=0;
$sel1=mysql_query("select d_id from distributor") or die("value not selected1");
while($fet1=mysql_fetch_assoc($sel1))
{	$et=0;
	$et=alter_bal($fet1[d_id]);
 $grand_totalt=$grand_totalt+$et;?>
 <tr><td><?php echo $fet1[d_id];?></td><td><?php echo find_under_bv($fet1[d_id]);?></td><td><?php echo $et;?></td></tr>
 
 <?php
}


?><tr><td><?php  echo $grand_totalt;?></td></tr></table>
<?php 
$w = "select sum(bv) as total_bv from bill where status='c'";
	   	$rest = mysql_query($w) or die ("query not executed");
	if (mysql_num_rows($rest)>0)
	{
        while ($row2 = mysql_fetch_assoc($rest))
		{  
		
          echo $row2["total_bv"]."total bv calculated from business volume<br>";
		  echo $fty."<br>";
		 // $fty=$row2["total_bv"]-$grand_totalt;
		  //$ftyh=$fty*70/100;
		  //$r=$grand_totalt+$ftyh;
		 // echo $r."<br>";
		  echo $row2["total_bv"]-$grand_totalt ."total profit";
		}
	}	?>