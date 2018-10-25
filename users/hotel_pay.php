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
	<link rel="shortcut icon" href="images/logos/geek-icon.png">	
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/settlement.css"/>
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/trip.css"/>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<title>极客之家_支付订单</title>
</head>
<body style="background:#fafafa;">
	<!--头部开始-->
		<header id="header">
			<div class="header">
				<img src="images/logos/geek-logo.png" class="logo"/>
				<h2>支付订单</h2>
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

       <div class="nei1200">
			<div class="col-12" id="nav-head" style="height: 40px;">
				<p style="line-height: 40px;">
					<a href="../index.php">首页</a> 
					<i class="fa fa-angle-right" aria-hidden="true"></i> 
					<a href="personal_c.php" style="color: #555555;">我的订单</a>
					<i class="fa fa-angle-right" aria-hidden="true"></i> 
					<span><a href="#" style="color: #C0C0C0;">订单支付</a></span>
				</p>
			</div>
      
	        <div class="rz_yd_wrap">
	       	    <div class="rz_yd_tit_box">
					<img src="images/rz_yd_tit2.png" alt="流程"/>
				</div>
	          <div class="zczf_box clearfix">
	          	<img src="images/product/other/01.jpg" width="120" style="float: left; "/>
	          		<div class="zczfLp" style="padding-left: 20px;">
	              		<p class="zczf_p"><a href="#"><?php echo $result_arr["goods_name"]; ?></a>&nbsp;<span>订单号：<?php echo $result_arr["OrderNum"]; ?></span></p>
	              		<p class="zczf_p2">规格：</p>
	              		<p class="zczf_p2">数量：<?php echo $result_arr["goods_num"]; ?></p>
	              		<dl class="rzzf_dl">
	              			<dt>取消说明 </dt>
	              			<dd>
	              				<p>
	              					·2017-02-07 23:59前允许变更/取消，将收取首晚房费作为违约金<br/>
									·过时变更/取消或未按时入住，酒店将扣除您的全额房费作为违约金<br/>
									·如预订未成功，全额房费将原路退还。<br />
	              				</p>
	              			</dd>
	              		</dl>
	            	</div>
	              <div class="zczfR clearfix">
	                 <p class="zczfRp"><img src="images/zc_code.jpg" alt="二维码">手机扫码支付</p>
	                 <div class="zczf_money">
	                    <p>需支付<span>￥<?php echo $result_arr["goods_price"]*$result_arr["goods_num"]; ?></span></p>
	                    <i><img src="images/notice.png" alt="注意">请在<span>30分钟内</span>完成支付，过期自动取消。</i>
	                 </div>
	              </div>
	          </div>
	          <div class="zczf_pay clearfix">
	              <p class="zczf_p">选择支付方式</p>
	              <div style="clear:both"></div>
	              <ul class="clearfix">
	                 <li class="zczf_li pay-act"><img src="images/pay01.jpg" alt="微信支付">
	                     <img src="images/payyes.png" alt="选择我支付" class="zczf_yes">
	                 </li>
	                 <li class="pay-act"><img src="images/pay02.jpg" alt="支付宝支付">
	                     <img src="images/payyes.png" alt="选择我支付" class="zczf_yes">
	                 </li>
	                 <li class="pay-act"><img src="images/pay03.jpg" alt="在线支付">
	                     <img src="images/payyes.png" alt="选择我支付" class="zczf_yes">
	                 </li>
	              </ul>
                  <button id="rz_sub" type="submit"><a style="color:#fff;font-size:18px" href="my_order_deal.php?act=pay&Id=<?php echo $result_arr["Id"]; ?>">下一步</a></button>
	          </div>
	       </div>
        </div>
     	<!--尾部开始-->
		<?php require("../include/footer.php"); ?>
		<!--尾部结束-->
		<script type="text/javascript">
			$(".pay-act").click(function(){
				$(this).addClass("zczf_li").children(".zczf_yes").fadeIn(500);
				$(this).siblings(".pay-act").removeClass("zczf_li");
			})
		</script>
</body>
</html>
