<?php
	include("../include/conn.php");//连接数据库
	$act=$_GET["act"];//获取功能动作  执行不同功能
	if($act=="del"){//执行的是删除的方法
		$Id=$_GET["Id"];
		//执行SQL语句
		$sql="delete from ite_order_detail where Id=".$Id."";
		//exit(print_r($sql));
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响行数
			
		//判断执行结果
		if($result && $affected_rows){
			exit("<script>alert('删除成功');window.location.href='my_order.php'</script>");
		}else{
			exit("<script>alert('删除失败');window.location.href='my_order.php'</script>");
		}
	}elseif($act=="dell"){//执行的是删除的方法
		$Id=$_GET["Id"];
		//执行SQL语句
		$sql="delete from ite_order_detail where Id=".$Id."";
		//exit(print_r($sql));
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响行数
			
		//判断执行结果
		if($result && $affected_rows){
			exit("<script>alert('删除成功');window.location.href='comment.php'</script>");
		}else{
			exit("<script>alert('删除失败');window.location.href='comment.php'</script>");
		}
	}elseif($act=="update"){//执行的是删除的方法
		$status=@$_POST["status"];
		$Id=$_GET["Id"];
		//执行SQL语句
		$sql="update ite_order_detail set status='4' where Id=".$Id."";
		//exit($sql);
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响行数
			
		//判断执行结果
		if($result && $affected_rows){
			exit("<script>alert('确认收货成功');window.location.href='my_order.php'</script>");
		}else{
			exit("<script>window.location.href='my_order.php'</script>");
		}
	}elseif($act=="upd"){
		$status=@$_POST["status"];
		$Id=$_GET["Id"];
		//执行SQL语句
		$sql="update ite_order_detail set status='3' where Id=".$Id."";
		//exit($sql);
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响行数
			
		//判断执行结果
		if($result && $affected_rows){
			exit("<script>alert('已发货');window.location.href='my_order.php'</script>");
		}else{
			exit("<script>window.location.href='my_order.php'</script>");
		}
	}elseif($act=="pay"){
		$status=@$_POST["status"];
		$Id=$_GET["Id"];
		//执行SQL语句
		$sql="update ite_order_detail set status='2'where Id=".$Id."";
		//exit($sql);
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响行数
			
		//判断执行结果
		if($result && $affected_rows){
			exit("<script>alert('支付成功');window.location.href='scar_buyok.php?Id=".$Id."'</script>");
		}else{
			exit("<script>window.location.href='my_order.php'</script>");
		}
	}
?>