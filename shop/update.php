<?php
		include "config.php";
		$session=$_SESSION['id'];
				
									
											$query="SELECT * FROM d_cart WHERE d_id=$session";
			
											$res=mysql_query($query);

											while($row=mysql_fetch_assoc($res))
											{
												
												
											
 $u="UPDATE d_cart SET quantity='".$_GET[1]."' WHERE cart_id='".$row[cart_id]."' LIMIT 1";
 mysql_query($u) or die ("query not");
											}
											
											echo "<tr><th height='60px'>Total</td><td><input type='submit'></td><td></td><th>".$total_price."</th><th>".$total_bv."</th></tr>";								
								?>
                </table>