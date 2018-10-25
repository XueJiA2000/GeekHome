<?php
	include("conn.php");
	if(@$_SESSION["adminname"]==""){
		exit("<script>alert('您未登录后台帐号，请登录！');window.location.href='./login.php';</script>");
	}
?>