<?php 
include "../config.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>G1mart Tree</title>

	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="jquery-treetable.css">
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.10/d3.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="jquery-treetable.js"></script>
	<script>
		$(function() {
			$("table").treetable();
		});
	</script>
    <style>
    body { background-color:#fbfbfb;}
    </style>
</head>
<body>
<div class="container" style="auto;">
	<h1>G1mart Downline Tree</h1>
	<table class="table table-bordered">
		<thead>
        
		</thead>
		<tbody>
        <?php
        $d_idtree=81465;                
mysql_query("CREATE TABLE treea$d_idtree(a varchar(255))");
mysql_query("CREATE TABLE treeb$d_idtree(b varchar(255))");

$sel1=mysql_query("select * from distributor where sponsor_no=".$d_idtree) or die("value not selected1");
while($fet1=mysql_fetch_assoc($sel1))
{ ?>
	    <tr>
	
			<td>
				<div class="tt" data-tt-id="<?php echo $fet1[d_id];?>" data-tt-parent=""><?php echo $fet1[d_name]."(".$fet1[d_id].")";?></div>
			</td>
                 
		</tr>
     
    <?php 
mysql_query("INSERT INTO treea$d_idtree(a) VALUES('".$fet1[d_id]."')") or die("value not inserted");
}
$sel14=mysql_query("select max(level) as max_level from level") or die("value not selected5");
$fet14=mysql_fetch_assoc($sel14);
$fetc14=$fet14[max_level];
for ($x = 0; $x <= 35; $x++)
{
$sel2=mysql_query("select a from treea$d_idtree") or die("value not selected");
while($fet2=mysql_fetch_assoc($sel2))
{
    $sel3=mysql_query("select * from distributor where sponsor_no=".$fet2[a]) or die("value not selected3");
    while($fet3=mysql_fetch_assoc($sel3))
    {
        $self3=mysql_query("select sponsor_no from distributor where d_id=".$fet3[d_id]) or die("value not selected4");
    $fetf3=mysql_fetch_assoc($self3);
    
    ?>
	    <tr>
			
			<td>
				<div class="tt" data-tt-id="<?php echo $fet3[d_id];?>" data-tt-parent="<?php echo $fetf3[sponsor_no];?>"><?php echo $fet3[d_name]."(".$fet3[d_id].")";?></div>
			</td>
            
		</tr>
     
    <?php 
	   mysql_query("INSERT INTO treeb$d_idtree(b) VALUES('".$fet3[d_id]."')") or die("value not inserted");
    }
}
mysql_query("delete from treea$d_idtree") or die ("not deleted");
$sel4=mysql_query("select b from treeb$d_idtree") or die("value not selected");
while($fet4=mysql_fetch_assoc($sel4))
{
    $sel5=mysql_query("select * from distributor where sponsor_no=".$fet4[b]) or die("value not selected");
    while($fet5=mysql_fetch_assoc($sel5))
    {
        $self5=mysql_query("select sponsor_no from distributor where d_id=".$fet5[d_id]) or die("value not selected7");
    $fetf5=mysql_fetch_assoc($self5);?>
	<tr>
			
			<td>
				<div class="tt" data-tt-id="<?php echo $fet5[d_id];?>" data-tt-parent="<?php echo $fetf5[sponsor_no];?>"><?php echo $fet5[d_name]."(".$fet5[d_id].")";?></div>
			</td>
            
		</tr>
	<?php
		mysql_query("INSERT INTO treea$d_idtree(a) VALUES('".$fet5[d_id]."')") or die("value not inserted");
    }
	
}
mysql_query("delete from treeb$d_idtree") or die ("not deleted");
}
mysql_query("drop table if exists treea$d_idtree");
mysql_query("drop table if exists treeb$d_idtree");
?>    
	   
                      
		</tbody>
	</table>
</div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>