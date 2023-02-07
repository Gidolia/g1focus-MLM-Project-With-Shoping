<?php
include "config.php";
include "to_bv.php";
$rt=200001;
////////////////////////////////////////Find Own B.V  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$own_bv=find_bv($rt);
if($own_bv>350)
{
echo $own_bv."Own B.V<br>";
$own_cal=$own_bv * 15/100;
echo $own_cal."Comition on own bv <br>";

////////////////////////////////////////count Function Total Line ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$result=mysql_query("SELECT count(*) as total from distributor where sponsor_no=".$rt);
$data=mysql_fetch_assoc($result);
echo $data['total']."Total Downline person<br>";

////////////////////////////////////////commnision Distribution ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($data['total']>1)
{
	$under_bv=find_under_bv($rt);
	echo $under_bv."Downline b.v<br>";
	if($under_bv<=60000){ $percen=10/100;}
	elseif($under_bv>60000 and $under_bv<=140000) { $percen=9/100;}
	elseif($under_bv>140000 and $under_bv<=200000){ $percen=8.5/100;}
	elseif($under_bv>200000 and $under_bv<=250000){ $percen=8/100;}
	elseif($under_bv>250000 and $under_bv<=320000){ $percen=7.5/100;}
	elseif($under_bv>320000){ $percen=7/100;}
	
	$a1=$under_bv * $percen;
	echo $percen."Percentage calculated<br>";
	echo $a1."<br>";



///////////////////////////////////////////////Royalty Distribute /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if($data['total']>2)
	{
		if($own_bv >= 380)
		{
			$result = mysql_query("SELECT * FROM distributor WHERE sponsor_no=".$rt);
			$results = array();
			while($row = mysql_fetch_assoc($result))
			{
				$results[] = find_under_bv($row[d_id])+find_bv($row[d_id]);
			}
			echo min($results)."Least Downline<br>";
			if(min($results)>1000 and min($results)<=10000)
			{
				$a3=min($results)*1/100;
			}
			elseif(min($results)>10000 and min($results)<=30000)
			{
				$a3=min($results)*1.5/100;
			}
			elseif(min($results)>30000)
			{
				$a3=min($results)*2/100;
			}
			echo $a3."Least amount comision<br>";
		}
	}
	
}
}
?>
<h1>All variable</h1>
<?php
echo $own_cal."Comition on own bv <br>";
echo $a1."<br>";
echo $a3."Least amount comision<br>";
?>


