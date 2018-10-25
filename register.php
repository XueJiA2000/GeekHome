<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>欢迎注册</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/gloab.css" rel="stylesheet">
<link href="css/registers.css" rel="stylesheet">
<script src="js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
<link rel="shortcut icon" href="images/logos/geek-icon.png">
<link rel="stylesheet" type="text/css" href="css/login.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.css"/>

</head>
<body class="bgf4">
	<header>
		<div class="header-box" style="width: 1100px;">
			<div class="login-box" >
				<img src="images/login/geek-logo.png" width="190"/>
			</div>
			<div class="text-box">
				会员注册
			</div>
			<div class="up-index">
				<i class="fa fa-reply" aria-hidden="true"></i>
				<a href="index.php">&nbsp;返回首页</a>
			</div>
		</div>
	</header>
	
	<div class="login-box f-mt10 f-pb50">
		<div class="main bgf">    
	    	<div class="reg-box-pan display-inline">
	        	<div class="reg-box" id="verifyCheck" style="margin-top:20px;">
	        	<!--广告图-->
	        	<div class="AD">
	        		<img src="images/xx.jpg_.webp" />
	        	</div>
	        	<form action="include/register_deal.php?act=add" method="post" id="myForm">
	            	<div class="part1"> 
	            		<!--用户名-->               	
	                    <div class="item col-xs-12">
	                        <span class="intelligent-label f-fl"><b class="ftx04">*</b>用户名：</span>    
	                        <div class="f-fl item-ifo">
	                            <input type="text" maxlength="20" name="userName" class="txt03 f-r3 required" id="userName" onblur="chkUsername();"/>
	                            <label id="str1" class="icon-sucessfill form_tis_ok"><i class="fa fa-check-circle"></i></label>
	                            <label id="username_tis" class="focus">3-20位字母、数字、下划线的组合，以字母开头</label>
	                        </div>
	                    </div>
	                    <!--手机号-->
	                    <div class="item col-xs-12">
	                        <span class="intelligent-label f-fl"><b class="ftx04">*</b>手机号：</span>    
	                        <div class="f-fl item-ifo">
	                            <input type="text" class="txt03 f-r3 required" maxlength="11" id="phone" onblur="chkPhone();" name="phone"/>
	                            <label id="str2" class="icon-sucessfill form_tis_ok"><i class="fa fa-check-circle"></i></label>
	                            <label id="phone_tis" class="focus">请填写11位有效的手机号码</label>
	                        </div>
	                    </div>
	                  <!--密码-->
	                    <div class="item col-xs-12">
	                        <span class="intelligent-label f-fl"><b class="ftx04">*</b>密码：</span>    
	                        <div class="f-fl item-ifo">
	                            <input type="password" id="userPwd" name="userPwd" maxlength="20" class="txt03 f-r3 required" onblur="chkPassword();"/> 
	                            <span class="ie8 icon-close close hide" style="right:55px"></span>
	                            <label id="str3" class="icon-sucessfill form_tis_ok"><i class="fa fa-check-circle"></i></label>
	                            <label id="password_tis" class="focus">6-20位英文（区分大小写）、数字、字符的组合</label>
	                        </div>
	                    </div>
	                    <!--确认密码-->
	                    <div class="item col-xs-12">
	                        <span class="intelligent-label f-fl"><b class="ftx04">*</b>确认密码：</span>    
	                        <div class="f-fl item-ifo">
	                            <input type="password" maxlength="20" name="userPwd_r" id="userPwd_r" class="txt03 f-r3 required" onblur="chkRepassword();"/>
	                            <span class="ie8 icon-close close hide" style="right:55px"></span>
	                            <label id="str4" class="icon-sucessfill form_tis_ok"><i class="fa fa-check-circle"></i></label>
	                            <label id="repassword_tis" class="focus">请再输入一遍上面的密码</label> 
	                        </div>
	                    </div>
	                    <!--验证码-->
	                    <div class="item col-xs-12">
	                        <span class="intelligent-label f-fl"><b class="ftx04">*</b>验证码：</span>    
	                        <div class="f-fl item-ifo">
	                            <input type="text" maxlength="5" class="txt03 f-r3 f-fl required randCode" style="width:150px" id="randCode" name="code"/> 
	                            <label class="f-size12 c-999 f-fl f-pl10">
	                            	<img src="admin/identifCode.php" onclick="this.src='admin/identifCode.php?'+Math.random();" height="35"/ style="margin-top: -5px;">
	                            </label>                        
	                            <label class="icon-sucessfill blank hide" style="left:380px"></label>
	                            	<label class="focusa">看不清？点击图片切换</label>   
	                            <label class="focus valid" style="left:370px"></label>                        
	                        </div>
	                    </div>
	                    <div class="item col-xs-12" style="height:auto">
	                        <span class="intelligent-label f-fl">&nbsp;</span>  
	                        <p class="f-size14 required"  data-valid="isChecked" data-error="请先同意条款"> 
	                        	<input type="checkbox" checked /><a href="" class="f-ml5" onClick="show()">我已阅读并同意条款</a>
	                        </p> 
	                        <p class="f-size14 required"  data-valid="isChecked"> 
	                        	<a href="login.php" style="font-size: 12px;">已有帐号？去登陆</a>
	                        </p>                       
	                        <label class="focus valid"></label> 
	                    </div> 
	                    <div class="item col-xs-12">
	                        <span class="intelligent-label f-fl">&nbsp;</span>    
	                        <div class="f-fl item-ifo">
	                           <button class="btn btn-blue f-r3" id="btn_part1" type="submit">注&nbsp;&nbsp;册</button>                         
	                        </div>
	                    </div> 
	               </div>
	            </form>
	            </div>
	        </div>
	    </div>
	</div>

<!--服务条款-->
<div class="m-sPopBg" style="z-index:998;"></div>
<div class="m-sPopCon regcon">
	<div class="m-sPopTitle"><strong>《即客之家》服务协议条款</strong><b id="sPopClose" class="m-sPopClose" onClick="closeClause()">×</b></div>
    <div class="apply_up_content">
    	<pre class="f-r0">
    		<div class="if">
    			<p></p>
    			<h4>《注册协议》</h4>
				<p>【审慎阅读】您在申请注册流程中点击同意前，应当认真阅读以下协议。请您务必审慎阅读、充分理解协议中相关条款</p>
				<p>内容，其中包括：</p>
				<p>1、与您约定免除或限制责任的条款；</p>
				<p>2、与您约定法律适用和管辖的条款；</p>
				<p>3、其他以粗体下划线标识的重要条款。</p>
				<p>如您对协议有任何疑问，可向平台客服咨询。</p>
				<p>【特别提示】当您按照注册页面提示填写信息、阅读并同意协议且完成全部注册程序后，即表示您已充分阅读、理解并
				<p>接受协议的全部内容。</p>
				<p>如您因平台服务与极客之家发生争议的，适用《极客之家平台服务协议》处理。如您在使用平台服务过程中与其他</p>
				<p>用户发生争议的，依您</p>
				<p>与其他用户达成的协议处理。</p>
				<p>阅读协议的过程中，如果您不同意相关协议或其中任何条款约定，您应立即停止注册程序。</p>
				<h5>《极客之家平台服务协议》</h5>
				<h5>《法律声明及隐私权政策》</h5>
				<h5>《极客之家服务协议》</h5>
    		</div>
			<strong>同意以上服务条款，提交注册信息</strong>
        </pre>
    </div>
    <center id="yes"><a class="btn btn-blue btn-lg f-size12 b-b0 b-l0 b-t0 b-r0 f-pl50 f-pr50 f-r3" onClick="closeClause()" style="color: white;">已阅读并同意此条款</a></center>
</div>
<!--footer-->
	<div class="footer-box" style="width: 1140px;">
		<div class="left-text" style="width: 460px;">
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
		<div class="right-icon" style="width: 290px;">
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
	
<!--登录验证-->
<script src="js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="js/ajax_common.js" ></script>
<script type="text/javascript">
	//同意服务条款
	function closeClause(){
		$(this).click(function(){
			$(".regcon").fadeOut(500);
			$(".m-sPopBg").fadeOut(500);
		});
	}
	function show(){
		$(this).click(function(){
			$(".regcon").fadeIn(500);
			$(".m-sPopBg").fadeIn(500);
		});
	}
	
	//注册验证用户名
	function chkUsername(){
		var obj = document.getElementById("userName").value;
		var tisObj = document.getElementById("username_tis");
		var str1 = document.getElementById("str1");
		var reg = /^[a-zA-Z]\w{3,20}$/; //字母开头的+3-10位字符
		if(!reg.test(obj)){ 
			tisObj.className = "form_tis_err";
			return false;
		}else{                   
			//通过Ajax验证用户名是否已经存在于数据库
			var xmlHttp = CreateXMLHttpRequest();
			//var xmlHttp = new XMLHttpRequest();//第一步 初始化对象
			var dealUrl="include/userAjax.php?userName="+obj; //处理验证的地址，地址中包含参数userName
			
			xmlHttp.open("GET",dealUrl,true);//初始化 HTTP 请求参数，但是并不发送请求
			xmlHttp.send(); //发送 HTTP 请求
			
			xmlHttp.onreadystatechange = function(){
				//alert(xmlHttp.responseText);
				if(xmlHttp.readyState == 4) { // 收到完整的服务器响应
					//alert(xmlHttp.status);
					if(xmlHttp.status == 200){ //信息返回成功，开始处理信息
						//alert(xmlHttp.responseText);
						if(xmlHttp.responseText==1){
							$("#str1").fadeIn(500);
							$("#username_tis").fadeOut(500);
							return true;
						}else{
							tisObj.innerHTML = "<label>对不起！您输入的用户名已被注册，请尝试其他用户名</label>";
							tisObj.className = "form_tis_err";
							return false;
						}
					}
				}else{ // 没有收到完整的服务器响应
					tisObj.innerHTML = "<div>正在验证中……</div>";
					tisObj.className = "form_tis_tis";
				}
			}
		}
	}
	
	
	function chkPassword(){
		var obj = document.getElementById("userPwd");
		var tisObj = document.getElementById("password_tis");
		var reg = /^\w{6,20}$/;
		if(reg.test(obj.value)){
			$("#str3").fadeIn(500);
			$("#password_tis").fadeOut(500);
			return true;
		}else{
			tisObj.innerHTML = "<label>6-20位英文（区分大小写）、数字、字符的密码</label>";
			tisObj.className = "form_tis_err";
			return false;
		}
	}
	
	function chkRepassword(){
		var obj = document.getElementById("userPwd");
		var reobj = document.getElementById("userPwd_r");
		var tisObj = document.getElementById("repassword_tis");
		
		if(reobj.value==""||obj.value!=reobj.value){
			tisObj.innerHTML = "<label>与以上密码不符！</label>";
			tisObj.className = "form_tis_err";
			return false;
		}else{
			$("#str4").fadeIn(500);
			$("#repassword_tis").fadeOut(500);
			return true;
		}
	}
	
	function chkPhone(){
		var obj = document.getElementById("phone");
		var tisObj = document.getElementById("phone_tis")
		var reg = /^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/;
		if(reg.test(obj.value)){
			$("#str2").fadeIn(500);
			$("#phone_tis").fadeOut(500);
			return true;
		}else{
			tisObj.innerHTML = "<label>手机号码格式不正确！</label>";
			tisObj.className = "form_tis_err";
			return false;
		}
	}
	
	window.onload = function(){
		var myFormObj = document.getElementById("myForm");
		//给<form>表单绑定事件，当提交表单时，先进行表单验证
		myFormObj.onsubmit = function(){
			return chkUsername(); //要验证所有的表单元素，即所有验证函数都要为true
			return chkPassword();
			return chkRepassword();
			return chkPhone();
		}
	}
	
</script>
</body>
</html>



