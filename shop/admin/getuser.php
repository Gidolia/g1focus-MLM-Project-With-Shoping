<?php
 $q=$_GET["q"];

include "config.php";
$sql="SELECT * FROM product WHERE d_id = '".$q."'";
$sql1="SELECT count(sponsor_no) as num FROM `distributor` WHERE sponsor_no='".$q."'";


$result1 = mysql_query($sql1);
$c=0;
if(mysql_num_rows($result1)==1)
{
   $row1 = mysql_fetch_array($result1);
   $c=$row1["num"];
}
$v="Total users exist ".$c ;

$textout="";
 $dname="";
  $dadd="";
  $result = mysql_query($sql);
if(mysql_num_rows($result)==1)
{
while($row = mysql_fetch_array($result))
 {
  $dname = $row["d_name"];
 $dadd = $row["house_addreass"]."-".$row["city"];

 $textout = $dname.",".$dadd.",";
 }
 }
 else
 {
   $textout=" , ,";
 }
$textout=$textout.$v;
echo $textout;


?>
