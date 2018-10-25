<?php 
	include("include/conn.php");//连接数据库
	
	//查询数据
	if(empty($_GET["p_Id"])){
		exit("<script>alert('非法入口！');window.location.href='index.php';</script>");
	}else{
		$Id = $_GET["p_Id"];
		$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=".$Id." order by a.writerTime desc limit 0,15";
		//exit($sql);
	}
	$results=mysql_query($sql);
	$result_array = mysql_fetch_array($results);
	
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-CN" lang="zh-CN"><!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<title>极客之家-<?php echo $result_array["categoryName"]; ?>列表</title>
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
			require("include/header.php");
			//$Id = $_GET["p_Id"];
			$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=".$Id." order by a.writerTime desc limit 0,15";
			//exit($sql);
			
			$results=mysql_query($sql);
			$result_array = mysql_fetch_array($results);
		?>	
		
		<section class="flat-breadcrumb">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumbs">
							<li class="trail-item">
								<a href="index.php" title="">主页</a>
								<span><img src="images/icons/arrow-right.png" alt=""></span>
							</li>
							<li class="trail-item">
								<a href="#" title=""><?php echo $result_array["categoryName"]; ?></a>
								<span><img src="images/icons/arrow-right.png" alt=""></span>
							</li>
							<li class="trail-end">
								<a href="#" title="">商品列表</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<main id="shop">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4">
						<div class="sidebar ">
							<div class="widget widget-categories">
								<div class="widget-title">
									<h3>类别<span></span></h3>
								</div>
								<ul class="cat-list style1 widget-content">
									<?php 
										$sql_s="select * from ite_category order by Id desc limit 0,8";
										$result_s=mysql_query($sql_s); //执行 $result获取的是一个结果集 （资源类型的表格）
										while($result_arr_s=mysql_fetch_array($result_s)){
											
										if($p_Id==$result_arr_s["Id"]){
											echo "<li value=".$result_arr_s["Id"]."><a style='display: block;' href='goods-list.php?p_Id=".$result_arr_s['Id']."'>".$result_arr_s["categoryName"]."</a></li>";	
										}else{
											echo "<li value=".$result_arr_s["Id"]."><a style='display: block;' href='goods-list.php?p_Id=".$result_arr_s['Id']."'>".$result_arr_s["categoryName"]."</a></li>";	
										}
									?>
							        <?php } ?>
								</ul><!-- /.cat-list -->
							</div><!-- /.widget-categories -->
							<div class="widget widget-price">
								<div class="widget-title">
									<h3>价格<span></span></h3>
								</div>
								<div class="widget-content">
									<p>价格区间</p>
									<div class="price search-filter-input">
                                        <div id="slider-range" class="price-slider ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" ></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span></div>
                                        <p class="amount">
                                          <input type="text" id="amount" disabled="">
                                        </p>
                                   </div>
								</div>
							</div><!-- /.widget widget-price -->
							<div class="widget widget-brands">
								<div class="widget-title">
									<h3>品牌<span></span></h3>
								</div>
								<div class="widget-content">
									<form action="#" method="get" accept-charset="utf-8">
										<input type="text" name="brands" placeholder="搜索品牌">
									</form>
									<ul class="box-checkbox scroll">
										<li class="check-box">
											<input type="checkbox" id="checkbox1" name="checkbox1">
											<label for="checkbox1">Apple <span>(4)</span></label>
										</li>
										<li class="check-box">
											<input type="checkbox" id="checkbox2" name="checkbox2">
											<label for="checkbox2">Samsung <span>(2)</span></label>
										</li>
										<li class="check-box">
											<input type="checkbox" id="checkbox3" name="checkbox3">
											<label for="checkbox3">HTC <span>(2)</span></label>
										</li>
										<li class="check-box">
											<input type="checkbox" id="checkbox4" name="checkbox4">
											<label for="checkbox4">LG <span>(2)</span></label>
										</li>
										<li class="check-box">
											<input type="checkbox" id="checkbox5" name="checkbox5">
											<label for="checkbox5">Dell <span>(1)</span></label>
										</li>
										<li class="check-box">
											<input type="checkbox" id="checkbox6" name="checkbox6">
											<label for="checkbox6">Sony <span>(3)</span></label>
										</li>
										<li class="check-box">
											<input type="checkbox" id="checkbox7" name="checkbox7">
											<label for="checkbox7">Bphone <span>(4)</span></label>
										</li>
										<li class="check-box">
											<input type="checkbox" id="checkbox8" name="checkbox8">
											<label for="checkbox8">Oppo <span>(4)</span></label>
										</li>
									</ul>
								</div>
							</div><!-- /.widget widget-brands -->
							<div class="widget widget-color">
								<div class="widget-title">
									<h3>颜色<span></span></h3>
									<div style="height: 2px"></div>
								</div>
								<div class="widget-content">
									<form action="#" method="get" accept-charset="utf-8">
										<input type="text" name="color" placeholder="搜索颜色">
									</form>
									<div style="height: 5px"></div>
									<ul class="box-checkbox scroll">
										<li class="check-box">
											<input type="checkbox" id="check1" name="check1">
											<label for="check1">黑色 <span>(4)</span></label>
										</li>
										<li class="check-box">
											<input type="checkbox" id="check2" name="check2">
											<label for="check2">黄色 <span>(2)</span></label>
										</li>
										<li class="check-box">
											<input type="checkbox" id="check3" name="check3">
											<label for="check3">白色 <span>(2)</span></label>
										</li>
										<li class="check-box">
											<input type="checkbox" id="check4" name="check4">
											<label for="check4">蓝色 <span>(2)</span></label>
										</li>
										<li class="check-box">
											<input type="checkbox" id="check5" name="check5">
											<label for="check5">红色 <span>(1)</span></label>
										</li>
										<li class="check-box">
											<input type="checkbox" id="check6" name="check6">
											<label for="check6">粉色 <span>(3)</span></label>
										</li>
										<li class="check-box">
											<input type="checkbox" id="check7" name="check7">
											<label for="check7">绿色 <span>(4)</span></label>
										</li>
										<li class="check-box">
											<input type="checkbox" id="check8" name="check8">
											<label for="check8">金色 <span>(4)</span></label>
										</li>
									</ul>
								</div>
							</div>
							<!--销量排行榜-->
							<div class="widget widget-products">
								<div class="widget-title">
									<h3>销量排行榜<span></span></h3>
								</div>
								<ul class="product-list widget-content">
									<?php
										$sqlv="select *from ite_product order by click_num desc limit 0,3";
										//exit($sqlv);
										
										$resultv=mysql_query($sqlv);
										while($result_arrayv=mysql_fetch_array($resultv)){
									?>	
									<li>
										<div class="img-product">
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
												<span class="sale">￥<?php echo $result_arrayv["presentPrice"]; ?></span>
												<span class="regular">￥<?php echo $result_arrayv["originalPrice"]; ?></span>
											</div>
										</div>
									</li>
								<?php } ?>	
								</ul>
							</div>
							<div class="widget widget-banner">
								<div class="banner-box">
									<div class="inner-box">
										<a href="#" title="">
											<img src="images/banner_boxes/06.png" alt="">
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--banner图-->
					<div class="col-lg-9 col-md-8">
						<div class="main-shop">
							<div class="slider owl-carousel-16">
								<div class="slider-item style9">
									<div class="item-text">
										<div class="header-item">
											<p>XXXX 头戴式耳机震撼首发</p>
											<h2 class="name">立即预约</h2>
										</div>
									</div>
									<div class="item-image">
										<img src="images/banner_boxes/07.png" alt="">
									</div>
									<div class="clearfix"></div>
								</div>
								
								<div class="slider-item style9">
									<div class="item-text">
										<div class="header-item">
											<p>iwhact 智能手表</p>
											<h2 class="name">抢先预购</h2>
										</div>
									</div>
									<div class="item-image">
										<img src="images/banner_boxes/07.png" alt="">
									</div>
									<div class="clearfix"></div>
								</div>
								
							</div>
							<div class="wrap-imagebox">
								<div class="flat-row-title">
									<h3>新品列表</h3>
									<span>
										显示1到15个结果
									</span>
									<div class="clearfix"></div>
								</div>
								<div class="sort-product">
									<ul class="icons">
										<li>
											<img src="images/icons/list-1.png" alt="">
										</li>
										<li>
											<img src="images/icons/list-2.png" alt="">
										</li>
									</ul>
									<div class="sort">
										<div class="popularity">
											<select name="popularity">
												<option value="">选择商品排序</option>
												<option value="">价格从低到高排序</option>
												<option value="">价格从高到低排序</option>
												<option value="">按最新发布排序</option>
												<option value="">按人气排序</option>
											</select>
										</div>
										<div class="showed">
											<select name="showed">
												<option value="">显示数目</option>
												<option value="">显示前10</option>
												<option value="">显示前15</option>
												<option value="">显示前20</option>
											</select>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
							
								
							<!--商品列表-->
								<div class="tab-product">
								<!--三行显示-->
									<div class="row sort-box">
										
								<?php 
								
									$product_category=@$_GET["p_Id"]?$_GET["p_Id"]:"";
									$product_name=@$_POST["product_name"]?$_POST["product_name"]:"";
									
									//第一步 计算总记录 和页数
									$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where 1=1 ";
									
									if($product_name!=""){
										$sql.="and a.product_name like '%".$product_name."%' ";
									}
									if($product_category!=""){
										$sql.="and a.product_category=".$product_category;
									}
									//exit($sql);
									$result=mysql_query($sql);//执行$result获取的是一个结果集 （资源类型的表格）

									$sql.=" order by a.Id asc limit 0,15";
									//echo $sql;
									$results=mysql_query($sql);
									while($result_array=mysql_fetch_array($results)){
								?>	
										<div class="col-lg-4 col-sm-6">
											<div class="product-box">
												<div class="imagebox">
													<div class="box-image">
														<?php 
															$a=explode("@",$result_array["product_picture"]);
															array_pop($a);
														?>
															<a href="goods-details.php?Id=<?php echo $result_array["aId"] ?>" title="<?php echo $result_array["product_name"] ?>" class="img">
																<img src='admin/<?php
																	if($result_array["product_picture"]==""){
																		echo "upload/180624/1529850480816315.jpg";
																	}else{
																		echo $a[0];
																	}
																?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>"/>
															</a>
													</div><!-- /.box-image -->
													<div class="box-content">
														<div class="cat-name">
															<a href="goods-details.php?Id=<?php echo $result_array["Id"] ?>" title="<?php echo $result_array["product_name"] ?>"><?php echo $result_array["product_type"] ?></a>
														</div>
														<div class="product-name">
															<a href="goods-details.php?Id=<?php echo $result_array["Id"] ?>" title="<?php echo $result_array["product_name"] ?>"><?php echo $result_array["product_name"] ?></a>
														</div>
														<div class="price">
															<span class="sale">$<?php echo $result_array["presentPrice"] ?></span>
															<span class="regular">$<?php echo $result_array["originalPrice"] ?></span>
														</div>
													</div><!-- /.box-content -->
													<div class="box-bottom">
														<div class="btn-add-cart">
															<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
																<img src="images/icons/add-cart.png" alt="">Add to Cart
															</a>
														</div>
														<div class="compare-wishlist">
															<a href="#" class="compare" title="">
																<img src="images/icons/compare.png" alt="">对比
															</a>
															<a href="#" class="wishlist" title="">
																<img src="images/icons/wishlist.png" alt="">加入收藏
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
									</div>
									
								<!--单行显示-->
									<div class="sort-box">
								<?php  
									$p_Id = $_GET["p_Id"];
									$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=".$p_Id." order by a.writerTime desc limit 0,6";
									//exit($sql);
									$results=mysql_query($sql);
									while($result_array=mysql_fetch_array($results)){ 
								?>			
										<div class="product-box style3">
											<div class="imagebox style1 v3">
												<div class="box-image">
													<?php 
														$a=explode("@",$result_array["product_picture"]);
														array_pop($a);
													?>
														<a href="goods-details.php?Id=<?php echo $result_array["aId"] ?>" title="<?php echo $result_array["product_name"] ?>" class="img">
															<img src='admin/<?php
																if($result_array["product_picture"]==""){
																	echo "upload/180624/1529850480816315.jpg";
																}else{
																	echo $a[0];
																}
															?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>"/>
														</a>
												</div><!-- /.box-image -->
												<div class="box-content">
													<div class="cat-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"] ?>" title="<?php echo $result_array["product_name"] ?>"><?php echo $result_array["product_type"] ?></a>
													</div>
													<div class="product-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"] ?>" title="<?php echo $result_array["product_name"] ?>"><?php echo $result_array["product_name"] ?></a>
													</div>
													<div class="status">
														库存: <?php echo $result_array["stock"] ?>
													</div>
													<div class="info">
														<p>
															<?php echo $result_array["goods_js"] ?>
														</p>
													</div>
												</div><!-- /.box-content -->
												<div class="box-price">
													<div class="price">
														<span class="regular">￥<?php echo $result_array["originalPrice"] ?></span>
														<span class="sale">￥<?php echo $result_array["presentPrice"] ?></span>
													</div>
													<div class="btn-add-cart">
														<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
													<div class="compare-wishlist">
														<a href="#" class="compare" title="">
															<img src="images/icons/compare.png" alt="">对比
														</a>
														<a href="#" class="wishlist" title="">
															<img src="images/icons/wishlist.png" alt="">加入收藏
														</a>
													</div>
												</div><!-- /.box-price -->
											</div><!-- /.imagebox -->
										</div><!-- /.product-box -->
									<?php } ?>	
										<div style="height: 9px;"></div>
									</div>
								</div>
							</div>
							<div class="blog-pagination">
								<span>
									共15件商品
								</span>
								<ul class="flat-pagination style1">
									<li class="prev">
										<a href="#" title="">
											<img src="images/icons/left-1.png" alt="">上一页
										</a>
									</li>
									<li>
										<a href="#" class="waves-effect" title="">01</a>
									</li>
									<li>
										<a href="#" class="waves-effect" title="">02</a>
									</li>
									<li class="active">
										<a href="#" class="waves-effect" title="">03</a>
									</li>
									<li>
										<a href="#" class="waves-effect" title="">04</a>
									</li>
									<li class="next">
										<a href="#" title="">
											下一页<img src="images/icons/right-1.png" alt="">
										</a>
									</li>
								</ul>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>

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
	   	<script type="text/javascript" src="js/waves.min.js"></script>
		<script type="text/javascript" src="js/jquery.countdown.js"></script>

		<script type="text/javascript" src="js/main.js"></script>

</body>	
</html>