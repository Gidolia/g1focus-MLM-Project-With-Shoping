<?php
include "config.php";
			
			
	//		$query="delete from d_cart where cart_id =".$_GET['cart_id'];
		
	//		mysql_query($query) or die("can't Execute...");
		$id = $_GET[id];
		unset($_SESSION['carttr'][$id]);
		
			
			
		header("location:cart.php");

?>