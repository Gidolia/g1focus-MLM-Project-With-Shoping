<table border="1"><?php
include "config.php";
include "to_bv.php";
////////////////////////////////////////////////////whole cut ammount
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$grand_totalt=0;
for ($x = 81465; $x <= 81470; $x++)
{ 
	$et=0;
	$et=alter_bal($x);
 $grand_totalt=$grand_totalt+$et;
 
 mysql_query("INSERT INTO `cal` (`d_id`, `bv`, `com`, `total`, `distri`, `profit`) VALUES ('$x', 'find_under_bv($x)', '$et', '', '', '')");
}


?><tr><td><?php  echo $grand_totalt;?></td></tr></table>