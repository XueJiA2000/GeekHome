<?php
	require("conn.php");
	
	$act=@$_GET["act"];
	
	if($act=="add"){
		$email=$_POST["email"];

		$writerTime=date('Y-m-d H:i:s');

		//执行sql语句
		$sql="insert into `ite_email`(email,writerTime) values ('".$email."','".$writerTime."')";
		//exit($sql);
		$result=mysql_query($sql);//执行
		$affected_rows=mysql_affected_rows();//获取受影响的行数
		
		if($result && $affected_rows){
			exit("<script>alert('提交成功！');window.location.href='index.php';</script>");
		}else{
			exit("<script>alert('提交失败！');window.location.href='index.php';</script>");	
		}
	}
?>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="widget-ft widget-about">
					<div class="logo logo-ft">
						<a href="index.php" title="">
							<img src="images/logos/footer_logo.png" alt="">
						</a>
					</div><!-- /.logo-ft -->
					<div class="widget-content">
						<div class="icon">
							<img src="images/icons/call.png" alt="">
						</div>
						<div class="info">
							<p class="questions">有问题吗?</p>
							<p class="phone">Call Us: (888) 1234 56789</p>
						</div>
					</div><!-- /.widget-content -->
					<ul class="social-list">
						<li>
							<a href="#" title="">
								<i class="fa fa-facebook" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="#" title="">
								<i class="fa fa-twitter" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="#" title="">
								<i class="fa fa-instagram" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="#" title="">
								<i class="fa fa-pinterest" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="#" title="">
								<i class="fa fa-dribbble" aria-hidden="true"></i>
							</a>
						</li>
						<li>
							<a href="#" title="">
								<i class="fa fa-google" aria-hidden="true"></i>
							</a>
						</li>
					</ul><!-- /.social-list -->
				</div><!-- /.widget-about -->
			</div><!-- /.col-lg-3 col-md-6 -->
			<div class="col-lg-3 col-md-6">
				<div class="widget-ft widget-categories-ft">
					<div class="widget-title">
						<h3>按类别查找</h3>
					</div>
					<ul class="cat-list-ft">
						<li>
							<a href="#" title="">台式电脑</a>
						</li>
						<li>
							<a href="#" title="">笔记本电脑</a>
						</li>
						<li>
							<a href="#" title="">组件</a>
						</li>
						<li>
							<a href="#" title="">平板电脑</a>
						</li>
						<li>
							<a href="#" title="">软件</a>
						</li>
						<li>
							<a href="#" title="">手机 &amp; pda</a>
						</li>
						<li>
							<a href="#" title="">相机</a>
						</li>
					</ul><!-- /.cat-list-ft -->
				</div><!-- /.widget-categories-ft -->
			</div><!-- /.col-lg-3 col-md-6 -->
			<div class="col-lg-2 col-md-6">
				<div class="widget-ft widget-menu">
					<div class="widget-title">
						<h3>客户关怀</h3>
					</div>
					<ul>
						<li>
							<a href="#" title="">
								联系我们
							</a>
						</li>
						<li>
							<a href="#" title="">
								站点地图
							</a>
						</li>
						<li>
							<a href="#" title="">
								我的账户
							</a>
						</li>
						<li>
							<a href="#" title="">
								愿望清单
							</a>
						</li>
						<li>
							<a href="#" title="">
								交付信息
							</a>
						</li>
						<li>
							<a href="#" title="">
								隐私政策
							</a>
						</li>
						<li>
							<a href="#" title="">
								条款 &amp; 条件
							</a>
						</li>
					</ul>
				</div><!-- /.widget-menu -->
			</div><!-- /.col-lg-2 col-md-6 -->
			<div class="col-lg-4 col-md-6">
				<div class="widget-ft widget-newsletter">
					<div class="widget-title">
						<h3>注册新信件</h3>
					</div>
					<p>确保你千万不要错过我们的有趣的<br />
					         信息通过加入我们的通讯程序
					</p>
					<form action="?act=add" method="post" class="subscribe-form" accept-charset="utf-8">
						<div class="subscribe-content">
							
							<input type="text" name="email" class="subscribe-email" placeholder="Your E-Mail">
							<button type="submit"><img src="images/icons/right-2.png" alt=""></button>
						</div>
					</form><!-- /.subscribe-form -->
					<ul class="pay-list">
						<li>
							<a href="#" title="">
								<img src="images/logos/ft-01.png" alt="">
							</a>
						</li>
						<li>
							<a href="#" title="">
								<img src="images/logos/ft-02.png" alt="">
							</a>
						</li>
						<li>
							<a href="#" title="">
								<img src="images/logos/ft-03.png" alt="">
							</a>
						</li>
						<li>
							<a href="#" title="">
								<img src="images/logos/ft-04.png" alt="">
							</a>
						</li>
						<li>
							<a href="#" title="">
								<img src="images/logos/ft-05.png" alt="">
							</a>
						</li>
					</ul><!-- /.pay-list -->
				</div><!-- /.widget-newsletter -->
			</div><!-- /.col-lg-4 col-md-6 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</footer><!-- /footer -->
<section class="footer-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p class="copyright"> All Rights Reserved <span>&copy;</span> Techno Store 2018</p>
				<p class="btn-scroll">
					<a href="#" title="">
						<img src="images/icons/top.png" alt="">
					</a>
				</p>
			</div><!-- /.col-md-12 -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</section><!-- /.footer-bottom -->
<div class="toolbar">
   <a href="javascript:;" class="toolbar-item toolbar-item-weixin">
   <span class="toolbar-layer"></span>
   </a>
   <a href="javascript:;" class="toolbar-item toolbar-item-feedback"></a>
   <a href="javascript:;" class="toolbar-item toolbar-item-app">
    <span class="toolbar-layer"></span>
   </a>
   <a href="javascript:scroll(0,0)" id="top" class="toolbar-item toolbar-item-top  btn-scroll"></a>
</div>
