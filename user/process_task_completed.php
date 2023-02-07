<?php
include "config.php";
$d=date('d-m-y h:i:s');
$rd=strtotime($d);

$que="select max(bill_id) as max from bill";
 $r=mysql_query($que) or die("query not performed");
if($r)
  {
  $row=mysql_fetch_array($r);  
  $bill_id=$row['max'];
  $bill_id=$bill_id+1;
  
  }
  if(isset($_SESSION[t1]))
  {
  
  if(isset($_SESSION[t2]))
  { 
  if(isset($_SESSION[t3]))
  {
mysql_query("INSERT INTO `task` (`task_id`, `d_id`, `date`, `time`, `task_no`, `bill_id`, `bv`, `ip_addreass`, `browser`, `strtotime`) VALUES (NULL, '$_SESSION[id]', '$date', '$time', '', '$bill_id', '1', '$ipad', '$browser', '$rd');");
mysql_query("INSERT INTO `bill` (`bill_id`, `d_id`, `o_date`, `s_date`, `name`, `addreass`, `mobile`, `mobile2`, `pincode`, `city`, `state`, `addreasstype`, `price`, `bv`, `status`, `paid`, `de_id`, `online`, `shop_id`, `method`) VALUES ('$bill_id', '$_SESSION[id]', '$date', '$date', '', '', '', '', '', '', '', '', '0', '1', 'c', '', '', '', '', 'task')");
unset($_SESSION[t1]);
unset($_SESSION[t2]);
unset($_SESSION[t3]);
unset($_SESSION[task]);
echo "<script>location.href='ta_sucess.php';</script>";
}else{echo "<script>location.href='ta_sucess.php?fail=1';</script>";}
}else{echo "<script>location.href='ta_sucess.php?fail=1';</script>";}
}else{echo "<script>location.href='ta_sucess.php?fail=1';</script>";}
unset($_SESSION[t1]);
unset($_SESSION[t2]);
unset($_SESSION[t3]);
unset($_SESSION[task]);


?>
