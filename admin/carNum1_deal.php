<?php
	session_start();
	$flag=$_POST["flag"];
	
	$productId_arr=explode("@",@$_SESSION["productId"]);//把购物车分割成数组
	$productNum_arr=explode("@",@$_SESSION["productNum"]);	
	
	
	for($i=0;$i<count($productId_arr)-1;$i++){//把数组循环
		if($productId_arr[$i]==$flag){//当传来的Id等于数组当前的值 
			$productNum_arr[$i]=$productNum_arr[$i]-1;//原来的基础加+1
			echo $productNum_arr[$i];
		}
			
	}
	$_SESSION["productId"]=implode("@",$productId_arr);//把购物车重新重组
	$_SESSION["productNum"]=implode("@",$productNum_arr);
	

?>