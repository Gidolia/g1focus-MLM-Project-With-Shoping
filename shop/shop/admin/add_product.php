<?php include "config.php";?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">    
</head>

<body>
<div class="col-lg-12">
<form method="post" enctype="multipart/form-data">
                <label>Product name</label><input type="text" name="p_name" size="150" required><br>
                	<label>choose Category</label><select name="subcat_id">
											<?php		
											$query="select * from category ";
			
											$res=mysql_query($query);
											
											while($row=mysql_fetch_assoc($res))
											{
												echo "<option disabled>".$row['cat_name'];
												
												$q2 = "select * from subcat_id where cat_id = ".$row['cat_id'];
												
												$res2 = mysql_query($q2) or die("Can't Execute Query..");
												while($row2 = mysql_fetch_assoc($res2))
												{	
													echo '<option value="'.$row2['subcat_id'].'"> ---> '.$row2['subcat_name'];
									
													
												}					
											}

								?></select>
										</select><br><br><br>
                	<label>Description</label><textarea name="p_description"></textarea><br>
                    <label>Main Pic</label><input type="file" name="p_main_pic" required><br>
                    <label>weight</label><input type="text" name="p_weight" required><br>
                    <label>M.R.P</label><input type="text" name="p_mrp" required><br>
                    <label>Selling Price</label><input type="text" name="P_selling_price" required><br>
                    <label>Lot price</label><input type="text" name="lot_price" required><br>
                    <label>Bill no.</label><input type="text" name="bill_no"><br>
                    <label>purchase unit</label><input type="text" name="unit"><br>
                    <label>Vendor</label><input type="text" name="vendor"><br>
                    <label>expiry Date</label><input type="date" name="expiry">
                    <label>Shop ID</label><input type"number" name="shop_id">
                    <input type="submit" name="add_product"></form></div>
                    <?php if(isset($_POST[add_product]))
					{
						if (file_exists("../product_image/" .$_POST['p_name'].".jpg"))
        {
          echo $_POST['p_name'].".jpg" . " already exists. ";
        }
        elseif(move_uploaded_file($_FILES["p_main_pic"]["tmp_name"], "../product_image/".$_POST['p_name'].".jpg"))
		{
            echo "Stored in: " . "../product_image/".$fileName;
						$o_date=date("Y/m/d");
					$que="select max(p_id) as max from product";
						 $r=mysql_query($que) or die("query not performed");
					if($r)
					{
					  $row=mysql_fetch_array($r);  
					  $p_id=$row['max']+1;
					}
					$per=$_POST[lot_price]/$_POST[unit];
					$p_bv=$_POST[P_selling_price]-$per;
					$p_main_pic="product_image/".$_POST['p_name'].".jpg";
					mysql_query("INSERT INTO `shop_bill` (`p_id`, `date`, `unit`, `lot_price`, `per_price`, `expiry_date`, `bill_id`) VALUES ('$p_id', '$o_date', '$_POST[unit]', '$_POST[lot_price]', '$per', '$_POST[expiry]','$_POST[bill_no]')")or die("problem in shop_bill database");
					mysql_query("INSERT INTO `product` (`p_id`, `subcat_id`, `p_name`, `p_description`, `p_weight`, `p_mrp`, `p_selling_price`, `unit`, `p_bv`, `p_main_pic`) VALUES ('$p_id', '$_POST[subcat_id]', '$_POST[p_name]', '$_POST[p_description]', '$_POST[p_weight]', '$_POST[p_mrp]', '$_POST[P_selling_price]', '$_POST[unit]', '$p_bv', '$p_main_pic')") or die ("problem in product database");
					mysql_query("INSERT INTO `shop_product` (`p_id`, `qty`, `shop_id`) VALUES ('$p_id', '$_POST[unit]', '$_POST[shop_id]')") or die ("problem in shop_product database");
				
					}}?>
</body>
</html>