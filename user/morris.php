<?php include "config.php";?>
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
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script type="text/javascript">
  window.onload = function () {
    var chart = new CanvasJS.Chart("chartContainer",
    {

      title:{
      text: "Your Performance Report"
      },
       data: [
      {
        type: "line",

        dataPoints: [
        <?php
         $date = '2016-02-01';
	// End date
	$end_date = date("Y-m-d");

	while (strtotime($date) <= strtotime($end_date)) {
	$fg=0;
	$source = $date;
        $datee = new DateTime($source);
        $f=$datee->format('20y/m/d');
		$sel1=mysql_query("select * from distributor where joining_date='$f'") or die("value not selected1");
		while($fet1=mysql_fetch_assoc($sel1))
		{ 
		$fg++;
		}
		echo "{ x: new Date(".$datee->format('20y').", ".$datee->format('m').", ".$datee->format('d')."), y: $fg },";
		$date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));}
		?>
     //  { x: new Date(2012, 00), y: 4 },
       // { x: new Date(2012, 01), y: 12 },
      //  { x: new Date(2012, 02), y: 5 },
       // { x: new Date(2012, 03), y: 46 },
       // { x: new Date(2012, 04), y: 45 },
       // { x: new Date(2012, 05), y: 50 },
       // { x: new Date(2012, 06), y: 48 },
       // { x: new Date(2012, 07), y: 40 },
       // { x: new Date(2012, 08), y: 4 },
       // { x: new Date(2012, 09), y: 5 },
       // { x: new Date(2012, 10), y: 48 },
        //{ x: new Date(2012, 11), y: 50 }
        ]
      }
      ]
    });

    chart.render();
  }
	</script>
	<script src="canvasjs.min.js"></script>
  </head>
  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <?php include "include/header.php";?>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
         <?php include "include/sidebar.php"; ?>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      ********************************************************************************************************************************************************** -->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          <h3><i class="fa fa-angle-right"></i> Morris Charts</h3>
              <!-- page start-->
              <div id="morris">
                  <div class="row mt">
                      <div class="col-lg-12">
                          <div class="content-panel">
                              <h4><i class="fa fa-angle-right"></i> Chart Example 1</h4>
                              <div class="panel-body">
                                  <div id="chartContainer" style="height: 400px; width: 100%;"></div>
                                  
                              </div>
                          </div>
                      </div>
                  </div>
                  
              </div>
              <!-- page end-->
          </section>
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
           <?php include "include/footer.php";?>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
   <!-- <script src="assets/js/morris-conf.js"></script>-->
   <script>
var Script = function () {

    //morris chart

    $(function () {
      // data stolen from http://howmanyleft.co.uk/vehicle/jaguar_'e'_type
      var tax_data = [
           {"period": "2017 Q1", "licensed": 3407, "sorned": 660},
           {"period": "2016 Q10", "licensed": 3407, "sorned": 660},
           {"period": "2016 Q9", "licensed": 3407, "sorned": 660},
           {"period": "2016 Q8", "licensed": 3351, "sorned": 629},
           {"period": "2016 Q7", "licensed": 3269, "sorned": 618},
           {"period": "2016 Q6", "licensed": 5000, "sorned": 661},
           {"period": "2016 Q5", "licensed": 3171, "sorned": 676},
           {"period": "2016 Q4", "licensed": 3155, "sorned": 681},
           {"period": "2016 Q3", "licensed": 100, "sorned": 0},
           {"period": "2016 Q2", "licensed": 24, "sorned": 2},
           {"period": "2016 Q1", "licensed": 20, "sorned": 7}
      ];
      Morris.Line({
        element: 'hero-graph',
        data: tax_data,
        xkey: 'period',
        ykeys: ['licensed', 'sorned'],
        labels: ['Licensed', 'Off the road'],
        lineColors:['#4ECDC4','#ed5565']
      });

      Morris.Donut({
        element: 'hero-donut',
        data: [
          {label: 'Jam', value: 25 },
          {label: 'Frosted', value: 40 },
          {label: 'Custard', value: 25 },
          {label: 'Sugar', value: 10 }
        ],
          colors: ['#3498db', '#2980b9', '#34495e'],
        formatter: function (y) { return y + "%" }
      });


      Morris.Area({
        element: 'hero-area',
        data: [
          {period: '2010 Q1', iphone: 20, ipad: 5, itouch: null},
          {period: '2010 Q2', iphone: 30, ipad: 8, itouch: null},
          {period: '2010 Q3', iphone: 25, ipad: 15, itouch: null},
          {period: '2010 Q4', iphone: 0, ipad: 0, itouch: null},
          {period: '2011 Q1', iphone: 0, ipad: 0, itouch: null},
          {period: '2011 Q2', iphone: 0, ipad: 0, itouch: null},
          {period: '2011 Q3', iphone: 0, ipad: 0, itouch: null},
          {period: '2011 Q4', iphone: 1, ipad: 1, itouch: null},
          {period: '2012 Q1', iphone: 2, ipad: 0, itouch: null},
          {period: '2012 Q2', iphone: 0, ipad: 0, itouch: null}
        ],

          xkey: 'period',
          ykeys: ['iphone', 'ipad', 'itouch'],
          labels: ['iPhone', 'iPad', 'iPod Touch'],
          hideHover: 'auto',
          lineWidth: 1,
          pointSize: 5,
          lineColors: ['#4a8bc2', '#ff6c60', '#a9d86e'],
          fillOpacity: 0.5,
          smooth: true
      });

      Morris.Bar({
        element: 'hero-bar',
        data: [
          {device: 'iPhone', geekbench: 136},
          {device: 'iPhone 3G', geekbench: 137},
          {device: 'iPhone 3GS', geekbench: 275},
          {device: 'iPhone 4', geekbench: 100},
          {device: 'iPhone 4S', geekbench: 655},
          {device: 'iPhone 5', geekbench: 1571}
        ],
        xkey: 'device',
        ykeys: ['geekbench'],
        labels: ['Geekbench'],
        barRatio: 0.4,
        xLabelAngle: 35,
        hideHover: 'auto',
        barColors: ['#ac92ec']
      });

      new Morris.Line({
        element: 'examplefirst',
        xkey: 'year',
        ykeys: ['value'],
        labels: ['Value'],
        data: [
          {year: '2008', value: 20},
          {year: '2009', value: 10},
          {year: '2010', value: 5},
          {year: '2011', value: 5},
          {year: '2012', value: 20}
        ]
      });

      $('.code-example').each(function (index, el) {
        eval($(el).text());
      });
    });

}();

</script>

    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
