<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
<form method="post">

First name: <input type="text" onkeyup="showHint(this.value)" autofocus="autofocus">
<p>Suggestions: <span id="txtHint"></span></p>
<input type="number" value="<?php echo "$_GET[p_id]";?>" name="p_id" readonly />
lot price:: <input type="number" name="lot_price"><br><br>
QTY:: <input type="number" name="qty"><br><br>
Bill id:: <input type="number" name="bill_id"><br><br>
Expiry Date:: <input type="date" name="expiry"><br><br>
Shop id:: <input type="number" name="shop_id"><br>
<input type="submit" name="update_product"></form>
<?php 
include "config.php";
if(isset($_POST[update_product]))
{
	$o_date=date("Y/m/d");
	$per=$_POST[lot_price]/$_POST[qty];
	$p_bv=$_POST[P_selling_price]-$per;
	mysql_query("INSERT INTO `shop_bill` (`p_id`, `date`, `unit`, `lot_price`, `per_price`, `expiry_date`, `bill_id`, `shop_id`, `e_id`) VALUES ('$_POST[p_id]', '$o_date', '$_POST[qty]', '$_POST[lot_price]', '$per', '$_POST[expiry]','$_POST[bill_no]','$_POST[shop_id]','$_SESSION[e_id]')")or die("problem in shop_bill database");
	$q="select * from shop_product where shop_id='$_POST[shop_id]' and p_id='$_POST[p_id]'";
$res=mysql_query($q)or die ("sorry value not selected");
$c=mysql_num_rows($res);
if($c!=0)
{ $ss=mysql_fetch_assoc($res);
$tot=$ss[qty]+$_POST[qty];	
mysql_query("UPDATE `shop_product` SET `qty` = '$tot' WHERE `shop_id` = '$_POST[shop_id]' and `p_id` = '$_POST[p_id]'")or die("producted not updated");
}
else{mysql_query("INSERT INTO `shop_product` (`p_id`, `qty`, `shop_id`) VALUES ('$_POST[p_id]', '$_POST[qty]', '$_POST[shop_id]')")or die("producted not updated2");}
}
else{ echo "asd";}
?>

