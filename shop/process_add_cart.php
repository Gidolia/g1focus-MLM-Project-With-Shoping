<?php //include"config.php";
/*if(empty($_SESSION['id']))
{echo '<script>alert("please login");
location.href="login.php";</script>';
}
else{
	$d_id=$_SESSION['id'];
	$p_id=$_GET['p_id'];
	$quantity=$_GET['quantity'];
	
		$q="select * from d_cart where d_id=".$d_id." and p_id=".$p_id;
			$res=mysql_query($q);
			$c=mysql_num_rows($res);
			if($c!=0)
			{
				 $u="UPDATE d_cart SET quantity='".$quantity."' WHERE d_id=".$d_id." and p_id=".$p_id." LIMIT 1";
 				 mysql_query($u) or die ("query not");
				 header("location:cart.php");
			}
			else
			{
	$ins="INSERT INTO d_cart(d_id,p_id,quantity) VALUES('$d_id','$p_id','$quantity')";
	mysql_query($ins) or ("query not inserted");
	header("location:cart.php");
	}
		}*/
		session_start();
		error_reporting(1);




									foreach($_SESSION['carttr'] as $id=>$x)
									{
										if($x[p_id]==$_GET['p_id'])
										{
										$_SESSION['carttr'][$id]['qty']=$_GET['quantity'];
										$rt=2;
										}
										else{ $r=1;}
										
									}
								if ($rt==2)
									{
									}
								else{
										$_SESSION['carttr'][] = array("p_id"=>$_GET['p_id'],"qty"=>$_GET['quantity']);
								}
			header("location:cart.php");

?>