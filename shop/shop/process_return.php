<?php 
include "config.php";
if(isset($_POST[returne]))
{
	$rtey=mysql_query("select * from bill_detail where bd_id=".$_POST[bd_id]);
	if(mysql_num_rows($rtey)>0)
	{ 
		$tiy=mysql_fetch_assoc($rtey);
		$resultr=mysql_query("SELECT count(bill_id) as total from bill_detail where bill_id=".$_POST[bill_id]);
		$datar=mysql_fetch_assoc($resultr);
		
		$plus=$tiy[qty]-$_POST[qty];
		if($datar[total]==1)
		{
			if($tiy[qty]<=$_POST[qty])
			{
				mysql_query("delete from bill_detail where bd_id=$_POST[bd_id]") or die ("not deleted");
				mysql_query("delete from bill where bill_id=$_POST[bill_id]") or die ("not deleted");
				mysql_query("INSERT INTO `return_product` (`p_id`, `return_date`, `e_id`, `shop_id`, `return_price`, `bill_id`, `return_time`, `delete`, `return_qty`) VALUES ('$_POST[p_id]', '$date', '$_SESSION[e_id]', '$_SESSION[shop_id]', '', '$_POST[bill_id]', '$time', 'y', '$_POST[qty]');");
				$rteywe=mysql_query("select * from shop_product where p_id=$_POST[p_id] and shop_id=$_SESSION[shop_id]");
				$c=mysql_num_rows($rteywe);
				if($c!=0)
				{
				$tiywe=mysql_fetch_assoc($rteywe);
				$upqty=$tiywe[qty]+$_POST[qty];
				mysql_query("update shop_product set qty=$upqty where p_id=$_POST[p_id] and shop_id=$_SESSION[shop_id]");
				}
				else{mysql_query("INSERT INTO `shop_product` (`p_id`, `qty`, `shop_id`) VALUES ('$_POST[p_id]', '$_POST[qty]', '$_SESSION[shop_id]')")or die("producted not updated2");
				}
				header("location:pending_delivery.php");
			}
			else
			{ mysql_query("update bill_detail set qty=".$plus." where bd_id=".$_POST[bd_id]);
			$rteyw=mysql_query("select * from product where p_id=".$_POST[p_id]);
			$tiyw=mysql_fetch_assoc($rteyw);
			$price=$_POST[price]-($tiyw[p_selling_price]*$_POST[qty]);
			$bv=$_POST[bv]-($tiyw[p_bv]*$_POST[qty]);
			
			mysql_query("UPDATE `bill` SET `price`='$price',`bv`='$bv' WHERE bill_id='$_POST[bill_id]'");
			$rteywe=mysql_query("select * from shop_product where p_id=$_POST[p_id] and shop_id=$_SESSION[shop_id]");
				$c=mysql_num_rows($rteywe);
				if($c!=0)
				{
				$tiywe=mysql_fetch_assoc($rteywe);
				$upqty=$tiywe[qty]+$_POST[qty];
				mysql_query("update shop_product set qty=$upqty where p_id=$_POST[p_id] and shop_id=$_SESSION[shop_id]");}
				else{mysql_query("INSERT INTO `shop_product` (`p_id`, `qty`, `shop_id`) VALUES ('$_POST[p_id]', '$_POST[qty]', '$_SESSION[shop_id]')")or die("producted not updated2");}
				header("location:bill_info.php?bill_id=".$_POST[bill_id]);
			}
		}
		else
		{
			if($tiy[qty]<=$_POST[qty]){
			mysql_query("delete from bill_detail where bd_id=$_POST[bd_id]") or die ("not deleted");
			$rteyw=mysql_query("select * from product where p_id=".$_POST[p_id]);
			$tiyw=mysql_fetch_assoc($rteyw);
			$price=$_POST[price]-$tiyw[p_selling_price]*$_POST[qty];
			$bv=$_POST[bv]-$tiyw[p_bv]*$_POST[qty];
			mysql_query("UPDATE `bill` SET `price`='$price',`bv`='$bv' WHERE bill_id='$_POST[bill_id]'");
			$rteywe=mysql_query("select * from shop_product where p_id=$_POST[p_id] and shop_id=$_SESSION[shop_id]");
				$c=mysql_num_rows($rteywe);
				if($c!=0)
				{
				$tiywe=mysql_fetch_assoc($rteywe);
				$upqty=$tiywe[qty]+$_POST[qty];
				mysql_query("update shop_product set qty=$upqty where p_id=$_POST[p_id] and shop_id=$_SESSION[shop_id]");}
				else{mysql_query("INSERT INTO `shop_product` (`p_id`, `qty`, `shop_id`) VALUES ('$_POST[p_id]', '$_POST[qty]', '$_SESSION[shop_id]')")or die("producted not updated2");}
				header("location:bill_info.php?bill_id=".$_POST[bill_id]);}
			else{ mysql_query("update bill_detail set qty=".$plus." where bd_id=".$_POST[bd_id]);
			$rteyw=mysql_query("select * from product where p_id=".$_POST[p_id]);
			$tiyw=mysql_fetch_assoc($rteyw);
			$price=$_POST[price]-($tiyw[p_selling_price]*$_POST[qty]);
			
			$bv=$_POST[bv]-($tiyw[p_bv]*$_POST[qty]);
			
			mysql_query("UPDATE `bill` SET `price`='$price',`bv`='$bv' WHERE bill_id='$_POST[bill_id]'");
			$rteywe=mysql_query("select * from shop_product where p_id=$_POST[p_id] and shop_id=$_SESSION[shop_id]");
				$c=mysql_num_rows($rteywe);
				if($c!=0)
				{
				$tiywe=mysql_fetch_assoc($rteywe);
				$upqty=$tiywe[qty]+$_POST[qty];
				mysql_query("update shop_product set qty=$upqty where p_id=$_POST[p_id] and shop_id=$_SESSION[shop_id]");}
				else{mysql_query("INSERT INTO `shop_product` (`p_id`, `qty`, `shop_id`) VALUES ('$_POST[p_id]', '$_POST[qty]', '$_SESSION[shop_id]')")or die("producted not updated2");}
				header("location:bill_info.php?bill_id=".$_POST[bill_id]);}
	
		}
	
	}
	
}		
?>
