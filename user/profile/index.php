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
function cancelfriend(str) {
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
            	   
            	    
                   
                   

                    document.getElementById("txtHint").innerHTML = 'ADD FRIEND';
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
function friend(elementId, button, textOn, textOff) {
  var style = document.getElementById(elementId).style;
  if( style.display == "none" ) {
    style.display = "block";
    button.innerHTML = textOn;
    $.ajax({
        url: "getuser.php",
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
        url: "getuser.php",
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
			$df=$db->query("SELECT * FROM `distributor` WHERE `d_id`=$_GET[d_id]")or die("sorry some error occour");
				$dff=$df->fetch_assoc();
				if($dff[profile_pic]=="")
		                            {$fn="../shop/images/g.png";}
		                            else{$fn=$dff[profile_pic];}?>
		                            
		             <div class="row mt">
          			<div class="col-lg-2 mb">
					<div class="content-panel pn">
						<div class="project-wrapper">
				                    <div class="project centered">  
				                            	<a class="fancybox" href="../<?php 
				                            	echo $fn;?>"><img class="img-circle" src="../<?php echo $fn;?>" alt="Profile pic" height="160" width="150"></a>
				                            <div class="overlay"></div>
				                    </div>
				                </div>
			                </div>
			        </div>
			      
          			<div class="col-lg-2 col-md-4 col-sm-4 mb">
					<div class="content-panel">
						<div class="project-wrapper">
				                    <div class="project centered">  
				                    <div id="centered">
				                          <h3><i class="fa fa-angle-right"></i> <?php echo $dff[d_name];?></h3>
				                          
				                          <i class="fa fa-map-marker"></i>&nbsp; Lives in <?php echo $dff[city];?><br>
				                          <i class="fa fa-heart"></i>&nbsp; <?php echo $dff[life_status];?><br>
				                          
				                          <i class="fa fa-map-marker"></i>&nbsp; From <?php echo $dff[city];?>
				                          
				                      </div>   
				                          
				                            <div class="overlay"></div>
				                    </div>
				                </div>
				      <?php $fre=mysql_query("SELECT * FROM `friends` WHERE `d_id`='$_SESSION[id]' AND `fr_d_id`='$_GET[d_id]';");
				      if(mysql_num_rows($fre)>0){ $lk="Unfriend";} else{$lk="friend"; } ?> <button name="info"  class="profile-01 centered" onclick="friend('<?php echo $_GET[d_id];?>', this, 'Unfriend', 'Friend')"> <?php echo $lk;?>
									
								</button>
			                </div>
			        </div>
			      </div>
			      <div class="col-lg-2 col-md-4 col-sm-4 mb">
					<div class="content-panel">
						<div class="project-wrapper">
				                    <div class="project centered">  
				                    
				                </div>
				                <div class="profile-01 centered" onClick="showUser(<?php echo $dff[d_id];?>)">
									<p id='txtHint'>ADD TO FRIEND</p>
								</div>
			                </div>
			        </div>
			      </div>
			      
		        
		                            <?php
			$query = $db->query("SELECT * FROM post WHERE `d_id`=$_GET[d_id] ORDER BY id DESC LIMIT 7");
			
			if($query->num_rows > 0){ 
				while($row = $query->fetch_assoc()){ 
                    $postID = $row["id"];
            
            				if($row[type]=='1'){$pos="post photo";
            				$type='
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
				elseif($row[type]=='2'){$pos="share other post";
				$querys = $db->query("SELECT * FROM post WHERE `id`='$row[share]'")or die("sorry shre post not selected");
			
			
				while($rows = $querys->fetch_assoc()){
				if($rows[type]=='1'){$type='
			<div class="col-lg-4 col-md-6">
				<div class="project-wrapper">
		                    <div class="project">
		                      <div class="photo-wrapper">
		                            <div class="photo">
		                            	<a class="fancybox" href="../'.$rows[photo].'"><img class="img-responsive" src="../'.$rows[photo].'" alt="" height="300" width="100%"></a>
		                            </div>
		                            <div class="overlay"></div>
		                        </div>
		                      </div>
		                  </div>
		         </div>';}
				elseif($rows[type]=='3'){$type=$rows[written]; $pos="write post";}
				}
				
				}
				elseif($row[type]=='3'){$type=$row['written'];}
				$df=$db->query("SELECT d_name,profile_pic FROM `distributor` WHERE `d_id`=$row[d_id]")or die("sorry some error occour");
				$dff=$df->fetch_assoc();
				if($dff[profile_pic]=="")
		                            {$fn="../shop/images/g.png";}
		                            else{$fn=$dff[profile_pic];}?>
				
				<div class="row mt">
          			<div class="col-lg-12">
				<div class="content-panel">
				
				<p class="col-md-1"><a href="../post.php?<?php echo $row[d_id];?>" target="_parent"><img src="../<?php echo $fn;?>" class="img-circle" width="50"><b><?php echo $dff[d_name];?> </b><?php echo $pos;?></a></p>

				<?php 
                 $postID = $row[id];
                
	?>
           	 	<div class="list-item"><a href="javascript:void(0);"><h2><?php echo $type; ?></h2></a></div>
    
	<div>
	<?php
	 $mn=mysql_query("SELECT COUNT(id) as `num_rows` FROM `post_like` WHERE `post_id`='$row[id]'")or die("counting not done");
	 $mh=mysql_query("SELECT d_id FROM `post_like` WHERE `post_id`='$row[id]'")or die("counting not done");
	 $fet_count=mysql_fetch_assoc($mn);
	$res=mysql_query("SELECT * FROM `post_like` WHERE `d_id`='$_SESSION[id]' AND `post_id`='$row[id]';")or die("sorry some error occour");
	$c=mysql_num_rows($res);
	if($c!=0)
	{ $lk="Unlike";$dis="block";}else{$lk="Like";$dis="none";}?>
	<button name="info" onclick="toggleDiv('<?php echo $row[id];?>', this, 'Unlike', 'Like')"><i class="fa fa-thumbs-up"></i>&nbsp;<?php echo $lk;?></button>
	<button onclick="share(<?php echo $row[id];?>)"><i class="fa fa-share"></i>&nbsp;Share</button>
	<div align="left" id="<?php echo $row[id];?>" style="display: <?php echo $dis;?>;">You like this</div><abbr title="<?php
	while($r=mysql_fetch_assoc($mh)){
	$md=mysql_query("SELECT d_name FROM `distributor` WHERE `d_id`='$r[d_id]'")or die("counting not done");
	$r=mysql_fetch_assoc($md); echo $r[d_name]."\n";}?>
	"><?php if($fet_count['num_rows']!='0'){echo $fet_count['num_rows'];?>people like this<?php }?></abbr>
	</div>
	<br>
	<input type="text" name="comment" class="form-control" placeholder="Write a comment...">
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

