<?php
	include("../include/conn.php");
	$act=$_GET["act"];//获取URL传来的值 用来做功能判断 

	if($act=="login"){//执行登录功能
		$username=$_POST["username"];
		$password=$_POST["password"];
		
		$sql="select * from ite_user where username='".$username."' and password='".$password."' ";
		//exit($sql);
		$result=mysql_query($sql);
		
		$result_num=mysql_num_rows($result);
		
		if($result&&$result_num){
			
			$_SESSION["username"]= $username;
			
			exit("<script>alert('登录成功！');window.location.href='../index.php';</script>");
			
		}else{
			exit("<script>alert('登录失败！用户名或密码错误');window.location.href='../login.php';</script>");
		}
		
	}else if($act=="out"){//执行登录功能
		session_unset();
		session_destroy();
		unset($_SESSION['username']);
		unset($_SESSION['productId']);
		unset($_SESSION['productNum']);

		
		exit("<script>alert('退出成功！');window.location.href='../index.php';</script>");	

	}
?>