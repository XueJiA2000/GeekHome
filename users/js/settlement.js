 /* js 语句 $(function(){});*/ 
// 二级菜单开始
$(function(){
    $(".test li").hover(  
        /*找父亲（li）下面的ul*/  
        function() {  
        	$(this).find("ul").show(200);
        },function(){
        	$(this).find("ul").hide(300);
        }
    );
    $(".test li").hover(
    	function(){
    		$(this).find("ul").fadeIn(300);
    	},function(){
    		$(this).find("ul").fadeOut(300);
    	}
    );
});
//二级菜单结束
//添加样式和清除样式开始
$(document).ready(function(e) {
	$(".delivery").first().addClass("active");
    $(".delivery").click(function(){ 
		$(this).addClass("active").siblings().removeClass("active");
	})   
});
//添加样式和清除样式结束
//遮罩层开始
function showdiv() {
    document.getElementById("bg").style.display ="block";
//  document.getElementById("show").style.display ="block";
	$("#show").addClass("showtime");
    
}
function hidediv() {
    $("#bg").fadeOut(500);
    $("#show").removeClass("showtime");
   	$("#show").addClass("hidetime");
}
//遮罩层结束
//获取焦点与失去开始
$(document).ready(function() {
    $(".username").focus(function(){ 
    	$(".username").css("border","1px solid #f24800");
	})   
	$(".username").blur(function(){ 
    	$(".username").css("border","1px solid #e5e5e5");
	}) 
});
$(document).ready(function() {
    $(".tel").focus(function(){ 
    	$(".tel").css("border","1px solid #f24800");
	})   
	$(".tel").blur(function(){ 
    	$(".tel").css("border","1px solid #e5e5e5");
	}) 
});
$(document).ready(function() {
    $(".postcode").focus(function(){ 
    	$(".postcode").css("border","1px solid #f24800");
	})   
	$(".postcode").blur(function(){ 
    	$(".postcode").css("border","1px solid #e5e5e5");
	}) 
});
$(document).ready(function() {
    $("textarea").focus(function(){ 
    	$("textarea").css("border","1px solid #f24800");
	})   
	$("textarea").blur(function(){ 
    	$("textarea").css("border","1px solid #e5e5e5");
	}) 
});
$(document).ready(function() {
    $(".input").focus(function(){ 
    	$(".input").css("border","1px solid #f24800");
	})   
	$(".input").blur(function(){ 
    	$(".input").css("border","1px solid #e5e5e5");
	}) 
});
//获取焦点与失去结束
//提交开始
$(".pay_order").click(function(){
	$("#myForm").submit();
})
//提价结束
/*修改地址 弹窗 start*/
jQuery('.adress').focus(function() {
	var text=jQuery(this).val();
	if(text=='不需要重复填写省市区，不小于5个字符，不超过120个字符'){
		jQuery(this).val('');
	 }
});
jQuery('.adress').blur(function() {
	var text=jQuery(this).val();
	if(text==''){
		jQuery(this).val('不需要重复填写省市区，不小于5个字符，不超过120个字符');
	}
});

jQuery(".my_window").click(function(){
	jQuery(this).hide();
	jQuery(".address").hide();
})
jQuery("#cancel").click(function(){
	jQuery(".my_window").fadeOut(1000);
	jQuery(".my_addtc").fadeOut(500);
})

jQuery(".receive").click(function(){
	
	
	$("input[type='text']").val("");
	$("#adress").val("");
	$("#city").val("");
	
	jQuery(".my_window").show();
	jQuery(".address").fadeIn(1000);
})

$("#save").click(function(){
	$("#frm1").submit();
});


/*修改地址 弹窗 end*/