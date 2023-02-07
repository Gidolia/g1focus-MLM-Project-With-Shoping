<?php
//include "config.php";
//$d_idtt=200001;
//Empty both Table
function find_under_bv($d_idtt)
{
mysql_query("CREATE TABLE a$_SESSION[id](a varchar(255))");
mysql_query("CREATE TABLE b$_SESSION[id](b varchar(255))");
$grand_total=0;

$sel1=mysql_query("select d_id from distributor where sponsor_no=".$d_idtt) or die("value not selected");
while($fet1=mysql_fetch_assoc($sel1))
{
	//echo $fet1[d_id];
	mysql_query("INSERT INTO a$_SESSION[id](a) VALUES('".$fet1[d_id]."')") or die("value not inserted");
	//echo "&nbsp;B.V".find_bv($fet1[d_id])."<br>";
	$grand_total=$grand_total+find_bv($fet1[d_id]);

}

//echo $grand_total,"<br>"; 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sel2=mysql_query("select a from a$_SESSION[id]") or die("value not selected2");
while($fet2=mysql_fetch_assoc($sel2))
{
	//echo $fet2[a];
	$sel3=mysql_query("select d_id from distributor where sponsor_no=".$fet2[a]) or die("value not selected");
	while($fet3=mysql_fetch_assoc($sel3))
	{
		//echo $fet3[d_id];
		mysql_query("INSERT INTO b$_SESSION[id](b) VALUES('".$fet3[d_id]."')") or die("value not inserted");
		//echo "&nbsp;B.V".find_bv($fet3[d_id])."<br>";
		$grand_total=$grand_total+find_bv($fet3[d_id]);
	}
}
mysql_query("delete from a$_SESSION[id]") or die ("not deleted");

//echo $grand_total,"<br>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$sel4=mysql_query("select b from b$_SESSION[id]") or die("value not selected3");
while($fet4=mysql_fetch_assoc($sel4))
{
	//echo $fet4[b];
	$sel5=mysql_query("select d_id from distributor where sponsor_no=".$fet4[b]) or die("value not selected3.1");
	while($fet5=mysql_fetch_assoc($sel5))
	{
		//echo $fet5[d_id];
		mysql_query("INSERT INTO a$_SESSION[id](a) VALUES('".$fet5[d_id]."')") or die("value not inserted");
		//echo "&nbsp;B.V".find_bv($fet5[d_id])."<br>";
		$grand_total=$grand_total+find_bv($fet5[d_id]);
	}
}
mysql_query("delete from b$_SESSION[id]") or die ("not deleted");

//echo $grand_total,"<br>";
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





$sel14=mysql_query("select max(level) as max_level from level") or die("value not selected5");
$fet14=mysql_fetch_assoc($sel14);
$fetc14=$fet14[max_level];
for ($x = 0; $x <= $fetc14; $x++)
{   //echo "level".$x."mle";
	$sel12=mysql_query("select a from a$_SESSION[id]") or die("value not selected2");
	while($fet12=mysql_fetch_assoc($sel12))
	{
	//echo $fet12[a];
	$sel13=mysql_query("select d_id from distributor where sponsor_no=".$fet12[a]) or die("value not selected");
	while($fet13=mysql_fetch_assoc($sel13))
	{
		//echo $fet13[d_id];
		mysql_query("INSERT INTO b$_SESSION[id](b) VALUES('".$fet13[d_id]."')") or die("value not inserted");
		//echo "&nbsp;B.V".find_bv($fet13[d_id])."<br>";
		$grand_total=$grand_total+find_bv($fet13[d_id]);
	}
	}
	mysql_query("delete from a$_SESSION[id]") or die ("not deleted");
	  
	  //echo $grand_total,"<br>";
	  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	  $sel14=mysql_query("select b from b$_SESSION[id]") or die("value not selected3");
	  while($fet14=mysql_fetch_assoc($sel14))
	  {
		  //echo $fet14[b];
		  $sel5=mysql_query("select d_id from distributor where sponsor_no=".$fet14[b]) or die("value not selected3.1");
		  while($fet15=mysql_fetch_assoc($sel5))
		  {
			  //echo $fet15[d_id];
			  mysql_query("INSERT INTO a$_SESSION[id](a) VALUES('".$fet15[d_id]."')") or die("value not inserted");
			  //echo "&nbsp;B.V".find_bv($fet15[d_id])."<br>";
			  $grand_total=$grand_total+find_bv($fet15[d_id]);
		  }
	  }
	  mysql_query("delete from b$_SESSION[id]") or die ("not deleted");
	  
	  //echo $grand_total,"<br>";

    
	
}
mysql_query("drop table if exists b$_SESSION[id]");
mysql_query("drop table if exists a$_SESSION[id]");
return $grand_total;
}

//function 
function find_bv($did)
{
	$b=0;
	$ii=0;
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
if($own_bv>99)
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
		$resultr=mysql_query("SELECT count(d_id) as total from distributor where proposer_no=".$rt." and new='Y'");
		$datar=mysql_fetch_assoc($resultr);
		
			if($datar['total'] % 2 == 0)
			{$rg=$datar['total']/2;}
			else{$rr=$datar['total']-1;
				$rg=$rr/2;}
		
		$rtyb=$rg*100;

/*	if(max($results)>1500 and max($results)<=2999)
	{if(min($results)>1500 and min($results)<=2999){
	$ttt=100;}}
	elseif(max($results)>3000 and max($results)<=4999)
	{if(min($results)>3000 and min($results)<=4999){
	$ttt=200;}}
	elseif(max($results)>5000 and max($results)<=9999)
	{if(min($results)>5000 and min($results)<=9999){
	$ttt=400;}}
	if(max($results)>10000 and max($results)<=19999)
	{if(min($results)>10000 and min($results)<=19999){
	$ttt=900;}}
	if(max($results)>20000 and max($results)<=39999)
	{if(min($results)>20000 and min($results)<=39999){
	$ttt=1800;}}
	if(max($results)>40000 and max($results)<=99999)
	{if(min($results)>40000 and min($results)<=99999){
	$ttt=3600;}}
	*/

		$comm=$comm+$rtyb;

		
}

return $comm;
}
function slab_selection($pert)
{
	if($pert>299 and $pert<=624){$avv=14;}
	elseif($pert>=625 and $pert<=1249){$avv=14.5;}
	elseif($pert>=1250 and $pert<=2499){$avv=18;}
	elseif($pert>=2500 and $pert<=4999){$avv=23.5;}
	elseif($pert>=5000 and $pert<=9999){$avv=29;}
	elseif($pert>=10000 and $pert<=19999){$avv=35.5;}
	elseif($pert>=20000 and $pert<=39999){$avv=41.5;}
	elseif($pert>=40000 and $pert<=69999){$avv=47.5;}
	elseif($pert>=70000 and $pert<=114999){$avv=51;}
	elseif($pert>=115000 and $pert<=169999){$avv=54.5;}
	elseif($pert>=170000 and $pert<=259999){$avv=57;}
	elseif($pert>=260000 and $pert<=349999){$avv=59;}
	elseif($pert>=350000){$avv=61;}
	return $avv;
}
?>


