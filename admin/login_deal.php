<?php 
	include("../include/conn.php");//链接数据库
	
	$act = $_GET["act"];//获取功能动作 执行不同功能
		
	if($act == "login"){//执行的添加方法
	    $adminName = $_POST["adminname"];
	    $adminPwd = $_POST["Adminpwd"];
		$code = $_POST["code"];
		
		/*验证码判断*/
		if(strtolower($code)!=strtolower($_SESSION["code"])){
			exit("<script>alert('验证码错误！');window.location.href='login.php';</script>");
		}
	
		$sql = "select * from ite_admin where adminname='".$adminName."' and  Adminpwd='".$adminPwd."'";
		
		$result = mysql_query($sql);//执行
		$result_num = mysql_num_rows($result);
		
		if($result && $result_num){
			
			$_SESSION["adminname"] = $adminName;//SESSION赋值
			
			exit("<script>alert('登录成功！');window.location.href='index.php';</script>");
		}else{
			exit("<script>alert('登录失败！账号或密码错误！');window.location.href='login.php';</script>");
			}
	}elseif($act=="out"){
		session_unset();
		session_destroy();//注销session
		
		exit("<script>alert('退出成功！');window.location.href='login.php';</script>");
	}
	
?>