<?php
	include("../include/conn.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>我的评论</title>
		<meta name="author" content="CreativeLayers">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<script src="js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<script src="../js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/responsive.css">
		<link rel="shortcut icon" href="images/logos/geek-icon.png">
		<link rel="stylesheet" href="css/my_order.css" />
		<link rel="stylesheet" type="text/css" href="css/left.css"/>
		<!--返回顶部-->
		<link rel="stylesheet" type="text/css" href="css/gotop.css"/>
	</head>
	<body style="background-color: #F5F5F5;">
		<!--头部开始-->
		<?php
			require("../include/header.php");
		?>
		<!--头部结束-->
		<!--中间开始-->
		<section class="container">
			<div class="center row">
				<div class="col-12" id="nav-head">
						<p><a href="../index.php">首页</a> <font color="#838383"> > </font> <a href="personal_c.php" style="color: #C0C0C0;">我的收藏</a></p>
				</div>
			<!--中间左边开始-->
			<?php
				require("../include/left.php");
			?>
			<!--中间左边结束-->
			<!--中间右边开始-->
			<div class="center_right">
				<div style="height: 40px;"></div>
				<h1 style="font-size: 25px;">商品评论</h1>
			<!--<div style="padding-left: 25px;padding-top: 15px;"><div style="background-color: #E3E3E3; height:1px;width: 100%;"></div></div>-->
				
				    <!-- 选项卡：通过BS的类来控制选项卡的样式-->
				    <ul class="nav nav-tabs profile-tab goods-pin" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#already" role="tab">已评价的商品</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#wait" role="tab">待评价的商品</a> </li>
                    </ul>
					<div class="tab-content">
                        <div class="tab-pane active" id="already" role="tabpanel">
                            <ul>
                            	<?php
									$sql="select *from ite_product_comment as a join ite_order_detail as b on a.username=b.username  where a.username='".$_SESSION["username"]."'";
									$result=mysql_query($sql);
									while($result_arr=mysql_fetch_array($result)){
								?>
		                        <li class="xm-goods-item">
		                            <div class="figure figure-img">
		                                <a href="#">
		                                    <img src="../admin/<?php echo $result_arr["upfile"]; ?>">
		                                </a>
		                            </div>
		                            <h3 class="title">
		                                <a href=""><?php echo $result_arr["goods_name"]; ?></a>
		                            </h3>
		                            <p class="price"><?php echo $result_arr["goods_price"]; ?>元</p>
		                            <div class="actions">
		                                <button class="btn-small btn-line-gray"><a href="my_order_deal.php?act=del&Id=<?php echo $result_arr["Id"]; ?>">删除评论</a></button>
		                                <button class="btn-small btn-primary"><a href="order_p.php?Id=<?php echo $result_arr["Id"]; ?>">查看评论</a></button>
		                            </div>
		                        </li>
                                <?php
									}
								?>
                            </ul>      
                    	</div>
                    	<div class="tab-pane" id="wait" role="tabpanel">
                            <ul>
                            	<?php
									$sql="select *from ite_order_detail where status=4 and username='".$_SESSION["username"]."'";
									$result=mysql_query($sql);
									while($result_arr=mysql_fetch_array($result)){
								?>
                            	<li class="xm-goods-item">
		                            <div class="figure figure-img">
		                                <a href="#">
		                                    <img src="../admin/<?php echo $result_arr["upfile"]; ?>">
		                                </a>
		                            </div>
		                            <h3 class="title">
		                                <a href=""><?php echo $result_arr["goods_name"]; ?></a>
		                            </h3>
		                            <p class="price"><?php echo $result_arr["goods_price"]; ?>元</p>
		                            <div class="actions">
		                                <button class="btn-small btn-line-gray"><a href="my_order_deal.php?act=dell&Id=<?php echo $result_arr["Id"]; ?>">删除</a></button>
		                                <button class="btn-small btn-primary"><a href="order_pinjia.php?Id=<?php echo $result_arr["Id"]; ?>">立即评论</a></button>
		                            </div>
		                        </li>
                                 <?php
									}
								?>
                            </ul>      
                    	</div>
                    </div>
					<!--中间右边结束-->
				<!--商品按钮-->
				<script type="text/javascript">
					$(".xm-goods-item").mouseover(function(){
						$(this).children(".actions").fadeIn(500);
					})
					$(".xm-goods-item").mouseleave(function(){
						$(this).children(".actions").fadeOut(500);
					})
				</script>	
		</section>
		<!--中间结束-->
		<!--尾部开始-->
		<?php
			require("../include/footer.php");
		?>
		<!--尾部结束-->
	</body>	
	
	<!-- Javascript -->
	<script type="text/javascript" src="js/tether.min.js"></script>
</html>
