<?php
// Array with names
include "config.php";
include 'to_bv.php';
/*$d="select * from product";
	$result=mysql_query($d) or die ("value not selected");
	if(mysql_num_rows($result)>0)
	{
		while ($p=mysql_fetch_assoc($result))
{
$a[] = "$p[p_name]";
}}
// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= "<br>$name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;*/?>
<!DOCTYPE html>
<html>
<head>

<link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
</head>
<body>

<?php
//$tempt=array();
$q = intval($_GET['q']);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$temp=array();
$temp1=array();
$grand_total=0;
$d_idtt=$_SESSION[id];
$sel1=mysql_query("select d_id from distributor where sponsor_no=".$d_idtt) or die("value not selected");
while($fet1=mysql_fetch_assoc($sel1))
{
	$temp[]=$fet1[d_id];
	$tempt[]=$fet1[d_id];

}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
for($x=0;$x<count($temp);$x++)
{
	
	$sel3=mysql_query("select d_id from distributor where sponsor_no=".$temp[$x]) or die("value not selected");
	while($fet3=mysql_fetch_assoc($sel3))
	{
		
		$temp1[]=$fet3[d_id];
		
		$tempt[]=$fet3[d_id];
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
		$tempt[]=$fet5[d_id];
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
		
		$tempt[]=$fet13[d_id];
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
			 
			  $tempt[]=$fet15[d_id];
		  }
	  }
unset($temp1);
$temp1=array();
	
}
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$sql="select * from distributor where d_name like '%".$_GET[q]."%'";
$result = mysql_query($sql);

echo "<table class='table table-hover table-bordered table-striped'>
<tr><th>No.</th><th>Own bv Status</th><th>Distributor ID</th><th>Name</th><th>Own B.V</th></tr>";
while($row = mysql_fetch_array($result)) {
/////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////
for($x=0; $x<count($tempt); $x++)
{ 
if($tempt[$x]==$row[d_id])
{
   $bvtds=0;
    $bvtds=find_bv($row[d_id]);
    if($bvtds<100)
    { $yde="<td><span class='label label-warning label-mini'>Pending</span></td>";}
    else{$yde="<td><span class='label label-success label-mini'>Completed</span></td>";}
	echo "<tr><td> </td>".$yde."<td>".$row[d_id]."</td><td><a href='distributor_info.php?d_id=".$row[d_id]."'>".$row[d_name]."</a></td><td>".$bvtds."</td></tr>";}}
}
echo "</table>";

?>
</body>
</html>
