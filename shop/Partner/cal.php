<?php
include "config.php";
include "to_bv.php";
////////////////////////////////////////////////////whole cut ammount
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$crt=81465;

mysql_query("delete from t") or die ("not deleted");
mysql_query("delete from t1") or die ("not deleted 1");
$grand_totalt=0;

$sel1=mysql_query("select d_id from distributor where sponsor_no=".$crt) or die("value not selected");
while($fet1=mysql_fetch_assoc($sel1))
{
	//echo $fet1[d_id];
	mysql_query("INSERT INTO t(a) VALUES('".$fet1[d_id]."')") or die("value not inserted");
	//echo "&nbsp;B.V".find_bv($fet1[d_id])."<br>";
	$grand_totalt=$grand_totalt+alter_bal($fet1[d_id]);

}

echo $grand_totalt,"first<br>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sel2=mysql_query("select a from t") or die("value not selected2");
while($fet2=mysql_fetch_assoc($sel2))
{
	//echo $fet2[a];
	$sel3=mysql_query("select d_id from distributor where sponsor_no=".$fet2[a]) or die("value not selected");
	while($fet3=mysql_fetch_assoc($sel3))
	{
		//echo $fet3[d_id];
		mysql_query("INSERT INTO t1(b) VALUES('".$fet3[d_id]."')") or die("value not inserted");
		//echo "&nbsp;B.V".find_bv($fet3[d_id])."<br>";
		$grand_totalt=$grand_totalt+alter_bal($fet3[d_id]);
	}
}
mysql_query("delete from t") or die ("not deleted");

echo $grand_totalt,"second<br>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sel4=mysql_query("select b from t1") or die("value not selected3");
while($fet4=mysql_fetch_assoc($sel4))
{
	//echo $fet4[b];
	$sel5=mysql_query("select d_id from distributor where sponsor_no=".$fet4[b]) or die("value not selected3.1");
	while($fet5=mysql_fetch_assoc($sel5))
	{
		//echo $fet5[d_id];
		mysql_query("INSERT INTO t(a) VALUES('".$fet5[d_id]."')") or die("value not inserted");
		//echo "&nbsp;B.V".find_bv($fet5[d_id])."<br>";
		$grand_totalt=$grand_totalt+alter_bal($fet5[d_id]);
	}
}
mysql_query("delete from t1") or die ("not deleted");

echo $grand_totalt,"thi<br>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





$sel14=mysql_query("select max(level) as max_level from level") or die("value not selected5");
$fet14=mysql_fetch_assoc($sel14);
$fetc14=$fet14[max_level];
for ($x = 0; $x <= $fetc14; $x++)
{   //echo "level".$x."mle";
	$sel12=mysql_query("select a from t") or die("value not selected2");
	while($fet12=mysql_fetch_assoc($sel12))
	{
	//echo $fet12[a];
	$sel13=mysql_query("select d_id from distributor where sponsor_no=".$fet12[a]) or die("value not selected");
	while($fet13=mysql_fetch_assoc($sel13))
	{
		//echo $fet13[d_id];
		mysql_query("INSERT INTO t1(b) VALUES('".$fet13[d_id]."')") or die("value not inserted");
		//echo "&nbsp;B.V".find_bv($fet13[d_id])."<br>";
		$grand_totalt=$grand_totalt+alter_bal($fet13[d_id]);
	}
	}
	mysql_query("delete from t") or die ("not deleted");
	  
	  //echo $grand_total,"<br>";
	  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	  $sel14=mysql_query("select b from t1") or die("value not selected3");
	  while($fet14=mysql_fetch_assoc($sel14))
	  {
		  //echo $fet14[b];
		  $sel5=mysql_query("select d_id from distributor where sponsor_no=".$fet14[b]) or die("value not selected3.1");
		  while($fet15=mysql_fetch_assoc($sel5))
		  {
			  //echo $fet15[d_id];
			  mysql_query("INSERT INTO t(a) VALUES('".$fet15[d_id]."')") or die("value not inserted");
			  //echo "&nbsp;B.V".find_bv($fet15[d_id])."<br>";
			  $grand_totalt=$grand_totalt+alter_bal($fet15[d_id]);
		  }
	  }
	  mysql_query("delete from t1") or die ("not deleted");
	  

    
	
}$sdd=$grand_totalt+alter_bal($crt);
	  
	  
	  	$w = "select sum(bv) as total_bv from bill where status='c'";
	   	$rest = mysql_query($w) or die ("query not executed");
	if (mysql_num_rows($rest)>0)
	{
        while ($row2 = mysql_fetch_assoc($rest))
		{  
          $total_amt=$row2["total_bv"];
		  $total_profit=$row2["total_bv"]-$sdd;
		}
	}



?>