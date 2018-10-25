<?php 
	include("include/conn.php");//连接数据库
	
	//查询数据
	$Id = @$_GET["Id"];
	if(empty($Id)){
		exit("<script>alert('非法入口！');window.location.href='index.php';</script>");
	}else{
		$Id=@$_GET["Id"];
		$sqls="update ite_product set click_num = click_num+1 where Id=".$Id."";
		//exit($sql);
		$results=mysql_query($sqls); //执行 $result获取的是一个结果集 （资源类型的表格）
		
		$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.Id=".$Id." ";
		//exit($sql);
//	}
		$result=mysql_query($sql);
		$result_array = mysql_fetch_array($result);
	}	
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"><!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<title>极客之家-<?php echo $result_array["product_name"]; ?>商品详情</title>
	<meta name="author" content="CreativeLayers">
<!--兼容IE=edge及IE9-->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" content="IE=9"/>
<!-- 媒体查询 -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="shortcut icon" href="images/logos/geek-icon.png" rel="shortcut icon" type="image/x-icon">
	<script src="admin/js/jquery-1.11.0.min.js" type="text/javascript" charset="utf-8"></script>
<!--返回顶部-->
	<link rel="stylesheet" type="text/css" href="css/gotop.css"/>
</head>
<body class="header_sticky">
	<div class="boxed">
		<div class="overlay"></div>
	<!-- 加载动画 -->
		<div class="preloader">
			<div class="clear-loading loading-effect-2">
				<span></span>
			</div>
		</div>
	<!--头部引入-->
		<?php
			require("include/header.php");//头部引入
			
			$Id = $_GET["Id"];
			$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.Id=".$Id."";
			//$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.Id=79";
			//exit($sql);
	
			$result=mysql_query($sql);
			$result_array = mysql_fetch_array($result);
		?>
		<section class="flat-breadcrumb">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumbs">
							<li class="trail-item">
								<a href="#" title="">主页</a>
								<span><img src="images/icons/arrow-right.png" alt="极客之家"></span>
							</li>
							<li class="trail-item">
								<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="<?php echo $result_array["product_name"]; ?>"><?php echo $result_array["product_name"]; ?></a>
								<span><img src="images/icons/arrow-right.png" alt="极客之家"></span>
							</li>
							<li class="trail-end">
								<a href="#" title="极客之家">商品详情</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		
		<section class="flat-product-detail">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="flexslider">
							<ul class="slides">
								<?php 
									$a=explode("@",$result_array["product_picture"]);
									array_pop($a);
									foreach($a as $k=>$y){
								?>
							    <li data-thumb='admin/<?php
							      		if($result_array["product_picture"]==""){
											echo "upload/180621/1529551482691395.jpg";
										}else{
											echo $a[$k];
										}?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>">
							    	
							      <img src='admin/<?php
							      		if($result_array["product_picture"]==""){
											echo "upload/180624/1529850480816315.jpg";
										}else{
											echo $a[$k];
											}
										?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>"/>
							      <span>NEW</span>
							    </li>
							   <?php } ?>
							</ul>
						</div>
						
					</div>
					<div class="col-md-6">
						<div class="product-detail">
							<div class="header-detail">
								<h4 class="name"><?php echo $result_array["product_name"]; ?></h4>
								<div class="category">
									<?php echo $result_array["product_name"]; ?>
								</div>
								<div class="reviewed">
									<div class="review">
										<div class="queue">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>
										<div class="text">
											<span><?php echo $result_array["pinjia"]; ?> 评论</span>
											<span class="add-review"><?php echo $result_array["model"]; ?></span>
										</div>
									</div><!-- /.review -->
									<div class="status-product">
										发货地 <span><?php echo $result_array["deliver"]; ?></span>
									</div>
								</div><!-- /.reviewed -->
							</div><!-- /.header-detail -->
							<div class="content-detail">
								<div class="price">
									<div class="regular">
										￥<?php echo $result_array["presentPrice"]; ?>元
									</div>
									<div class="sale">
										￥<?php echo $result_array["originalPrice"]; ?>元
									</div>
								</div>
								<div class="info-text">
									<?php echo $result_array["goods_js"]; ?>
								</div>
								<div class="product-id">
									库存: <span class="id"><?php echo $result_array["stock"]; ?>件</span>
								</div>
							</div><!-- /.content-detail -->
							<div class="footer-detail">
								<div class="quanlity-box row">
									<div class="colors col-4">
										<select name="color">
											<option value="">选择颜色</option>
											<option value="典雅黑">典雅黑</option>
											<option value="玫瑰红">玫瑰红</option>
											<option value="象牙白">象牙白</option>
											<option value="极光蓝">极光蓝</option>
											<!--<?php echo $result_array["color"]; ?>-->
										</select>
									</div>
									<div class="quanlity col-3">
										<span class="btn-down" id="min"></span>
										<input type="text" name="number" value="1" placeholder="&nbsp;  数量" id="text_box">
										<span class="btn-up" id="add"></span>
									</div>
								<!--商品数量加减-->
								<script type="text/javascript">
									$(document).ready(function(){
									//获得文本框对象
									var t = $("#text_box");
									//初始化数量为1,并失效减
									$('#min').attr('disabled',true);
									 //数量增加操作
									 $("#add").click(function(){ 
									  // 给获取的val加上绝对值，避免出现负数
									  t.val(Math.abs(parseInt(t.val()))+1);
									  if (parseInt(t.val())!=1){
									  $('#min').attr('disabled',false);
									  };
									 }) 
									 //数量减少操作
									 $("#min").click(function(){
									 t.val(Math.abs(parseInt(t.val()))-1);
									 if (parseInt(t.val())==1){
									 	$('#min').attr('disabled',true);
									};
									 })
									});
								</script>
									<div class="colors col-4">
										<select name="guige">
											<option value="">选择规格</option>
											<option value="6+64GB">6+64GB</option>
											<option value="8+64GB">8+64GB</option>
											<option value="8+128GB">8+128GB</option>
										</select>
									</div>
								</div><!-- /.quanlity-box -->
								<div class="box-cart style2">
									<div class="btn-add-cart">
										<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="<?php echo $result_array["product_name"]; ?>"><img src="images/icons/add-cart.png" alt="">加入购物车</a>
									</div>
									<div class="compare-wishlist">
										<a href="#" class="compare" title=""><img src="images/icons/compare.png" alt="">对比</a>
										<a href="#" class="wishlist" title=""><img src="images/icons/wishlist.png" alt="">加入收藏</a>
									</div>
								</div><!-- /.box-cart -->
								
								<div class="social-single">
									<span>分享到：</span>
									<ul class="social-list style2">
										<li>
											<a href="#" title="">
												<i class="fa fa-facebook" aria-hidden="true"></i>
											</a>
										</li>
										<li>
											<a href="#" title="">
												<i class="fa fa-wechat" aria-hidden="true"></i>
											</a>
										</li>
										<li>
											<a href="#" title="">
												<i class="fa fa-qq" aria-hidden="true"></i>
											</a>
										</li>
										<li>
											<a href="#" title="">
												<i class="fa fa-weibo" aria-hidden="true"></i>
											</a>
										</li>
										<li>
											<a href="#" title="">
												<i class="fa fa-renren" aria-hidden="true"></i>
											</a>
										</li>
										<li>
											<a href="#" title="">
												<i class="fa fa-google" aria-hidden="true"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="flat-product-content">
			<ul class="product-detail-bar">
				<li class="active">商品详情</li>
				<li>规格</li>
				<li>用户评价</li>
			</ul>
			<div class="container">
				<div class="row" style="margin-left:25%;">
		<?php if($result_array["goods_cont"]==""){ ?>
					
		<?php	}else{?>
					<!--销量排行榜-->
					<div class="top-hot" style=" width: 250px;background: #fff; padding:10px; position: absolute;top: 88px;left: -33px;">
						<div>
							<h3 style="text-align: center;margin-top: 10px;">销量排行榜<span></span></h3>
						</div>
						<ul>
							<?php
								$sqlv="select *from ite_product order by click_num desc limit 0,6";
								//exit($sqlv);
								
								$resultv=mysql_query($sqlv);
								while($result_arrayv=mysql_fetch_array($resultv)){
							?>	
							<li>
								<div class="img-cont">
								<?php 
									$a=explode("@",$result_arrayv["product_picture"]);
									array_pop($a);
								?>
									<a href="goods-details.php?Id=<?php echo $result_arrayv["Id"] ?>" title="<?php echo $result_arrayv["product_name"] ?>">
										<img src='admin/<?php
											if($result_arrayv["product_picture"]==""){
												echo "upload/180624/1529850480816315.jpg";
											}else{
												echo $a[0];
											}
										?>' alt="<?php echo $result_arrayv["product_name"]; ?>" title="<?php echo $result_arrayv["product_name"]; ?>" width='105'/>
									</a>
									<!--<a href="#" title="">
										<img src="images/blog/14.jpg" alt="">
									</a>-->
								</div>
								<div class="info-product">
									<div class="name">
										<a href="goods-details.php?Id=<?php echo $result_arrayv["Id"]; ?>" title="<?php echo $result_arrayv["product_name"]; ?>"><?php echo $result_arrayv["product_name"]; ?><br/><?php echo $result_arrayv["model"]; ?></a>
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
									<div class="price">
										<span class="sale">￥<?php echo $result_arrayv["presentPrice"]; ?></span><br />
										<span class="regular">￥<?php echo $result_arrayv["originalPrice"]; ?></span>
									</div>
								</div>
							</li>
						<?php } ?>	
						</ul>
					</div>
					<?php echo $result_array["goods_cont"]; ?>
			<?php  }  ?>	
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="tecnical-specs">
							<h4 class="name">
								<?php echo $result_array["product_name"]; ?>
							</h4>
							<table>
								<tbody>
									<tr>
										<td>品牌</td>
										<td><?php echo $result_array["brand"]; ?></td>
									</tr>
									<tr>
										<td>型号</td>
										<td><?php echo $result_array["model"]; ?></td>
									</tr>
									<tr>
										<td>尺寸</td>
										<td><?php echo $result_array["volume"]; ?></td>
									</tr>
									<tr>
										<td>材质</td>
										<td><?php echo $result_array["material"]; ?></td>
									</tr>
									<tr>
										<td>电池容量</td>
										<td><?php echo $result_array["battery"]; ?></td>
									</tr>
									<tr>
										<td>处理器</td>
										<td><?php echo $result_array["cpu"]; ?></td>
									</tr>
									<tr>
										<td>质量</td>
										<td><?php echo $result_array["zhiliang"]; ?></td>
									</tr>
									<tr>
										<td>颜色</td>
										<td><?php echo $result_array["color"]; ?></td>
									</tr>
									<tr>
										<td>摄像头</td>
										<td><?php echo $result_array["camera"]; ?></td>
									</tr>
									<tr>
										<td>出产地</td>
										<td><?php echo $result_array["producing"]; ?></td>
									</tr>
									<tr>
										<td>质保</td>
										<td><?php echo $result_array["quality"]; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				
			<!--用户评分	-->
			<?php 
			//查询评论表
//				$Id = $_GET["Id"];
//				$sqls="select *from `ite_product_comment` where goods_id=".$Id."";
//				//exit($sql);
//		
//				$results=mysql_query($sqls);
			?>
				<div class="row">
					<div class="col-md-6">
						<div class="rating">
							<div class="title">
								<?php echo $result_array["product_name"]; ?>
							</div>
							<div class="score">
								<div class="average-score">
									<p class="numb"><?php echo $result_array["goods_pf"]; ?></p>
									<p class="text">用户评分</p>
								</div>
								<div class="queue">
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
								</div>
							</div>
							<ul class="queue-box">
								<li class="five-star">
									<span>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="numb-star">5</span>
								</li>
								<li class="four-star">
									<span>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="numb-star">4</span>
								</li><!-- /.four-star -->
								<li class="three-star">
									<span>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="numb-star">3</span>
								</li><!-- /.three-star -->
								<li class="two-star">
									<span>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="numb-star">2</span>
								</li><!-- /.two-star -->
								<li class="one-star">
									<span>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="numb-star">1</span>
								</li>
							</ul>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="rating">
							<div class="title">
								大家都说
							</div>
							<ul class="ping-tag">
								<li>质量不错</li>
								<li>质量不错</li>
								<li>质量不错</li>
								<li>质量不错</li>
								<li>质量不错</li>
								<li>质量不错</li>
							</ul>
						</div>
					</div>
				<h4 style="margin: 20px 0 20px 0;">全部评论</h4>	
				<div style="width: 100%;height:1px;background-color:#EAEAEA;"></div>
				
				<!--评论列表	-->
					<div class="col-md-12">
						<ul class="review-list">
							<!--<li>
								<div class="review-metadata">
									<div class="user-img">
										<img src="images/about/02.jpg" />
									</div>
									<div class="name">
										<p>XXXX</p><span>2018-06-02</span>	
									</div>
									<div class="queue one-star">
										<span>评分：</span>
										<span>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</span>
									</div>
								</div>
								<div class="review-content">
									<p>
										质量不错！非常好。。。。。
									</p> 
									<div class="share">
										<img src="images/banner_boxes/popup.png" />
										<img src="images/banner_boxes/popup.png" />
										<img src="images/banner_boxes/popup.png" />
										<img src="images/banner_boxes/popup.png" />
									</div>
								</div>
							</li>-->
					<!--<?php  while($result_arrays = mysql_fetch_array($results)){ ?>	-->
							<li>
								<div class="review-metadata">
									<div class="user-img">
										<img src="images/about/02.jpg" />
									</div>
									<div class="name">
										<p>XXXX</p><span>2018-06-02</span>	
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
								</div>
								<div class="review-content">
									<p>
										阿哥和打个电话登记卡神咯啊上帝会额外回顾计划局联合建立库存来看三变科技哈就肯定艰苦撒贝宁此举可。。。。
									</p> 
								</div>
							</li>
					<!--<?php } ?>		-->
						</ul>
					</div>
				</div>
			</div>
		</section>
		
	<!--浏览最多-->
		<section class="flat-imagebox style4">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="flat-row-title">
							<h3>浏览最多</h3>
						</div>
						
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
				
				<div class="row">
					<div class="col-md-12">
						<div class="owl-carousel-3">
							<?php 
								$sql="select * from ite_product order by click_num desc limit 0,30";
								$result=mysql_query($sql);
								while($result_array=mysql_fetch_array($result)){
							?>
							<div class="imagebox style4 blue">
								<div class="box-image imgH">
									<?php 
										$a=explode("@",$result_array["product_picture"]);
										array_pop($a);
									?>
									<a href="click.php?Id=<?php echo $result_array["Id"]; ?>" title="<?php echo $result_array["product_name"]; ?>">
										<img src='admin/<?php
											if($result_array["product_picture"]==""){
												echo "upload/180624/1529850480816315.jpg";
											}else{
												echo $a[0];
											}
										?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
									</a>
								</div><!-- /.box-image -->
								<div class="box-content">
									<div class="cat-name">
										<a href="#" title=""><?php echo $result_array["product_type"]; ?></a>
									</div>
									<div class="product-name">
										<a href="#" title=""><?php echo $result_array["product_name"]; ?></a>
									</div>
									<div class="price">
										<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
										<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
									</div>
								</div><!-- /.box-content -->
							</div><!-- /.imagebox style4 -->
							<?php } ?>
						</div><!-- /.owl-carousel-3 -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-imagebox style4 -->
		
	</div>
<!--底部引入-->
	<?php
		require("include/footer.php");
	?>
	
		<!-- Javascript -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/tether.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/waypoints.min.js"></script>
		<script type="text/javascript" src="js/jquery.circlechart.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
		<script type="text/javascript" src="js/owl.carousel.js"></script>
		<script type="text/javascript" src="js/smoothscroll.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script>
		<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
	   	<script type="text/javascript" src="js/gmap3.min.js"></script>
	   	<script type="text/javascript" src="js/waves.min.js"></script>
		<script type="text/javascript" src="js/jquery.countdown.js"></script>

		<script type="text/javascript" src="js/main.js"></script>
		<script>
			$(function(){
				
		   	 	$(".delete-shop img").click(function(i){
		   	 		//$("#tab tr.aa").addClass("delete-style");
		   	 		//$("#tab").find("tr:eq("+i+")").html();
		   	 		//$(this).css("display","none");
		   	 		$("#tab").find("tr:eq("+i+")").each(function () {
		                //$(this).find("td").each(function () {
		                    alert($(this).text());
		               // });
		            });
		   	 		//$("#tab").find("tr").eq(e).find("td").eq(0);
		   	 	})
			})
		</script>
	</body>	
</html>