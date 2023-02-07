<form method="post">
D_id::<input type="text" name="d_id" required /><br>
Form No. ::<input type="text" name="form" required /><br>
Share NO.<input type="text" name="share" required /><br>
Amount::<input type="text" name="amount" required />
<input type="submit" name="submit" />
</form>
<?php
if(isset($_POST[submit]))
{
$f=$_POST[amount]/500;
if($f==$_POST[share])
{
include "config.php";
$o_date=date("Y-m-d");
$rtey=mysql_query("SELECT * FROM `distributor` WHERE `d_id`=".$_POST[d_id]);
	if(mysql_num_rows($rtey)>0)
	{ $tiy=mysql_fetch_assoc($rtey);
		$plus=$tiy[bal]-$_POST[amount];
		
        if($plus>0)
        {
        mysql_query("INSERT INTO `transition_history` (`10`, `20`, `50`, `100`, `500`, `1000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `chequeno`, `slip_no`) VALUES ('', '', '', '', '', '', '$_POST[amount]', '$plus', '$_POST[d_id]', '$o_date', 'share adding', '-', '$tiy[bal]', 'admin', 'admin', '', '')")or die("transtation not recorded");
		mysql_query("update distributor set bal=".$plus." where d_id=".$_POST[d_id]) or die("balance not updated");
		mysql_query("INSERT INTO `share` (`d_id`, `share_form_no`, `share_no`, `acc_o_date`) VALUES ('$_POST[d_id]', '$_POST[form]', '$_POST[share]', '$o_date')");
		mysql_query("INSERT INTO `share_info` (`d_id`, `a_share`, `b_share`, `date`, `share`, `type`) VALUES ('$_POST[d_id]', '$_POST[share]', '0', '$o_date', '$_POST[share]', '+')");
	$rteye=mysql_query("SELECT * FROM `distributor` WHERE `d_id`='81466'");
	if(mysql_num_rows($rteye)>0)
	{ $tiyt=mysql_fetch_assoc($rteye);
		$plust=$tiyt[bal]+$_POST[amount];
		
			   
			  
        if($plust>0)
        {
        mysql_query("INSERT INTO `transition_history` (`10`, `20`, `50`, `100`, `500`, `1000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `slip_no`, `slip_place`) VALUES ('', '', '', '', '', '', '$_POST[amount]', '$plust', '81466', '$o_date', '$tiy[d_name]', '+', '$tiyt[bal]', 'admin', 'admin', '', '')")or die("transtation not recorded");
		mysql_query("update distributor set bal=".$plust." where d_id='81466'") or die("balance not updated");
		 
        }
        else{echo "Sorry this cannot ,................(you dont have inof money)";}
	  
        
	}
	

		echo "<script>alert('share Submited Succesfully');location.href='start_share.php';;</script>"; 
        }
        else{echo "Sorry this cannot ,................(you dont have inof money)";}
		
        
	}
	else
	{
		echo "customer_id not founded";
	}


}else {echo "share amount you enter is not match share";}
}
?>