  <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">              				<table class="table table-bordered table-hover table-striped"><tr><th>Sr no.</th><th>RD ID</th><th> Date</th><th>amount</th><th>Due Days</th><th>Late Charge</th></tr>

           <?php
		   include "config.php";
$qus="SELECT * FROM `rd_info` WHERE `rd_id`='$_GET[rd_id]'";
$querys=mysql_query($qus)or die("asd");
$i=1;
while($fetchs=mysql_fetch_assoc($querys))
{?>
               <tr>   <td><?php echo $i;?></td>                                 
					  <td><?php echo $fetchs[rd_id];?></td> 
                      <td><?php echo $fetchs[date];?></td>
                      <td><?php echo $fetchs[amount];?></td>
					  <td><?php echo $fetchs[due_days];?></td>
					  <td><?php echo $fetchs[late_install_charge];?></td>
                      
                      </tr>                                 

 <?php $tg=$tg+$fetchs[amount];
 $i++;}?>
			 <tr><th>Total</th><td></td><td><?php echo $tg;?></td></tr>
</table>
<h2>RD installment Form</h2>
<form method="post">
Slip no.<input type="number" name="slip_no" />
<input type="hidden" name="rd_id" value="<?php echo $_GET[rd_id];?>" />
<input type="hidden" name="d_id" value="<?php echo $_GET[d_id];?>" />
<input type="submit" name="submit" />
</form>
&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />&nbsp;<br />
<a href="rd_close.php?rd_id=<?php echo $_GET[rd_id];?>&d_id=<?php echo $_GET[d_id];?>" onClick="return confirm(
  'Are you sure want to delete your account?');" ><font color="red" size="+2">Close RD</font></a>
<?php
if(isset($_POST[submit]))
{
	$qu="SELECT * FROM `rd` WHERE `rd_id`='$_POST[rd_id]' and `rd_status`='a'";
$query=mysql_query($qu)or die("rd not selected");
if(mysql_num_rows($query)>0)
{
$fetch=mysql_fetch_assoc($query);
$balrd=$fetch[bal]+$fetch[per_installment];
$rec=$fetch[received]+1;
//echo $rec;
		$rtey=mysql_query("SELECT * FROM `distributor` WHERE `d_id`=".$_POST[d_id]) or die("costumer not selected");
	if(mysql_num_rows($rtey)>0)
	{ $tiy=mysql_fetch_assoc($rtey);
	$dateg=date_create($fetch[start_date]);
date_add($dateg,date_interval_create_from_date_string("$fetch[received] months")); 
$dateg=date_format($dateg,"Y-m-d");
		$from=date_create(date('Y-m-d'));
		
		//echo $dateg;
$teo=date_create($dateg);
$diff=date_diff($teo,$from);
//$late='$diff->format(%R%a)';
$yu=2/30;
//echo $diff->format('%R%a');
$rfgh=$diff->format('%R%a');
if($diff->format('%R%a')>+8){$ghj=($fetch[per_installment]*$yu/100)*$diff->format('%R%a'); }
echo $ghj;
$que="select max(bill_id) as max from bill";
     $r=mysql_query($que) or die("query not performed");
if($r)
  {
  $row=mysql_fetch_array($r);  
  $bill_id=$row['max'];


  $bill_id=$bill_id+1;
  
  }
		$pluse=$tiy[bal]-$fetch[per_installment];
        if($pluse>0)
        {
			//echo $rfgh;
			$o_date=date("Y-m-d");
			mysql_query("INSERT INTO `rd_info` (`rd_id`, `date`, `due_days`, `late_install_charge`, `charge_percantage`, `amount`, `d_id`) VALUES ('$_POST[rd_id]', '$o_date', '".$diff->format('%R%a')."', '$ghj', '2', '$fetch[per_installment]', '$fetch[d_id]')")or die("not inserted");
			mysql_query("UPDATE `rd` SET `bal`='$balrd',`received`='$rec' WHERE `rd_id`='$_POST[rd_id]'")or die("not updated some error");
		
	
        mysql_query("INSERT INTO `transition_history` (`10`, `20`, `50`, `100`, `500`, `1000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `to`, `time`) VALUES ('', '', '', '', '', '', '$fetch[per_installment]', '$pluse', '$_POST[d_id]', '$o_date', 'transfer RD', '-', '$tiy[bal]', 'admin', 'admin', 'RD', '$time')")or die("transtation not recorded");
		$bv_amount=$fetch[per_installment]*10/100;
		mysql_query("INSERT INTO `bill` (`bill_id`, `d_id`, `o_date`, `s_date`, `name`, `addreass`, `mobile`, `mobile2`, `pincode`, `city`, `state`, `addreasstype`, `price`, `bv`, `status`, `paid`, `de_id`, `online`, `shop_id`, `method`, `bv_met`) VALUES ('$bill_id', '$_POST[d_id]', '$o_date', '$o_date', '', '', '', '', '', '', '', '', '$fetch[per_installment]', '$bv_amount', 'c', '', '', '', '', 'RD', '1')");
		mysql_query("update distributor set bal=".$pluse." where d_id=".$_POST[d_id]) or die("balance not updated");
		////////////////////////////////////agent id
echo "<script>alert('RD installment & subtracted sucessfully2');window.parent.location.reload();</script>";
		

        }
        else{echo "Sorry this cannot ,................(you dont have inof money)";}
	}
}
}


