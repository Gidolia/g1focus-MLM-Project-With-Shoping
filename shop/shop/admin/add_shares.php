<?php include "config.php";?>
<h2><font color="#009900">Add Share</font>/<font color="red" size="+2">Subtract share</font></h2>

<form method="get">
Share amount<input type="number" name="share_amount" /><br><br>
<input type="hidden" name="d_id" value="<?php echo $_GET[d_id];?>">
Share<input type="number" name="share">
<br /><br />

<input type="submit" name="add_share" value="ADD/Sub">
</form>
<?php
include "config.php";
if(isset($_GET['add_share']))
{
	$hh=$_GET['share_amount']/500;
	if($hh=$_GET['share'])
	{
		$o_date=date("Y-m-d");
		$rtey=mysql_query("SELECT * FROM `distributor` WHERE `d_id`=".$_GET[d_id]);
	if(mysql_num_rows($rtey)>0)
	{
	$rteyd=mysql_query("SELECT * FROM `share` WHERE `d_id`=".$_GET[d_id]);
	if(mysql_num_rows($rteyd)>0)
	{$tiyd=mysql_fetch_assoc($rteyd);
	 $tiy=mysql_fetch_assoc($rtey);
		$plus=$tiyd[share_no]+$_GET[share];
        if($plus>0)
        {
		
	
	
		$pluse=$tiy[bal]-$_GET['share_amount'];
		if($_GET['share_amount']>0){$type="-";} else{$type="+";}
		if($_GET[share_amount]>0){$er=$_GET[share_amount];}else{$er=$_GET[share_amount]*-1;}
        if($pluse>0)
        {
			mysql_query("INSERT INTO `share_info` (`d_id`, `share`, `b_share`, `a_share`, `date`) VALUES('$_GET[d_id]', ' $_GET[share]', '$tiyd[share_no]', '$plus', '$o_date')")or die("record not submited");
		
	mysql_query("update share set share_no=$plus where d_id=".$_GET[d_id]) or die("share not updated");
        mysql_query("INSERT INTO `transition_history` (`10`, `20`, `50`, `100`, `500`, `1000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `to`) VALUES ('', '', '', '', '', '', '$er', '$pluse', '$_GET[d_id]', '$o_date', 'Share transfer', '$type', '$tiy[bal]', 'admin', 'admin', 'Share transfer')")or die("transtation not recorded");
		mysql_query("update distributor set bal=".$pluse." where d_id=".$_GET[d_id]) or die("balance not updated");
		echo "<script>alert('money Submited Succesfully');window.parent.location.reload();</script>"; 
        }else{echo "Sorry this share id not founded)";}
		}
        else{echo "Sorry this cannot ,................(you dont have inof money)";}
        
	

			
		}
		 else{echo "Sorry this cannot ,................(you dont have inof amount share)";}
	}
	else
	{
		echo "customer_id not founded";
	}
	}
	else
	{
		echo "Share cal not match please check form and submit again";
	}
}
?>

