<table border='1'>
<tr><th>d id</th><th>sponsor no</th><th>proposer no</th><th>name</th><th>state</th><th>city</th><th>mobile</th><th>mobile 2</th><th>email</th><th>joinning date</th><th></th></tr><?php
include "config.php";
$r=mysql_query("SELECT * FROM  `pre_distributor`;");
while($t=mysql_fetch_assoc($r))
{
?>
<tr><td><?php echo $t[d_id];?></td><td><?php echo $t[sponsor_no];?></td><td><?php echo $t[proposer_no];?></td><td><?php echo $t[d_name];?></td><td><?php echo $t[state];?></td><td><?php echo $t[city];?></td><td><?php echo $t[mobile];?></td><td><?php echo $t[mobile2];?></td><td><?php echo $t[email];?></td><td><?php echo $t[joining_date];?></td></tr>
<?php }
?>
