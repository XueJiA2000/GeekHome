<?php
	include("../include/conn.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>收货地址管理</title>
		<meta name="author" content="CreativeLayers">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<script src="js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/responsive.css">
		<script src="../js/jquery-1.11.1.min.js" type="text/javascript" charset="utf-8"></script>	
		<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css"/>
		<link rel="shortcut icon" href="images/logos/geek-icon.png">
		<link rel="stylesheet" type="text/css" href="css/personal_info.css"/>
		<link rel="stylesheet" type="text/css" href="css/left.css"/>
		<!--城市选择-->
		<script type="text/javascript" src="js/settlement.js" ></script>
		<script type="text/javascript" src="js/Popt.js"></script>
		<script type="text/javascript" src="js/city.json.js"></script>
		<script type="text/javascript" src="js/citySet.js"></script>
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
						<p><a href="../index.php">首页</a> <font color="#838383"> > </font> <a href="personal_c.php" style="color: #C0C0C0;">收货地址管理</a></p>
					</div>
				<!--中间左边开始-->
				<?php
					require("../include/left.php");
				?>
				<!--中间左边结束-->
				<!--中间右边开始-->
				<div id="center_right">
					<div style="height: 40px;"></div>
					
					<h1>收货地址管理</h1>
                    <?php
						$sql="select * from ite_adress where user='".$_SESSION["username"]."' order by Id desc";
						$result=mysql_query($sql);
						while($result_arr=mysql_fetch_array($result)){
					?>
	               	<div class="receive">
	              		<div class="tag">
	              			<img src="images/tag.png" width="70" height="25"/>
	              		</div>
	               		<div style="height: 20px;"></div>
	               		<h3 class="userName"><?php echo $result_arr["userName"]; ?></h3>
	               		<p class="call">电话：<?php echo $result_arr["cellphone"]; ?></p>
	               		<p class="addr">地址：<?php echo $result_arr["address"]; ?> <?php echo $result_arr["adress"]; ?></p>
	               		<p class="code">邮编：<?php echo $result_arr["code"]; ?></p>
	               		<p class="moren acti">设为默认</p>
	               		<p class="dell acti">
	               			<a class="update_address" id="xiu">修改</a>
	               			<a href="address_deal.php?act=del&Id=<?php echo $result_arr["Id"]; ?>">删除</a>
	               			
	               		</p>
	               	</div>
	               	<?php
						}
					?>
	               	<div class="receive address">
	               		<i class="fa fa-plus-circle fa-2x" onclick="showdiv();"></i>
	               		<p>添加收货地址</p>
	               		
	               		<div id="bg"></div>
						<div id="show">
							<form action="settlement_deal.php?act=add" id="frm1" method="post">
								<div class="contain">
								    <div class="fixWidth">
								        <!--<div class="demo">
								            <div id="trigger4">请选择收货地址</div>
								        </div>-->
								        <div id="wrap">
											<input class="input" name="address" id="city" type="text" placeholder="请选择城市" autocomplete="off" readonly/>
										</div>
								    </div>
								</div>
									<textarea name="adress" id="adress" placeholder="详细地址" rows="" cols="" required></textarea>
								    <input type="text" class="username" id="username" name="userName" placeholder="收货人姓名" required/>
								    <input type="tel" class="tel" id="tel" name="cellphone" placeholder="11位电话号码" required/>
								    <input type="text" class="postcode" id="code" name="code" placeholder="邮政编号" />
								    <input type="submit" id="save" value="保存" />
								    <input type="submit" name="" id="cancel" value="取消" onclick="hidediv();" />
						    </form>
						</div>
	                </div>
					<script type="text/javascript">
						$("#city").click(function (e) {
							SelCity(this,e);
						});
						$("s").click(function (e) {
							SelCity(document.getElementById("city"),e);
						});
						$(".receive").mousemove(function(){
							$(this).children(".acti").fadeIn(500);
						});
						$(".receive").mouseleave(function(){
							$(this).children(".acti").fadeOut(500);
						});
						$(".moren").click(function(){
							$(this).siblings(".tag").fadeIn(500);
							$(this).parent(".receive").addClass("default")
							$(this).parent(".receive").siblings(".receive").children(".tag").fadeOut(500);
							$(this).parent(".receive").siblings(".receive").removeClass("default");
						});
						
					</script>
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
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</html>
