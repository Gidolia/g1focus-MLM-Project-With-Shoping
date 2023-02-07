<?php include "config.php";?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>G1focus</title>
 <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">   
<style type="text/css">
#apDiv1 {
	position:absolute;
	left:25px;
	top:9px;
	width:1010px;
	height:50px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:250px;
	top:76px;
	width:1010px;
	height:271px;
	z-index:2;
}
</style>
</head>

<body>

<aside>
<div id="sidebar"  class="nav-collapse ">
<ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="../images/g.png" class="img-circle" width="75"></a></p>
              	  <h5 class="centered">Gidolia</h5>
              	  	
                  <li class="ml">
                      <a href="delivery_status.php" target="a">
                          <i class="fa fa-dashboard"></i>
                          <span>Delivery status</span>
                      </a>
                  </li>
                  <li class="ml">
                      <a href="bill.php" target="a">
                          <i class="fa fa-dashboard"></i>
                          <span>Bills</span>
                      </a>
                  </li>
                  <li class="ml">
                      <a href="add_category_subcat.php" target="a">
                          <i class="fa fa-dashboard"></i>
                          <span>ADD Category/Sub cat</span>
                      </a>
                  </li>
                  <li class="ml">
                      <a href="add_product.php" target="a">
                          <i class="fa fa-dashboard"></i>
                          <span>ADD Product</span>
                      </a>
                  </li>
                  <li class="ml">
                      <a href="product.php" target="a">
                          <i class="fa fa-dashboard"></i>
                          <span>Product</span>
                      </a>
                  </li>
                  <li class="ml">
                      <a href="shop_product.php" target="a">
                          <i class="fa fa-dashboard"></i>
                          <span>Shop Product</span>
                      </a>
                  </li>
                   <li class="ml">
                      <a href="distributor.php" target="a">
                          <i class="fa fa-android"></i>
                          <span>Distributor</span>
                      </a>
                  </li>
                  <li class="ml">
                      <a href="update_product.php" target="a">
                          <i class="fa fa-video-camera"></i>
                          <span>Update product</span>
                      </a>
                  </li>
				  <li class="ml">
                      <a href="check_clear.php" target="a">
                          <i class="fa fa-video-camera"></i>
                          <span>check clear</span>
                      </a>
                  </li>
				 
                  </ul>

</div></aside>

<div id="apDiv2"><a href="customer_info_edit.php" target="a">Costumer Bal Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="share.php" target="a">Share accounts</a><iframe name="a" height="550" width="100%"></iframe></div>
</body>
</html>