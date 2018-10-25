<?php
	require("../include/conn.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>我的订单</title>
		<meta name="author" content="CreativeLayers">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<script src="js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<script src="../js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<link rel="stylesheet" type="text/css" href="../css/responsive.css">
		<link rel="shortcut icon" href="images/logos/geek-icon.png">
		<link rel="stylesheet" href="css/my_order.css" />
		<link rel="stylesheet" type="text/css" href="css/left.css"/>
		<!--返回顶部-->
		<link rel="stylesheet" type="text/css" href="css/gotop.css"/>
	</head>
	<body style="background-color: #F5F5F5;">
		<!--头部开始-->
		<?php
			require("include/header.php");
		?>
		<!--头部结束-->
		<!--中间开始-->
		<section class="container">
			<div class="center row">
				<div class="col-12" id="nav-head">
					<p><a href="../index.php">首页</a> <font color="#838383"> > </font> <a href="personal_c.php" style="color: #C0C0C0;">我的订单</a></p>
				</div>
			<!--中间左边开始-->
			<?php
				require("../include/left.php");
			?>
			<!--中间左边结束-->
			<!--中间右边开始-->
			<div class="center_right">
				<div style="height: 40px;"></div>
				<h1 style="font-size: 25px;">我的订单</h1>
				    <!--选项卡：通过BS的类来控制选项卡的样式-->
		    		<ul class="nav nav-tabs profile-tab goods-pin" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">全部订单</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab2" role="tab">待支付</a> </li>
                    	<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab3" role="tab">待发货</a> </li>
                    	<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab4" role="tab">待收货</a> </li>
                   </ul>
				    <!-- 选项卡的内容定义-->
				   <div class="tab-content">
				      	<div class="tab-pane active" id="tab1" role="tabpanel">
				      		<ul>
                            	<?php
							   		$sql="select * from ite_order_detail where status=4 and username='".$_SESSION["username"]."' order by Id desc";
									//exit($sql);
									$result=mysql_query($sql);
									while($result_arr=mysql_fetch_array($result)){
								?>
				      			<li>
				      				<div class="img-product2 imgs maxh"><img src="../admin/<?php echo $result_arr["upfile"]; ?>" class="img-s"/></div>
		                            <span class="goods-name"><div style="white-space:nowrap;overflow:hidden;width:175px;text-overflow:ellipsis;float:left;text-align: left;padding-top: 9px;"><?php echo $result_arr["goods_name"]; ?></div></span>
		                            <span class="price"><?php echo $result_arr["goods_price"]; ?> 元 x <?php echo $result_arr["goods_num"]; ?></span>
		                            <span class="total"><?php echo $result_arr["goods_price"]*$result_arr["goods_num"]; ?>元</span>
		                            <div class="goods-btn">
		                                <button class="btn-small delete"><a href="my_order_deal.php?act=del&Id=<?php echo $result_arr["Id"]; ?>">删除订单</a></button>
		                                <button class="btn-small see"><a href="order_details.php?Id=<?php echo $result_arr["Id"]; ?>">查看订单</a></button>
		                            </div>
				      			</li>
                               <?php
									}
							   ?>
				      		</ul>
                        </div>
				        <div class="tab-pane" id="tab2" role="tabpanel">
                        	<ul>
                            	<?php
							   		$sql="select * from ite_order_detail where status=1 and username='".$_SESSION["username"]."' order by Id desc";
									//exit($sql);
									$result=mysql_query($sql);
									while($result_arr=mysql_fetch_array($result)){
								?>
				      			<li>
				      				<div class="img-product2 imgs maxh"><img src="../admin/<?php echo $result_arr["upfile"]; ?>" class="img-s"/></div>
		                            <span class="goods-name"><div style="white-space:nowrap;overflow:hidden;width:175px;text-overflow:ellipsis;float:left;text-align: left;padding-top: 9px;"><?php echo $result_arr["goods_name"]; ?></div></span>
		                            <span class="price"><?php echo $result_arr["goods_price"]; ?> 元 x <?php echo $result_arr["goods_num"]; ?></span>
		                            <span class="total"><?php echo $result_arr["goods_price"]*$result_arr["goods_num"]; ?>元</span>
		                            <div class="goods-btn">
		                                <button class="btn-small delete"><a href="my_order_deal.php?act=del&Id=<?php echo $result_arr["Id"]; ?>">取消订单</a></button>
		                                <button class="btn-small see"><a href="hotel_pay.php?Id=<?php echo $result_arr["Id"];?>">去付款</a></button>
		                            </div>
				      			</li>
                                <?php
									}
							   ?>
				      		</ul>
                        </div>
				      	<div class="tab-pane" id="tab3" role="tabpanel">
                        	<ul>
                            	<?php
							   		$sql="select * from ite_order_detail where status=2 order by Id desc";
									//exit($sql);
									$result=mysql_query($sql);
									while($result_arr=mysql_fetch_array($result)){
								?>
				      			<li>
				      				<div class="img-product2 imgs maxh"><img src="../admin/<?php echo $result_arr["upfile"]; ?>" class="img-s"/></div>
		                            <span class="goods-name"><div style="white-space:nowrap;overflow:hidden;width:175px;text-overflow:ellipsis;float:left;text-align: left;padding-top: 9px;"><?php echo $result_arr["goods_name"]; ?></div></span>
		                            <span class="price"><?php echo $result_arr["goods_price"]; ?> 元 x <?php echo $result_arr["goods_num"]; ?></span>
		                            <span class="total"><?php echo $result_arr["goods_price"]*$result_arr["goods_num"]; ?>元</span>
		                            <div class="goods-btn">
		                                <button class="btn-small delete"><a href="">查看物流</a></button>
		                                <button class="btn-small see"><a href="my_order_deal.php?act=upd&Id=<?php echo $result_arr["Id"];?>">提醒发货</a></button>
		                            </div>
				      			</li>
                                <?php
									}
							   ?>
				      		</ul>
                        </div>
                        <div class="tab-pane" id="tab4" role="tabpanel">
                        	<ul>
                            	<?php
									
									
							   		$sql="select * from ite_order_detail where status=3 order by Id desc";
									//exit($sql);
									$result=mysql_query($sql);
									while($result_arr=mysql_fetch_array($result)){
								?>
				      			<li>
				      				<div class="img-product2 imgs maxh"><img src="../admin/<?php echo $result_arr["upfile"]; ?>" class="img-s"/></div>
		                            <span class="goods-name"><div style="white-space:nowrap;overflow:hidden;width:175px;text-overflow:ellipsis;float:left;text-align: left;padding-top: 9px;"><?php echo $result_arr["goods_name"]; ?></div></span>
		                            <span class="price"><?php echo $result_arr["goods_price"]; ?> 元 x <?php echo $result_arr["goods_num"]; ?></span>
		                            <span class="total"><?php echo $result_arr["goods_price"]*$result_arr["goods_num"]; ?>元</span>
		                            <div class="goods-btn">
		                                <button class="btn-small delete"><a href="">查看物流</a></button>
		                                <button class="btn-small see"><a href="my_order_deal.php?act=update&Id=<?php echo $result_arr["Id"];?>">确认收货</a></button>
		                            </div>
				      			</li>
                                <?php
									}
							   ?>
				      		</ul>
                        </div>
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
		<!--<script type="text/javascript">
			$(".delivery").click(function(){
				$(this).addClass("link");
				$(".delivery").removeClass("link");
			})
		</script>-->
		<!--尾部结束-->
	</body>	
	<!-- Javascript -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>
</html>
