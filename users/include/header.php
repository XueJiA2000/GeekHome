<?php  
	require("../include/conn.php");
	
	$sql="select * from ite_product";
	//exit($sql);
	$result=mysql_query($sql);
	$result_array=mysql_fetch_array($result);
?>
<section id="header" class="header">
	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<ul class="flat-support">
						<li>
							<img src="images/icons/menu/03.png">
                            <a href="../index.php">Home</a>
						</li>
					</ul><!-- /.flat-support -->
				</div><!-- /.col-md-4 -->
				<div class="col-md-8">
					<ul class="flat-unstyled">
                    <?php
						if(isset($_SESSION['username']) && $_SESSION['username']===$_SESSION['username']){
					?>
						<li>
					<?php	
							echo "<span class='user_name'>Hi!&nbsp;欢迎&nbsp;</span><a href='users/personal_c.php' style='margin: 0px -6px 0px -25px;color: orangered;'><b>{$_SESSION['username']}</b></a>&nbsp;";
							echo "<a href='admin/login2_deal.php?act=out'>注销</a>";
					?>	
						</li>	
					<?php	
						}  else {
							echo "<a href='login.php'>请登录</a>";
						}
					?>
					
					<?php
						if(@$_SESSION["username"]==""){
					?>
						<li>
					<?php	
						echo "<a href='register.php'>注册</a>";
					?>
						</li>	
					<?php	
						}  else {
					?>	
						<li class="account">
							<a href="#" title="">个人中心<i class="fa fa-angle-down" aria-hidden="true"></i></a>
							<ul class="unstyled">
								<li>
									<a href="wishlist.html" title="收藏列表">收藏列表</a>
								</li>
								<li>
									<a href="shop-cart.html" title="我的购物车">我的购物车</a>
								</li>
								<li>
									<a href="my-account.html" title="我的账户">我的账户</a>
								</li>
								<li>
									<a href="shop-checkout.html" title="结账">结账</a>
								</li>
							</ul><!-- /.unstyled -->
						</li>
				<?php   }  ?>	
					</ul><!-- /.flat-unstyled -->
				</div><!-- /.col-md-4 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.header-top -->
	<div class="header-middle">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div id="logo" class="logo">
						<a href="index.php" title="极客之家">
							<img src="images/logos/geek-logo.png" alt="极客之家" width="190">
						</a>
					</div><!-- /#logo -->
				</div><!-- /.col-md-3 -->
				<div class="col-md-6">
					<div class="top-search">
						<?php if(!empty($_GET["p_Id"])){$p_Id=$_GET["p_Id"];}else{$p_Id="";} ?>
						<form action="goods-list.php?p_Id=<?php echo $p_Id ;?>" method="post" class="form-search" accept-charset="utf-8">
							<div class="cat-wrap">
								<select name="category">
									<option hidden value="" id="all">所有类别</option>
								</select>
								<span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
								<div class="all-categories" id="username">
									<div class="cat-list-search" name='product_category'>
										<div class="title">
											类别名称
										</div>
										<ul id="cate">
											<?php 
												$sql_s="select * from ite_category";
												$result_s=mysql_query($sql_s); //执行 $result获取的是一个结果集 （资源类型的表格）
												while($result_arr_s=mysql_fetch_array($result_s)){
													
												if($p_Id==$result_arr_s["Id"]){
													echo "<li value=".$result_arr_s["Id"]."><a style='display: block;' href='goods-list.php?p_Id=".$result_arr_s['Id']."'>".$result_arr_s["categoryName"]."</a></li>";	
												}else{
													echo "<li value=".$result_arr_s["Id"]."><a style='display: block;' href='goods-list.php?p_Id=".$result_arr_s['Id']."'>".$result_arr_s["categoryName"]."</a></li>";	
												}
											?>
									        <?php } ?>
										</ul>
									</div><!-- /.cat-list-search -->
								</div><!-- /.all-categories -->
							</div><!-- /.cat-wrap -->
							<div class="box-search">
									<input type="text" name="product_name" placeholder="请输入您要查询的商品">
									<span class="btn-search">
										<button type="submit" class="waves-effect"><img src="images/icons/search.png" alt=""></button>
									</span>
							
								<div class="search-suggestions">
									<div class="box-suggestions">
										<div class="title">
											搜索建议
										</div>
										<ul>
											<li>
												<div class="image">
													<img src="images/product/other/s05.jpg" alt="">
												</div>
												<div class="info-product">
													<div class="name">
														<a href="#" title="">雷蛇rz02 r3m1——01071500</a>
													</div>
													<div class="price">
														<span class="sale">
															$50.00
														</span>
														<span class="regular">
															$2,999.00
														</span>
													</div>
												</div>
											</li>
											<li>
												<div class="image">
													<img src="images/product/other/s06.jpg" alt="">
												</div>
												<div class="info-product">
													<div class="name">
														<a href="#" title="">笔记本黑色尖顶V硝基vn7 - 591 g</a>
													</div>
													<div class="price">
														<span class="sale">
															$24.00
														</span>
													</div>
												</div>
											</li>
											<li>
												<div class="image">
													<img src="images/product/other/14.jpg" alt="">
												</div>
												<div class="info-product">
													<div class="name">
														<a href="#" title="">苹果iPad迷你G2356</a>
													</div>
													<div class="price">
														<span class="sale">
															$90.00
														</span>
													</div>
												</div>
											</li>
											<li>
												<div class="image">
													<img src="images/product/other/02.jpg" alt="">
												</div>
												<div class="info-product">
													<div class="name">
														<a href="#" title="">雷蛇rz02 r3m1——01071500</a>
													</div>
													<div class="price">
														<span class="sale">
															$50.00
														</span>
													</div>
												</div>
											</li>
											<li>
												<div class="image">
													<img src="images/product/other/l01.jpg" alt="">
												</div>
												<div class="info-product">
													<div class="name">
														<a href="#" title="">苹果iPad迷你G2356</a>
													</div>
													<div class="price">
														<span class="sale">
															$24.00
														</span>
														<span class="regular">
															$2,999.00
														</span>
													</div>
												</div>
											</li>
											<li>
												<div class="image">
													<img src="images/product/other/s08.jpg" alt="">
												</div>
												<div class="info-product">
													<div class="name">
														<a href="#" title="">节拍Snarkitecture耳机</a>
													</div>
													<div class="price">
														<span class="sale">
															$90.00

														</span>
														<span class="regular">
															$2,999.00
														</span>
													</div>
												</div>
											</li>
										</ul>
									</div><!-- /.box-suggestions -->
									<div class="box-cat">
										<div class="cat-list-search">
											<div class="title">
												类别
											</div>
											<ul>
												<?php 
													$sql_s="select * from ite_category";
													$result_s=mysql_query($sql_s); //执行 $result获取的是一个结果集 （资源类型的表格）
													while($result_arr_s=mysql_fetch_array($result_s)){
														
													if($result_array["product_category"]==$result_arr_s["Id"]){
														echo "<li value=".$result_arr_s["Id"].">".$result_arr_s["categoryName"]."</li>";	
													}else{
														echo "<li value=".$result_arr_s["Id"].">".$result_arr_s["categoryName"]."</li>";	
													}
												?>
										        <?php } ?>
											</ul>
										</div><!-- /.cat-list-search -->
									</div><!-- /.box-cat -->
								</div><!-- /.search-suggestions -->
							</div><!-- /.box-search -->
						</form><!-- /.form-search -->
					</div><!-- /.top-search -->
				</div><!-- /.col-md-6 -->
				<div class="col-md-3">
					<div class="box-cart">
						<div class="inner-box">
							<ul class="menu-compare-wishlist">
								<li class="compare">
									<a href="compare.html" title="">
										<img src="images/icons/compare.png" alt="">
									</a>
								</li>
								<li class="wishlist">
									<a href="wishlist.html" title="">
										<img src="images/icons/wishlist.png" alt="">
									</a>
								</li>
							</ul><!-- /.menu-compare-wishlist -->
						</div><!-- /.inner-box -->
						<div class="inner-box">
							<a href="#" title="">
								<div class="icon-cart">
									<img src="images/icons/cart.png" alt="">
									<span class="header_num">0</span>
								</div>
							</a>
							<div class="dropdown-box">
								<ul>
									<?php
								  		$productId_arr=explode("@",@$_SESSION["productId"]);
										$productNum_arr=explode("@",@$_SESSION["productNum"]);
										$total=0;
										for($i=0;$i<count($productId_arr)-1;$i++){//循环数组 每循环一次 读取一次数据库
											$sql="select * from ite_product where Id=".$productId_arr[$i];
											$result=mysql_query($sql);
											$result_array=mysql_fetch_array($result);
											
											$total+=$result_array["presentPrice"]*$productNum_arr[$i];//总计钱
										
								  	?>
									<li>
										<div class="img-product imgs maxH2">
											<?php 
												$a=explode("@",$result_array["product_picture"]);
												array_pop($a);
											?>
											<img src='../admin/<?php
												if($result_array["product_picture"]==""){
													echo "upload/180624/1529850480816315.jpg";
												}else{
													echo $a[0];
												}
											?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
										</div>
										<div class="info-product">
											<div class="name" style="word-break: break-all;word-wrap:break-word;width: 98%;">
												<?php echo $result_array["product_name"]; ?>
											</div>
											<div class="price">
												<span><span id="price"><?php echo $productNum_arr[$i]; ?></span> x</span>
												$<span class="total-head"><?php echo $result_array["presentPrice"]; ?></span>
											</div>
										</div>
										<div class="clearfix"></div>
										<span class="delete"><a href="../shop-cart.php?act=del&Id=<?php echo $result_array["Id"]; ?>">x</a></span>
									</li>
									<?php	
										}
										if((count($productId_arr)-1)==0){
											echo "<div style='text-align: left;'><a>你的购物车空空如也！赶紧选购商品！</a></div>";
										}
								  	?>
								</ul>
								<div class="total">
									<span>小计:</span>
									<span class="price">$<span class="price subtotal-head" id="head-money">0</span></span>
								</div>
								
								<div class="btn-cart">
									<a href="../shop-cart.php" class="view-cart" title="">查看购物车</a>
									<a href="../shop-checkout.php" class="check-out" title="">结账</a>
								</div>
							</div>
						</div><!-- /.inner-box -->
					</div><!-- /.box-cart -->
				</div><!-- /.col-md-3 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.header-middle -->
	<div class="header-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-2">
					<div id="mega-menu">
						<div class="btn-mega"><span></span>所有类别</div>
						<ul class="menu">
							<li>
								<a href="#" title="" class="dropdown">
									<span class="menu-img">
										<img src="images/icons/menu/01.png" alt="">
									</span>
									<span class="menu-title">
										笔记本电脑  &amp; Mac
									</span>
								</a>
								<div class="drop-menu">
									<div class="one-third">
										<div class="cat-title">
											笔记本电脑 &amp; Mac
										</div>
										<ul>
											<li>
												<a href="#" title="">网络及网络设备</a>
											</li>
											<li>
												<a href="#" title="">笔记本电脑、台式电脑  &amp; 显示器</a>
											</li>
											<li>
												<a href="#" title="">硬盘  &amp; 记忆卡</a>
											</li>
											<li>
												<a href="#" title="">计算机配件</a>
											</li>
											<li>
												<a href="#" title="">软件</a>
											</li>
										</ul>
										<div class="show">
											<a href="#" title="">所有商店</a>
										</div>
									</div>
									<div class="one-third">
										<div class="cat-title">
											音频  &amp; 视频
										</div>
										<ul>
											<li>
												<a href="#" title="">耳机  &amp; 扬声器</a>
											</li>
											<li>
												<a href="#" title="">家庭娱乐系统</a>
											</li>
											<li>
												<a href="#" title="">MP3 &amp; 媒体播放器</a>
											</li>
											<li>
												<a href="#" title="">软件</a>
											</li>
										</ul>
										<div class="show">
											<a href="#" title="">所有商店</a>
										</div>
									</div>
									<div class="one-third">
										<ul class="banner">
											<li>
												<div class="banner-text">
													<div class="banner-title">
														耳机
													</div>
													<div class="more-link">
														<a href="#" title="">现在购买 <img src="images/icons/right-2.png" alt=""></a>
													</div>
												</div>
												<div class="banner-img">
													<img src="images/banner_boxes/menu-01.png" alt="">
												</div>
												<div class="clearfix"></div>
											</li>
											<li>
												<div class="banner-text">
													<div class="banner-title">
														电视  &amp; 音频
													</div>
													<div class="more-link">
														<a href="#" title="">现在购买 <img src="images/icons/right-2.png" alt=""></a>
													</div>
												</div>
												<div class="banner-img">
													<img src="images/banner_boxes/menu-02.png" alt="">
												</div>
												<div class="clearfix"></div>
											</li>
											<li>
												<div class="banner-text">
													<div class="banner-title">
														电脑
													</div>
													<div class="more-link">
														<a href="#" title="">现在购买 <img src="images/icons/right-2.png" alt=""></a>
													</div>
												</div>
												<div class="banner-img">
													<img src="images/banner_boxes/menu-03.png" alt="">
												</div>
												<div class="clearfix"></div>
											</li>
										</ul>	
									</div>
								</div>
							</li>
							<li>
								<a href="#" title="" class="dropdown">
									<span class="menu-img">
										<img src="images/icons/menu/02.png" alt="">
									</span>
									<span class="menu-title">
										手机  &amp; 平板电脑
									</span>
								</a>
								<div class="drop-menu">
									<div class="one-third">
										<div class="cat-title">
											笔记本电脑  &amp; 电脑
										</div>
										<ul>
											<li>
												<a href="#" title="">网络及网络设备</a>
											</li>
											<li>
												<a href="#" title="">笔记本电脑、台式电脑 &amp; 显示器</a>
											</li>
											<li>
												<a href="#" title="">硬盘  &amp; 记忆卡</a>
											</li>
											<li>
												<a href="#" title="">打印机 &amp; 墨水</a>
											</li>
											<li>
												<a href="#" title="">网络及网络设备</a>
											</li>
											<li>
												<a href="#" title="">计算机配件</a>
											</li>
											<li>
												<a href="#" title="">软件</a>
											</li>
										</ul>
										<div class="show">
											<a href="#" title="">所有商店</a>
										</div>
									</div>
									<div class="one-third">
										<div class="cat-title">
											音频 &amp; 视频
										</div>
										<ul>
											<li>
												<a href="#" title="">耳机 &amp; 扬声器</a>
											</li>
											<li>
												<a href="#" title="">家庭娱乐系统</a>
											</li>
											<li>
												<a href="#" title="">MP3 &amp; 媒体播放器</a>
											</li>
										</ul>
										<div class="show">
											<a href="#" title="">所有商店</a>
										</div>
									</div>
									<div class="one-third">
										<ul class="banner">
											<li>
												<div class="banner-text">
													<div class="banner-title">
														耳机
													</div>
													<div class="more-link">
														<a href="#" title="">现在购买 <img src="images/icons/right-2.png" alt=""></a>
													</div>
												</div>
												<div class="banner-img">
													<img src="images/banner_boxes/menu-01.png" alt="">
												</div>
												<div class="clearfix"></div>
											</li>
											<li>
												<div class="banner-text">
													<div class="banner-title">
														电视  &amp; 音频
													</div>
													<div class="more-link">
														<a href="#" title="">现在购买 <img src="images/icons/right-2.png" alt=""></a>
													</div>
												</div>
												<div class="banner-img">
													<img src="images/banner_boxes/menu-02.png" alt="">
												</div>
												<div class="clearfix"></div>
											</li>
											<li>
												<div class="banner-text">
													<div class="banner-title">
														电脑
													</div>
													<div class="more-link">
														<a href="#" title="">现在购买 <img src="images/icons/right-2.png" alt=""></a>
													</div>
												</div>
												<div class="banner-img">
													<img src="images/banner_boxes/menu-03.png" alt="">
												</div>
												<div class="clearfix"></div>
											</li>
										</ul>	
									</div>
								</div>
							</li>
							<li>
								<a href="#" title="" class="dropdown">
									<span class="menu-img">
										<img src="images/icons/menu/03.png" alt="">
									</span>
									<span class="menu-title">
										家庭设备
									</span>
								</a>
								<div class="drop-menu">
									<div class="one-third">
										<div class="cat-title">
											家庭设备
										</div>
										<ul>
											<li>
												<a href="#" title="">网络设备</a>
											</li>
											<li>
												<a href="#" title="">台式电脑 &amp; 显示器</a>
											</li>
											<li>
												<a href="#" title="">硬盘 &amp; 记忆卡</a>
											</li>
											<li>
												<a href="#" title="">网络</a>
											</li>
											<li>
												<a href="#" title="">软件</a>
											</li>
										</ul>
										<div class="show">
											<a href="#" title="">所有商店</a>
										</div>
									</div>
									<div class="one-third">
										<div class="cat-title">
											音频
										</div>
										<ul>
											<li>
												<a href="#" title="">家庭娱乐系统</a>
											</li>
											<li>
												<a href="#" title="">MP3 &amp; 媒体播放器</a>
											</li>
											<li>
												<a href="#" title="">软件</a>
											</li>
										</ul>
										<div class="show">
											<a href="#" title="">所有商店</a>
										</div>
									</div>
									<div class="one-third">
										<ul class="banner">
											<li>
												<div class="banner-text">
													<div class="banner-title">
														耳机
													</div>
													<div class="more-link">
														<a href="#" title="">现在购买 <img src="images/icons/right-2.png" alt=""></a>
													</div>
												</div>
												<div class="banner-img">
													<img src="images/banner_boxes/menu-01.png" alt="">
												</div>
												<div class="clearfix"></div>
											</li>
											<li>
												<div class="banner-text">
													<div class="banner-title">
														电视 &amp; 音频
													</div>
													<div class="more-link">
														<a href="#" title="">现在购买 <img src="images/icons/right-2.png" alt=""></a>
													</div>
												</div>
												<div class="banner-img">
													<img src="images/banner_boxes/menu-02.png" alt="">
												</div>
												<div class="clearfix"></div>
											</li>
											<li>
												<div class="banner-text">
													<div class="banner-title">
														电脑
													</div>
													<div class="more-link">
														<a href="#" title="">现在购买 <img src="images/icons/right-2.png" alt=""></a>
													</div>
												</div>
												<div class="banner-img">
													<img src="images/banner_boxes/menu-03.png" alt="">
												</div>
												<div class="clearfix"></div>
											</li>
										</ul>	
									</div>
								</div>
							</li>
							<li>
								<a href="#" title="">
									<span class="menu-img">
										<img src="images/icons/menu/04.png" alt="">
									</span>
									<span class="menu-title">
										软件
									</span>
								</a>
							</li>
							<li>
								<a href="#" title="">
									<span class="menu-img">
										<img src="images/icons/menu/05.png" alt="">
									</span>
									<span class="menu-title">
										电视 &amp; 音频
									</span>
								</a>
							</li>
							<li>
								<a href="#" title="">
									<span class="menu-img">
										<img src="images/icons/menu/06.png" alt="">
									</span>
									<span class="menu-title">
										体育 &amp; 健身
									</span>
								</a>
							</li>
							<li>
								<a href="#" title="" class="dropdown">
									<span class="menu-img">
										<img src="images/icons/menu/07.png" alt="">
									</span>
									<span class="menu-title">
										游戏 &amp; 玩具
									</span>
								</a>
								<div class="drop-menu">
									<div class="one-third">
										<div class="cat-title">
											游戏 &amp; 玩具
										</div>
										<ul>
											<li>
												<a href="#" title="">网络设备</a>
											</li>
											<li>
												<a href="#" title="">台式电脑 &amp; 显示器</a>
											</li>
											<li>
												<a href="#" title="">硬盘 &amp; 记忆卡</a>
											</li>
											<li>
												<a href="#" title="">网络</a>
											</li>
											<li>
												<a href="#" title="">软件</a>
											</li>
										</ul>
										<div class="show">
											<a href="#" title="">所有商店</a>
										</div>
									</div>
									<div class="one-third">
										<div class="cat-title">
											音频
										</div>
										<ul>
											<li>
												<a href="#" title="">家庭娱乐系统</a>
											</li>
											<li>
												<a href="#" title="">MP3 &amp; 媒体播放器</a>
											</li>
											<li>
												<a href="#" title="">软件</a>
											</li>
										</ul>
										<div class="show">
											<a href="#" title="">所有商店</a>
										</div>
									</div>
									<div class="one-third">
										<ul class="banner">
											<li>
												<div class="banner-text">
													<div class="banner-title">
														耳机
													</div>
													<div class="more-link">
														<a href="#" title="">现在购买 <img src="images/icons/right-2.png" alt=""></a>
													</div>
												</div>
												<div class="banner-img">
													<img src="images/banner_boxes/menu-01.png" alt="">
												</div>
												<div class="clearfix"></div>
											</li>
											<li>
												<div class="banner-text">
													<div class="banner-title">
														电视 &amp; 音频
													</div>
													<div class="more-link">
														<a href="#" title="">现在购买 <img src="images/icons/right-2.png" alt=""></a>
													</div>
												</div>
												<div class="banner-img">
													<img src="images/banner_boxes/menu-02.png" alt="">
												</div>
												<div class="clearfix"></div>
											</li>
											<li>
												<div class="banner-text">
													<div class="banner-title">
														电脑
													</div>
													<div class="more-link">
														<a href="#" title="">现在购买 <img src="images/icons/right-2.png" alt=""></a>
													</div>
												</div>
												<div class="banner-img">
													<img src="images/banner_boxes/menu-03.png" alt="">
												</div>
												<div class="clearfix"></div>
											</li>
										</ul>	
									</div>
								</div>
							</li>
							<li>
								<a href="#" title="">
									<span class="menu-img">
										<img src="images/icons/menu/08.png" alt="">
									</span>
									<span class="menu-title">
										摄像机
									</span>
								</a>
							</li>
							<li>
								<a href="#" title="" class="dropdown">
									<span class="menu-img">
										<img src="images/icons/menu/09.png" alt="">
									</span>
									<span class="menu-title">
										配件
									</span>
								</a>
								<div class="drop-menu">
									<div class="one-third">
										<div class="cat-title">
											配件
										</div>
										<ul>
											<li>
												<a href="#" title="">网络设备</a>
											</li>
											<li>
												<a href="#" title="">台式电脑 &amp; 显示器</a>
											</li>
											<li>
												<a href="#" title="">硬盘 &amp; 记忆卡</a>
											</li>
											<li>
												<a href="#" title="">网络</a>
											</li>
											<li>
												<a href="#" title="">软件</a>
											</li>
										</ul>
										<div class="show">
											<a href="#" title="">所有商店</a>
										</div>
									</div>
									<div class="one-third">
										<div class="cat-title">
											音频
										</div>
										<ul>
											<li>
												<a href="#" title="">家庭娱乐系统</a>
											</li>
											<li>
												<a href="#" title="">MP3 &amp; 媒体播放器</a>
											</li>
											<li>
												<a href="#" title="">软件</a>
											</li>
										</ul>
										<div class="show">
											<a href="#" title="">所有商店</a>
										</div>
									</div>
									<div class="one-third">
										<ul class="banner">
											<li>
												<div class="banner-text">
													<div class="banner-title">
														耳机
													</div>
													<div class="more-link">
														<a href="#" title="">现在购买 <img src="images/icons/right-2.png" alt=""></a>
													</div>
												</div>
												<div class="banner-img">
													<img src="images/banner_boxes/menu-01.png" alt="">
												</div>
												<div class="clearfix"></div>
											</li>
											<li>
												<div class="banner-text">
													<div class="banner-title">
														电视 &amp; 音频
													</div>
													<div class="more-link">
														<a href="#" title="">现在购买 <img src="images/icons/right-2.png" alt=""></a>
													</div>
												</div>
												<div class="banner-img">
													<img src="images/banner_boxes/menu-02.png" alt="">
												</div>
												<div class="clearfix"></div>
											</li>
											<li>
												<div class="banner-text">
													<div class="banner-title">
														电脑
													</div>
													<div class="more-link">
														<a href="#" title="">现在购买 <img src="images/icons/right-2.png" alt=""></a>
													</div>
												</div>
												<div class="banner-img">
													<img src="images/banner_boxes/menu-03.png" alt="">
												</div>
												<div class="clearfix"></div>
											</li>
										</ul>	
									</div>
								</div>
							</li>
							<li>
								<a href="#" title="" class="dropdown">
									<span class="menu-img">
										<img src="images/icons/menu/10.png" alt="">
									</span>
									<span class="menu-title">
										安全
									</span>
								</a>
								<div class="drop-menu">
									<div class="one-third">
										<div class="cat-title">
											安全
										</div>
										<ul>
											<li>
												<a href="#" title="">网络设备</a>
											</li>
											<li>
												<a href="#" title="">台式电脑 &amp; 显示器</a>
											</li>
											<li>
												<a href="#" title="">硬盘 &amp; 记忆卡</a>
											</li>
											<li>
												<a href="#" title="">网络</a>
											</li>
											<li>
												<a href="#" title="">软件</a>
											</li>
										</ul>
										<div class="show">
											<a href="#" title="">所有商店</a>
										</div>
									</div>
									<div class="one-third">
										<div class="cat-title">
											音频
										</div>
										<ul>
											<li>
												<a href="#" title="">家庭娱乐系统s</a>
											</li>
											<li>
												<a href="#" title="">MP3 &amp; 媒体播放器</a>
											</li>
											<li>
												<a href="#" title="">软件</a>
											</li>
											<li>
												<a href="#" title="">硬盘 &amp; 记忆卡</a>
											</li>
											<li>
												<a href="#" title="">网络</a>
											</li>
										</ul>
										<div class="show">
											<a href="#" title="">所有商店</a>
										</div>
									</div>
									<div class="one-third">
										<ul class="banner">
											<li>
												<div class="banner-text">
													<div class="banner-title">
														耳机
													</div>
													<div class="more-link">
														<a href="#" title="">现在购买 <img src="images/icons/right-2.png" alt=""></a>
													</div>
												</div>
												<div class="banner-img">
													<img src="images/banner_boxes/menu-01.png" alt="">
												</div>
												<div class="clearfix"></div>
											</li>
											<li>
												<div class="banner-text">
													<div class="banner-title">
														电视 &amp; 音频
													</div>
													<div class="more-link">
														<a href="#" title="">现在购买 <img src="images/icons/right-2.png" alt=""></a>
													</div>
												</div>
												<div class="banner-img">
													<img src="images/banner_boxes/menu-02.png" alt="">
												</div>
												<div class="clearfix"></div>
											</li>
											<li>
												<div class="banner-text">
													<div class="banner-title">
														电脑
													</div>
													<div class="more-link">
														<a href="#" title="">现在购买 <img src="images/icons/right-2.png" alt=""></a>
													</div>
												</div>
												<div class="banner-img">
													<img src="images/banner_boxes/menu-03.png" alt="">
												</div>
												<div class="clearfix"></div>
											</li>
										</ul>	
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div><!-- /.col-md-3 -->
				<div class="col-md-9 col-10">
					<div class="nav-wrap">
						<div id="mainnav" class="mainnav">
							<ul class="menu">
								<li class="column-1">
									<a href="goods-list.php?p_Id=1" title="新品上市">新品上市</a>
									<ul class="submenu">
										<li>
											<a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>家庭影院系统</a>
										</li>
										<li>
											<a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>接收器 &amp; 放大器</a>
										</li>
										<li>
											<a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>音箱</a>
										</li>
										<li>
											<a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>CD播放机 &amp; 转盘</a>
										</li>
										<li>
											<a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>高分辨率音频</a>
										</li>
										<li>
											<a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>4K超高清电视</a>
										</li>
									</ul><!-- /.submenu -->
								</li><!-- /.column-1 -->
                                <li class="column-1">
									<a href="goods-list.php?p_Id=5" title="智能手机">智能手机</a>
									<ul class="submenu">
										<li>
											<a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>电子产品</a>
										</li>
										<li>
											<a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>家具</a>
										</li>
										<li>
											<a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>配件</a>
										</li>
										<li>
											<a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>划分</a>
										</li>
										<li>
											<a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>日常时尚</a>
										</li>
										<li>
											<a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>现代经典</a>
										</li>
                                        <li>
											<a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>聚会</a>
										</li>
									</ul><!-- /.submenu -->
								</li><!-- /.column-1 -->
								<li class="column-1">
									<a href="goods-list.php?p_Id=10" title="电脑">电脑</a>
									<ul class="submenu">
										<li>
											<a href="about.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>网络及网络设备</a>
										</li>
										<li>
											<a href="404.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>笔记本电脑、台式电脑 &amp; 显示器</a>
										</li>
										<li>
											<a href="brands.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>硬盘 &amp; 记忆卡</a>
										</li>
										<li>
											<a href="categories.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>打印机 &amp; 墨水</a>
										</li>
										<li>
											<a href="categories-v2.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>网络及网络设备</a>
										</li>
										<li>
											<a href="element.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>计算机配件</a>
										</li>
										<li>
											<a href="faq.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>软件</a>
										</li>
									</ul><!-- /.submenu -->
								</li><!-- /.column-1 -->
								<li class="column-1">
									<a href="goods-list.php?p_Id=6" title="">外设</a>
									<ul class="submenu">
										<li>
											<a href="blog.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>耳机 &amp; 扬声器</a>
										</li>
										<li>
											<a href="blog-v2.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>家庭娱乐系统</a>
										</li>
										<li>
											<a href="blog-v3.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>MP3 &amp; 媒体播放器</a>
										</li>
									</ul><!-- /.submenu -->
								</li><!-- /.column-1 -->
								<li class="column-1">
									<a href="goods-list.php?p_Id=8" title="">配件</a>
									<ul class="submenu">
										<li>
											<a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>家庭影院系统</a>
										</li>
										<li>
											<a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>接收器 &amp; 放大器</a>
										</li>
										<li>
											<a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>音箱</a>
										</li>
										<li>
											<a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>CD播放机 &amp; 转盘</a>
										</li>
										<li>
											<a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>高分辨率音频</a>
										</li>
										<li>
											<a href="#" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>4K超高清电视</a>
										</li>
									</ul><!-- /.submenu -->
								</li><!-- /.column-1 -->
                                <li class="column-1">
									<a href="goods-list.php?p_Id=12" title="">畅销商品</a>
									<ul class="submenu">
										<li>
											<a href="index.php" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>首页</a>
										</li>
										<li>
											<a href="shop-cart.php" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>购物车</a>
										</li>
									</ul><!-- /.submenu -->
								</li><!-- /.column-1 -->
							</ul><!-- /.menu -->
						</div><!-- /.mainnav -->
					</div><!-- /.nav-wrap -->
					<div class="today-deal">
						<a href="#" title="">今天的交易</a>
					</div><!-- /.today-deal -->
					<div class="btn-menu">
                        <span></span>
                    </div><!-- //mobile menu button -->
				</div><!-- /.col-md-9 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.header-bottom -->
</section><!-- /#header -->