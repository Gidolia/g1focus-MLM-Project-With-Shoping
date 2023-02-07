<header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b>G1focus</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <!-- settings end -->
                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle">
                            <i class="fa fa-money"></i>
                            <!--<span class="badge bg-theme">!</span>-->
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                          
                            <li>
                               <p class="green"> <a href="transtion.php">
                                    <span class="subject">
                                    <span class="from">Current Balance</span>
          <?php $fdg=mysql_query("select kyc,bal from distributor where d_id=".$_SESSION[id]);
		  		$ser=mysql_fetch_assoc($fdg);
				?>
                                    <span class="time">Rs <?php echo $ser[bal];?></span>
                                    </span>
                                    <span class="message">
                                    </span>
                                </a></p>
                            </li>
                            <li>
                                <p class="green"></p>
                            </li>
                            <li>
                                <a href="alt.php">
                                    <span class="subject">
                                    <span class="from">Alternate Balance</span>
                                    <span class="time"><?php include 'to_bv.php';
					 $alt=alter_bal($_SESSION[id]);
					 echo $alt;?></span><br>
                                    <span class="warning">This Balance is added to current<br>
                                     balance on 26/03/2017</span>
                                    </span>
                                    <span class="message">
                                    </span>
                                </a>
                            </li>
                            <li>
                                <p class="green"></p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="subject">
                                    <span class="from">Own B.V</span>
                                    <span class="time">B.V <?php
$o_bv=find_bv($_SESSION[id]);									
echo $o_bv;

?></span><br><?php if ($o_bv<49){?><span class="warning" style="color:#F00;">You should complete  <br>minimum 50 B.V for adding<br> alternative Balance to Current Balance </span><?php }?>
                                    </span>
                                    <span class="message">
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="subject">
                                    <span class="from">Downline B.V</span>
                                    <span class="time">B.V <?php
$bv=find_under_bv($_SESSION[id]);
echo $bv;
?></span><br>
                                    <span class="warning">Final Bussiness Volume calculated<br>on 26/03/2017</span>
                                    </span>
                                    <span class="message">
                                    </span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
 t