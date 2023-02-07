  <header id="fh5co-header" role="banner">
    
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header"> 
            <!-- Mobile Toggle Menu Button -->
            <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#fh5co-navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
            <a class="navbar-brand" href="index.php"><img src="images/logo.png" width="210" height="66"></a>
          </div>
          <div id="fh5co-navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            
              <li <?php if($_GET[a]==1){echo "class='active'";}?>><a href="index.php?a=1">Home Page</a></li>
              <li <?php if($_GET[a]==2){echo "class='active'";}?>><a href="plan.php?a=2">Plan</a></li>
			  <li <?php if($_GET[a]==3){echo "class='active'";}?>><a href="contact.php?a=3">Contact</a></li>
			  <li <?php if($_GET[a]==4){echo "class='active'";}?>><a href="meeting_info.php?a=4">Meeting</a></li>
			  <li <?php if($_GET[a]==5){echo "class='active'";}?>><a href="form.php?a=5">Distributor Form</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="http://www.gidolia.com/g1focus/user/index.php?time=7" class="btn btn-calltoaction btn-primary">Login</a></li>
			  <li>&nbsp;</li>
			  <li><a href="http://www.gidolia.com/g1focus/shop" class="btn btn-calltoaction btn-primary"  style=" background:#003366">Shop</a></li>
            </ul>
          </div>
        </div>
      </nav>

  </header>
