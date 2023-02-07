<html>
<head>
    <!--external css-->
    
        
    <!-- Custom styles for this template -->
   </head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="src/javascripts/jquery.treetable-ajax-persist.js"></script>
<script type="text/javascript" src="src/javascripts/jquery.treetable-3.0.0.js"></script>
<script type="text/javascript" src="src/javascripts/persist-min.js"></script>
<link href="src/stylesheets/jquery.treetable.css" media="all" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function(){
	$("table").agikiTreeTable({persist: true, persistStoreName: "files"});
	/*
		loadBranches: true (default: false)
			To allow autoload branches from outside set true, then
			you should add to each branch node attribute "data-path", which will be used
			as url to retrieve table. It is supposed that request returns html with table. 
			And if you use loadBranches you should manually set
			data-tt-branch to true to each branch node, so that it can be expanded.
		persist: true (default: false)
			Allows you to save current state of expanded nodes. You should
			provide persistStoreName to use it as a key to save this table states.
		
		Besides the fact that i defined own callbacks for treetable plugin, i also
		define a callback wrapper so that you can pass your own callbacks to the agikiTreeTable
		and they will be called after callback defined in agikiTreeTable.
	*/
});
</script>
<body>

<table style="border:#333 thin solid">
<thead>
<th>G1focus Your Downline Tree</th>

</thead>
<tbody>

<tr data-tt-id="<?php include "../config.php"; echo $_SESSION[id];?>" style="border:#333 thin solid"><td><?php  echo $_SESSION[id];?></td></tr>
 <?php

     //$_SESSION[id]   $d_idtree=$_SESSION[id];                
function printtree($sponsor_no)
{
	if($sponsor_no==0)
	{$tr=$_SESSION[id];}else{$tr=$sponsor_no;}
$sel1=mysql_query("select * from distributor where sponsor_no=".$tr) or die("value not selected1");
while($fet1=mysql_fetch_assoc($sel1))
{ ?>
	
	<tr data-tt-id="<?php echo $fet1[d_id];?>" data-tt-parent-id="<?php echo $tr;?>"><td><?php echo $fet1[d_name]."(".$fet1[d_id].")";?></td></tr>
	<?php
	printtree($fet1[d_id]);
}
}
 echo printtree();?>
</tbody>

</table>


</body>
</html>