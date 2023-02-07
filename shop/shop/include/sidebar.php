<div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="index.php"><img src="../images/g.png" class="img-circle" width="75"></a></p>
                  <?php 
				  $select_name="select * from shop where shop_id=".$_SESSION[shop_id];
				  $fghj=mysql_query($select_name) or die ("Some thing went wrong");
				  $yui=mysql_fetch_assoc($fghj);
				  echo '<h5 class="centered">'.$yui[shop_id].'</h5>';
				  
				  ?>
              	  	
                  <li class="mt">
                      <a href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                   <li class="ml">
                      <a href="bill/bills.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Bill Counter</span>
                      </a>
                  </li>
				  <li class="ml">
                      <a href="delivery.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Delivery Info</span>
                      </a>
                  </li>
                  <li class="ml">
                      <a href="pending_delivery.php">
                          <i class="fa fa-dashboard"></i>
                          <span>cuted Bill</span>
                      </a>
                  </li>


                 
                  
		 <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cog"></i>
                          <span>Shop Product</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="out_of_stock_list.php">Product out of list</a></li>
                          <li><a  href="changepass.php">Change Password</a></li>
                          <li><a href="shop_product.php">Shop product List</a></li>
                          <li><a href="shop_product_unfound.php">product over</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cog"></i>
                          <span>Distributor info</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="distributor.php">Distributor List</a></li>
                          <li><a  href="customer_info_edit.php">banking</a></li>
                          <li><a href="rd_fd_calculator.php">RD FD Calculator</a></li>
                          
                      </ul>
                  </li>
              </ul>
              
              <!-- sidebar menu end-->
          </div>
