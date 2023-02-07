<?php
// Array with names
include "../config.php";
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
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$sql="select * from product where p_name like '%".$_GET[q]."%'";
$result = mysql_query($sql);

echo "<table>
<tr>

<th>Product_Name</th>

<th>dp</th>
<th>mrp</th>
<th></th>
<th>B.V</th>
</tr>";
while($row = mysql_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['p_name'] . "</td>";
 
    
    echo "<td>" . $row[p_selling_price]  . "</td>";
	echo "<td>" . $row[p_mrp] . "</td>";
	
{   echo "<td><a href='update_product.php?p_id=".$row['p_id']."'>Select</a></td>";}
	echo "<td>" . $row['p_bv'] . "</td>";
    echo "</tr>";
}
echo "</table>";

?>
</body>
</html>
