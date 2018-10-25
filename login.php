<?php
	include("include/conn.php");//连接数据库
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<title>欢迎登录极客之家</title>
	<meta name="author" content="CreativeLayers">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="shortcut icon" href="images/logos/geek-icon.png">
	<link rel="stylesheet" type="text/css" href="css/login.css"/>
 	<script src="js/jquery-1.11.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/login.js" type="text/javascript" charset="utf-8"></script>   
	<script src="js/jquery.slider.min.js" type="text/javascript" charset="utf-8"></script>
	
</head>
<body class="header_sticky">
	<!--头部开始-->
	<header>
		<div class="header-box">
			<div class="login-box" >
				<img src="images/logos/geek-logo.png" />
			</div>
			<div class="text-box">
				<a href="index.php">会员登录</a>
			</div>
			<div class="up-index">
				<i class="fa fa-reply" aria-hidden="true"></i>
				<a href="index.php">&nbsp;返回首页</a>
			</div>
		</div>
	</header>
	
	<!--中部开始-->
	<div class="banner-box container">
		<div class="enterBox">
			<div class="tab-title">
                <a class="linkABlue" id="toAccountLogin" href="#" style="font-size: 18px;">账号登录</a>
                <span class="register-line"></span>
                <a class="linkAGray" id="toVCodeLogin" href="#" style="font-size: 18px;">扫码登录</a>
           </div>
			<form action="admin/login2_deal.php?act=login" method="post" class="form-box">
				<div class="username-box" id="username-box">
					<span id="icon_1"><i class="fa fa-address-book-o" aria-hidden="true" id="icon"></i></span>
					<span id="icon_3"><i class="fa fa-check-circle" aria-hidden="true" id="icon"></i></span>
					
					<div class="yanzheng">
						<input type="text" id="username" name="username" placeholder="用户名" maxlength="20" onClick="JavaScript:this.value=''"/>
						<span style='position:absolute;right: 0;top: 80px;font-size:13px;color: #f00;'></span>
					</div>
					
					<span id="icon_2"><i class="fa fa-lock" aria-hidden="true" id="icon"></i></span>
					<span id="icon_4"><i class="fa fa-check-circle" aria-hidden="true" id="icon"></i></span>
					
					<div class="yanzheng">
						<input type="password" id="password" name="password" placeholder="密码" maxlength="12" onClick="JavaScript:this.value=''"/>
						<span style='position:absolute;right: 0;top: 160px;font-size:13px;color: #f00;'></span>
					</div>
					
					<!--滑块验证-->
				    <div class="demo">
				    	<div id="slider" class="slider">
				    		<div style="width: 298px; height: 48px; background-color: rgb(183, 183, 181);" class="ui-slider-wrap">
				    			<div style="line-height: 48px; font-size: 14px; color: rgb(255, 255, 255);" class="ui-slider-text ui-slider-no-select">按住滑块，拖拽验证</div>
				    			<div style="width: 48px; height: 48px; line-height: 48px; left: 0px;" class="ui-slider-btn init ui-slider-no-select"></div>
				    			<div style="height: 48px; background-color: rgb(96, 197, 10); width: 0px;" class="ui-slider-bg"></div>
				    		</div>
				    	</div>
				    </div>
					
					<input type="checkbox" name="remember" id="remenber" value="" checked style="opacity: 1;"/>&nbsp;记住密码	
					<input type="submit" id="submit" name="submit" value="登  录" class="mybtn" style="margin-top: 10px;"/>
					<div class="zhuce">
						<a href="register.php" class="">没有账号？<span>去注册</span></a>
						<a href="#" class="foget"><span>忘记密码？</span></a>
					</div>
				</div>
				<div class="scan-box" id="scan-box" style="display: none;text-align: center;">
					<img src="images/login/1530530584.png" style="width: 280px;height: 280px;"/>
					<span class="scan-box" style="text-align: center;font-size:16px;display: inline-block;margin-top: 30px;">手机扫码安全登录</span>
					<div class="login-icon">
						<span>其他登陆方式：</span>
						<i class="fa fa-qq"></i>
						<i class="fa fa-weixin"></i>
						<i class="fa fa-weibo"></i>
						<i class="fa fa-renren"></i>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!--中部结束-->

	<!--footer-->
	<div class="footer-box">
		<div class="left-text">
			<ul>
				<li><a href="#">关于极客</a></li>
				<li><a href="#">合作伙伴</a></li>
				<li><a href="#">联系我们</a></li>
				<li><a href="#">法律声明</a></li>
				<li><a href="#">常见问题</a></li>
			</ul>
		</div>
		<div class="center-text">
			<span>客服热线</span>
			<span>400-788-3333</span>
			<a href="#" class="server-online">在线客服</a>
		</div>
		<div class="right-icon">
			<span>
				<a href="#"><i class="fa fa-weibo fa-2x" aria-hidden="true"></i></a>
			</span>
			<span>
				<a href="#"><i class="fa fa-weixin fa-2x" aria-hidden="true"></i></a>
			</span>
			<span>
				<a href="#"><i class="fa fa-qq fa-2x" aria-hidden="true"></i></a>
			</span>
			<span>
				<a href="#"><i class="fa fa-renren fa-2x" aria-hidden="true"></i></a>
			</span>
		</div>
	</div>
	


</body>	
</html>