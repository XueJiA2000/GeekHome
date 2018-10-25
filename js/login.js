//登录切换
$(function(){
	$('#toAccountLogin').on("click",function(){
		$('#username-box').css("display","block");
		$('#scan-box').css("display","none");
	})
	$('#toVCodeLogin').on("click",function(){
		$('#username-box').css("display","none");
		$('#scan-box').css("display","block");
	})
})
 
 //表单验证
var h=/^[a-zA-Z]\w{3,19}$/;;
var d=/^1[3|4|5|8][0-9]\d{4,8}$/;
var y=/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
var r=/^\w{6,20}$/;
$(function(){
		$("[name='username']").blur(function() {
		var v=$(this).val();
		if (v=='') {
			$("[name='username']").next().html("用户名不能为空！");
			$(this).prev().css("color","#f00");
		}else if(!v.match(h)){
			$("[name='username']").next().html("用户名必须以字母开头！");
			$("[name='username']").prev().css("color","#f00");
		}else{
			$(this).prev().css("color","#0EA74A");
			$("[name='username']").next().html("");
		} 
	});
	
	$("[name='password']").blur(function() {
		var v=$(this).val();
		if (v=='') {
			$("[name='password']").next().html("密码不能为空！");
			$(this).prev().css("color","#f00");
		}else if(!v.match(r)){
			$("[name='password']").next().html("密码格式不正确！");
			$("[name='password']").prev().css("color","#f00");
		}else{
			$(this).prev().css("color","#0EA74A");
			$("[name='password']").next().html("");
		} 
	});

	$('.mybtn').click(function(){
		var name=$("[name='username']").val();
		var passWord=$("[name='password']").val();
		if (name=="") {
			$("[name='username']").next().html("用户名不能为空！");
			return;
		}else if(!name.match(h)){
			$("[name='username']").next().html("用户名不正确！");
			$("[name='username']").prev().css("color","#f00");
			return;
		}
		if (passWord=='') {
			$("[name='password']").next().html("密码不能为空！");
			return;
		}else if(!phone.match(d)){
			$("[name='password']").next().html("密码格式不正确！");
			$("[name='password']").prev().css("color","#f00");
			return;
		}
	})
});
//滑动验证
$(function(){
	$("#slider").slider({
	width: 298, // width
	height: 48, // height
	sliderBg:"rgb(134, 134, 131)",// 滑块背景颜色
	color:"#fff",// 文字颜色
	fontSize: 14, // 文字大小
	bgColor: "#33CC00", // 背景颜色
	textMsg: "按住滑块，拖拽验证", // 提示文字
	successMsg: "恭喜你通过验证！", // 验证成功提示文字
	successColor: "#ea3838", // 滑块验证成功提示文字颜色
	time: 400, // 返回时间
	callback: function(result) { // 回调函数，true(成功),false(失败)
		$("#result2").text(result);
	}
});
})
