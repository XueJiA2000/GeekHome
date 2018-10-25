<?php
	include("../include/conn.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>个人中心</title>
		<meta name="author" content="CreativeLayers">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<script src="js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/responsive.css">
		<link rel="shortcut icon" href="images/logos/geek-icon.png">
		<link rel="stylesheet" href="css/personal_c.css" />
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
					<p><a href="../index.php">首页</a> <font color="#838383"> > </font> <a href="personal_c.php" style="color: #C0C0C0;">个人中心</a></p>
				</div>
				<!--中间左边开始-->
				<?php
					require("../include/left.php");
				?>
				<!--中间左边结束-->
				<!--中间右边开始-->
			<?php 
				$sql="select * from ite_user where username='".$_SESSION["username"]."' ";
				//exit($sql);
				
				$result=mysql_query($sql);
				$result_array=mysql_fetch_array($result);	
			?>	
				<div class="center_right">
					<div class="top">
						<div style="margin-top: 40px;"></div>
						<img src="../<?php echo $result_array["upfile"]?>" class="photo"/>
						<div class="user_card">
							<h2 class="username"><?php echo $result_array["username"]; ?></h2>
							<span class="vip">普通会员</span>
							<a href="personal_info.php" class="modify">修改个人信息></a>
						</div>
						<div class="information">
							<ul>
								<li class="info_list">积分：<font color="orange">200金币</font></li>
								<li class="info_list">手机:<?php echo $result_array["phone"]; ?></li>
								<li class="info_list">邮箱：<?php echo $result_array["email"]; ?></li>
							</ul>
						</div>
					</div>
					<div class="bottom">
						<div style="margin-top: 40px;"></div>
						<ul>
							<li>
								<img src="images/personal_c/portal-icon-1.png"/>
									<h3>待支付的订单：
                                        <span class="num">
											<?php
                                                $sqls="select * from ite_order_detail where status=1 and username='".$_SESSION["username"]."'";
                                                //exit($sql);
                                                $results=mysql_query($sqls);
                                                $i=0;
                                                while($result_arr=mysql_fetch_array($results)){
                                                    $i++;
                                                }
                                            ?>
                                            <?php echo $i; ?>
                                        </span>
                                    </h3>
									<a href="my_order.php">查看待支付订单></a>
							</li>
							<li>
								<img src="images/personal_c/portal-icon-2.png"/>
								<h3>待收货的订单：
                                    <span class="num">
                                        <?php
                                            $sql2="select * from ite_order_detail where status=3 and username='".$_SESSION["username"]."'";
                                            $result2=mysql_query($sql2);
                                            $j=0;
                                            while($result_arr=mysql_fetch_array($result2)){
                                                $j++;
                                            }
                                        ?>
                                        <?php echo $j; ?>
                                    </span>
                                </h3>
								<a href="my_order.php">查看待收货订单></a>
							</li>
							<div style="clear: both;"></div>
							<li>
								<img src="images/personal_c/portal-icon-3.png"/>
								<h3>待评价商品数：
                                	<span class="num">
                                        <?php
                                            $sql3="select * from ite_product_comment where username='".$_SESSION["username"]."'";
                                            $result3=mysql_query($sql3);
                                            $a=0;
                                            while($result_arr=mysql_fetch_array($result3)){
                                                $a++;
                                            }
                                        ?>
                                        <?php echo $a; ?>
                                    </span>
                                </h3>
								<a href="comment.php">查看待评价商品></a>
							</li>
							<li>
								<img src="images/personal_c/portal-icon-4.png"/>
								<h3>我喜欢的商品：
                                    <span class="num">
                                    	0
                                    </span>
                                </h3>
								<a href="collection.php">查看我喜欢的商品></a>
							</li>
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
	</body>	
	<!-- Javascript -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</html>
