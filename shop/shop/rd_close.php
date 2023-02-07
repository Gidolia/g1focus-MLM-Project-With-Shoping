<?php include "config.php";?>
<form method="post">
<input type="hidden" name="d_id" value="<?php echo $_GET['d_id'];?>" />
<input type="hidden" name="rd_id" value="<?php echo $_GET['rd_id'];?>" />
<?php 
	$rteyd=mysql_query("SELECT * FROM `rd` WHERE `rd_id`='$_GET[rd_id]' and `rd_status`='a'");
	if(mysql_num_rows($rteyd)>0)
	{ $tiyd=mysql_fetch_assoc($rteyd);
	if($tiyd[received]!=$tiyd[installment_qty])
	{
	echo 'Cut amount before maturity<input type="number" name="cut_amount">';
	}
	}?>


<input type="submit" name="close" />
</form>
<?php
if(isset($_POST[close]))
{

$o_date=date("Y-m-d");
$rteyd=mysql_query("SELECT * FROM `rd` WHERE `rd_id`='$_POST[rd_id]' and `rd_status`='a'");
	if(mysql_num_rows($rteyd)>0)
	{ $tiyd=mysql_fetch_assoc($rteyd);
	if($tiyd[received]==$tiyd[installment_qty])
	{
	$t=$tiyd[clear_amount];
	}
	else{$t=$tiyd[bal]-$_POST[cut_amount];}
	

$rtey=mysql_query("SELECT * FROM `distributor` WHERE `d_id`=". $_POST[d_id]);
	if(mysql_num_rows($rtey)>0)
	{ $tiy=mysql_fetch_assoc($rtey);
		$plus=$tiy[bal]+$t;
			   
		
        if($plus>0)
        {
        mysql_query("INSERT INTO `transition_history` (`10`, `20`, `50`, `100`, `500`, `1000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `time`) VALUES ('', '', '', '', '', '', '$t', '$plus', '$tiy[d_id]', '$o_date', 'Rd Transtion', '+', '$tiy[bal]', 'admin', 'admin', '$time')")or die("transtation not recorded");
		mysql_query("UPDATE `rd` SET `rd_status` = 'c' WHERE `rd_id` = $_POST[rd_id];");
		mysql_query("UPDATE `rd` SET `return_amount` = '$t' WHERE `rd_id` = $_POST[rd_id];");
		mysql_query("UPDATE `rd` SET `cut_amount` = '$_POST[cut_amount]' WHERE `rd_id` = $_POST[rd_id];");
		mysql_query("update distributor set bal=".$plus." where d_id=".$tiy[d_id]) or die("balance not updated");
		mysql_query("UPDATE `rd` SET `return_date` = '$o_date' WHERE `rd_id` = $_POST[rd_id];");
		echo "<script>alert('Rd Closed Succesfully');
window.parent.location.reload();</script>"; 
		
		
        }
        else{echo "Sorry this cannot ,................(you dont have inof money)";}
	 
        
	}
	else
	{
		echo "customer_id not founded";
	}
}
}
