<?php
	header("Content-type:text/html;charset=utf-8");
	include("include/conn.php");
	$act=$_GET["act"];
	
	if($act=="comment"){//执行添加
		$Id=$_GET["Id"];
		$content=$_POST["content"];
		$upfile1=@$_POST["upfile1"];
		$upfile2=@$_POST["upfile2"];
		$upfile3=@$_POST["upfile3"];
		$username=@$_POST["username"];
		$goods_name=@$_POST["goods_name"];
		$goods_price=@$_POST["goods_price"];
		for($i=1;$i<=count($_FILES);$i++){
			if($_FILES["upfile".$i]["name"]){
	
				//判断文件是否异常
				if($_FILES["upfile".$i]["error"]>0){
					exit("<script>alert('上传错误！错误代码为".$_FILES["upfile".$i]["error"].",请检查！');history.go(-1);</script>");
					
				}
				
				$Ext="jpeg|jpg|png|gif";//允许的后缀
				
				$ExtArr=explode(".",$_FILES["upfile".$i]["name"]);
				
				$ExtName=$ExtArr[count($ExtArr)-1];//获取最后一个元素
				
				if(!strstr($Ext,$ExtName)){
					echo "<script>alert('非法文件！');history.go(-1);</script>";
					die();
				}
				
				if(is_uploaded_file($_FILES["upfile".$i]["tmp_name"])){//防止黑客用其它文件欺骗,木马进入服务器
				
					
					if(!is_dir("upload")){//创建父文件夹
						mkdir("upload");
					}
					
					$fileName="upload/".date("ymd");//创建子文件夹
					
					if(!is_dir($fileName)){
						mkdir($fileName);
					}
					
					$fileName.="/".time().mt_rand(100000,999999).".".$ExtName;
					//exit($fileName);
				
					if(move_uploaded_file($_FILES["upfile".$i]["tmp_name"],$fileName)){
						
					}else{
						
					}
				}else{
					echo "<script>alert('非法来源！');history.go(-1);</script>";
					
				}
			}
		}
		
		$sql="insert into ite_product_comment(content,upfile1,upfile2,upfile3,username,goods_name,goods_price) values('".$content."','".@$fileName."','".@$fileName."','".@$fileName."','".$username."','".$goods_name."','".$goods_price."')";
		//exit($sql);
		$result=mysql_query($sql);//执行SQL语句
		$affect_rows=mysql_affected_rows();//获取影响行数
		
		if($result && $affect_rows){
			exit("<script>alert('评论成功');window.location.href='comment.php';</script>");
		}else{
			exit("<script>alert('评论失败');window.history.go(-1);</script>");
		}
	}
?>