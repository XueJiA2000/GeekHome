<?php
	include("../include/conn.php");
	
	$admin=@$_SESSION["username"];
	
	if($admin==""){
		exit("<script>alert('添加失败！请先登录');window.location.href='../index.php'</script>");
	}
	
	$Id=@$_GET["Id"];
	if(empty($Id)){
		exit("<script>alert('请选择商品！');window.history.go(-1);</script>");
	}


	$arr=explode("@",@$_SESSION["productId"]);//已经存在的产品不能继续加入购物车
	for($i=0;$i<count($arr)-1;$i++){
		if($arr[$i]==$Id){
			exit("<script>alert('商品已经存在购物车中！');window.history.go(-1);</script>");
		}
		
	}
	
	$_SESSION["productId"]=@$_SESSION["productId"].$Id."@";//在原来的空购物车 或者 有东西的购物 做拼接
	$_SESSION["productNum"]=@$_SESSION["productNum"]."1@";
	
	exit("<script>alert('加入购物车成功！');window.history.go(-1);</script>");


?>