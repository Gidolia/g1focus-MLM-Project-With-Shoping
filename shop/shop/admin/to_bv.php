<?php
include "config.php";
$rt=81465;
//Empty both Table

function find_under_bv($d_idtt)
{
$temp=array();
$temp1=array();
$grand_total=0;

$sel1=mysql_query("select d_id from distributor where sponsor_no=".$d_idtt) or die("value not selected");
while($fet1=mysql_fetch_assoc($sel1))
{
	$temp[]=$fet1[d_id];
	$grand_total=$grand_total+find_bv($fet1[d_id]);

}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
for($x=0;$x<count($temp);$x++)
{
	
	$sel3=mysql_query("select d_id from distributor where sponsor_no=".$temp[$x]) or die("value not selected");
	while($fet3=mysql_fetch_assoc($sel3))
	{
		
		$temp1[]=$fet3[d_id];
		
		$grand_total=$grand_total+find_bv($fet3[d_id]);
	}
}
unset($temp);
$temp=array();
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
for($x=0;$x<count($temp1);$x++)
{
	$sel5=mysql_query("select d_id from distributor where sponsor_no=".$temp1[$x]) or die("value not selected3.1");
	while($fet5=mysql_fetch_assoc($sel5))
	{
	
		$temp[]=$fet5[d_id];
				//echo "&nbsp;B.V".find_bv($fet5[d_id])."<br>";
		$grand_total=$grand_total+find_bv($fet5[d_id]);
	}
}
unset($temp1);
$temp1=array();

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




$sel14=mysql_query("select max(level) as max_level from level") or die("value not selected5");
$fet14=mysql_fetch_assoc($sel14);
$fetc14=$fet14[max_level];
for ($rff = 0; $rff <= $fetc14; $rff++)
{   
	for($x=0;$x<count($temp);$x++)
	{

	$sel13=mysql_query("select d_id from distributor where sponsor_no=".$temp[$x]) or die("value not selected");
	while($fet13=mysql_fetch_assoc($sel13))
	{
		
		$temp1[]=$fet13[d_id];
		
		$grand_total=$grand_total+find_bv($fet13[d_id]);
	}
	}
unset($temp);
$temp=array();
	  
	 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	  for($x=0;$x<count($temp1);$x++)
	  {
		 
		  $sel5=mysql_query("select d_id from distributor where sponsor_no=".$temp1[$x]) or die("value not selected3.1");
		  while($fet15=mysql_fetch_assoc($sel5))
		  {
			 
			  $temp[]=$fet15[d_id];
			 
			  $grand_total=$grand_total+find_bv($fet15[d_id]);
		  }
	  }
unset($temp1);
$temp1=array();
	
}
return $grand_total;
}

//function
function find_bv($did)
{
	$b=0;
	$w = "select sum(bv) as total_bv from bill where d_id='$did' and status='c'";
	$rest = mysql_query($w) or die ("query not executed");
	if (mysql_num_rows($rest)>0)
	{
        while ($row2 = mysql_fetch_assoc($rest))
		{  
          $b=$row2["total_bv"];
		}
	}
	 return $b;
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function alter_bal($rt)
{
////////////////////////////////////////Find Own B.V  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$own_bv=find_bv($rt);
if($own_bv>=100)
{
//echo $own_bv." Own B.V<br>";
$own_cal=$own_bv * 15/100;
//echo $own_cal."Comition on own bv <br>";

////////////////////////////////////////count Function Total Line                                        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$result=mysql_query("SELECT count(d_id) as total from distributor where sponsor_no=".$rt);
$data=mysql_fetch_assoc($result);
//echo $data['total']."Total Downline person<br>";

////////////////////////////////////////commnision Distribution ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($data['total']>1)
{
	$under_bv=find_under_bv($rt);
//	echo $under_bv."Downline b.v<br>";
	
	$a1=$under_bv*slab_selection($under_bv);
//	echo $percen."Percentage calculated<br>";
//	echo $a1."<br>";



///////////////////////////////////////////////leadership Bonus Distribute /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if($data['total']>2)
	{if($own_bv>=150)
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
			$a3=min($results)*2.5/100;
		}
//		echo $a3."Least amount comision<br>";
	}
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
		elseif(min($resultst)==0){$a1=$a1*0/100;}
	}
	if($data['total']==3)
	{
		$resultt = mysql_query("SELECT d_id,sponsor_no FROM distributor WHERE sponsor_no=".$rt);
		$resultst = array();
		while($rowt = mysql_fetch_assoc($resultt))
		{
			$resultst[] = find_under_bv($rowt[d_id])+find_bv($rowt[d_id]);
		}
		$rtyu=$resultst[0]+$resultst[1]+$resultst[2];
		$rtyui=$rtyu-min($resultst)-max($resultst);
		$apercen=$rtyui*100/max($resultst);
//		echo $apercen;
		if ($apercen>40)
		{
			$a1=$a1;
		}
		elseif($apercen>20 and $apercen<=40){$a1=$a1*75/100;}
		elseif($apercen>10 and $apercen<=20){$a1=$a1*55/100;}
		elseif($apercen>5 and $apercen<=10){$a1=$a1*30/100;}
		elseif($apercen>0 and $apercen<=5){$a1=$a1*2/100;}
		elseif($rtyui==0){$a1=$a1*0/100;}
	}
}
}
	if(max($results)>350000)
	{if(min($results)>115000 and min($results)<=169999){
	$ttt=3/100;}
	elseif(min($results)>170000 and min($results)<=259999){
	$ttt=4.5/100;}
	elseif(min($results)>260000 and min($results)<=349999){
	$ttt=6/100;}
	elseif(min($results)>350000){
	$ttt=8/100;}}
	else{$ttt=0;}
	$edfg=(min($results))*$ttt;

$gta=$own_cal + $a1 + $a3 + $a3r+$edfg;
   return $gta;
}
function slab_selection($under_bv)
{
		if($under_bv<=5000){ $percen=10/100;}
	elseif($under_bv>5000 and $under_bv<=10000) { $percen=9/100;}
	elseif($under_bv>10000 and $under_bv<=20000){ $percen=8/100;}
	elseif($under_bv>20000 and $under_bv<=30000){ $percen=7/100;}
	elseif($under_bv>30000 and $under_bv<=40000){ $percen=6.5/100;}
	elseif($under_bv>40000 and $under_bv<=50000){ $percen=6/100;}
	elseif($under_bv>50000 and $under_bv<=60000){ $percen=5.5/100;}
	elseif($under_bv>60000 and $under_bv<=70000){ $percen=5/100;}
	elseif($under_bv>80000 and $under_bv<=90000){ $percen=4.8/100;}
	elseif($under_bv>90000 and $under_bv<=100000){ $percen=4.3/100;}
	elseif($under_bv>100000){$percen=4/100;}

	
	return $percen;
}

?>


