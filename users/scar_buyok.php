<?php
	include("../include/conn.php");
	$Id=$_GET["Id"];
	$sql="select * from ite_order_detail where Id=".$Id."";
	$result=mysql_query($sql);
	$result_arr=mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta http-equiv="Content-Type" content="text/x-component" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="icon" href="favicon.ico" mce_href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="css/trip.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/settlement.css"/>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/base.css"/>
    <link rel="stylesheet" type="text/css" href="css/left.css"/>
	<title>极客之家_支付完成</title>
</head>
<body style="background-color: #F5F5F5;">
	<!--头部开始-->
		<header id="header">
			<div class="header">
				<img src="images/logos/geek-logo.png" class="logo"/>
				<h2>订单支付</h2>
				<div class="test">  
    				<ul> 
                		<li class="user">
                			用户名&nbsp;<i class="fa fa-chevron-down" style="color: #757575;"></i>
	              			<ul class="test-list">  
	                      		<li><a href="#">个人中心</a></li>  
	                     		<li><a href="#">评价晒单</a></li>  
	                     		<li><a href="#">我的收藏</a></li>  
	                     		<li><a href="#">修改资料</a></li>    
	                     		<li><a href="#">退出</a></li>
	                		</ul>  
         				</li> 
         				<li class="fen">|</li>
         				<li style="text-align: right;width: 90px;"><a href="#">我的订单</a></li>
   					</ul>  
				</div>  
		</header>
		<script type="text/javascript">
			$(".user").mouseover(function(){
				$(this).children(".test-list").fadeIn(500);
			})
			$(".user").mouseleave(function(){
				$(this).children(".test-list").fadeOut(500);
			})
		</script>
	<!--头部结束-->
	
       <section class="container" style="width: 1226px;">
			<div class="center row">
				<div class="col-12" id="nav-head">
					<p><a href="../index.php">首页</a> 
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<a href="personal_c.php" style="color: #555555;">我的订单</a>
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<span><a href="my_order.php" style="color: #555555;">订单支付</a></span>
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<span class="order-num" style="color: #009900">支付完成</span>
					</p>
				</div>
		       <div class="buyok">
		          <div class="buybox">
		             <img src="images/bugok.png" alt="支付成功">
		             <strong>订单支付成功，我们会尽快为你发货！</strong>
		             <p>共1张订单：<?php echo $result_arr["OrderNum"]; ?>&nbsp;&nbsp;已使用金币：<span>672</span>&nbsp;现余金币：<span>458</span></p>
		          </div>
		       </div>
		       
		       <div class="zc_ok zc_ok02">
		          <img src="images/zc_code.png" alt="二维码">
		          <p>* 限时取消 2017-02-07 23:59前允许取消订单</p>
		          <ul>
		             <li><a href="my_order.php">查看订单</a></li>
		             <li><a href="#">继续购买</a></li>
		             <li><a href="index.html">返回首页</a></li>
		          </ul>
		       </div>
       		</div>
        </section>
    <!--尾部开始-->
		<?php require("../include/footer.php"); ?>
	<!--尾部结束-->	  
     
</body>
</html>
