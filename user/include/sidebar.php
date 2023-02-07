<div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              <?php $select_name='select * from distributor where d_id='.$_SESSION[id];
				  $fghj=mysql_query($select_name) or die ("Some thing went wrong");
				  $yui=mysql_fetch_assoc($fghj);
				  if($yui[profile_pic]=="")
		                            {$fn="../shop/images/g.png";}
		                            else{$fn=$yui[profile_pic];}?>
              	  <p class="centered"><a href="sn_profile.php"><img src="<?php echo $fn;?>" class="img-circle" width="75"></a></p>
                  <?php 
				  
				  
				  echo '<h5 class="centered">'.$yui[d_name].'</h5>';
				  ?>
              	  	
                  <li class="mt">
                      <a href="index.php?time=7">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-sitemap"></i>
                          <span>Bussiness Team</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="bv.php">Bussiness Volume</a></li>
						  <li><a  href="downline_list.php?downline=1">Downline List</a></li>
						  <li><a  href="tree">Downline Tree</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="pending_delivery.php" >
                          <i class="fa fa-shopping-cart"></i>
                          <span>BV History</span>
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-credit-card"></i>
                          <span>Payments/Credit Balance</span>
                      </a>
                      <ul class="sub">
                      <li><a  href="transtion.php">Banking / credit </a></li>
                      	  <li><a  href="payments.php">commision</a></li>
                      	  <li><a  href="rd_fd.php">Deposits</a></li>
                          <li><a  href="payeeprofile.php">Payee Profile</a></li>
                          <li><a  href="transtion.php">Current Balance History</a></li>
                          
                      </ul>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cog"></i>
                          <span>My Account</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="myaccount.php">Account Info</a></li>
                          <li><a  href="changepass.php">Change Password</a></li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="task.php" >
                          <i class="fa fa-dashboard"></i>
                          <span>Assignment</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="form.php" >
                          <i class="fa fa-dashboard"></i>
                          <span>Register costumer</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="bid_number.php" >
                          <i class="fa fa-dashboard"></i>
                          <span>Bidding</span>
                      </a>
                  </li>
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
