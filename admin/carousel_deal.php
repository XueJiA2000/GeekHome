<?php
	require("../include/conn.php");
	
	$act=$_GET["act"]; //获取功能动作 执行不同功能
	
	if($act=="add"){
		$subtitle=$_POST["subtitle"];
		$headlines=$_POST["headlines"];
		$originalPrice=$_POST["originalPrice"];
		$presentPrice=$_POST["presentPrice"];
		$synopsis=$_POST["synopsis"];
		
		$writerTime=date('y-m-d h:i:s');
		
		
		
		//上传图片
		if($_FILES["upfile"]["name"]){//判断有没有图片
		
		if($_FILES["upfile"]["error"]>0){//判断是否有错误
			echo "<script>alert('上传失败，错误代码".$_FILES["upfile"]["error"].",请检查！');history.go(-1);</script>";
		}else{
				
				$Ext="jpg|png|gif|jpeg";//定义允许的文件后缀
				
				$fileExtArr=explode(".",$_FILES["upfile"]["name"]);//分割文件名字
				$fileExt=$fileExtArr[count($fileExtArr)-1];//得到后缀		
				
				//exit($fileExt);
				
				if(!strstr($Ext,$fileExt)){
					exit("<script>alert('非法文件后缀！');history.go(-1);</script>");
				}
			
			if(is_uploaded_file($_FILES["upfile"]["tmp_name"])){//防止黑客攻击， 是否是上传的文件
			
				$dirName="upload/".date("ymd");//先在新建一个upload文件夹
				if(!is_dir($dirName)){//判断是否存在  再创建目录
					mkdir($dirName);
				}

				$fileName=$dirName."/".time().mt_rand(100000,999999).".".$fileExt;//防止同名替换
				
				if(move_uploaded_file($_FILES["upfile"]["tmp_name"],$fileName)){
					echo "<script>alert('上传成功！');</script>";
				}else{
					echo "<script>alert('上传失败！');history.go(-1);</script>";
				}
				
			}else{
				echo "<script>alert('非法来源文件！');history.go(-1);</script>";
			}
		}
	}
		
		//执行sql语句
		$sql="insert into `ite_carousel`(subtitle,headlines,originalPrice,presentPrice,fileName,synopsis,writerTime) values ('".$subtitle."','".$headlines."','".$originalPrice."','".$presentPrice."','".@$fileName."','".$synopsis."','".$writerTime."')";
		
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响的行数
		
		if($result && $affected_rows){
			exit("<script>alert('添加成功！');window.location.href='carousel_add.php';</script>");
		}else{
			exit("<script>alert('添加失败！');window.location.href='carousel_add.php';</script>");	
		}
		
		
	}elseif($act=="update"){//执行的是修改方法
		$subtitle=$_POST["subtitle"];
		$headlines=$_POST["headlines"];
		$originalPrice=$_POST["originalPrice"];
		$presentPrice=$_POST["presentPrice"];
		$synopsis=$_POST["synopsis"];
		$writerTime=date('y-m-d h:i:s');
		
		$Id=$_POST["Id"];
		//$Id=@$_GET["Id"];//获取表单传过来的值
		
		$upfile=@$_POST["upfile"];
		$upfile_r=$_POST["upfile_r"];
		
		//上传图片
		if($_FILES["upfile"]["name"]){//判断有没有图片
		
		if($_FILES["upfile"]["error"]>0){//判断是否有错误
			echo "<script>alert('上传失败，错误代码".$_FILES["upfile"]["error"].",请检查！');history.go(-1);</script>";
		}else{
				
				$Ext="jpg|png|gif|jpeg";//定义允许的文件后缀
				
				$fileExtArr=explode(".",$_FILES["upfile"]["name"]);//分割文件名字
				$fileExt=$fileExtArr[count($fileExtArr)-1];//得到后缀		
				
				//exit($fileExt);
				
				if(!strstr($Ext,$fileExt)){
					exit("<script>alert('非法文件后缀！');history.go(-1);</script>");
				}
			
			if(is_uploaded_file($_FILES["upfile"]["tmp_name"])){//防止黑客攻击， 是否是上传的文件
			
				$dirName="upload/".date("ymd");//先在新建一个upload文件夹
				if(!is_dir($dirName)){//判断是否存在  再创建目录
					mkdir($dirName);
				}

				$fileName=$dirName."/".time().mt_rand(100000,999999).".".$fileExt;//防止同名替换
				//exit($fileName);
				$upfile=$fileName;
				if(move_uploaded_file($_FILES["upfile"]["tmp_name"],$fileName)){
					echo "<script>alert('上传成功！');</script>";
				}else{
					echo "<script>alert('上传失败！');history.go(-1);</script>";
				}
			}else{
				echo "<script>alert('非法来源文件！');history.go(-1);</script>";
			}
		}
	}
	if(@$upfile==""){
		$upfile=$upfile_r;
		//exit($fileName);
	}
		
		// 执行SQL语句
		$sql="update ite_carousel set subtitle='".$subtitle."',headlines='".$headlines."',originalPrice='".$originalPrice."',presentPrice='".$presentPrice."',fileName='".$upfile."',synopsis='".$synopsis."',writerTime='".$writerTime."' where Id=".$Id."";
		//exit($sql);
		
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响行数
		if($result && $affected_rows){//如果受影响行数大于0则添加成功
			exit("<script>alert('修改成功！');window.location.href='carousel_update.php?Id=".$Id."'</script>");
		}else{
			exit("<script>alert('修改失败！');window.location.href='carousel_update.php?Id=".$Id."'</script>");	
		}
		
	}elseif($act=="delect"){
		
		$Id=@$_GET["Id"];//获取功能动作  执行不同功能
		// 执行SQL语句
		$sql="delete from `ite_carousel` where `Id`=".$Id."";
		//exit($sql);
		
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响行数
		if($result && $affected_rows){//如果受影响行数大于0则添加成功
			exit("<script>alert('删除成功！');window.location.href='carousel.php'</script>");
		}else{
			exit("<script>alert('删除失败！');window.location.href='carousel.php'</script>");	
		}

	}elseif($act=="delAll"){//执行的全部删除方法
		
		//$adminId=$_POST["checkname"];
		$del=implode(",",$_POST["checkname"]);

		// 执行SQL语句
		$sql="delete from ite_carousel where Id in($del)";
		//exit($sql);
		
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响行数
		if($result && $affected_rows){//如果受影响行数大于0则添加成功
			exit("<script>alert('删除全部成功！');window.location.href='carousel.php'</script>");
		}else{
			exit("<script>alert('删除全部失败！');window.location.href='carousel.php'</script>");
		}
		
	}
	
	
?>