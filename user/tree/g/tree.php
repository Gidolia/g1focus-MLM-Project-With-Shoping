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
        $d_idtree=$_SESSION[id];                
function printtree($sponsor_no=0)
{
	if($sponsor_no==0)
	{$tr=0;}else{$tr=$sponsor_no;}
$sel1=mysql_query("select * from distributor where sponsor_no=".$tr) or die("value not selected1");
while($fet1=mysql_fetch_assoc($sel1))
{ ?>
	    <tr>
	
			<td>
				<div class="tt" data-tt-id="<?php echo $fet1[d_id];?>" data-tt-parent="<?php echo $tr;?>"><?php echo $fet1[d_name]."(".$fet1[d_id].")";?></div>
			</td>
                 
		</tr>
        
     
    <?php
	printtree($fet1[d_id]);
}
}
 echo printtree();?>
                      
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