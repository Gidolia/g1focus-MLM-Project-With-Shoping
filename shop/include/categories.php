<div class=" top-nav rsidebar span_1_of_left">
					<h3 class="cate">CATEGORIES</h3>
                    <ul class="menu">
                    <?php
                    											$query="select * from category ";
			
											$res=mysql_query($query);
											
											while($row=mysql_fetch_assoc($res))
											{
												echo "<li class='item1'><a href=''>".$row['cat_name']."</a>";
												
												?>
                                                <ul class="cute">
                                                <?php
												$qq = "select * from subcat_id where cat_id=".$row['cat_id'];
												$ress = mysql_query($qq);
												while($roww = mysql_fetch_assoc($ress))
												{?>
                                                
                                                <?php
							echo '<li><a href="product.php?subcat_id='.$roww['subcat_id'].'&subcat_name='.$roww["subcat_name"].'">'.$roww["subcat_name"].'</a></li>';
												}?>
											</ul></li>
											
											<?php	
												
											}
											?>

		 
		
			</ul>
		
	</u>
</div>
<div class=" chain-grid menu-chain">
	   		     		<div class="grid-chain-bottom chain-watch">
			     			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- g1focus -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4116205144661782"
     data-ad-slot="1551626153"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
 <br>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- g1focus -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4116205144661782"
     data-ad-slot="1551626153"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>   		     										
	   		     		</div>
	   		     	</div>