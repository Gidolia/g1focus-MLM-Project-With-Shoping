<?php
 $q=$_GET[q];

include "../config.php";


	
  
    mysql_query("INSERT INTO `post` (`id`, `d_id`, `photo`, `share`, `written`, `type`, `page_id`, `photo_no`, `post_what`, `date`, `time`) VALUES (NULL, '$_SESSION[id]', '', '$_GET[q]', '', '2', '', '', 'Share', '$date', '$time');")or die("share data not inserting");
                 
		 	$textout = '1';
	
 

echo $textout;


?>
