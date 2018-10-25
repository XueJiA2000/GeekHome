
<?php
	include("conn.php");
	$act=$_GET["act"];//获取URL传来的值 用来做功能判断 
	
	//用户注册处理
	if($act=="add"){	//执行添加功能
		$userName = $_POST["userName"];
	    $userPwd = $_POST["userPwd"];
		$tel = $_POST["phone"];

		//	执行SQL语句
		
		$sql="insert into ite_user(username,password,phone,regtime) values('".$userName."','".$userPwd."','".$tel."',now())";
		//exit($sql);
		
		$result=mysql_query($sql);
		$affected_rows=mysql_affected_rows();//获取受影响行数
		//exit($affected_rows);
		
		//	判断执行结果
		if($result && $affected_rows){
			exit("<script>alert('恭喜你！注册成功，快去登录吧！');window.location.href='../login.php';</script>");
		}else{
			exit("<script>alert('注册失败!请重试！');window.location.href='../register.php';</script>");
		}
	}
?>