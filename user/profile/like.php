<?php
 $q=$_GET[q];

include "../config.php";


	$res=mysql_query("SELECT * FROM `post_like` WHERE `d_id`='$_SESSION[id]' AND `post_id`='$_GET[q]';")or die("sorry some error occour");
	$fet=mysql_fetch_assoc($res);
	$c=mysql_num_rows($res);
	if($c!=0)
	{
		 mysql_query("DELETE FROM `post_like` WHERE `post_like`.`id` = $fet[id]");
   $textout='0';
	}
 
 else
 {
  
    $r=mysql_query("INSERT INTO `post_like` (`id`, `post_id`, `d_id`, `date`, `time`, `like`) VALUES (NULL, '$_GET[q]', '$_SESSION[id]', '$date', '$time', '1');");
                 if($r)
		 {
		 	$textout = '1';
		 }
 }

echo $textout;


?>
