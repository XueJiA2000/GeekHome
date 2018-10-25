<?php
	include("conn.php");
	
	$userName=$_GET["userName"];
	
	$sql="select * from `ite_user` where username='".$userName."'";
	$result_s = mysql_query($sql);
	$result_num_s = mysql_num_rows($result_s);
	
	if($result_s && $result_num_s){
		echo 0;
	}else{
		echo 1;
	}
	
?>

