<?php 
include "config.php";
$select_bv = mysql_query('SELECT SUM(bv) AS value_sum FROM bill where d_id=200001'); 
$row_bv = mysql_fetch_assoc($select_bv); 
$sum = $row_bv['value_sum'];
echo $sum;
?>