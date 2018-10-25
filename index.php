<?php
	require("include/conn.php");
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
	<!-- Basic Page Needs -->
	<meta charset="UTF-8">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<title>Geek Home - Index</title>
	<meta name="author" content="CreativeLayers">
		
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="shortcut icon" href="images/logos/geek-icon.png">
<!--返回顶部-->
	<link rel="stylesheet" type="text/css" href="css/gotop.css"/>	
		
</head>
<body class="header_sticky">
	<div class="boxed">
		<div class="overlay"></div>
		<!-- Preloader -->
		<div class="preloader">
			<div class="clear-loading loading-effect-2">
				<span></span>
			</div>
		</div>
		<!-- /.preloader -->
		
		<?php
			require("include/header.php");
		?>
		
		<section class="flat-row flat-slider">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
                		<div class="slider owl-carousel">
                			<?php
							  	$sql="select * from ite_carousel";
								$result=mysql_query($sql); //执行 $result获取的是一个结果集 （资源类型的表格）
								while($result_array=mysql_fetch_array($result)){
							  ?>
							<div class="slider-item style2">
								<div class="item-text">
									<div class="header-item">
										<p><?php echo $result_array["subtitle"]; ?></p>
										<h2 class="x-sign"><?php echo $result_array["headlines"]; ?></h2>
										<p><?php echo $result_array["synopsis"]; ?></p>
									</div>
									<?php if($result_array["synopsis"]==""){?>
										<div class="divider90"></div>
									<?php }?>
									<div class="content-item">
										<div class="price">
											<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
											<span class="btn-shop">
												<a href="#" title="">SHOP NOW <img src="images/icons/right-2.png" alt=""></a>
											</span>
											<div class="clearfix"></div>
										</div>
										<div class="regular">
											$<?php echo $result_array["originalPrice"]; ?>
										</div>
									</div>
								</div>
								<div class="item-image">
									<img src='admin/<?php
										if($result_array["fileName"]==""){
											echo "upload/180621/1529551482691395.jpg";
										}else{
											echo $result_array["fileName"];
										}
									?>' alt="<?php echo $result_array["headlines"]; ?>" title="<?php echo $result_array["headlines"]; ?>"/>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.slider-item style2 -->
							<?php
								}
							?>
						</div><!-- /.slider owl-carousel -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-slider -->

		<section class="flat-row flat-banner-box">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="banner-box one-half">
							<div class="inner-box">
								<a href="#" title="">
									<img src="images/banner_boxes/home-12.jpg" alt="">
								</a>
							</div><!-- /.inner-box -->
							<div class="inner-box">
								<a href="#" title="">
									<img src="images/banner_boxes/home-13.jpg" alt="">
								</a>
							</div><!-- /.inner-box -->
							<div class="clearfix"></div>
						</div><!-- /.banner-box -->
						<div class="banner-box">
							<div class="inner-box">
								<a href="#" title="">
									<img src="images/banner_boxes/home-15.jpg" alt="">
								</a>
							</div>
						</div><!-- /.banner-box -->
					</div><!-- /.col-md-8 -->
					<div class="col-md-4">
						<div class="banner-box">
							<div class="inner-box">
								<a href="#" title="">
									<img src="images/banner_boxes/home-14.jpg" alt="">
								</a>
							</div><!-- /.inner-box -->
						</div><!-- /.box -->
					</div><!-- /.col-md-4 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-banner-box -->

		<section class="flat-imagebox">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-list">
								<li class="active">新品</li>
								<li>特色</li>
								<li>顶级预售</li>
							</ul>
						</div><!-- /.product-tab -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
				<div class="box-product">
					<div class="row">
						<?php
							$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=1 order by a.Id desc limit 0,8";
							$result=mysql_query($sql);
							while($result_array=mysql_fetch_array($result)){
						?>
						<div class="col-lg-3 col-sm-6">
							<div class="product-box">
								<div class="imagebox">
									<?php if($result_array["sign"]==""){ ?>
									<?php }else if($result_array["sign"]==1){ ?>
										<span class="item-new">NEW</span>
									<?php }else if($result_array["sign"]==2){ ?>
										<span class="item-sale">SALE</span>
									<?php } ?>
									<ul class="box-image owl-carousel-1 maxW">
										<?php 
											$a=explode("@",$result_array["product_picture"]);
											array_pop($a);
											foreach($a as $k=>$y){
										?>
										<li>
											<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="<?php echo $result_array["product_name"]; ?>">
												<img src='admin/<?php
													if($result_array["product_picture"]==""){
														echo "upload/180624/1529850480816315.jpg";
													}else{
														echo $a[$k];
													}
												?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>"/>
											</a>
										</li>
										<?php } ?>
									</ul><!-- /.box-image -->
									<div class="box-content">
										<div class="cat-name">
											<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="<?php echo $result_array["product_name"]; ?>"><?php echo $result_array["product_type"]; ?></a>
										</div>
										<div class="product-name">
											<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="<?php echo $result_array["product_name"]; ?>"><?php echo $result_array["product_name"]; ?></a>
										</div>
										<div class="price">
											<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
											<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
										</div>
									</div><!-- /.box-content -->
									<div class="box-bottom">
										<div class="btn-add-cart">
											<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
												<img src="images/icons/add-cart.png" alt="">Add to Cart
											</a>
										</div>
										<div class="compare-wishlist">
											<a href="javascript:;" class="compare" title="">
												<img src="images/icons/compare.png" alt="">比较
											</a>
											<a href="#" class="wishlist" title="">
												<img src="images/icons/wishlist.png" alt="">愿望列表
											</a>
										</div>
									</div><!-- /.box-bottom -->
								</div><!-- /.imagebox -->
							</div><!-- /.product-box -->
						</div><!-- /.col-lg-3 col-sm-6 -->
						<?php } ?>
					</div><!-- /.row -->
					<div class="row">
						<?php
							$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=2 order by a.Id desc limit 0,8";
							$result=mysql_query($sql);
							while($result_array=mysql_fetch_array($result)){
						?>
						<div class="col-lg-3 col-sm-6">
							<div class="product-box">
								<div class="imagebox">
									<?php if($result_array["sign"]==""){ ?>
									<?php }else if($result_array["sign"]==1){ ?>
										<span class="item-new">NEW</span>
									<?php }else if($result_array["sign"]==2){ ?>
										<span class="item-sale">SALE</span>
									<?php } ?>
									<ul class="box-image owl-carousel-1 maxW">
										<?php 
											$a=explode("@",$result_array["product_picture"]);
											array_pop($a);
											foreach($a as $k=>$y){
										?>
										<li>
											<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="<?php echo $result_array["product_name"]; ?>">
												<img src='admin/<?php
													if($result_array["product_picture"]==""){
														echo "upload/180624/1529850480816315.jpg";
													}else{
														echo $a[$k];
													}
												?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
											</a>
										</li>
										<?php } ?>
									</ul><!-- /.box-image -->
									<div class="box-content">
										<div class="cat-name">
											<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="<?php echo $result_array["product_name"]; ?>"><?php echo $result_array["product_type"]; ?></a>
										</div>
										<div class="product-name">
											<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="<?php echo $result_array["product_name"]; ?>"><?php echo $result_array["product_name"]; ?></a>
										</div>
										<div class="price">
											<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
											<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
										</div>
									</div><!-- /.box-content -->
									<div class="box-bottom">
										<div class="btn-add-cart">
											<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
												<img src="images/icons/add-cart.png" alt="">Add to Cart
											</a>
										</div>
										<div class="compare-wishlist">
											<a href="javascript:;" class="compare" title="">
												<img src="images/icons/compare.png" alt="">比较
											</a>
											<a href="#" class="wishlist" title="">
												<img src="images/icons/wishlist.png" alt="">愿望列表
											</a>
										</div>
									</div><!-- /.box-bottom -->
								</div><!-- /.imagebox -->
							</div><!-- /.product-box -->
						</div><!-- /.col-lg-3 col-sm-6 -->
						<?php } ?>
					</div><!-- /.row -->
					<div class="row">
						<?php
							$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=3 order by a.Id desc limit 0,8";
							$result=mysql_query($sql);
							while($result_array=mysql_fetch_array($result)){
						?>
						<div class="col-lg-3 col-sm-6">
							<div class="product-box">
								<div class="imagebox">
									<?php if($result_array["sign"]==""){ ?>
									<?php }else if($result_array["sign"]==1){ ?>
										<span class="item-new">NEW</span>
									<?php }else if($result_array["sign"]==2){ ?>
										<span class="item-sale">SALE</span>
									<?php } ?>
									<ul class="box-image owl-carousel-1 maxW">
										<?php 
											$a=explode("@",$result_array["product_picture"]);
											array_pop($a);
											foreach($a as $k=>$y){
										?>
										<li>
											<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="<?php echo $result_array["product_name"]; ?>">
												<img src='admin/<?php
													if($result_array["product_picture"]==""){
														echo "upload/180624/1529850480816315.jpg";
													}else{
														echo $a[$k];
													}
												?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
											</a>
										</li>
										<?php } ?>
									</ul><!-- /.box-image -->
									<div class="box-content">
										<div class="cat-name">
											<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="<?php echo $result_array["product_name"]; ?>"><?php echo $result_array["product_type"]; ?></a>
										</div>
										<div class="product-name">
											<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="<?php echo $result_array["product_name"]; ?>"><?php echo $result_array["product_name"]; ?></a>
										</div>
										<div class="price">
											<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
											<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
										</div>
									</div><!-- /.box-content -->
									<div class="box-bottom">
										<div class="btn-add-cart">
											<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
												<img src="images/icons/add-cart.png" alt="">Add to Cart
											</a>
										</div>
										<div class="compare-wishlist">
											<a href="javascript:;" class="compare" title="">
												<img src="images/icons/compare.png" alt="">比较
											</a>
											<a href="#" class="wishlist" title="">
												<img src="images/icons/wishlist.png" alt="">加入收藏
											</a>
										</div>
									</div><!-- /.box-bottom -->
								</div><!-- /.imagebox -->
							</div><!-- /.product-box -->
						</div><!-- /.col-lg-3 col-sm-6 -->
						<?php } ?>
					</div><!-- /.row -->
				</div><!-- /.box-product -->
			</div><!-- /.container -->
		</section><!-- /.flat-imagebox -->

		<section class="flat-imagebox style1">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="flat-row-title">
							<h3>我们的产品</h3>
						</div>
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
				<div class="row">
					<?php
						$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=4 order by a.Id desc limit 0,6";
						//exit($sql);
						$result=mysql_query($sql);
						while($result_array=mysql_fetch_array($result)){	
					?>
					<div class="col-md-4">
						<div class="product-box style1">
							<div class="imagebox style1">
								<div class="box-image imgW">
									<?php 
										$a=explode("@",$result_array["product_picture"]);
										array_pop($a);
										foreach($a as $k=>$y){
									?>
									<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="<?php echo $result_array["product_name"]; ?>">
										<img src='admin/<?php
											if($result_array["product_picture"]==""){
												echo "upload/180624/1529850480816315.jpg";
											}else{
												echo $a[$k];
											}
										?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
									</a>
									<?php } ?>
								</div><!-- /.box-image -->
								<div class="box-content">
									<div class="cat-name">
										<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="<?php echo $result_array["product_name"]; ?>"><?php echo $result_array["product_type"]; ?></a>
									</div>
									<div class="product-name">
										<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="<?php echo $result_array["product_name"]; ?>"><?php echo $result_array["product_name"]; ?></a>
									</div>
									<div class="price">
										<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
										<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
									</div>
								</div><!-- /.box-content -->
								<div class="box-bottom">
									<div class="compare-wishlist">
										<a href="javascript:;" class="compare" title="">
											<img src="images/icons/compare.png" alt="">比较
										</a>
										<a href="#" class="wishlist" title="">
											<img src="images/icons/wishlist.png" alt="">愿望列表
										</a>
									</div>
									<div class="btn-add-cart">
										<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
											<img src="images/icons/add-cart.png" alt="">Add to Cart
										</a>
									</div>
								</div><!-- /.box-bottom -->
							</div><!-- /.imagebox style1 -->
						</div><!-- /.product-box style1 -->
					</div><!-- /.col-md-4 -->
					<?php } ?>
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-imagebox style1 -->

		<section class="flat-imagebox style2 background">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="product-wrap">
							<div class="product-tab style1">
								<ul class="tab-list">
									<li class="active">智能手机</li>
									<li>平板电脑</li>
									<li>游戏盒</li>
									<li>配件</li>
									<li>手机</li>
									<li>电脑</li>
								</ul><!-- /.tab-list -->
							</div><!-- /.product-tab style1 -->
							<div class="tab-item">
								<div class="row">
									<?php
										$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=5 limit 0,1";
										$result=mysql_query($sql);
										$result_array=mysql_fetch_array($result);	
									?>
									<div class="col-md-6">
										<div class="product-box">
											<div class="imagebox style2">
												<div class="box-image">
													<?php 
														$a=explode("@",$result_array["product_picture"]);
														array_pop($a);
														foreach($a as $k=>$y){
													?>
													<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
														<img src='admin/<?php
															if($result_array["product_picture"]==""){
																echo "upload/180624/1529850480816315.jpg";
															}else{
																echo $a[$k];
															}
														?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
													</a>
													<?php } ?>
												</div><!-- /.box-image -->
												<div class="box-content">
													<div class="cat-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_type"]; ?></a>
													</div>
													<div class="product-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
													</div>
													<div class="price">
														<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
														<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
													</div>
												</div><!-- /.box-content -->
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
													<div class="compare-wishlist">
														<a href="javascript:;" class="compare" title="">
															<img src="images/icons/compare.png" alt="">比较
														</a>
														<a href="#" class="wishlist" title="">
															<img src="images/icons/wishlist.png" alt="">愿望列表
														</a>
													</div>
												</div><!-- /.box-bottom -->
											</div><!-- /.imagebox style2 -->
										</div><!-- /.product-box -->
									</div><!-- /.col-md-6 -->
									
									<div class="col-md-3">
										<?php
											$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=5 limit 1,2";
											$result=mysql_query($sql);
											while($result_array=mysql_fetch_array($result)){
										?>
										<div class="product-box">
											<div class="imagebox style2">
												<div class="box-image">
													<?php 
														$a=explode("@",$result_array["product_picture"]);
														array_pop($a);
														foreach($a as $k=>$y){
													?>
													<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
														<img src='admin/<?php
															if($result_array["product_picture"]==""){
																echo "upload/180624/1529850480816315.jpg";
															}else{
																echo $a[$k];
															}
														?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
													</a>
													<?php } ?>
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
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
													<div class="compare-wishlist">
														<a href="javascript:;" class="compare" title="">
															<img src="images/icons/compare.png" alt="">比较
														</a>
														<a href="#" class="wishlist" title="">
															<img src="images/icons/wishlist.png" alt="">愿望列表
														</a>
													</div>
												</div><!-- /.box-bottom -->
											</div><!-- /.imagebox style2 -->
										</div><!-- /.product-box -->
										<?php } ?>
									</div><!-- /.col-md-3 -->

									<div class="col-md-3">
										<?php
											$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=5 limit 3,5";
											$result=mysql_query($sql);
											while($result_array=mysql_fetch_array($result)){
										?>
										<div class="product-box">
											<div class="imagebox style2">
												<div class="box-image">
													<?php 
														$a=explode("@",$result_array["product_picture"]);
														array_pop($a);
														foreach($a as $k=>$y){
													?>
													<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
														<img src='admin/<?php
															if($result_array["product_picture"]==""){
																echo "upload/180624/1529850480816315.jpg";
															}else{
																echo $a[$k];
															}
														?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
													</a>
													<?php } ?>
												</div><!-- /.box-image -->
												<div class="box-content">
													<div class="cat-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_type"]; ?></a>
													</div>
													<div class="product-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
													</div>
													<div class="price">
														<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
														<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
													</div>
												</div><!-- /.box-content -->
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
													<div class="compare-wishlist">
														<a href="javascript:;" class="compare" title="">
															<img src="images/icons/compare.png" alt="">比较
														</a>
														<a href="#" class="wishlist" title="">
															<img src="images/icons/wishlist.png" alt="">愿望列表
														</a>
													</div>
												</div><!-- /.box-bottom -->
											</div><!-- /.imagebox style2 -->
										</div><!-- /.product-box -->
										<?php } ?>
									</div><!-- /.col-md-3 -->
								</div><!-- /.row -->
								<div class="row">
									<div class="col-md-3 col-sm-6">
									<?php
										$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=6 limit 0,2";
										$result=mysql_query($sql);
										while($result_array=mysql_fetch_array($result)){
									?>
										<div class="product-box">
											<div class="imagebox style2">
												<div class="box-image">
													<?php 
														$a=explode("@",$result_array["product_picture"]);
														array_pop($a);
														foreach($a as $k=>$y){
													?>
													<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
														<img src='admin/<?php
															if($result_array["product_picture"]==""){
																echo "upload/180624/1529850480816315.jpg";
															}else{
																echo $a[$k];
															}
														?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
													</a>
													<?php } ?>
												</div><!-- /.box-image -->
												<div class="box-content">
													<div class="cat-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_type"]; ?></a>
													</div>
													<div class="product-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
													</div>
													<div class="price">
														<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
														<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
													</div>
												</div><!-- /.box-content -->
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
													<div class="compare-wishlist">
														<a href="javascript:;" class="compare" title="">
															<img src="images/icons/compare.png" alt="">比较
														</a>
														<a href="#" class="wishlist" title="">
															<img src="images/icons/wishlist.png" alt="">愿望列表
														</a>
													</div>
												</div><!-- /.box-bottom -->
											</div><!-- /.imagebox style2 -->
										</div><!-- /.product-box -->
										<?php } ?>
									</div><!-- /.col-md-3 col-sm-6 -->
									<?php
										$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=6 limit 2,4";
										$result=mysql_query($sql);
										$result_array=mysql_fetch_array($result);	
									?>
									<div class="col-md-6">
										<div class="product-box">
											<div class="imagebox style2">
												<div class="box-image">
													<?php 
														$a=explode("@",$result_array["product_picture"]);
														array_pop($a);
														foreach($a as $k=>$y){
													?>
													<a href="#" title="">
														<img src='admin/<?php
															if($result_array["product_picture"]==""){
																echo "upload/180624/1529850480816315.jpg";
															}else{
																echo $a[$k];
															}
														?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
													</a>
													<?php } ?>
												</div><!-- /.box-image -->
												<div class="box-content">
													<div class="cat-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_type"]; ?></a>
													</div>
													<div class="product-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
													</div>
													<div class="price">
														<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
														<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
													</div>
												</div><!-- /.box-content -->
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
													<div class="compare-wishlist">
														<a href="javascript:;" class="compare" title="">
															<img src="images/icons/compare.png" alt="">比较
														</a>
														<a href="#" class="wishlist" title="">
															<img src="images/icons/wishlist.png" alt="">愿望列表
														</a>
													</div>
												</div><!-- /.box-bottom -->
											</div><!-- /.imagebox style2 -->
										</div><!-- /.product-box -->
									</div><!-- /.col-md-6 -->
									<div class="col-md-3 col-sm-6">
									<?php
										$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=6 limit 3,5";
										$result=mysql_query($sql);
										while($result_array=mysql_fetch_array($result)){
									?>
										<div class="product-box">
											<div class="imagebox style2">
												<div class="box-image">
													<?php 
														$a=explode("@",$result_array["product_picture"]);
														array_pop($a);
														foreach($a as $k=>$y){
													?>
													<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
														<img src='admin/<?php
															if($result_array["product_picture"]==""){
																echo "upload/180624/1529850480816315.jpg";
															}else{
																echo $a[$k];
															}
														?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
													</a>
													<?php } ?>
												</div><!-- /.box-image -->
												<div class="box-content">
													<div class="cat-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_type"]; ?></a>
													</div>
													<div class="product-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
													</div>
													<div class="price">
														<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
														<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
													</div>
												</div><!-- /.box-content -->
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
													<div class="compare-wishlist">
														<a href="javascript:;" class="compare" title="">
															<img src="images/icons/compare.png" alt="">比较
														</a>
														<a href="#" class="wishlist" title="">
															<img src="images/icons/wishlist.png" alt="">愿望列表
														</a>
													</div>
												</div><!-- /.box-bottom -->
											</div><!-- /.imagebox style2 -->
										</div><!-- /.product-box -->
										<?php } ?>
									</div><!-- /.col-md-3 col-sm-6 -->
								</div><!-- /.row -->
								<div class="row">
									<div class="col-md-3 col-sm-6">
										<?php
											$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=7 limit 0,2";
											$result=mysql_query($sql);
											while($result_array=mysql_fetch_array($result)){
										?>
										<div class="product-box">
											<div class="imagebox style2">
												<div class="box-image">
													<?php 
														$a=explode("@",$result_array["product_picture"]);
														array_pop($a);
														foreach($a as $k=>$y){
													?>
													<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
														<img src='admin/<?php
															if($result_array["product_picture"]==""){
																echo "upload/180624/1529850480816315.jpg";
															}else{
																echo $a[$k];
															}
														?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
													</a>
													<?php } ?>
												</div><!-- /.box-image -->
												<div class="box-content">
													<div class="cat-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_type"]; ?></a>
													</div>
													<div class="product-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
													</div>
													<div class="price">
														<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
														<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
													</div>
												</div><!-- /.box-content -->
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
													<div class="compare-wishlist">
														<a href="javascript:;" class="compare" title="">
															<img src="images/icons/compare.png" alt="">比较
														</a>
														<a href="#" class="wishlist" title="">
															<img src="images/icons/wishlist.png" alt="">愿望列表
														</a>
													</div>
												</div><!-- /.box-bottom -->
											</div><!-- /.imagebox style2 -->
										</div><!-- /.product-box -->
										<?php } ?>
									</div><!-- /.col-md-3 -->

									<div class="col-md-3 col-sm-6">
										<?php
											$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=7 limit 2,2";
											$result=mysql_query($sql);
											while($result_array=mysql_fetch_array($result)){
										?>
										<div class="product-box">
											<div class="imagebox style2">
												<div class="box-image">
													<?php 
														$a=explode("@",$result_array["product_picture"]);
														array_pop($a);
														foreach($a as $k=>$y){
													?>
													<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
														<img src='admin/<?php
															if($result_array["product_picture"]==""){
																echo "upload/180624/1529850480816315.jpg";
															}else{
																echo $a[$k];
															}
														?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
													</a>
													<?php } ?>
												</div><!-- /.box-image -->
												<div class="box-content">
													<div class="cat-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_type"]; ?></a>
													</div>
													<div class="product-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
													</div>
													<div class="price">
														<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
														<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
													</div>
												</div><!-- /.box-content -->
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
													<div class="compare-wishlist">
														<a href="javascript:;" class="compare" title="">
															<img src="images/icons/compare.png" alt="">比较
														</a>
														<a href="#" class="wishlist" title="">
															<img src="images/icons/wishlist.png" alt="">愿望列表
														</a>
													</div>
												</div><!-- /.box-bottom -->
											</div><!-- /.imagebox style2 -->
										</div><!-- /.product-box -->
										<?php } ?>
									</div><!-- /.col-md-3 col-sm-6 -->
									<?php
										$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=7 limit 4,5";
										$result=mysql_query($sql);
										$result_array=mysql_fetch_array($result);	
									?>
									<div class="col-md-6">
										<div class="product-box">
											<div class="imagebox style2">
												<div class="box-image">
													<?php 
														$a=explode("@",$result_array["product_picture"]);
														array_pop($a);
														foreach($a as $k=>$y){
													?>
													<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
														<img src='admin/<?php
															if($result_array["product_picture"]==""){
																echo "upload/180624/1529850480816315.jpg";
															}else{
																echo $a[$k];
															}
														?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
													</a>
													<?php } ?>
												</div><!-- /.box-image -->
												<div class="box-content">
													<div class="cat-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_type"]; ?></a>
													</div>
													<div class="product-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
													</div>
													<div class="price">
														<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
														<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
													</div>
												</div><!-- /.box-content -->
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
													<div class="compare-wishlist">
														<a href="javascript:;" class="compare" title="">
															<img src="images/icons/compare.png" alt="">比较
														</a>
														<a href="#" class="wishlist" title="">
															<img src="images/icons/wishlist.png" alt="">愿望列表
														</a>
													</div>
												</div><!-- /.box-bottom -->
											</div><!-- /.imagebox style2 -->
										</div><!-- /.product-box -->
									</div><!-- /.col-md-6 -->
								</div><!-- /.row -->
								<div class="row">
									<?php
										$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=8 limit 0,1";
										$result=mysql_query($sql);
										$result_array=mysql_fetch_array($result);	
									?>
									<div class="col-md-6">
										<div class="product-box">
											<div class="imagebox style2">
												<div class="box-image">
													<?php 
														$a=explode("@",$result_array["product_picture"]);
														array_pop($a);
														foreach($a as $k=>$y){
													?>
													<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
														<img src='admin/<?php
															if($result_array["product_picture"]==""){
																echo "upload/180624/1529850480816315.jpg";
															}else{
																echo $a[$k];
															}
														?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
													</a>
													<?php } ?>
												</div><!-- /.box-image -->
												<div class="box-content">
													<div class="cat-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_type"]; ?></a>
													</div>
													<div class="product-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
													</div>
													<div class="price">
														<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
														<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
													</div>
												</div><!-- /.box-content -->
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
													<div class="compare-wishlist">
														<a href="javascript:;" class="compare" title="">
															<img src="images/icons/compare.png" alt="">比较
														</a>
														<a href="#" class="wishlist" title="">
															<img src="images/icons/wishlist.png" alt="">愿望列表
														</a>
													</div>
												</div><!-- /.box-bottom -->
											</div><!-- /.imagebox style2 -->
										</div><!-- /.product-box -->
									</div><!-- /.col-md-6 -->
									
									<div class="col-md-3">
										<?php
											$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=8 limit 1,2";
											$result=mysql_query($sql);
											while($result_array=mysql_fetch_array($result)){
										?>
										<div class="product-box">
											<div class="imagebox style2">
												<div class="box-image">
													<?php 
														$a=explode("@",$result_array["product_picture"]);
														array_pop($a);
														foreach($a as $k=>$y){
													?>
													<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
														<img src='admin/<?php
															if($result_array["product_picture"]==""){
																echo "upload/180624/1529850480816315.jpg";
															}else{
																echo $a[$k];
															}
														?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
													</a>
													<?php } ?>
												</div><!-- /.box-image -->
												<div class="box-content">
													<div class="cat-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_type"]; ?></a>
													</div>
													<div class="product-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
													</div>
													<div class="price">
														<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
														<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
													</div>
												</div><!-- /.box-content -->
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
													<div class="compare-wishlist">
														<a href="javascript:;" class="compare" title="">
															<img src="images/icons/compare.png" alt="">比较
														</a>
														<a href="#" class="wishlist" title="">
															<img src="images/icons/wishlist.png" alt="">愿望列表
														</a>
													</div>
												</div><!-- /.box-bottom -->
											</div><!-- /.imagebox style2 -->
										</div><!-- /.product-box -->
										<?php } ?>
									</div><!-- /.col-md-3 -->

									<div class="col-md-3">
										<?php
											$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=8 limit 3,5";
											$result=mysql_query($sql);
											while($result_array=mysql_fetch_array($result)){
										?>
										<div class="product-box">
											<div class="imagebox style2">
												<div class="box-image">
													<?php 
														$a=explode("@",$result_array["product_picture"]);
														array_pop($a);
														foreach($a as $k=>$y){
													?>
													<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
														<img src='admin/<?php
															if($result_array["product_picture"]==""){
																echo "upload/180624/1529850480816315.jpg";
															}else{
																echo $a[$k];
															}
														?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
													</a>
													<?php } ?>
												</div><!-- /.box-image -->
												<div class="box-content">
													<div class="cat-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_type"]; ?></a>
													</div>
													<div class="product-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
													</div>
													<div class="price">
														<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
														<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
													</div>
												</div><!-- /.box-content -->
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
													<div class="compare-wishlist">
														<a href="javascript:;" class="compare" title="">
															<img src="images/icons/compare.png" alt="">比较
														</a>
														<a href="#" class="wishlist" title="">
															<img src="images/icons/wishlist.png" alt="">愿望列表
														</a>
													</div>
												</div><!-- /.box-bottom -->
											</div><!-- /.imagebox style2 -->
										</div><!-- /.product-box -->
										<?php } ?>
									</div><!-- /.col-md-3 -->
								</div><!-- /.row -->
								<div class="row">
									<div class="col-md-3 col-sm-6">
									<?php
										$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=9 limit 0,2";
										$result=mysql_query($sql);
										while($result_array=mysql_fetch_array($result)){
									?>
										<div class="product-box">
											<div class="imagebox style2">
												<div class="box-image">
													<?php 
														$a=explode("@",$result_array["product_picture"]);
														array_pop($a);
														foreach($a as $k=>$y){
													?>
													<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
														<img src='admin/<?php
															if($result_array["product_picture"]==""){
																echo "upload/180624/1529850480816315.jpg";
															}else{
																echo $a[$k];
															}
														?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
													</a>
													<?php } ?>
												</div><!-- /.box-image -->
												<div class="box-content">
													<div class="cat-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_type"]; ?></a>
													</div>
													<div class="product-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
													</div>
													<div class="price">
														<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
														<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
													</div>
												</div><!-- /.box-content -->
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
													<div class="compare-wishlist">
														<a href="javascript:;" class="compare" title="">
															<img src="images/icons/compare.png" alt="">比较
														</a>
														<a href="#" class="wishlist" title="">
															<img src="images/icons/wishlist.png" alt="">愿望列表
														</a>
													</div>
												</div><!-- /.box-bottom -->
											</div><!-- /.imagebox style2 -->
										</div><!-- /.product-box -->
										<?php } ?>
									</div><!-- /.col-md-3 col-sm-6 -->
									<?php
										$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=9 limit 2,4";
										$result=mysql_query($sql);
										$result_array=mysql_fetch_array($result);	
									?>
									<div class="col-md-6">
										<div class="product-box">
											<div class="imagebox style2">
												<div class="box-image">
													<?php 
														$a=explode("@",$result_array["product_picture"]);
														array_pop($a);
														foreach($a as $k=>$y){
													?>
													<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
														<img src='admin/<?php
															if($result_array["product_picture"]==""){
																echo "upload/180624/1529850480816315.jpg";
															}else{
																echo $a[$k];
															}
														?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
													</a>
													<?php } ?>
												</div><!-- /.box-image -->
												<div class="box-content">
													<div class="cat-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_type"]; ?></a>
													</div>
													<div class="product-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
													</div>
													<div class="price">
														<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
														<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
													</div>
												</div><!-- /.box-content -->
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
													<div class="compare-wishlist">
														<a href="javascript:;" class="compare" title="">
															<img src="images/icons/compare.png" alt="">比较
														</a>
														<a href="#" class="wishlist" title="">
															<img src="images/icons/wishlist.png" alt="">愿望列表
														</a>
													</div>
												</div><!-- /.box-bottom -->
											</div><!-- /.imagebox style2 -->
										</div><!-- /.product-box -->
									</div><!-- /.col-md-6 -->
									<div class="col-md-3 col-sm-6">
									<?php
										$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=9 limit 3,5";
										$result=mysql_query($sql);
										while($result_array=mysql_fetch_array($result)){
									?>
										<div class="product-box">
											<div class="imagebox style2">
												<div class="box-image">
													<?php 
														$a=explode("@",$result_array["product_picture"]);
														array_pop($a);
														foreach($a as $k=>$y){
													?>
													<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
														<img src='admin/<?php
															if($result_array["product_picture"]==""){
																echo "upload/180624/1529850480816315.jpg";
															}else{
																echo $a[$k];
															}
														?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
													</a>
													<?php } ?>
												</div><!-- /.box-image -->
												<div class="box-content">
													<div class="cat-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_type"]; ?></a>
													</div>
													<div class="product-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
													</div>
													<div class="price">
														<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
														<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
													</div>
												</div><!-- /.box-content -->
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
													<div class="compare-wishlist">
														<a href="javascript:;" class="compare" title="">
															<img src="images/icons/compare.png" alt="">比较
														</a>
														<a href="#" class="wishlist" title="">
															<img src="images/icons/wishlist.png" alt="">愿望列表
														</a>
													</div>
												</div><!-- /.box-bottom -->
											</div><!-- /.imagebox style2 -->
										</div><!-- /.product-box -->
										<?php } ?>
									</div><!-- /.col-md-3 col-sm-6 -->
								</div><!-- /.row -->
								<div class="row">
									<div class="col-md-3 col-sm-6">
										<?php
											$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=10 limit 0,2";
											$result=mysql_query($sql);
											while($result_array=mysql_fetch_array($result)){
										?>
										<div class="product-box">
											<div class="imagebox style2">
												<div class="box-image">
													<?php 
														$a=explode("@",$result_array["product_picture"]);
														array_pop($a);
														foreach($a as $k=>$y){
													?>
													<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
														<img src='admin/<?php
															if($result_array["product_picture"]==""){
																echo "upload/180624/1529850480816315.jpg";
															}else{
																echo $a[$k];
															}
														?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
													</a>
													<?php } ?>
												</div><!-- /.box-image -->
												<div class="box-content">
													<div class="cat-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_type"]; ?></a>
													</div>
													<div class="product-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
													</div>
													<div class="price">
														<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
														<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
													</div>
												</div><!-- /.box-content -->
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
													<div class="compare-wishlist">
														<a href="javascript:;" class="compare" title="">
															<img src="images/icons/compare.png" alt="">比较
														</a>
														<a href="#" class="wishlist" title="">
															<img src="images/icons/wishlist.png" alt="">愿望列表
														</a>
													</div>
												</div><!-- /.box-bottom -->
											</div><!-- /.imagebox style2 -->
										</div><!-- /.product-box -->
										<?php } ?>
									</div><!-- /.col-md-3 -->

									<div class="col-md-3 col-sm-6">
										<?php
											$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=10 limit 2,2";
											$result=mysql_query($sql);
											while($result_array=mysql_fetch_array($result)){
										?>
										<div class="product-box">
											<div class="imagebox style2">
												<div class="box-image">
													<?php 
														$a=explode("@",$result_array["product_picture"]);
														array_pop($a);
														foreach($a as $k=>$y){
													?>
													<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
														<img src='admin/<?php
															if($result_array["product_picture"]==""){
																echo "upload/180624/1529850480816315.jpg";
															}else{
																echo $a[$k];
															}
														?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
													</a>
													<?php } ?>
												</div><!-- /.box-image -->
												<div class="box-content">
													<div class="cat-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_type"]; ?></a>
													</div>
													<div class="product-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
													</div>
													<div class="price">
														<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
														<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
													</div>
												</div><!-- /.box-content -->
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
													<div class="compare-wishlist">
														<a href="javascript:;" class="compare" title="">
															<img src="images/icons/compare.png" alt="">比较
														</a>
														<a href="#" class="wishlist" title="">
															<img src="images/icons/wishlist.png" alt="">愿望列表
														</a>
													</div>
												</div><!-- /.box-bottom -->
											</div><!-- /.imagebox style2 -->
										</div><!-- /.product-box -->
										<?php } ?>
									</div><!-- /.col-md-3 col-sm-6 -->
									<?php
										$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=10 limit 4,5";
										$result=mysql_query($sql);
										$result_array=mysql_fetch_array($result);	
									?>
									<div class="col-md-6">
										<div class="product-box">
											<div class="imagebox style2">
												<div class="box-image">
													<?php 
														$a=explode("@",$result_array["product_picture"]);
														array_pop($a);
														foreach($a as $k=>$y){
													?>
													<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
														<img src='admin/<?php
															if($result_array["product_picture"]==""){
																echo "upload/180624/1529850480816315.jpg";
															}else{
																echo $a[$k];
															}
														?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
													</a>
													<?php } ?>
												</div><!-- /.box-image -->
												<div class="box-content">
													<div class="cat-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_type"]; ?></a>
													</div>
													<div class="product-name">
														<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
													</div>
													<div class="price">
														<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
														<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
													</div>
												</div><!-- /.box-content -->
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="admin/add_car.php?Id=<?php echo $result_array["aId"]; ?>" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
													<div class="compare-wishlist">
														<a href="javascript:;" class="compare" title="">
															<img src="images/icons/compare.png" alt="">比较
														</a>
														<a href="#" class="wishlist" title="">
															<img src="images/icons/wishlist.png" alt="">愿望列表
														</a>
													</div>
												</div><!-- /.box-bottom -->
											</div><!-- /.imagebox style2 -->
										</div><!-- /.product-box -->
									</div><!-- /.col-md-6 -->
								</div><!-- /.row -->
							</div><!-- /.tab-item -->
						</div><!-- /.product-wrap -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-imagebox style2 -->

		<section class="flat-imagebox style3">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						
						<div class="owl-carousel-2">
							<div class="box-counter">
								<div class="counter">
									<span class="special">今日特价</span>
									<div class="counter-content">
										<p>
											高性能存储，载入更快，启动更快。<br />
											最高可达 4TB 的全闪存存储设备，让你在多种编解码器下，<br />
											都可轻松处理大型4K和高清视频项目。而最高可达3GB/s的<br />
											数据吞吐量，则让加载大型文件和启动 app 的速度更胜以往。
										</p>
										<div id="remainSeconds" style="display:none">180000</div>
										<div class="count-down">
											<div class="square">
												<div class="numb day">
													0
												</div>
												<div class="text">
													天
												</div>
											</div>
											<div class="square">
												<div class="numb time">
													0
												</div>
												<div class="text">
													时
												</div>
											</div>
											<div class="square">
												<div class="numb branch">
													0
												</div>
												<div class="text">
													分
												</div>
											</div>
											<div class="square">
												<div class="numb second">
													0
												</div>
												<div class="text">
													秒
												</div>
											</div>
										</div> <!--/.count-down-->
									</div><!-- /.counter-content -->
								</div><!-- /.counter -->
								<?php
									$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=11 limit 0,1";
									$result=mysql_query($sql);
									while($result_array=mysql_fetch_array($result)){	
								?>
								<div class="product-item">
									<div class="imagebox style3">
										<div class="box-image save">
											<?php 
												$a=explode("@",$result_array["product_picture"]);
												array_pop($a);
												foreach($a as $k=>$y){
											?>
											<a href="#" title="">
												<img src='admin/<?php
													if($result_array["product_picture"]==""){
														echo "upload/180624/1529850480816315.jpg";
													}else{
														echo $a[$k];
													}
												?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
											</a>
											<?php } ?>
											<span>节约 $<?php echo $result_array["originalPrice"]-$result_array["presentPrice"]; ?></span>
										</div><!-- /.box-image -->
										<div class="box-content">
											<div class="product-name">
												<a href="#" title=""><?php echo $result_array["product_name"]; ?></a>
											</div>
											<ul class="product-info">
												<li>3.3ghz的英特尔酷睿i5处理器四核</li>
												<li>涡轮增加到3.9ghz</li>
												<li>8gb内存(两个4gb),可配置32gb</li>
												<li>把同一驱动器指派2tb融合</li>
												<li>AMD Radeon R9机型M395 2gb的视频内存</li>
												<li>视网膜5k 5120 - 2880年- P3显示</li>
											</ul>
											<div class="price">
												<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
												<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
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
													<img src="images/icons/compare.png" alt="">比较
												</a>
												<a href="#" class="wishlist" title="">
													<img src="images/icons/wishlist.png" alt="">愿望列表
												</a>
											</div>
										</div><!-- /.box-bottom -->
									</div><!-- /.imagbox style3 -->
								</div><!-- /.product-item -->
								<?php } ?>
							</div><!-- /.box-counter -->
							<div class="box-counter">
								<div class="counter">
									<span class="special">今日特价</span>
									<div class="counter-content">
										<p>
											高性能存储，载入更快，启动更快。<br />
											最高可达 4TB 的全闪存存储设备，让你在多种编解码器下，<br />
											都可轻松处理大型4K和高清视频项目。而最高可达3GB/s的<br />
											数据吞吐量，则让加载大型文件和启动 app 的速度更胜以往。
										</p>
										<div id="remainSeconds2" style="display:none">1800000</div>
										<div class="count-down">
											<div class="square">
												<div class="numb day2">
													0
												</div>
												<div class="text">
													天
												</div>
											</div>
											<div class="square">
												<div class="numb time2">
													0
												</div>
												<div class="text">
													时
												</div>
											</div>
											<div class="square">
												<div class="numb branch2">
													0
												</div>
												<div class="text">
													分
												</div>
											</div>
											<div class="square">
												<div class="numb second2">
													0
												</div>
												<div class="text">
													秒
												</div>
											</div>
										</div> <!--/.count-down-->
									</div><!-- /.counter-content -->
								</div><!-- /.counter -->
						
								<?php
									$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=11 limit 1,2";
									$result=mysql_query($sql);
									while($result_array=mysql_fetch_array($result)){	
								?>
								<div class="product-item">
									<div class="imagebox style3">
										<div class="box-image save">
											<a href="#" title="">
												<img src="images/product/other/l06.jpg" alt="">
											</a>
											<span>节约 $205.00</span>
										</div><!-- /.box-image -->
										<div class="box-content">
											<div class="product-name">
												<a href="#" title=""><?php echo $result_array["product_name"]; ?></a>
											</div>
											<ul class="product-info">
												<li>3.3ghz的英特尔酷睿i5处理器四核</li>
												<li>涡轮增加到3.9ghz</li>
												<li>8gb内存(两个4gb),可配置32gb</li>
												<li>把同一驱动器指派2tb融合</li>
												<li>AMD Radeon R9机型M395 2gb的视频内存</li>
												<li>视网膜5k 5120 - 2880年- P3显示</li>
											</ul>
											<div class="price">
												<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
												<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
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
													<img src="images/icons/compare.png" alt="">比较
												</a>
												<a href="#" class="wishlist" title="">
													<img src="images/icons/wishlist.png" alt="">愿望列表
												</a>
											</div>
										</div><!-- /.box-bottom -->
									</div><!-- /.imagbox style3 -->
								</div><!-- /.product-item -->
								<?php } ?>
							</div><!-- /.box-counter -->
						</div><!-- /.owl-carousel-2 -->
						
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-imagebox style3 -->

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
										<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_type"]; ?></a>
									</div>
									<div class="product-name">
										<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
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

		<section class="flat-highlights">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="flat-row-title">
							<h3>畅销</h3>
						</div>
						<ul class="product-list style1">
							<?php
								$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=12 limit 0,3";
								$result=mysql_query($sql);
								while($result_array=mysql_fetch_array($result)){	
							?>
							<li>			
								<div class="img-product">
									<?php 
										$a=explode("@",$result_array["product_picture"]);
										array_pop($a);
										foreach($a as $k=>$y){
									?>
									<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
										<img src='admin/<?php
											if($result_array["product_picture"]==""){
												echo "upload/180624/1529850480816315.jpg";
											}else{
												echo $a[$k];
											}
										?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
									</a>
									<?php } ?>
								</div>
								<div class="info-product">
									<div class="name">
										<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
									<div class="price">
										<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
										<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
									</div>
								</div>
								<div class="clearfix"></div>
							</li>
							<?php } ?>
						</ul><!-- /.product-list style1 -->
					</div><!-- /.col-md-4 -->
					<div class="col-md-4">
						<div class="flat-row-title">
							<h3>限量版</h3>
						</div>
						<ul class="product-list style1">
							<?php
								$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=13 limit 0,3";
								$result=mysql_query($sql);
								while($result_array=mysql_fetch_array($result)){	
							?>
							<li>			
								<div class="img-product">
									<?php 
										$a=explode("@",$result_array["product_picture"]);
										array_pop($a);
										foreach($a as $k=>$y){
									?>
									<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
										<img src='admin/<?php
											if($result_array["product_picture"]==""){
												echo "upload/180624/1529850480816315.jpg";
											}else{
												echo $a[$k];
											}
										?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
									</a>
									<?php } ?>
								</div>
								<div class="info-product">
									<div class="name">
										<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
									<div class="price">
										<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
										<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
									</div>
								</div>
								<div class="clearfix"></div>
							</li>
							<?php } ?>
						</ul>
					</div><!-- /.col-md-4 -->
					<div class="col-md-4">
						<div class="flat-row-title">
							<h3>热销产品</h3>
						</div>
						<ul class="product-list style1">
							<?php
								$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where a.product_category=14 limit 0,3";
								$result=mysql_query($sql);
								while($result_array=mysql_fetch_array($result)){	
							?>
							<li>			
								<div class="img-product">
									<?php 
										$a=explode("@",$result_array["product_picture"]);
										array_pop($a);
										foreach($a as $k=>$y){
									?>
									<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title="">
										<img src='admin/<?php
											if($result_array["product_picture"]==""){
												echo "upload/180624/1529850480816315.jpg";
											}else{
												echo $a[$k];
											}
										?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
									</a>
									<?php } ?>
								</div>
								<div class="info-product">
									<div class="name">
										<a href="goods-details.php?Id=<?php echo $result_array["aId"]; ?>" title=""><?php echo $result_array["product_name"]; ?></a>
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
									<div class="price">
										<span class="sale">$<?php echo $result_array["presentPrice"]; ?></span>
										<span class="regular">$<?php echo $result_array["originalPrice"]; ?></span>
									</div>
								</div>
								<div class="clearfix"></div>
							</li>
							<?php } ?>
						</ul>
					</div><!-- /.col-md-4 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-highlights -->

		<section class="flat-iconbox">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="iconbox">
							<div class="box-header">
								<div class="image">
									<img src="images/icons/car.png" alt="">
								</div>
								<div class="box-title">
									<h3>全球航运</h3>
								</div>
							</div><!-- /.box-header -->
							<div class="box-content">
								<p>免费送货订单超过100元</p>
							</div><!-- /.box-content -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-md-3 -->
					<div class="col-md-3">
						<div class="iconbox">
							<div class="box-header">
								<div class="image">
									<img src="images/icons/order.png" alt="">
								</div>
								<div class="box-title">
									<h3>网上订购服务</h3>
								</div>
							</div><!-- /.box-header -->
							<div class="box-content">
								<p>在30天免费返回产品</p>
							</div><!-- /.box-content -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-md-3 -->
					<div class="col-md-3">
						<div class="iconbox">
							<div class="box-header">
								<div class="image">
									<img src="images/icons/payment.png" alt="">
								</div>
								<div class="box-title">
									<h3>付款</h3>
								</div>
							</div><!-- /.box-header -->
							<div class="box-content">
								<p>安全系统</p>
							</div><!-- /.box-content -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-md-3 -->
					<div class="col-md-3">
						<div class="iconbox">
							<div class="box-header">
								<div class="image">
									<img src="images/icons/return.png" alt="">
								</div>
								<div class="box-title">
									<h3>返回30天</h3>
								</div>
							</div><!-- /.box-header -->
							<div class="box-content">
								<p>在30天免费返回产品</p>
							</div><!-- /.box-content -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-md-3 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-iconbox -->

		<?php
			require("include/footer.php");
		?>

	</div><!-- /.boxed -->

		<!-- Javascript -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/tether.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/waypoints.min.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
		<script type="text/javascript" src="js/owl.carousel.js"></script>
		<script type="text/javascript" src="js/smoothscroll.js"></script>
		<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
	   	<script type="text/javascript" src="js/waves.min.js"></script>

		<script type="text/javascript" src="js/main.js"></script>

</body>	
</html>