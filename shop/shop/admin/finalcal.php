<?php
include "config.php";
include "to_bv.php";
$o_date=date("Y-m-d");
$sel1=mysql_query("select d_id,bal from distributor") or die("value not selected1");
while($fet1=mysql_fetch_assoc($sel1))
{ 
 	$later=alter_bal($fet1[d_id]);
	$grand_totalt=$grand_totalt+$later;
	$down_bv=find_under_bv($fet1[d_id]);
	$ownt_bv=find_bv($fet1[d_id]);
	$downre=array();
	$sel1e=mysql_query("select d_id from distributor where sponsor_no=".$fet1[d_id]) or die("value not selected");
	while($fet1e=mysql_fetch_assoc($sel1e))
	{ $downre[]=find_bv($fet1e[d_id])+find_under_bv($fet1e[d_id]);}
	$resultr=mysql_query("SELECT count(d_id) as total from distributor where proposer_no=".$fet1[d_id]." and new='Y'");
		$datar=mysql_fetch_assoc($resultr);
		
		
		$rtyb=$datar['total']*50;
	mysql_query("INSERT INTO c_month(d_id,f_date,bv1,bv2,bv3,own_bv,down_bv,m_amount,clear,person_joined,join_amount) VALUES('".$fet1[d_id]."','".$o_date."','".$downre[0]."','".$downre[1]."','".$downre[2]."','".$ownt_bv."','".$down_bv."','".$later."','n','".$datar[total]."','".$rtyb."')");
	
		$plus=$fet1[bal]+$later;
		mysql_query("update distributor set bal=".$plus." where d_id=".$fet1[d_id]);
		mysql_query("update distributor set new='n' where d_id=".$fet1[d_id]);
		
				  
        
        mysql_query("INSERT INTO `transition_history` (`10`, `20`, `50`, `100`, `500`, `1000`, `amount`, `a_bal`, `d_id`, `date`, `method`, `type`, `b_bal`, `branch_id`, `e_id`, `slip_no`, `slip_place`) VALUES ('', '', '', '', '', '', '$later', '$plus', '$fet1[d_id]', '$o_date', 'G1focus commision', '+', '$fet1[bal]', 'software', 'software', '', '')")or die("transtation not recorded");
       


}
$sdd=$grand_totalt;
	  	$w = "select sum(bv) as total_bv from bill where status='c'";
	   	$rest = mysql_query($w) or die ("query not executed");
	if (mysql_num_rows($rest)>0)
	{
        while ($row2 = mysql_fetch_assoc($rest))
		{
          echo $row2["total_bv"]."total bv calculated from business volume<br>";
		  $drtf=$row2["total_bv"];
		  $tyu=$row2["total_bv"]-$sdd."total profit";
		}
		header("location:echo.php?total=$tyu&distri=$grand_totalt&colected=$drtf");
		
	}
?>