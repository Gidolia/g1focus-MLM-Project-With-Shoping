<form method="get">
<input type="text" name="d_id" />
<input type="submit" name="submit_d_id" /></form>
 <?php include "config.php"; 
  if(isset($_GET[submit_d_id]))
 {?>
  <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <?php 
    $select = mysql_query('SELECT * FROM distributor WHERE d_id=81465') or die ("not performed"); 
$fetch = mysql_fetch_assoc($select);

if(mysql_num_rows>0)
{
?>
D ID = <?php echo $_fetch[d_id];?><br><br>
Name:: <input type="text" name="name" value="<?php echo $_fetch[d_name];?>" required /><br><br>
Father_name:: <input type="text" name="father_name" value="<?php echo $_fetch[father_name];?>" required /><br><br>
dob:: <input type="date" name="dob" value="<?php echo $_fetch[d_dob];?>" required /><br><br>
email:: <input type="email" name="email" value="<?php echo $_fetch[email];?>" /><br><br>
mobile:: <input type="text" name="mobile" value="<?php echo $_fetch[mobile];?>" required /><br><br>
mobile alt:: <input type="text" name="mobile_alt" value="<?php echo $_fetch[mobile2];?>" /><br><br>
addreass:: <input type="text" name="addreass" value="<?php echo $_fetch[house_addreass];?>" required /><br><br>
city:: <input type="text" name="city" value="<?php echo $_fetch[city];?>" required /><br><br>
state:: <input type="text" name="state" value="<?php echo $_fetch[state];?>" required /><br><br>
pincode:: <input type="number" name="pincode" value="<?php echo $_fetch[pincode];?>" required /><br><br>
<hr />


Nominee:: <input type="text" name="nominee" value="<?php echo $_fetch[nominee_name];?>" required /><br><br>
Nominee dob:: <input type="date" name="nominee_dob" value="<?php echo $_fetch[nominee_dob];?>" required /><br><br>

<?php }} ?>