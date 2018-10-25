<?php 
//	@include("include/session_ck.php");//添加数据
	include("../include/conn.php");
	//添加数据
		@$act = $_GET["act"];//获取功能动作 执行不同功能
			
		if($act == "add"){//执行的添加方法
		  
		    $adminName = $_POST["adminname"];
		    $adminPwd = $_POST["Adminpwd"];
		    $adminPwd_r = $_POST["Adminpwd_r"];
		    $sex = $_POST["sex"];
		    $email = $_POST["email"];
		    $phone = $_POST["phone"];
		    $tag = $_POST["tag"];
			  
			if($adminPwd != $adminPwd_r){
			  	exit("<script>alert('两次密码不一致!');window.location='admin.php';</script>");
			}
			
			//3.执行SQL语句
			$sql="insert into ite_admin(adminname,Adminpwd,sex,email,phone,tag,addtime) values('".$adminName."','".$adminPwd."','".$sex."','".$email."','".$phone."','".$tag."',now())";
			//exit($sql);
			
			$result=mysql_query($sql);
			$affected_rows=mysql_affected_rows();//获取受影响行数
			//exit($affected_rows);	
			
			 //4、判断执行结果
		  	if($result && $affected_rows){
			  exit("<script>alert('添加成功!');window.location='admin_add.php';</script>");
		  	}else{
			  exit("<script>alert('添加失败!');window.location='admin.php';</script>");
		  	}
			
	  	}elseif($act == "del"){//执行删除方法
	  	
			//删除数据
			$Id = $_GET["Id"];
			//3、执行SQL语句
			$sql = "delete from `ite_admin` where Id=".$Id.";";
			
			$result = mysql_query($sql); //执行 
			$affected_rows = mysql_affected_rows();//获取受影响行数
			
			//4、判断执行结果
			if($result && $affected_rows){
				exit("<script>alert('删除成功！');window.location.href='admin.php';</script>");
			}else{
				exit("<script>alert('删除失败！');window.location.href='admin.php';</script>");
			}
		}elseif($act=="update"){	//修改数据
			$Id = $_GET["Id"];
		    $adminName = $_POST["adminname"];
		    $adminPwd = $_POST["Adminpwd"];
		    $adminPwd_s = $_POST["Adminpwd_s"];
		    $adminPwd_old = $_POST["Adminpwd_old"];//原始密码
		    $sex = $_POST["sex"];
		    $email = $_POST["email"];
		    $phone = $_POST["phone"];
		    $tag = $_POST["tag"];
		    
		    if($adminPwd!=""){
		    	if($adminPwd_old != $adminPwd){
			  	exit("<script>alert('原始密码错误!请重试');window.location='admin.php';</script>");
			  	}
		    }
		    
			$sql = "update `ite_admin` set adminname='".$adminName."',Adminpwd='".$adminPwd_s."',sex='".$sex."',email='".$email."',phone='".$phone."',tag='".$tag."' where Id=".$Id."";
			//exit($sql);
			
			$result = mysql_query($sql); //执行 
			$affected_rows = mysql_affected_rows();//获取受影响行数
			
			//4、判断执行结果
			if($result && $affected_rows){
				exit("<script>alert('修改成功！');window.location.href='admin.php';</script>");
			}else{
				exit("<script>alert('修改失败！');window.location.href='admin.php';</script>");
			}
		}elseif($act=="delAll"){	//删除全部
//			$Id = $_POST["Id"];
//			$arr=implode(",",$Id);
			$del= @implode(",",$_POST["checkname"]);
			//3、执行SQL语句
			$sql = "delete from `ite_admin` where Id in($del)";
			//exit($sql);
			
			$result = mysql_query($sql); //执行 
			$affected_rows = mysql_affected_rows();//获取受影响行数
			
			//4、判断执行结果
			if($result && $affected_rows){
				exit("<script>alert('删除全部成功！');window.location.href='admin.php';</script>");
			}else{
				exit("<script>alert('删除全部失败！');window.location.href='admin.php';</script>");
			}
		}
		

?>