<?php 
include "../config.php";
$email=mysql_query("select * from distributor where email='$_POST[email]'")or die ("value not founded");
if (mysql_num_rows($email)>0){ 
	$tyu=mysql_fetch_assoc($email);
	header("location:register_mlm.php?d_id=$r[d_id]");
}else{
$che=mysql_query("select * from distributor where mobile='$_POST[mobile]' and d_dob='$_POST[d_date]'")or die ("value not founded");
if (mysql_num_rows($che)>0){ 
	$r=mysql_fetch_assoc($che);
	header("location:register_s.php?d_id=$r[d_id]&mobile=$r[mobile]&name=$r[d_name]&dob=$r[d_dob]");
}else{
$selt=mysql_query("SELECT d_id FROM distributor WHERE d_id=$_POST[s_no]");
if (mysql_num_rows($selt)!=0)
{
	$seltt=mysql_query("SELECT d_id FROM distributor WHERE d_id=$_POST[p_no]");
	if (mysql_num_rows($seltt)!=0)
	{

		
		$resultcount=mysql_query("SELECT count(*) as total from distributor where sponsor_no=".$_POST[s_no]) or die ("not counted");
		$datacount=mysql_fetch_assoc($resultcount);
	
		if (isset($_POST[register]))
		{
			if ($_POST[password]===$_POST[cpassword])
			{ 
				if($datacount[total]<3)
				{
					
					$_SESSION[s_no]=$_POST[s_no];
					$_SESSION[p_no]=$_POST[p_no];
					$_SESSION[d_name]=$_POST[d_name];
					$_SESSION[father]=$_POST[father];
					$_SESSION[nominee_name]=$_POST[nominee_name];
					$_SESSION[dd_date]=$_POST[year]."/".$_POST[month]."/".$_POST[date];
					$_SESSION[nominee_dob]=$_POST[n_year]."/".$_POST[n_month]."/".$_POST[n_date];
					$_SESSION[d_add]=$_POST[d_add];
					$_SESSION[state]=$_POST[state];
					$_SESSION[district]=$_POST[district];
					$_SESSION[tehsil]=$_POST[tehsil];
					$_SESSION[post]=$_POST[post];
					$_SESSION[city]=$_POST[city];
					$_SESSION[pincode]=$_POST[pincode];
					$_SESSION[mobile]=$_POST[mobile];
					$_SESSION[mobile2]=$_POST[mobile2];
					$_SESSION[post]=$_POST[post];
					$_SESSION[email]=$_POST[email];
					$_SESSION[idproof]=$_POST[idproof];
					$_SESSION[addproof]=$_POST[addreassproof];
					$_SESSION[passwordn]=$_POST[password];
			
					$que="select max(d_id) as max from distributor";
						 $r=mysql_query($que) or die("query not performed");
					if($r)
					{
					  $row=mysql_fetch_array($r);  
					  $d_id=$row['max'];
					
					
					  $d_id=$d_id+1;
					  
					  $quee="select max(d_id) as max from new_form";
						 	$re=mysql_query($quee) or die("query not performed");
							if($re)
							{
							  $rowe=mysql_fetch_array($re);
							  if($rowe['max']>=$d_id)
							  {
							  						 
								  $d_id=$rowe['max']+1;
								  $r_id=$d_id;
							  }
							  else{$r_id=$d_id; }					 
							  
							}
					mysql_query("INSERT INTO `new_form` (`d_id`, `sponsor_no`, `proposor_no`) VALUES ('$d_id', '$_POST[s_no]', '$_POST[p_no]');")or die ("oops someting went wrong please try again"); 
					  
					}
						$l="select * from level where d_id=$_POST[s_no]";
					 $roww=mysql_query($l) or die ("level not generete");
					
					 $rot=mysql_fetch_assoc($roww);
					 if ($roww){
					 $level = $rot[level];
					 $level=$level + 1;
					 }         
					header("location:form_info.php?new1=1&d_id=$r_id");
				
				}else{ echo "<script>alert('person already have 3 person in his downline');
				location.href='form.php?count=3';</script>";}
			 }
		else{ echo "<script>alert('Confirm Password and Password Not match');
		location.href='form.php.php?pass=not';</script>";}
		}
	}
	else{echo "<script>alert('proposer no. you enter is not in our dictory');
			location.href='form.php.php?p_no=$_POST[p_no]';</script>";}

}
else{echo "<script>alert('sponsor no you enter is not in our dictory');
			location.href='form.php.php?s_no=$_POST[s_no]';</script>";}
}
}?>
