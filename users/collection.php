<?php
	include("../include/conn.php");
	$sql="select *from ite_favorites";
	$result=mysql_query($sql);
	$result_arr=mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>我的收藏</title>
		<meta name="author" content="CreativeLayers">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<script src="js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
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
				<h1 style="font-size: 25px;">我的收藏</h1>
					<div style="padding-left: 25px;padding-top: 15px;"><div style="background-color: #E3E3E3; height:1px;width: 100%;"></div></div>
				<div class='tabbable tabs-left'>
				    <ul>
						<?php
                            $sql="select *from ite_favorites limit 0,6";
                            $result=mysql_query($sql);
                            while($result_arr=mysql_fetch_array($result)){
                        ?>
				    	<li class="xm-goods-item">
                            <div class="figure figure-img">
                                <a href="#">
                                    <img src="images/product/other/01.jpg">
                                </a>
                            </div>
                            <h3 class="title">
                                <a href=""><?php echo $result_arr["goods_name"]; ?></a>
                            </h3>
                            <p class="price"><?php echo $result_arr["goods_price"]; ?></p>
                            <div class="actions">
                                <button class="btn-small btn-line-gray"><a href="head_portrait_deal.php?act=del&Id=<?php echo $result_arr["Id"]; ?>">删 除</a></button>
                                <button class="btn-small btn-primary"><a href="Desktop/GeekHome/index.php">查看详情</a></button>
                            </div>
                        </li>
                        <?php
							}
						?>
				    </ul>
				</div>
			</div>
			<!--中间右边结束-->
			</div>
		</section>
		<!--中间结束-->
		<!--尾部开始-->
		<?php
			require("../include/footer.php");
		?>
		<!--尾部结束-->
		
		<!--商品按钮-->
		<script type="text/javascript">
			$(".xm-goods-item").mouseover(function(){
				$(this).children(".actions").fadeIn(500);
			})
			$(".xm-goods-item").mouseleave(function(){
				$(this).children(".actions").fadeOut(500);
			})
		</script>
	<!-- Javascript -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</html>
