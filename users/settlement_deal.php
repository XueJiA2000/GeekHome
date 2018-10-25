<?php
	header("Content-type:text/html;charset=utf-8");
	include("../include/conn.php");
	$act=$_GET["act"];
	
	if($act=="add"){//执行添加
		$address=$_POST["address"];
		$adress=$_POST["adress"];
		$userName=$_POST["userName"];
		$cellphone=$_POST["cellphone"];
		$code=$_POST["code"];
		
		$sql="insert into ite_adress(address,adress,userName,cellphone,code) values('".$address."','".$adress."','".$userName."','".$cellphone."','".$code."')";
		//exit($sql);
		$result=mysql_query($sql);//执行SQL语句
		$affect_rows=mysql_affected_rows();//获取影响行数
		
		if($result && $affect_rows){
			
			exit("<script>alert('添加成功');window.history.go(-1);</script>");
		}else{
			exit("<script>alert('添加失败');window.history.go(-1);</script>");
		}
	}
	if($act=="order"){
		$Id=$_POST["Id"];
		//exit($Id);
		$OrderNum=$_POST["OrderNum"];
		$Contactaddress=$_POST["Contactaddress"];
		$contactName=$_POST["contactName"];
		$contactphone=$_POST["contactphone"];
		$Addtime=@$_POST["Addtime"];
		$sqls="insert into `ite_order` (`OrderNum`,Contactaddress,contactphone,contactName,Addtime) values('".$OrderNum."','".$Contactaddress."','".$contactphone."','".$contactName."',now());";
		
		//exit($sqls);
		$results=mysql_query($sqls);
		$affect_rows=mysql_affected_rows();
		//exit($affect_rows);
		if($results && $affect_rows){//当订单表插入成功 就执行插入明显
			$sql="select * from ite_product where Id in (".$Id.")";//查询每个产品的单价
			//exit($sql);
			$result=mysql_query($sql);
			
			$productId_arr=explode("@",@$_SESSION["productId"]);//分割购物车 取出数量
		    $productNum_arr=explode("@",@$_SESSION["productNum"]);	
		    //exit($productId_arr);
			
			$sql="insert into ite_order_detail (OrderNum,goods_name,goods_num,goods_price,addTime,username,upfile) VALUES";
			while($result_arr=mysql_fetch_array($result)){
				$Id_index=array_search($result_arr["Id"], $productId_arr); //根据ID去查 购物车中ID对应的 索引
				$num=$productNum_arr[$Id_index];//当前产品ID的数量
				$a=explode("@",$result_arr["product_picture"]);
				array_pop($a);
				$sql.="('".$OrderNum."','".$result_arr["product_name"]."',".$num.",".$result_arr["presentPrice"].",'".date("Y-m-d H:i:s")."','".$_SESSION["username"]."','".$a[0]."'),";
			}
			
			$sql=rtrim($sql,",");//去掉sql最后一个逗号
			//exit($sql);
			$result=mysql_query($sql);
		    $affect_rows=mysql_affected_rows();
			//exit($affect_rows);
			if($result && $affect_rows){
				//清空已经买的商品
				$Id_arr=explode(",",$Id);
				//$a=count($productId_arr)-2;
				//exit(print_r($a));
				//$b=count($Id_arr);
				//exit(print_r($b));
				for($j=0;$j<count($Id_arr);$j++){
					//exit(print_r(count($Id_arr)));
					for($i=0;$i<count($productId_arr);$i++){
						//exit(print_r(count($productId_arr)-1));
						//exit(print_r($a[$i]==$b[$j]));
						if(@$productId_arr[$i]==@$Id_arr[$j]){//当传来的Id等于数组当前的值
							//exit($productId_arr[$i]); 
							unset($productId_arr[$i]);//注销当前元素
							unset($productNum_arr[$i]);
						}
					}
				}
				$_SESSION["productId"]=implode("@",$productId_arr);//把购物车重新重组
				$_SESSION["productNum"]=implode("@",$productNum_arr);
			}
			exit("<script>alert('订单生成！去支付');window.location.href='my_order.php'</script>");
			
		}else{
			echo "购买失败！";
		}
	}
	if($act=="update"){
		$userName=@$_POST["userName"];
		$cellphone=@$_POST["cellphone"];
		$address=@$_POST["address"];
		$adress=@$_POST["adress"];
		$code=@$_POST["code"];
		$isflag=@$_POST["isflag"];
		$Id=$_GET["Id"];
		//执行SQL语句
		$sql="update ite_adress set userName='".$userName."',cellphone='".$cellphone."',address='".$address."',adress='".$adress."',code='".$code."',isflag='".$isflag."' where Id=".$Id."";
		//exit($sql);
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响行数
			
		//判断执行结果
		if($result && $affected_rows){
			exit("<script>alert('修改地址成功');window.location.href='settlement.php'</script>");
		}else{
			exit("<script>alert('修改地址失败');window.location.href='settlement.php'</script>");
		}
	}elseif($act=="del"){//执行的是删除的方法
		$Id=$_GET["Id"];
		//执行SQL语句
		$sql="delete from ite_adress where Id=".$Id."";
		//exit(print_r($sql));
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响行数
			
		//判断执行结果
		if($result && $affected_rows){
			exit("<script>alert('删除成功');window.location.href='settlement.php'</script>");
		}else{
			exit("<script>alert('删除失败');window.location.href='settlement.php'</script>");
		}
	}
?>
