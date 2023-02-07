<?php
if(isset($_POST["id"]) && !empty($_POST["id"])){
include "../config.php";
//Include DB configuration file
include('dbConfig.php');

//Get last ID
$lastID = $_POST['id'];
$d_id=$_GET[d_id];
//Limit on data display
$showLimit = 2;

//Get all rows except already displayed
$queryAll = $db->query("SELECT COUNT(*) as num_rows FROM post WHERE d_id=".$d_id." AND id < ".$lastID." ORDER BY id DESC");
$rowAll = $queryAll->fetch_assoc();
$allNumRows = $rowAll['num_rows'];

//Get rows by limit except already displayed
$query = $db->query("SELECT * FROM post WHERE d_id=".$d_id." AND id < ".$lastID." ORDER BY id DESC LIMIT ".$showLimit);

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
				elseif($row[type]=='2'){$querys = $db->query("SELECT * FROM post WHERE `id`='$row[share]'")or die("sorry shre post not selected");
			
			
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
		                            else{$fn=$dff[profile_pic];}
				?>
				<div class="row mt">
          			<div class="col-lg-12">
				<div class="content-panel">
				<p class="col-md-1"><a href="../post.php?d_id=<?php echo $row[d_id]; ?>" target="_parent"><img src="../<?php echo $fn;?>" class="img-circle" width="50"><b><?php echo $dff[d_name];?> </b></a></p>

				<?php 
                    $postID = $row[id];
            ?>

        <div class="list-item"><a href="javascript:void(0);"><h2><?php echo $type; ?></h2></a></div>
      <div>
	<?php $res=mysql_query("SELECT * FROM `post_like` WHERE `d_id`='$_SESSION[id]' AND `post_id`='$row[id]';")or die("sorry some error occour");
	$c=mysql_num_rows($res);
	if($c!=0)
	{ $lk="Unlike";$dis="block";}else{$lk="Like";$dis="none";}?>
	<button name="info" onclick="toggleDiv('<?php echo $row[id];?>', this, 'Unlike', 'Like')"><i class="fa fa-thumbs-up"></i>&nbsp;<?php echo $lk;?></button>
	<button onclick="share(<?php echo $row[id];?>)"><i class="fa fa-share"></i>&nbsp;Share</button>
	<div align="left" id="<?php echo $row[id];?>" style="display: <?php echo $dis;?>;">You like this</div>
	</div>
	</div></div></div>
<?php } ?>
<?php if($allNumRows > $showLimit){ ?>
    <div class="load-more" lastID="<?php echo $postID; ?>" style="display: none;">
        <img src="loading.gif"/>
    </div>
<?php }else{ ?>
    <div class="load-more" lastID="0">
        That's All!
    </div>
<?php }
    }else{ ?>
    <div class="load-more" lastID="0">
        That's All!
    </div>
<?php
    }
}
?>