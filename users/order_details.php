<?php
	include("../include/conn.php");
	$Id=$_GET["Id"];
	//exit($Id);
	$sql="select * from `ite_order_detail` as a join `ite_order` as b on a.`OrderNum`=b.`OrderNum` where a.Id=".$Id."";
	//sexit($sql);
	$result=mysql_query($sql);
	$result_arr=mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>订单详情</title>
		<link rel="shortcut icon" href="images/logos/geek-icon.png">
		<link rel="stylesheet" type="text/css" href="css/settlement.css"/>
		<link rel="stylesheet" type="text/css" href="css/base.css"/>
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<script src="../js/jquery-1.11.1.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css"/>
		<script src="js/settlement.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="css/order.css"/>
		<link rel="stylesheet" type="text/css" href="css/trip.css"/>	
		<link rel="stylesheet" type="text/css" href="css/left.css"/>
    	<!--返回顶部-->
		<link rel="stylesheet" type="text/css" href="css/gotop.css"/>
	</head>
	<body style="background-color: #F5F5F5;">
		<!--头部开始-->
		<header id="header">
			<div class="header">
				<img src="images/logos/geek-logo.png" class="logo"/>
				<h2>订单详情</h2>
				<div class="test">  
    				<ul> 
                		<li class="user">
                			用户名&nbsp;<i class="fa fa-chevron-down" style="color: #757575;"></i>
	              			<ul class="test-list">  
	                      		<li><a href="#">个人中心</a></li>  
	                     		<li><a href="#">评价晒单</a></li>  
	                     		<li><a href="#">我的收藏</a></li>  
	                     		<li><a href="#">修改资料</a></li>    
	                     		<li><a href="#">退出</a></li>
	                		</ul>  
         				</li> 
         				<li class="fen">|</li>
         				<li style="text-align: right;width: 90px;"><a href="#">我的订单</a></li>
   					</ul>  
				</div>  
		</header>
		<script type="text/javascript">
			$(".user").mouseover(function(){
				$(this).children(".test-list").fadeIn(500);
			})
			$(".user").mouseleave(function(){
				$(this).children(".test-list").fadeOut(500);
			})
		</script>
		<!--头部结束-->
		
		<!--中间主体开始-->
		<section class="container" style="width: 1226px;">
			<div class="center row">
				<div class="col-12" id="nav-head">
					<p><a href="../index.php">首页</a> 
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<a href="personal_c.php" style="color: #555555;">我的订单</a>
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<span><a href="#" style="color: #555555;">订单详情</a></span>
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<span class="order-num" style="color: #F0AD4E">订单号<?php echo $result_arr["OrderNum"]; ?></span>
					</p>
				</div>
			<!--中间左边开始-->
			<?php
				require("../include/left.php");
			?>
			<!--中间左边结束-->
			<!--中间右边开始-->
			<div class="center_right">
				<div class="myhy_det">
		             <div class="my_base my_base03">
		                  <div class="comment_list">
		    	                <div class="my_ord01">
		                           <div class="order-detail_01">
			                            <span>订单号：<?php echo $result_arr["OrderNum"]; ?></span><span> 状态：<i style="color: #009900;">已完成 </i><span class="pay"><a href="#" >已支付</a></span></span><i>本订单由第三方卖家为您发货 </i>
			                            <font class="right"><span><a href="#">订单打印</a></span><span  style="width:45px;"><a href="#">取消</a></span></font>
		                        	</div>
		                           <div class="order-detail_02">
			                            <p>
						                    	尊敬的客户，您的订单商品已经从库房发出，请您做好收货准备。 <br/>
						                由乌克澜提供在线交易保障如果您已收到货，请确认收货，乌克澜将与卖家结算。如果您对购买的商品不满意，您可在确认收货后发起返修/退换货申请! 
			                            </p>
		                        	</div>
		                        </div>  
		                        <div class="v_dd_d1">
		                            <div class="v_dd_one">
		                                <img src="images/rz_yd_tit3.png">
		                            </div>
		                            <div class="v_dd_two">
		                              <ul class="clearfix">
		                                   <li><?php echo $result_arr["addTime"]; ?></li>
		                                   <li><?php echo $result_arr["addTime"]; ?></li>
		                                   <li><?php echo $result_arr["addTime"]; ?></li>
		                                   <!--<li>2014-07-22<br/> 11:16:11</li>
		                                   <li>2014-07-22<br/> 11:16:11</li>-->
		                              </ul>
		                        	</div>      
		                        </div>
		                        <div class="clearfix"></div>
		                        <div class="order-detail_03">
		                            <h5>订单跟踪</h5>	
		                            <div class="order_news">
		                                <ul class="clearfix">
		                                    <li>处理时间</li><li style="text-align:center">处理信息</li><li style="text-align:center"> 操作人</li>
		                                    <div class="clear"></div>
		                                </ul>
		                                <div class="logistics">
		                                    <p><font><?php echo $result_arr["addTime"]; ?></font><font style="text-align:center">您提交了订单，请等待系统确认</font> <font style="text-align:center">客户</font></p>
		                                    <p><font><?php echo $result_arr["addTime"]; ?></font><font style="text-align:center"> 第三方卖家已经开始拣货，订单不能修改  </font> <font style="text-align:center">乌克兰物流部</font></p>
		                                    <p><font><?php echo $result_arr["addTime"]; ?> </font><font style="text-align:center">您的订单已经出库，等待发货    </font> <font style="text-align:center">乌克兰物流部</font></p>
		                                    <p><font><?php echo $result_arr["addTime"]; ?> </font><font style="text-align:center"> 货物已交付韵达快递,运单号为<?php echo $result_arr["OrderNum"]; ?>  </font> <font style="text-align:center">乌克兰物流部</font></p>
		                                    <p><font><?php echo $result_arr["addTime"]; ?> </font><font style="text-align:center"> 麓谷xxxxx菜鸟驿站 取货码10223  </font> <font style="text-align:center">已签收</font></p>
		                                </div>
		                                <div class="logis_last">
		                                    <span>送货方式：普通快递</span>
		                                    <span>承运人：韵达快递承运人</span>
		                                    <span>电话：400 821 6789</span>
		                                    <span>货运单号：<?php echo $result_arr["OrderNum"]; ?> </span>
		                                    <a href="#">  点击查询</a></span>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="order-detail_04">
		                               <h5>订单信息</h5>
		                                <ul class="my_order_message">
			                                <li>
			                                  <strong>收货人信息</strong><br />
				                                  收 货 人：<?php echo $result_arr["contactName"]; ?><br />
				                                  地&nbsp;&nbsp;址：<?php echo $result_arr["Contactaddress"]; ?><br />
				                                  手机号码：<?php echo $result_arr["contactphone"]; ?><br />
				                                  固定电话：0731-56441652
			                          
			                                </li>
			                                <li>
			                                  <strong>支付及配送方式</strong><br />
			                                  支付方式：货到付款<br />
			                                  配送方式：物流配送<br />
			                                </li>
			                                <li>
			                                 <strong> 发票信息</strong><br />
			                                  发票类型：不开发票<br />
			                                </li>
		                               </ul>
		                            <div class="car_top1">商品清单</div>  
		                                <ul class="my_shopTab01">
		                                  <li style="width:40%">商品</li>
		                                  <li style="width:20%">单价</li>
		                                  <li style="width:20%">商品数量</li>
		                                  <li style="width:20%">小计</li>
		                                </ul> 
		                            <div class="clear"></div>
		                            <div class="my_shopTab02 my_shopTab0222">
		                                  <div class="my_shopCont clearfix">
		                                       <div class="my_shopCont01 my_reSc01">
		                                            <img src="images/product/other/01.jpg" alt="">
		                                      		<a href="#" target="_blank"><?php echo $result_arr["goods_name"]; ?></a>
		                                       </div>
		                                       <p class="my_shopCont02" style="color: #F24800;"><?php echo $result_arr["goods_price"]; ?></p>
		                                       <div class="my_shopCont03">
		                                            <div class="my_Cont033 my_reCont033">1</div>
		                                       </div>
		                                       <p class="my_shopCont05"><?php echo $result_arr["goods_price"]*$result_arr["goods_num"]; ?>元</p>
		                                  </div>
		                            </div>
		                            <div class="summarize">
		                                <ul>
		                                    <li>商品金额：￥<?php echo $result_arr["goods_price"]*$result_arr["goods_num"]; ?></li>
		                                    <li>运费：￥0.00</li>
		                                    <li style="margin-top:10px;">实付款：<i>￥<?php echo $result_arr["goods_price"]*$result_arr["goods_num"]; ?></i></li>
		                                </ul>
		                            </div>
		                       </div>
		                </div>
	                </div>
	         </div>
			</div>
				<!--中间右边结束-->
			</div>
		</section>
		<!--中间结束-->
		
		<!--尾部开始-->
		<?php require("../include/footer.php"); ?>
		<!--尾部结束-->
	</body>
</html>