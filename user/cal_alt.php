<?php
//include "config.php";
//include "to_bv.php";
//$rt=200001;
function alter_bal($rt)
{
////////////////////////////////////////Find Own B.V  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$own_bv=find_bv($rt);
if($own_bv>350)
{
//echo $own_bv." Own B.V<br>";
$own_cal=$own_bv * 15/100;
//echo $own_cal."Comition on own bv <br>";

////////////////////////////////////////count Function Total Line                                        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$result=mysql_query("SELECT count(d_id) as total from distributor where sponsor_no=".$rt);
$data=mysql_fetch_assoc($result);
//echo $data['total']."Total Downline person<br>";

////////////////////////////////////////commnision Distribution ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($data['total']>1)
{
	$under_bv=find_under_bv($rt);
//	echo $under_bv."Downline b.v<br>";
	if($under_bv<=60000){ $percen=10/100;}
	elseif($under_bv>60000 and $under_bv<=140000) { $percen=9/100;  }
	elseif($under_bv>140000 and $under_bv<=200000){ $percen=8.5/100;}
	elseif($under_bv>200000 and $under_bv<=250000){ $percen=8/100;  }
	elseif($under_bv>250000 and $under_bv<=320000){ $percen=7.5/100;}
	elseif($under_bv>320000){ $percen=7/100;}
	
	$a1=$under_bv * $percen;
//	echo $percen."Percentage calculated<br>";
//	echo $a1."<br>";



///////////////////////////////////////////////Royalty Distribute /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if($data['total']>2)
	{
		$result = mysql_query("SELECT d_id,sponsor_no FROM distributor WHERE sponsor_no=".$rt);
		$results = array();
		while($row = mysql_fetch_assoc($result))
		{
		$results[] = find_under_bv($row[d_id])+find_bv($row[d_id]);
		}
//		echo min($results)."Least Downline<br>";
		if(min($results)>1000 and min($results)<=10000)
		{
			$a3=min($results)*1/100;
		}
		elseif(min($results)>10000 and min($results)<=50000)
		{
			$a3=min($results)*1.5/100;
		}
		elseif(min($results)>50000 and min($results)<=150000)
		{
			$a3=min($results)*2/100;
		}
		elseif(min($results)>150000)
		{
			$a3=min($results)*3/100;
		}
//		echo $a3."Least amount comision<br>";
	}
/////////////////////////////////////////////////Techinical Bonus
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	if($data['total']>2)
	{
		$resultr = mysql_query("SELECT d_id,sponsor_no FROM distributor WHERE sponsor_no=".$rt);
		$resultsr = array();
		while($rowr = mysql_fetch_assoc($resultr))
		{
		$resultsr[] = find_under_bv($rowr[d_id])+find_bv($rowr[d_id]);
		}
//		echo min($resultsr)."Least Downline<br>";
		if(min($resultsr)>200000 and min($resultsr)<=500000)
		{
			$a3r=min($resultsr)*1/100;
		}
		elseif(min($resultsr)>500000 and min($resultsr)<=5000000)
		{
			$a3r=min($resultsr)*1.5/100;
		}
		elseif(min($resultsr)>5000000 and min($resultsr)<=15000000)
		{
			$a3r=min($resultsr)*2/100;
		}
//		echo $a3r."Least amount comision<br>";
	}
//////////////////////////////////////////// amount cut on disterbance on lines
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	if($data['total']==2)
	{
		$resultt = mysql_query("SELECT d_id,sponsor_no FROM distributor WHERE sponsor_no=".$rt);
		$resultst = array();
		while($rowt = mysql_fetch_assoc($resultt))
		{
			$resultst[] = find_under_bv($rowt[d_id])+find_bv($rowt[d_id]);
		}
		$apercen=min($resultst)*100/max($resultst);
//		echo $apercen;
		if ($apercen>40)
		{
			$a1=$a1;
		}
		elseif($apercen>20 and $apercen<=40){$a1=$a1*75/100;}
		elseif($apercen>10 and $apercen<=20){$a1=$a1*55/100;}
		elseif($apercen>5 and $apercen<=10){$a1=$a1*30/100;}
		elseif($apercen>0 and $apercen<=5){$a1=$a1*2/100;}
	}
}
}
$gta=$own_cal + $a1 + $a3 + $a3r;
   return $gta;
}
?>


