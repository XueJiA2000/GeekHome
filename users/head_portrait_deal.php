<?php
	include("../include/conn.php");
	$act=$_GET["act"];//获取URL传来的值 用来做功能判断 
	if($act=="update"){//执行登录功
		$photo=$_POST["photo"];
		$username=@$_POST["username"];
		
		if($_FILES["upfile"]["name"]){
			if($_FILES["upfile"]["error"]>0){
				exit ("<script>alert('上传失败,错误代码".$_FILES["upfile"]["error"]."',请检查);history.go(-1)</script>");
			}else{
				//echo "书写对上传文件的处理代码";
				$Ext="jpeg|png|gif|jpg";
				$fileExtArr=explode(".",$_FILES["upfile"]["name"]);
				$fileExt=$fileExtArr[count($fileExtArr)-1];	
				//exit($fileExt);
				if(!strstr($Ext,$fileExt)){
					exit ("<script>alert('非法文件后缀');history.go(-1)</script>");	
				}
				if(is_uploaded_file($_FILES['upfile']['tmp_name'])){
					$dirName="../upload/".date("ymd");
					if(!is_dir($dirName)){
						mkdir($dirName);	
					}
					$fileName=$dirName."/".time().mt_rand(10,99).".".$fileExt;
					if(!move_uploaded_file($_FILES['upfile']['tmp_name'],$fileName)){
						
						echo "<script>alert('错误！上传失败');history.go(-1)</script>";
					}
					$fileName_url=str_replace("../","",$fileName);
				}
			}	
		}else{
			$fileName=$photo;
		}
		//执行SQL语句
		$sql="update ite_user set upfile='".$fileName_url."' where username='".$_SESSION["username"]."'";
		//$sql="update ite_user set upfile='".$fileName_url."' where userName='某某'";
		//exit($sql);
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响行数
		
		//判断执行结果
		if($result && $affected_rows){
			exit("<script>alert('修改成功');window.location.href='head_portrait.php'</script>");
		}else{
			exit("<script>alert('修改失败');window.location.href='head_portrait.php'</script>");
		}
	}
	if($act=="del"){//执行的是删除的方法
		$Id=$_GET["Id"];
		//执行SQL语句
		$sql="delete from ite_favorites where Id=".$Id."";
		//exit(print_r($sql));
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响行数
			
		//判断执行结果
		if($result && $affected_rows){
			exit("<script>alert('删除成功');window.location.href='collection.php'</script>");
		}else{
			exit("<script>alert('删除失败');window.location.href='collection.php'</script>");
		}
	}
	

?>