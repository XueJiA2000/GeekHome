<?php
header("Content-type:text/html;charset=utf-8");
	include("../include/conn.php");
	$Id=@$_POST["Id"];
	//exit(print_r($Id));
	if(empty($Id)){
		exit("<script>alert('请选择商品！');window.location.href='../shop-cart.php';</script>");
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>订单结算</title>
		<script src="js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="css/settlement.css"/>
		<link rel="stylesheet" type="text/css" href="css/base.css"/>
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css"/>
		<script src="js/settlement.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="css/public.css"/>
		<!--城市选择-->
		<script type="text/javascript" src="js/Popt.js"></script>
		<script type="text/javascript" src="js/city.json.js"></script>
		<script type="text/javascript" src="js/citySet.js"></script>
    	<!--返回顶部-->
		<link rel="stylesheet" type="text/css" href="css/gotop.css"/>
	</head>
	<body style="background-color: #F5F5F5;">
		<!--头部开始-->
		<header id="header">
			<div class="header">
				<a href="../index.php"><img src="images/logos/geek-logo.png" class="logo"/></a>
				<h2>确认订单</h2>
				<div class="test">  
    				<ul> 
                		<li class="user">
                			用户名&nbsp;<i class="fa fa-chevron-down" style="color: #757575;"></i>
	              			<ul class="test-list">  
	                      		<li><a href="personal_c.php">个人中心</a></li>  
	                     		<li><a href="comment.php">评价晒单</a></li>  
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
		<div class="main">
			<div class="subject">
				<div class="empty"></div>
				<h3 class="title">收货地址</h3>
                <?php
					$sql="select * from ite_adress order by Id desc limit 0,2";
					$result=mysql_query($sql);
					while($result_arr=mysql_fetch_array($result)){
				?>
		        <div class="receive">
			        <div style="height: 20px;"></div>
			        <h3><?php echo $result_arr["userName"]; ?></h3>
			        <p class="call"><?php echo $result_arr["cellphone"]; ?></p>
			        <p class="addr"><?php echo $result_arr["address"]; ?> <?php echo $result_arr["adress"]; ?></p>
			        <p><?php echo $result_arr["code"]; ?></p>
			        <p class="dell">
			            <a id="xiu">修改</a><a href="settlement_deal.php?act=del&Id=<?php echo $result_arr["Id"]; ?>">删除</a>
			            <div id="bg1"></div>
			            <div id="show1">
			            	<form action="settlement_deal.php?act=update&Id=<?php echo $result_arr["Id"]; ?>" method="post">
			            		<div style="margin: 10px 120px;"><span style="font-size: 18px;">姓名：</span><input type="text" name="userName" id="" value="<?php echo $result_arr["userName"]; ?>"  style="margin-top:10px;border-radius: 0; width: 300px;" /></div>
			            		<div style="margin: 10px 120px;"><span style="font-size: 18px;">电话：</span><input type="tel" name="cellphone" id="" value="<?php echo $result_arr["cellphone"]; ?>"  style="margin-top: 10px; border-radius: 0; width: 300px;" /></div>
			            		<div style="margin: 10px 120px;"><span style="font-size: 18px;">地址：</span><input type="text" name="address" id="" value="<?php echo $result_arr["address"]; ?>"  style="margin-top: 10px; border-radius: 0; width: 300px;"/></div>
			            		<div style="margin: 10px 120px;"><span style="font-size: 18px;">地址：</span><input type="text" name="adress" id="" value="<?php echo $result_arr["adress"]; ?>"  style="margin-top: 10px; border-radius: 0; width: 300px;"/></div>
			            		<div style="margin: 10px 120px;"><span style="font-size: 18px;">邮编：</span><input type="text" name="code" id="" value="<?php echo $result_arr["code"]; ?>" style="margin-top: 10px; border-radius: 0; width: 300px;" /></div>
			            		<div style="margin: 10px 120px;"><span style="font-size: 18px;">默认：</span><input type="text" name="isflag" id="" value="<?php echo $result_arr["isflag"]; ?>" style="margin-top: 10px; border-radius: 0; width: 300px;" /></div>
			            		
			            		<input type="submit" value="修改" style="color: white; margin: 0px 94px; border-radius: 0; width: 120px; height: 40px; background: #F24800;"/>
			            		<input type="button" name="" id="cancel" value="取消" onclick="hidediv();" style="color: white; border-radius: 0; width: 120px; height: 40px;" />
			            	</form>
			            </div>
			        </p>
		        </div>
		        <?php } ?>
		        <script type="text/javascript">
		        	$("#xiu").click(function(){
						$("#bg1").css("display","block");
						$("#show1").addClass("showtime");
					})
		        	function hidediv() {
					    $("#bg1").fadeOut(500);
					    $("#show1").removeClass("showtime");
					   	$("#show1").addClass("hidetime");
					}
		        </script>
				<div class="address demo">
					<i class="fa fa-plus-circle fa-2x" onclick="showdiv();"></i>
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
								<textarea name="adress" placeholder="详细地址" rows="" cols="" required></textarea>
							    <input type="text" class="username" name="userName" placeholder="收货人姓名" required/>
							    <input type="tel" class="tel" name="cellphone" placeholder="11位电话号码" required/>
							    <input type="text" class="postcode" name="code" placeholder="邮政编号" />
							    <input type="submit" id="save" value="保存" />
							    <input type="submit" name="" id="cancel" value="取消" onclick="hidediv();" />
					    </form>
					</div>
                    <script type="text/javascript">
						$("#city").click(function (e) {
							SelCity(this,e);
						});
						$("s").click(function (e) {
							SelCity(document.getElementById("city"),e);
						});
					</script>
				</div>
                <div style="clear:both;"></div>
                <?php
					$sql="select * from ite_adress where isflag=1";
					$result=mysql_query($sql);
					$result_array=mysql_fetch_array($result);
				?>
                <form action="settlement_deal.php?act=order" method="post" id="myForm">
					<input type="hidden" value="<?php echo date("Ymd").time().mt_rand(10,99);?>"  name="OrderNum"/>
                    <input type="hidden" value="<?php echo $result_array["userName"]; ?>"  name="contactName"/>
                    <input type="hidden" value="<?php echo $result_array["cellphone"]; ?>"  name="contactphone"/>
                    <input type="hidden" value="<?php echo $result_array["address"]; ?><?php echo $result_array["adress"]; ?>"  name="Contactaddress"/>
                    <div id="distribution">
                        <h3>配送方式</h3>
                        <p class="freight">快递配送(免运费)</p>
                    </div>
                    <div id="time">
                        <h3 class="time">配送时间</h3>
                        <ul>
                            <li class="delivery" id="pei">不限送货时间：周一至周日</li>
                            <li class="delivery">工作日送货：周一至周五</li>
                            <li class="delivery">双休日、假日送货：周六至周日</li>
                        </ul>
                    </div>
                    <div id="time" style="border: 0;height: 100px;">
                        <h3 class="time">发票</h3>
                        <p>
                            <span id="fa"><a href="#">电子发票</a></span>
                            <span><a href="#">个人</a></span>
                            <span><a href="#">商品明细</a></span>
                            <span><a href="#">备注</a></span>
                        </p>
                    </div>
                    <div id="commodity">
                        <h3 class="commodity">商品及优惠券</h3>
                        <span><a href="#">返回购物车></a></span>
                        <div class="section-body">
                            <ul>
                            	<?php
									$Id=implode(",",$Id);
									//exit($Id);
									$total=0;
									$productId_arr=explode("@",@$_SESSION["productId"]);
							    	$productNum_arr=explode("@",@$_SESSION["productNum"]);
									
									
							   		$sql="select * from ite_product where Id in(".$Id.")";
									//exit($sql);
									$result=mysql_query($sql);
									$i=0;
									while($result_arr=mysql_fetch_array($result)){
					
									$Id_index=array_search($result_arr["Id"], $productId_arr); 
									$i+=$productNum_arr[$Id_index];
									$total+=$result_arr["presentPrice"]*$productNum_arr[$Id_index];//总计钱
								 	
								?>
                                <li class="clearfix">
                                    <div class="col col-img">
                                       <?php 
											$a=explode("@",$result_arr["product_picture"]);
												array_pop($a);
											?>
											<img src='../admin/<?php
												if($result_arr["product_picture"]==""){
													echo "upload/180624/1529850480816315.jpg";
												}else{
													echo $a[0];
												}
											?>' alt="<?php echo $result_arr["product_name"]; ?>" title="<?php echo $result_arr["product_name"]; ?>" />
                                    </div>
                                    
                                    <div class="col col-name">
                                        <a href=""><?php echo $result_arr["product_name"]; ?>  </a>
                                    </div>
                                    
                                    <div class="col col-price">
                                         <?php echo $result_arr["presentPrice"]; ?>元 x <?php echo $productNum_arr[$Id_index];?>                        
                                    </div>
                                    
                                    <div class="col col-total">
                                        <?php echo $result_arr["presentPrice"]*$productNum_arr[$Id_index]; ?>元
                                    </div>
                                </li><br /> 
                                 <?php
		                        	}
		                        ?> 
                        </div>
                    </div>
                    
                    <div id="settlement">
                        <div class="number"><label>商品件数：</label><span><?php echo $i;?>件</span></div>
                        <div class="totalPrice"><label>商品总价：</label><span><?php echo $total; ?>元</span></div>
                        <div class="totalPrice"><label>优惠券：</label><span>0元</span></div>
                        <div class="totalPrice"><label>运费：</label><span>10元</span></div>
						<input type="hidden" value="<?php echo $Id?>"  name="Id"/>
                        <div class="payable"><label for="">应付总额：</label><span class="last"><?php echo $total+10; ?>元</span></div>
                        <input class="btn btn-primary btn-lg pay_order" data-toggle="modal" data-target="#myModal" type="submit" name="" id="" value="去结算" />
                    </div>
                </div>
            </div>
            <!--中间主体结束-->
            
            <!-- 付款模态框（Modal） -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                &times;
                            </button>
                            <h4 class="modal-title" id="myModalLabel" style="font-size: 16px;">
                                收银台
                            </h4>
                        </div>
                        <div class="modal-body">
                            <div class="center">
                                <img src="images/geek-logo.png" width="120"/>
                            </div>
                            <div>
                                <ul class="nav nav-tabs profile-tab payment-nav" role="tablist">
                                    <li class="nav-item"> <a class="nav-link text-center active" data-toggle="tab" href="#already" role="tab">支付宝</a> </li>
                                    <li class="nav-item"> <a class="nav-link text-center" data-toggle="tab" href="#wait" role="tab">微信支付</a> </li>
                                </ul>
                                <div class="tab-content">
                            <div class="tab-pane active center" id="already" role="tabpanel">
                                <img src="images/zhifubao.jpg" width="180"/>
                            </div>
                            <div class="tab-pane" id="wait" role="tabpanel">
                                
                            </div>
                        </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                            </button>
                            <button type="button" class="btn btn-primary">提交更改</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
		
		<!--尾部开始-->
		<?php require("../include/footer.php"); ?>
		<!--尾部结束-->
	</body>
	
	<!-- Javascript -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</html>
