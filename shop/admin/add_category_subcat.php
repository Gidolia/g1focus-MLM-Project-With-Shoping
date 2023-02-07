	<?php include "config.php";?>
    	<h2>Add Category</h2><br />
        <form method="get">
                	<input type="text" name="cat_name" required>
                    <input type="submit" name="add_cat">
                    </form>
                    <br><br><br><br><br><br><br>
                    
                    
                    
                    <h2>Add Category</h2><br />
                    <form method="get">
                	<select name="cat_id">
											<?php
											
														
													$query="select * from category ";
					
													$res=mysql_query($query);
													
													while($row=mysql_fetch_assoc($res))
													{
														echo "<option value='".$row['cat_id']."'>".$row['cat_name'];
													}
											?>
										</select><br><br>
                	<input type="text" name="subcat_name" required>
                    <input type="submit" name="add_subcat"></form>
                    
                    
                     <?php
				
		if(isset($_GET[add_cat]))
		{
						$q="INSERT INTO category(cat_name) VALUES('$_GET[cat_name]')";
						mysql_query($q);
						echo "<script>alert('category name added');
location.href='add_category_subcat.php';</script>";
						
		}
		if(isset($_GET[add_subcat]))
		{$q="INSERT INTO subcat_id(cat_id,subcat_name) VALUES('$_GET[cat_id]','$_GET[subcat_name]')";
						mysql_query($q);
						echo "<script>alert('category name added');
location.href='add_category_subcat.php';</script>";
						
		}
		
		
	?>