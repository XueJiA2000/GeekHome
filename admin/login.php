<?php
	include("../include/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GeekHome_管理员登录</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/jquery2.js"></script>
<script src="js/cloud.js" type="text/javascript"></script>
<script language="javascript" src="js/js.js"></script>
<link rel="shortcut icon" href="../images/logos/geek-icon.png">
</head>

<body style="background-color:#1c77ac; background-image: url(images/light.png) background-repeat:no-repeat; background-position:center top; overflow:hidden;">
<div id="mainBody">
  <div id="cloud1" class="cloud"></div>
  <div id="cloud2" class="cloud"></div>
</div>
<div class="logintop"> 
	<span>欢迎登录GeekHome后台</span>
  <ul>
    <li><a href="">返回首页</a></li>
  </ul>
</div>
<div class="loginbody"> <span class="systemlogo"><img src="images/logo.png"/></span>
  <div class="loginbox">
  	<form action="login_deal.php?act=login" method="post">
	    <ul>
	      <li>
	        <input name="adminname" type="text" class="loginuser" placeholder="Admin" onclick="JavaScript:this.value=''"/>
	      </li>
	      <li>
	        <input name="Adminpwd" type="password" class="loginpwd" placeholder="PassWord" onclick="JavaScript:this.value=''"/>
	      </li>
	      <li>
	        <input name="code" type="text" class="loginy" placeholder="输入验证码"/><label><img src="identifCode.php" onclick="this.src='identifCode.php?'+Math.random();"/></label> 
	      </li>
	      <li>
	        <input name="" type="submit" class="loginbtn" value="登录"  onclick="javascript:window.location='index.php'"  />
	      	<label style="margin-top: 10px;"><a href="#">忘记密码？</a></label>
	      	<label style="margin-top: 10px;"><input name="" type="checkbox" value="" checked="checked" />记住密码</label>
	      </li>
	    </ul>
    </form>
  </div>
</div>
<div class="loginbm">版权所有： 极客之家 © Copyright 2018 - 2088</div>
</body>
</html>
