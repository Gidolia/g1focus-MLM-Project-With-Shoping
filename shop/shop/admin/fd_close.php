<?php include "config.php";?>
<form method="post">
<input type="hidden" name="d_id" value="<?php echo $_GET['d_id'];?>" />
<input type="hidden" name="fd_id" value="<?php echo $_GET['fd_id'];?>" />

<input type="submit" name="close" />
</form>
<?php
if(isset($_POST[close]))
{

$o_date=date("Y-m-d");
$rteyd=mysql_query("SELECT * FROM `fd` WHERE `fd_id`='$_POST[fd_id]' and `status`='a'");
	if(mysql_num_rows($rteyd)>0)
	{ $tiyd=mysql_fetch_assoc($rteyd);
	if(strtotime(date("Y-m-d"))>=strtotime($tiyd[end_date]))
	{
	$t=$tiyd[clear_amount];
	}
	else{$t=$tiyd[amount]-$_POST[cut_amount];}
	

$rtey=mysql_query("SELECT * FROM `distributor` WHERE `d_id`=". $_POST[d_id]);
	if(mysql_num_rows($rtey)>0)
	{ $tiy=mysql_fetch_assoc($rtey);
		$plus=$tiy[bal]+$t;
			   
		
        if($plus>0)
        {
        mysql_query("INSERT INTO `transition_history` (`10`, `20`, `50`, `100`, `500`, `1000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `slip_no`, `slip_place`, `time`) VALUES ('', '', '', '', '', '', '$t', '$plus', '$tiy[d_id]', '$o_date', 'fd transtion', '+', '$tiy[bal]', 'admin', 'admin', '', '', '$time')")or die("transtation not recorded");
		mysql_query("UPDATE `fd` SET `status` = 'c' WHERE `fd_id` = $_POST[fd_id];");
		mysql_query("UPDATE `fd` SET `return_amount` = '$t' WHERE `fd_id` = $_POST[fd_id];");
		mysql_query("update distributor set bal=".$plus." where d_id=".$tiy[d_id]) or die("balance not updated");
		mysql_query("UPDATE `fd` SET `return_date` = '$o_date' WHERE `fd_id` = $_POST[fd_id];");
		echo "<script>alert('fd Closed Succesfully');
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
