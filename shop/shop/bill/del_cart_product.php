<?php
session_start();
			
			
	//		$query="delete from d_cart where cart_id =".$_GET['cart_id'];
		
	//		mysql_query($query) or die("can't Execute...");
		$id = $_GET[id];
		unset($_SESSION['carttrr'][$id]);
		
			
		if($_GET[bill_ask])
		{header("location:bill_ask.php");}
		else{header("location:bill.php");}

?>