<?php
	require("../include/conn.php");
	
	$act=@$_GET["act"]; //获取功能动作 执行不同功能
	
	if($act=="add"){
		$product_category=$_POST["product_category"];
		$sign=$_POST["sign"];
		$product_type=$_POST["product_type"];
		$product_name=$_POST["product_name"];
		$presentPrice=$_POST["presentPrice"];
		$originalPrice=$_POST["originalPrice"];
		
		$brand=$_POST["brand"];
		$stock=$_POST["stock"];
		$keywords=$_POST["keywords"];
		$standard=$_POST["standard"];
		$deliver=$_POST["deliver"];
		$volume=$_POST["volume"];
		$camera=$_POST["camera"];
		$producing=$_POST["producing"];
		$model=$_POST["model"];
		$material=$_POST["material"];
		$battery=$_POST["battery"];
		$cpu=$_POST["cpu"];
		$quality=$_POST["quality"];
		$goods_js=$_POST["goods_js"];
		$goods_cont=$_POST["goods_cont"];
		$zhiliang=$_POST["zhiliang"];
		
		$upload="";
		$writerTime=date('y-m-d h:i:s');

		//上传图片
		if(!empty($_FILES["upfile"])){
			foreach($_FILES["upfile"]["name"] as $k=>$y){
				if($_FILES["upfile"]["name"][$k]){
	
				//判断文件是否异常
				if($_FILES["upfile"]["error"][$k]>0){
					exit("<script>alert('上传错误！错误代码为".$_FILES["upfile"]["error"][$k].",请检查！');history.go(-1);</script>");
					
				}
				
				$Ext="jpeg|jpg|png|gif";//允许的后缀
				
				$ExtArr=explode(".",$_FILES["upfile"]["name"][$k]);
				
				$ExtName=$ExtArr[count($ExtArr)-1];//获取最后一个元素
				
				if(!strstr($Ext,$ExtName)){
					echo "<script>alert('非法文件！');history.go(-1);</script>";
					die();
				}
				
				if(is_uploaded_file($_FILES["upfile"]["tmp_name"][$k])){//防止黑客用其它文件欺骗,木马进入服务器
				
					
					if(!is_dir("upload")){//创建父文件夹
						mkdir("upload");
					}
					
					$fileName="upload/".date("ymd");//创建子文件夹
					
					if(!is_dir($fileName)){
						mkdir($fileName);
					}
					
					$fileName.="/".time().mt_rand(100000,999999).".".$ExtName;
					//exit($fileName);
					$upload.=($fileName."@");
					if(move_uploaded_file($_FILES["upfile"]["tmp_name"][$k],$fileName)){
						
					}else{
						
					}
				}else{
					echo "<script>alert('非法来源！');history.go(-1);</script>";
					
				}
			}
		}
	
	}

		//执行sql语句
		$sql="insert into `ite_product`(zhiliang,goods_js,product_category,product_picture,sign,product_type,product_name,presentPrice,originalPrice,brand,stock,keywords,standard,deliver,volume,camera,producing,model,material,battery,cpu,quality,goods_cont,writerTime) values ('".$zhiliang."','".$goods_js."','".$product_category."','".$upload."','".$sign."','".$product_type."','".$product_name."','".$presentPrice."','".$originalPrice."','".$brand."',".$stock.",'".$keywords."','".$standard."','".$deliver."','".$volume."','".$camera."','".$producing."','".$model."','".$material."','".$battery."','".$cpu."','".$quality."','".$goods_cont."','".$writerTime."')";
		//exit($sql);
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响的行数
		
		if($result && $affected_rows){
			exit("<script>alert('添加成功！');window.location.href='product_add.php';</script>");
		}else{
			exit("<script>alert('添加失败！');window.location.href='product_add.php';</script>");	
		}
		
		
	}elseif($act=="update"){//执行的是修改方法
		$product_category=$_POST["product_category"];
		$sign=$_POST["sign"];
		$product_type=$_POST["product_type"];
		$product_name=$_POST["product_name"];
		$presentPrice=$_POST["presentPrice"];
		$originalPrice=$_POST["originalPrice"];
		$writerTime=date('y-m-d h:i:s');
		
		$brand=$_POST["brand"];
		$stock=$_POST["stock"];
		$keywords=$_POST["keywords"];
		$standard=$_POST["standard"];
		$deliver=$_POST["deliver"];
		$volume=$_POST["volume"];
		$camera=$_POST["camera"];
		$producing=$_POST["producing"];
		$model=$_POST["model"];
		$material=$_POST["material"];
		$battery=$_POST["battery"];
		$cpu=$_POST["cpu"];
		$quality=$_POST["quality"];
		$goods_js=$_POST["goods_js"];
		$goods_cont=$_POST["goods_cont"];
		
		$Id=$_POST["Id"];
		
		$upload="";
		
		if(!empty($_FILES["upfile"])){
			foreach($_FILES["upfile"]["name"] as $k=>$y){
				if($_FILES["upfile"]["name"][$k]){
	
				//判断文件是否异常
				if($_FILES["upfile"]["error"][$k]>0){
					exit("<script>alert('上传错误！错误代码为".$_FILES["upfile"]["error"][$k].",请检查！');history.go(-1);</script>");
					
				}
				
				$Ext="jpeg|jpg|png|gif";//允许的后缀
				
				$ExtArr=explode(".",$_FILES["upfile"]["name"][$k]);
				
				$ExtName=$ExtArr[count($ExtArr)-1];//获取最后一个元素
				
				if(!strstr($Ext,$ExtName)){
					echo "<script>alert('非法文件！');history.go(-1);</script>";
					die();
				}
				
				if(is_uploaded_file($_FILES["upfile"]["tmp_name"][$k])){//防止黑客用其它文件欺骗,木马进入服务器
				
					
					if(!is_dir("upload")){//创建父文件夹
						mkdir("upload");
					}
					
					$fileName="upload/".date("ymd");//创建子文件夹
					
					if(!is_dir($fileName)){
						mkdir($fileName);
					}
					
					$fileName.="/".time().mt_rand(100000,999999).".".$ExtName;
					//exit($fileName);
					$upload.=($fileName."@");
					if(move_uploaded_file($_FILES["upfile"]["tmp_name"][$k],$fileName)){
						
					}else{
						
					}
				}else{
					echo "<script>alert('非法来源！');history.go(-1);</script>";
					
				}
			}
		}
	
	}
	
		// 执行SQL语句
		$sql="update ite_product set goods_js='".$goods_js."',product_category='".$product_category."',product_picture='".$upload."',sign='".$sign."',product_type='".$product_type."',material='".$material."',product_name='".$product_name."',presentPrice='".$presentPrice."',brand='".$brand."',stock=".$stock.",keywords='".$keywords."',standard='".$standard."',deliver='".$deliver."',volume='".$volume."',camera='".$camera."',producing='".$producing."',model='".$model."',battery='".$battery."',cpu='".$cpu."',quality='".$quality."',goods_js='".$goods_js."',goods_cont='".$goods_cont."' where Id=".$Id."";
		//exit($sql);

		$result=mysql_query($sql);//执行
		
		$affected_rows=mysql_affected_rows();//获取受影响行数
		if($result && $affected_rows){//如果受影响行数大于0则添加成功
			exit("<script>alert('修改成功！');window.location.href='product_update.php?Id=".$Id."'</script>");
		}else{
			exit("<script>alert('修改失败！');window.location.href='product_update.php?Id=".$Id."'</script>");	
		}
		
	}elseif($act=="delect"){
		
		$Id=@$_GET["Id"];//获取功能动作  执行不同功能
		// 执行SQL语句
		$sql="delete from `ite_product` where `Id`=".$Id."";
		//exit($sql);
		
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响行数
		if($result && $affected_rows){//如果受影响行数大于0则添加成功
			exit("<script>alert('删除成功！');window.location.href='product.php'</script>");
		}else{
			exit("<script>alert('删除失败！');window.location.href='product.php'</script>");	
		}

	}elseif($act=="delAll"){//执行的全部删除方法
		
		//$adminId=$_POST["checkname"];
		$del=implode(",",$_POST["checkname"]);

		// 执行SQL语句
		$sql="delete from ite_product where Id in($del)";
		//exit($sql);
		
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响行数
		if($result && $affected_rows){//如果受影响行数大于0则添加成功
			exit("<script>alert('删除全部成功！');window.location.href='product.php'</script>");
		}else{
			exit("<script>alert('删除全部失败！');window.location.href='product.php'</script>");
		}
		
	}
	
	
?>