  <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">              				<table class="table table-bordered table-hover table-striped"><tr><th>FD ID</th><th>Amount</th><th>Clear Amount</th><th>Start date</th><th>End Date</th><th>FD Month</th><th>Percentage</th></tr>

<?php 
include "config.php";
$qu="SELECT * FROM `fd` WHERE `d_id`='$_GET[d_id]' and `status`='a'";
$query=mysql_query($qu);
while($fetch=mysql_fetch_assoc($query))
{
?>

                		       <tr>
                                  <td><?php echo $fetch[fd_id];?></td>
								  <td><?php echo $fetch[amount];?></td>
                                  <td><?php echo $fetch[clear_amount];?> </td>
                                  <td><?php echo $fetch[start_date];?></td> 
                                  <td><?php echo $fetch[end_date];?></td>
                                  <td><?php echo $fetch[fd_month];?></td> 
                                  <td><?php echo $fetch[percentage];?></td>
								  <td><a href="fd_close.php?fd_id=<?php echo $fetch[fd_id];?>&d_id=<?php echo $_GET[d_id];?>" onClick="return confirm(
  'Are you sure want to delete fd?');">Close fd</a></td> 
                              </tr><?php }?>                     

               
               </table>
               <h2>Start FD Form</h2>
<form method="post">
FD amount:: <input type="number" name="amount" /><br />
<input type="hidden" name="d_id" value="<?php echo $_GET[d_id];?>" />
month:: <input type="number" name="month" /><br />
Percentage:: <input type="number" name="percentage" /><br />
form no.:: <input type="number" name="formno" /><br />
<input type="submit" name="start_fd" />
</form>
<?php 
if(isset($_POST[start_fd]))
{
	$o_date=date("Y-m-d");
	$date=date_create(date("Y-m-d"));
date_add($date,date_interval_create_from_date_string("$_POST[month] months")); 
$date=date_format($date,"Y-m-d");
$y=$_POST[amount];
$fg=$_POST[month];
$rj=$_POST[percentage];
$fghk=$y;
$f=1;
for($x=0; $x<$fg; $x++)
{
if($f=='12'){
	$t=($fghk*$rj/100);
	$r=$r+$t;
	$fghk=$fghk+$t;
	echo $t."  &nbsp;&nbsp;".$fghk."  &nbsp;&nbsp;".$r."<br>";
	$f=0;
	}
$f++;
}
$rty=round($y+$r);
$hj=$_POST[month]+1;
$que="select max(bill_id) as max from bill";
     $r=mysql_query($que) or die("query not performed");
if($r)
  {
  $row=mysql_fetch_array($r);  
  $bill_id=$row['max'];


  $bill_id=$bill_id+1;
  
  }

	
			
		$rtey=mysql_query("SELECT * FROM `distributor` WHERE `d_id`=".$_POST[d_id]) or die("costumer not selected");
	if(mysql_num_rows($rtey)>0)
	{ $tiy=mysql_fetch_assoc($rtey);
		
	
		$pluse=$tiy[bal]-$_POST[amount];
        if($pluse>0)
        {
			mysql_query("INSERT INTO `fd` (`d_id`, `amount`, `clear_amount`, `end_date`, `fd_month`, `fd_slip_no`, `percentage`, `status`, `t_id`, `start_date`) VALUES ('$_POST[d_id]', '$_POST[amount]', '$rty', '$date', '$_POST[month]', '$_POST[formno]', '$_POST[percentage]', 'a', '', '$o_date')")or die("not inserted");
			
       		mysql_query("INSERT INTO `transition_history` (`10`, `20`, `50`, `100`, `500`, `1000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `to`, `time`) VALUES ('', '', '', '', '', '', '$_POST[amount]', '$pluse', '$_POST[d_id]', '$o_date', 'transfer FD', '-', '$tiy[bal]', 'admin', 'admin', 'FD', '$time')")or die("transtation not recorded");
			mysql_query("update distributor set bal=".$pluse." where d_id=".$_POST[d_id]) or die("balance not updated");
			$bvt=$_POST[amount]*6/100;
			$bv_amount=$bvt/12;
			mysql_query("INSERT INTO `bill` (`bill_id`, `d_id`, `o_date`, `s_date`, `name`, `addreass`, `mobile`, `mobile2`, `pincode`, `city`, `state`, `addreasstype`, `price`, `bv`, `status`, `paid`, `de_id`, `online`, `shop_id`, `method`, `bv_met`) VALUES ('$bill_id', '$_POST[d_id]', '$o_date', '$o_date', '', '', '', '', '', '', '', '', '$_POST[amount]', '$bv_amount', 'c', '', '', '', '', 'FD', '2')");		
		echo "<script>alert('FD Started and money subtracted sucessfully');window.parent.location.reload();</script>";
		

        }
        else{echo "Sorry this cannot ,................(you dont have inof money)";}
	}
	
}

