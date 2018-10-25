<?php 
//	@include("include/session_ck.php");//添加数据
	include("../include/conn.php");
	//添加数据
		@$act = $_GET["act"];//获取功能动作 执行不同功能
		if($act == "del"){//执行删除方法
	  	
			//删除数据
			$Id = $_GET["Id"];
			//3、执行SQL语句
			$sql = "delete from `ite_order_detail` where Id=".$Id."";
			$result = mysql_query($sql); //执行 
			$affected_rows = mysql_affected_rows();//获取受影响行数
			
			//4、判断执行结果
			if($result && $affected_rows){
				exit("<script>alert('删除成功！');window.location.href='order_detail.php';</script>");
			}else{
				exit("<script>alert('删除失败！');window.location.href='order_detail.php';</script>");
			}
		}elseif($act=="upda"){	//修改数据
			$Id = $_GET["Id"];
		    $status = @$_POST["status"];
		    $sql = "update `ite_order_detail` set status='3' where status=2 order by Id desc limit 1";
		    //exit($sql);
			$result = mysql_query($sql); //执行 
			$affected_rows = mysql_affected_rows();//获取受影响行数
			
			//4、判断执行结果
			if($result && $affected_rows){
				exit("<script>alert('修改成功！');window.location.href='order_detail.php';</script>");
			}else{
				exit("<script>alert('修改失败！');window.location.href='order_detail.php';</script>");
			}
		  
		}elseif($act=="up"){	//修改数据
			$Id = $_GET["Id"];
		    $status = @$_POST["status"];
		    $sql = "update `ite_order_detail` set status='4' where status=3 order by Id desc limit 1";
			//exit($sql);
			$result = mysql_query($sql); //执行 
			$affected_rows = mysql_affected_rows();//获取受影响行数
			
			//4、判断执行结果
			if($result && $affected_rows){
				exit("<script>alert('修改成功！');window.location.href='order_detail.php';</script>");
			}else{
				exit("<script>alert('修改失败！');window.location.href='order_detail.php';</script>");
			}
		  
		}elseif($act=="delAll"){	//删除全部
//			$Id = $_POST["Id"];
//			$arr=implode(",",$Id);		
			$del= @implode(",",$_POST["checkname"]);
			//3、执行SQL语句
			$sql = "delete from `ite_order_detail` where Id in($del)";
			//exit($sql);
			
			$result = mysql_query($sql); //执行 
			$affected_rows = mysql_affected_rows();//获取受影响行数
			
			//4、判断执行结果
			if($result && $affected_rows){
				exit("<script>alert('删除全部成功！');window.location.href='order_detail.php';</script>");
			}else{
				exit("<script>alert('删除全部失败！');window.location.href='order_detail.php';</script>");
			}
		}
		

?>