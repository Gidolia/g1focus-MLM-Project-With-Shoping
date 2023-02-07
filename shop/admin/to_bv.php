<?php
include "config.php";
//$rt=81465;
//Empty both Table

function find_under_bv($d_idtt)
{
$temp=array();
$temp1=array();
$grand_total=0;

$sel1=mysql_query("select d_id from distributor where sponsor_no=".$d_idtt) or die("value not selected to");
while($fet1=mysql_fetch_assoc($sel1))
{
	$temp[]=$fet1[d_id];
	$grand_total=$grand_total+find_bv($fet1[d_id]);

}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
for($x=0;$x<count($temp);$x++)
{
	
	$sel3=mysql_query("select d_id from distributor where sponsor_no=".$temp[$x]) or die("value not selectedto1");
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
if($own_bv>49)
{
//echo $own_bv." Own B.V<br>";

////////////////////////////////////////count Function Total Line                                        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$result=mysql_query("SELECT count(d_id) as total from distributor where sponsor_no=".$rt);
$data=mysql_fetch_assoc($result);
//echo $data['total']."Total Downline person<br>";

////////////////////////////////////////commnision Distribution ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$result = mysql_query("SELECT d_id,sponsor_no FROM distributor WHERE sponsor_no=".$rt);
		$results = array();
		while($row = mysql_fetch_assoc($result))
		{
			//echo find_under_bv($row[d_id])+find_bv($row[d_id])."<br>";
			$results[]=find_under_bv($row[d_id])+find_bv($row[d_id]);
			
		}
		$slab=array();
		for ($x = 0; $x <= $data['total']; $x++)
        { 
			$tota=$tota+$results[$x];
			$slab[]=$results[$x]*slab_selection($results[$x])/100;
			
			}
		$tot=find_bv($rt)+$tota;
		
		$tot_per=$tot*slab_selection($tot)/100;
		for ($x = 0; $x <= $data['total']; $x++)
        { 
			$minu=$minu+$slab[$x];
			
			
			}
		
		//echo $tot_per."<br>";
		//echo $max_per."<br>";
		//echo $min_per."<br>";
		$comm=$tot_per-$minu;
		$f=0;
       $resultr=mysql_query("SELECT count(d_id) as total from distributor where proposer_no=".$rt." and new='y'");
		$datar=mysql_fetch_assoc($resultr);
		
		$rtyb=$datar['total']*10;
///////////////royalty
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
	///////////////technical
	if(max($results)>500000)
	{if(min($results)>50000 and min($results)<=1000000){
	$tttd=1/100;}
	elseif(min($results)>1000000 and min($results)<=2200000){
	$tttd=1.75/100;}
	}
	else{$tttd=0;}
	$edfgd=(min($results))*$tttd;
	

		$comm=$comm+$rtyb+$edfg+$edfgd;
	

		
		
}

return $comm;
}
function slab_selection($pert)
{
	if($pert>=10 and $pert<150){$avv=10;}
	elseif($pert>=150 and $pert<300){$avv=15;}
	elseif($pert>=300 and $pert<625){$avv=20;}
	elseif($pert>=625 and $pert<1250){$avv=24;}
	elseif($pert>=1250 and $pert<2500){$avv=28;}
	elseif($pert>=2500 and $pert<=4999){$avv=32;}
	elseif($pert>=5000 and $pert<=9999){$avv=35;}
	elseif($pert>=10000 and $pert<=19999){$avv=38;}
	elseif($pert>=20000 and $pert<=39999){$avv=41;}
	elseif($pert>=40000 and $pert<=69999){$avv=44;}
	elseif($pert>=70000 and $pert<=114999){$avv=47;}
	elseif($pert>=115000 and $pert<=169999){$avv=50;}
	elseif($pert>=170000 and $pert<=259999){$avv=52;}
	elseif($pert>=260000 and $pert<=349999){$avv=54;}
	elseif($pert>=350000){$avv=56;}
	
	return $avv;
}

?>


