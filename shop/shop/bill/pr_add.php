	<?php	include "../config.php";
	session_start();




									foreach($_SESSION['carttrr'] as $id=>$x)
									{
										if($x[p_id]==$_GET['p_id'])
										{
											$qe="select * from shop_product where shop_id='$_SESSION[shop_id]' and p_id='$x[p_id]'";
$rees=mysql_query($qe)or die("query not executed");
$ce=mysql_fetch_assoc($rees);
$rf=$ce[qty]-$_GET['qty'];
if($rf<0){$rg=$ce[qty];}
else{$rg=$_GET['qty'];}
										$_SESSION['carttrr'][$id]['qty']=$rg;
										$rt=2;
										}
										else{ $r=1;}
										
									}
								if ($rt==2)
									{
									}
								else{
										$_SESSION['carttrr'][] = array("p_id"=>$_GET['p_id'],"qty"=>$_GET['qty']);
								}
			//header("location:bill.php");
echo "<script type='text/javascript'>window.location.href = 'bill.php';</script>";

?>