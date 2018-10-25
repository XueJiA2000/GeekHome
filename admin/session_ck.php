<?php
	include("../include/conn.php");
	if(@$_SESSION["adminname"]==""){
		exit("<script>alert('您未登录，请登录！');window.location.href='login.php';</script>");
	}
?>