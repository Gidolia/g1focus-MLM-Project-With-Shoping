<?php
 $q=$_GET["q"];

include "config.php";
$sql="SELECT d_name,house_addreass FROM distributor WHERE d_id = '".$q."'";


$textout="";
 $dname="";
  $dadd="";
  $result = mysql_query($sql);
if(mysql_num_rows($result)==1)
{
while($row = mysql_fetch_array($result))
 {
  $dname = $row["d_name"];
 $dadd = $row["house_addreass"].'-'.$row["city"];


 $textout = $dname.",".$dadd.",";
 }
 }
 else
 {
   $textout=" , ,";
 }
$textout=$textout;
echo $textout;


?>
