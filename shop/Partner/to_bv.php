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
	//$rt=200001;
////////////////////////////////////////Find Own B.V  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$own_bv=find_bv($rt);
if($own_bv>299)
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
	{if($own_bv>380)
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
	}
/////////////////////////////////////////////////Techinical Bonus
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	if($data['total']>2)
	{if($own_bv>1000)
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
	}}
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
$gta=$own_cal + $a1 + $a3 + $a3r;
   return $gta;
}


?>


