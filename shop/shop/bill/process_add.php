	<?php	session_start();




									foreach($_SESSION['carttrr'] as $id=>$x)
									{
										if($x[p_id]==$_GET['p_id'])
										{
										$_SESSION['carttrr'][$id]['qty']=$_GET['qty'];
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
			//header('location:bills.php');
			echo "<script type='text/javascript'>window.location.href = 'bills.php';</script>";
			

?>