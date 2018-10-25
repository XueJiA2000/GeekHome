<!--中间左边开始-->
<div class="center_left">
	<ul class="order">
		<h3>订单中心</h3>
		<li><a href="my_order.php" class="delivery">我的订单</a></li>
	</ul>
	<ul class="personal">
		<h3>个人中心</h3>
		<li><a href="personal_c.php" class="delivery">我的个人中心</a></li>
		<li><a href="address.php" class="delivery">收货地址管理</a></li>
		<li><a href="comment.php" class="delivery">我的评论</a></li>
	</ul>
	<ul class="administration">
		<h3>账户管理</h3>
		<li><a href="personal_info.php" class="delivery">个人信息</a></li>
		<li><a href="head_portrait.php" class="delivery">修改头像</a></li>
	</ul>
</div>
<script type="text/javascript">
	$(function(){
		$(".delivery").click(function(){
			$(this).addClass("active");
			$(".delivery").removeClass("active");
		})
	})
</script>
<!--<script type="text/javascript">
	$(document).ready(function(e) {
		$(".delivery").first().addClass("active");
	    $(".delivery").click(function(){ 
			$(this).addClass("active").siblings().removeClass("active");
		})   
	});
</script>-->
<!--中间左边结束-->