<?php
 $q=$_GET["q"];

include "../config.php";
$fre=mysql_query("SELECT * FROM `friends` WHERE `d_id`='$_SESSION[id]' AND `fr_d_id`='$_GET[d_id]';");
if(mysql_num_rows($fre)>0){
while($vb=mysql_fetch_assoc($fre))
{ mysql_query("DELETE FROM `friends` WHERE `id`='$vb[id]'");
}
}
else{
$textout="0";
 $r=mysql_query("INSERT INTO `friends` (`id`, `d_id`, `fr_d_id`, `status`, `date`, `time`) VALUES (NULL, '$_SESSION[id]', '$_GET[q]', 'p', '$date', '$time');");


  if($r)
  {
 $textout = "1";
 }
 else
 {
   $textout="0";
 }
$textout=$textout;
echo $textout;
}

?>
