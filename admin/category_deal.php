<?php
	require("../include/conn.php");
	
	$act=$_GET["act"]; //获取功能动作 执行不同功能
	
	if($act=="add"){
		$categoryName=$_POST["categoryName"];
		$sortPosition=$_POST["sortPosition"];
		$addPerson=$_POST["addPerson"];

		$categoryTime=date('y-m-d h:i:s');

		//执行sql语句
		$sql="insert into `ite_category`(categoryName,sortPosition,addPerson,categoryTime) values ('".$categoryName."','".$sortPosition."','".$addPerson."','".$categoryTime."')";
		//exit($sql);
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响的行数
		
		if($result && $affected_rows){
			exit("<script>alert('添加成功！');window.location.href='category_add.php';</script>");
		}else{
			exit("<script>alert('添加失败！');window.location.href='category_add.php';</script>");	
		}
		
		
	}elseif($act=="update"){//执行的是修改方法
		$categoryName=$_POST["categoryName"];
		$sortPosition=$_POST["sortPosition"];
		$addPerson=$_POST["addPerson"];

		$categoryTime=date('y-m-d h:i:s');
		
		$Id=$_POST["Id"];
		//$Id=@$_GET["Id"];//获取表单传过来的值

		// 执行SQL语句
		$sql="update ite_category set categoryName='".$categoryName."',sortPosition='".$sortPosition."',addPerson='".$addPerson."',categoryTime='".$categoryTime."' where Id=".$Id."";
		//exit($sql);
		
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响行数
		if($result && $affected_rows){//如果受影响行数大于0则添加成功
			exit("<script>alert('修改成功！');window.location.href='category_update.php?Id=".$Id."'</script>");
		}else{
			exit("<script>alert('修改失败！');window.location.href='category_update.php?Id=".$Id."'</script>");	
		}
		
	}elseif($act=="delect"){
		
		$Id=@$_GET["Id"];//获取功能动作  执行不同功能
		// 执行SQL语句
		$sql="delete from `ite_category` where `Id`=".$Id."";
		//exit($sql);
		
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响行数
		if($result && $affected_rows){//如果受影响行数大于0则添加成功
			exit("<script>alert('删除成功！');window.location.href='category.php'</script>");
		}else{
			exit("<script>alert('删除失败！');window.location.href='category.php'</script>");	
		}

	}elseif($act=="delAll"){//执行的全部删除方法
		
		//$adminId=$_POST["checkname"];
		$del=implode(",",$_POST["checkname"]);

		// 执行SQL语句
		$sql="delete from ite_category where Id in($del)";
		//exit($sql);
		
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响行数
		if($result && $affected_rows){//如果受影响行数大于0则添加成功
			exit("<script>alert('删除全部成功！');window.location.href='category.php'</script>");
		}else{
			exit("<script>alert('删除全部失败！');window.location.href='category.php'</script>");
		}
		
	}
	
	
?>