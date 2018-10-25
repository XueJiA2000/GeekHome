<?php
	include("../include/conn.php");
	$Id=$_GET["Id"];
	$sql="select *from ite_order_detail where Id='".$Id."'";
	//exit($sql);
	$result=mysql_query($sql);
	$result_arr=mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta http-equiv="Content-Type" content="text/x-component" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="shortcut icon" href="images/logos/geek-icon.png">
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/trip.css"/>
    <link rel="stylesheet" type="text/css" href="css/settlement.css"/>
    <link rel="stylesheet" type="text/css" href="css/order.css"/>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/more-starts.js"></script>
	<title>极客之家评价晒图</title>
</head>
<body style="background:#fafafa;">
        <!--头部开始-->
		<header id="header">
			<div class="header">
				<img src="images/logos/geek-logo.png" class="logo"/>
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
		
	    <!--<div class="main">
			<div class="order">
				<span><a href="#">我的订单</a></span>
				<i class="fa fa-angle-right" aria-hidden="true"></i> 
				<span><a href="#">订单详情</a></span>
				<i class="fa fa-angle-right" aria-hidden="true"></i> 
				<span class="order-num">订单号：123456789</span>
			</div>
		</div>-->
		
	    <div class="w1138 clearfix w0223">
				<div class="hotel_inf" >
					<div class="hotel_inf_w">
						<ul class="dsider_per_list pb10 clearfixs">
							<li>
								<div class="dsider_per_pic">
									<a title=" " href="">
										<img  src="images/product/flexslider/l01.jpg">
									</a>
								</div>
								<div class="dsider_per_text" style="padding-top: 20px;">
									<h3 class="link555 yahei">
					                	<a title=" " href="#"><?php echo $result_arr["goods_name"]; ?></a>
					                </h3>
									<!--<p class=" c999">[五一广场/步行街/中山亭] <br/>芙蓉中路二段80号(靠浏城桥大厦)地铁2号线芙蓉广场站4号出口</p>-->
								</div>
							</li>
						</ul>

						<!--<div class="hotel_roominfobox">
							<p class="rz_hotel_tit"><span class="span1">迷你单人间 - 不含早</span></p>
							<ul class="hotel_roominfo clearfix">
								<li>
									<span>床型：</span>
									<em>-</em>
								</li>
								<li>
									<span>面积：</span>
									<em>29平米</em>
								</li>
								<li>
									<span>宽带：</span>
									<em>宽带</em>
								</li>
								<li>
									<span>早餐：</span>
									<em>双早</em>
								</li>
								<li>
									<span>楼层：</span>
									<em>5层-9层</em>
								</li>
								<li>
									<span>可住：</span>
									<em>2人</em>
								</li>
								<li class="last">
									<span>其他：</span>
									<em >收费提供一次性洗漱用品</em>
								</li>
							</ul>
						</div>-->
					</div>
					<div class="hhelp">
						<ul class="clearfix">
							<li class="hp_lists">
								订单号:<?php echo $result_arr["OrderNum"]; ?>  <br/>
								时间：<?php echo $result_arr["addTime"]; ?>
							</li>
						</ul>
					</div>

				</div>
				<div class="my_pjpic">
				<h2>评价/晒单</h2>
				<div class="BOX">
					<div id="star" class="">
						<span>综合星级评分:</span>
						<ul class="star_UL" sid="0">
							<li><a href="javascript:;">1</a></li>
							<li><a href="javascript:;">2</a></li>
							<li><a href="javascript:;">3</a></li>
							<li><a href="javascript:;">4</a></li>
							<li><a href="javascript:;">5</a></li>
						</ul>
						<span  class="star_result_span">
							<strong></strong>&nbsp;&nbsp;<a></a>
						</span>
					</div>
				</div>
                <form action="order_deal.php?act=comment&Id=<?php echo $result_arr["Id"] ?>" method="post" enctype="multipart/form-data">
                    <div class="my_pjbox clearfix"><i>评价晒单</i>
                         <textarea id="gp_detarea" placeholder="发表你的评价..." name="content"></textarea>
                         <span class="my_pj_num">还可输入<em id="gp_detspan">500</em>字</span>
                    </div>
                    <div class="my_pjbox02 clearfix">
                        <p><img src="images/my_pic.jpg" alt="上传"><input type="file" class="my_pjfile pro" name="upfile1"></p>
                        <p><img src="images/my_pic.jpg" alt="上传"><input type="file" class="my_pjfile pro" name="upfile2"></p>
                        <p><img src="images/my_pic.jpg" alt="上传"><input type="file" class="my_pjfile pro" name="upfile3"></p>
                        <i>共<span>1</span>张还能上传<span>9</span>张</i>
                    </div>
                    <div class="my_pjbox02" style="margin-top:30px;">
                    	<input type="hidden" value="<?php echo $result_arr["username"] ?>" name="username"/>
                    	<input type="hidden" value="<?php echo $result_arr["goods_name"] ?>" name="goods_name"/>
                    	<input type="hidden" value="<?php echo $result_arr["goods_price"] ?>" name="goods_price"/>
                         <input type="submit" value="提交" class="my_pjsub">
                         <em><input type="checkbox" style="opacity:1;margin-top: -1px;"> 匿名评价</em>
                    </div>
                </form>
			</div>
		</div>
		
		<!--尾部开始-->
		<?php require("../include/footer.php"); ?>
		<script type="text/javascript">
			$(".delivery").click(function(){
				$(this).addClass("link");
				$(".delivery").removeClass("link");
			})
		</script>
		<!--尾部结束-->	
	    <script>
			$(function(){
			  $("#gp_detarea").keyup(function(){   /*textarea的字数实时判断*/
				   var len = 500- $(this).val().length;
				   if(len < 0){
				       $(this).val($(this).val().substring(0,500));  /*字数超出截取*/
				   }
				   $("#gp_detspan").text(len);  /*字数传递到某个数字，实时给用户看文字的个数*/
			  });
			}); 
		</script>
</body>
</html>