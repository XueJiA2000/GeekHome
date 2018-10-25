<?php
	include("../include/conn.php");
	$act=$_GET["act"];
	if($act=="del"){//执行的是删除的方法
		$Id=$_GET["Id"];
		//执行SQL语句
		$sql="delete from ite_adress where Id=".$Id."";
		//exit(print_r($sql));
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响行数
			
		//判断执行结果
		if($result && $affected_rows){
			exit("<script>alert('删除成功');window.location.href='address.php'</script>");
		}else{
			exit("<script>alert('删除失败');window.location.href='address.php'</script>");
		}
	}
?>