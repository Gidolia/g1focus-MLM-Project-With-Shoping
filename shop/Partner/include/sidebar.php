<div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="index.php"><img src="../images/g.png" class="img-circle" width="75"></a></p>
                  <?php 
				  $select_name="select * from distributor where d_id=".$_SESSION[id];
				  $fghj=mysql_query($select_name) or die ("Some thing went wrong");
				  $yui=mysql_fetch_assoc($fghj);
				  echo '<h5 class="centered">'.$yui[d_name].'</h5>';
				  ?>
              	  	
                  <li class="mt">
                      <a href="index.php">
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
						  <li><a  href="downline_list.php">Downline List</a></li>
						  <li><a  href="tree">Downline Tree</a></li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-credit-card"></i>
                          <span>Payments</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="payeeprofile.php">Payee Profile</a></li>
                          <li><a  href="payments.php">Current Balance History</a></li>
                          <li><a  href="cash_history.php">CashOut History</a></li>
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
              </ul>
              <!-- sidebar menu end-->
          </div>
