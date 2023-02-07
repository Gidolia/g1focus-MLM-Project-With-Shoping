<?php include "../config.php";?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bill counter</title>
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
<link href="../../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

<style type="text/css">
#apDiv1 {
	position:absolute;
	left:60%;
	top:25px;
	width:442px;
	height:133px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:82px;
	top:479px;
	width:293px;
	height:153px;
	z-index:2;
}
#apDiv3 {
	position:absolute;
	left:529px;
	top:480px;
	width:317px;
	height:165px;
	z-index:3;
}
#apDiv4 {
	position:absolute;
	left:1150px;
	top:4px;
	width:50px;
	height:22px;
	z-index:4;
}
</style>
<script src="ajax.js"></script>
</head>

<body>
<div id="apDiv4"><a href="/shop/"><button class="acount-btn">My Account</button></a></div>

<div id="apDiv1"><form> 
First name: <input type="text" onkeyup="showHint(this.value)" autofocus="autofocus">
</form><p>Suggestions: <span id="txtHint"></span></p></div>
<div id="apDiv2"><h2>G1focus Distributor</h2><br /><form action="bill_ask.php" method="post">
<input type="number" name="d_id" onKeyUp="showUserr(this.value)" value="" required="required" />
<input type="text" id="s_name" name="s_name" value="" required><br />
<input type="submit" name="submit" /><input type="submit" name="pay_submit" value="pay now" /></form></div>
<div id="apDiv3"><h2>Other</h2><form action="bill_ask.php" method="post">
<input type="hidden" name="d_id" value="0" />
<input type="submit" name="submit" /></form></div>

</div>
<iframe name="a" height="450" width="58%" src="bill.php">
</iframe>
<br /><br />

<span id="txtHint"></span>
</body>
</html>