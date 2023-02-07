<!DOCTYPE html>
<?php include "../config.php";?>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<title>User profile</title>
<!-- Bootstrap core CSS -->
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/js/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">

    <script src="../assets/js/jquery.js"></script>

<style type="text/css">



.load-more {
margin: 15px 25px;
cursor: pointer;
padding: 10px 0;
text-align: center;
font-weight:bold;
}

</style>
<script src="jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(window).scroll(function(){
		var lastID = $('.load-more').attr('lastID');
		if ($(window).scrollTop() == $(document).height() - $(window).height() && lastID != 0){
			$.ajax({
				type:'POST',
				url:'getData.php?d_id=<?php echo $_GET[d_id];?>',
				data:'id='+lastID,
				beforeSend:function(html){
					$('.load-more').show();
				},
				success:function(html){
					$('.load-more').remove();
					$('#postList').append(html);
				}
			});
		}
	});
});
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            	   results = xmlhttp.responseText.split(",");
            	   
            	    
                   
                   

                    document.getElementById("txtHint").innerHTML = 'friends Request send';
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}

</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script type="text/javascript">
function toggleDiv(elementId, button, textOn, textOff) {
  var style = document.getElementById(elementId).style;
  if( style.display == "none" ) {
    style.display = "block";
    button.innerHTML = textOn;
    $.ajax({
        url: "like.php",
        type: "GET", // or GET whatever but POST is usually better
        data: { q: elementId },
        success: function(textout) {
            if (textout.status == '1') {
           
            }
        }
    });
  } else {
    style.display = "none";
    button.innerHTML = textOff;
    $.ajax({
        url: "like.php",
        type: "GET", // or GET whatever but POST is usually better
        data: { q: elementId },
        success: function(textout) {
            if (textout.status == '1') {
           
            }
        }
    });
  }
}
function share(str) {
 $.ajax({
        url: "share.php",
        type: "GET", // or GET whatever but POST is usually better
        data: { q: str },
        success: function(textout) {
            if (textout.status == '1') {
           
            }
        }
    });
    alert("Photo share in your timeline");
}

</script>
</head>
<body>

<?php
//Include DB configuration file
include('dbConfig.php');
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="post-list" id="postList">
			<?php
			//get rows query
			
		                            
		             
		        
		                            <?php
			$query = $db->query("SELECT * FROM post ORDER BY id DESC LIMIT 7");
			
			if($query->num_rows > 0){ 
				while($row = $query->fetch_assoc()){ 
                    $postID = $row["id"];
            
            				if($row[type]=='1'){$type='
			<div class="col-lg-4 col-md-6">
				<div class="project-wrapper">
		                    <div class="project">
		                      <div class="photo-wrapper">
		                            <div class="photo">
		                            	<a class="fancybox" href="../'.$row[photo].'"><img class="img-responsive" src="../'.$row[photo].'" alt="" height="300" width="100%"></a>
		                            </div>
		                            <div class="overlay"></div>
		                        </div>
		                      </div>
		                  </div>
		         </div>';}
				elseif($row[type]=='2'){
				$type='<img src="../../shop/images/g.png" class="img-circle" width="50">';}
				elseif($row[type]=='3'){$type=$row['written'];}
				$df=$db->query("SELECT d_name,profile_pic FROM `distributor` WHERE `d_id`=$row[d_id]")or die("sorry some error occour");
				$dff=$df->fetch_assoc();
				if($dff[profile_pic]=="")
		                            {$fn="../shop/images/g.png";}
		                            else{$fn=$dff[profile_pic];}?>
				
				<div class="row mt">
          			<div class="col-lg-12">
				<div class="content-panel">
				
				<p class="col-md-1"><a href="../post.php?<?php echo $row[d_id];?>" target="_parent"><img src="../<?php echo $fn;?>" class="img-circle" width="50"><b><?php echo $dff[d_name];?> </b></a></p>

				<?php 
                 $postID = $row[id];
                 }
                
	?>
           	 	<div class="list-item"><a href="javascript:void(0);"><h2><?php echo $type; ?></h2></a></div>
    
	
	
</div></div></div>
           	 	
            <?php } ?>
            <div class="load-more" lastID="<?php echo $postID; ?>" style="display:<?php echo $dis;?>;">
                <img src="loading.gif"/>
            </div>
            <?php } ?>
            </div>
        </div>
    </div>
</div>
	<script src="../assets/js/fancybox/jquery.fancybox.js"></script>    
    <script src="../assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="../assets/js/common-scripts.js"></script>

    <!--script for this page-->
  
  <script type="text/javascript">
      $(function() {
        //    fancybox
          jQuery(".fancybox").fancybox();
      });

  </script>
  
  <script>
      //custom select box

      $(function(){
          $("select.styled").customSelect();
      });

  </script>
</body>
</html>

