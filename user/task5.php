<?php include "config.php";
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<link rel="shortcut icon" href="../images/gt.jpg" />
    <title>G1focus</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
   <script type="text/javascript">
window.onload = function() {
  var elem = document.getElementById("myBar");
  var width = 1;
    var countdownElement = document.getElementById('countdown'),
        downloadButton = document.getElementById('download'),
        seconds = 5,
        second = 0,
        interval;

    downloadButton.style.display = 'none';

    interval = setInterval(function() {
        countdownElement.firstChild.data = 'Click Next Button after (' + (seconds - second) + ' sec....)';
        width=width+20; 
      elem.style.width = width + '%'; 
        if (second >= seconds) {
        countdownElement.firstChild.data = '';
            downloadButton.style.display = 'block';
            var result = '<a href="task6.php?ses=<?php echo $a;?>" class="btn btn-primary">Next</a>';
    document.getElementById("demo").innerHTML = result;
            clearInterval(interval);
        }


        second++;
    }, 1000);
}

</script>

  </head>

  <body>
<?php include_once("../../analyticstracking.php") ?>
  
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
          		<h3><i class="fa fa-angle-right"></i>Assignment Completing 4/10</h3>
                  <div class="form-panel" style="white-space:nowrap;">
                  <br>&nbsp;<br><br>&nbsp;<?php include_once("ad.php") ?> <br>&nbsp;<br>&nbsp;
<div id="countdown"> </div>
                  


<div class="progress progress-striped active">
						  <div class="progress-bar" id="myBar"  role="progressbar" aria-valuenow="100" aria-valuemin="1" aria-valuemax="100" style="width: 1%">
						    
						  </div>
						  
						</div><div id="download"><p id="demo"></p></div>
			
   		</div>
   		<?php include_once("ad.php") ?><br>&nbsp;

	

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
