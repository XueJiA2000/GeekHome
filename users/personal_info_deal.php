<?php
	include("../include/conn.php");//连接数据库

	$act=$_GET["act"];//获取功能动作  执行不同功
	if($act=="update"){//执行的是修改方法
		$username=$_POST["username"];
		$password=$_POST["password"];
		$phone=$_POST["phone"];
		$email=$_POST["email"];
		$sex=$_POST["sex"];
		$marriage=$_POST["marriage"];
		$address=$_POST["address"];
		$Id=$_GET["Id"];
		//执行SQL语句
		$sql="update ite_user set username='".$username."',sex='".$sex."',password='".$password."',phone='".$phone."',email='".$email."',email='".$email."',password='".$password."',marriage='".$marriage."',address='".$address."' where Id=".$Id."";
		//exit($sql);
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响行数
		
		//判断执行结果
		if($result && $affected_rows){
			exit("<script>alert('修改成功');window.location.href='personal_info.php'</script>");
		}else{
			exit("<script>alert('修改失败');window.location.href='personal_info.php'</script>");
		}
	}
	?>