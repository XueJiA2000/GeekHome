<?php
	require("include/conn.php");
	
	$act=@$_GET["act"];
	
	if($act=="del"){
		
		$Id=$_GET["Id"];
	  	$productId_arr=explode("@",@$_SESSION["productId"]);//把购物车分割成数组
		$productNum_arr=explode("@",@$_SESSION["productNum"]);	

		for($i=0;$i<count($productId_arr)-1;$i++){
			if($productId_arr[$i]==$Id){//当传来的Id等于数组当前的值
				unset($productId_arr[$i]);//注销当前元素
				unset($productNum_arr[$i]);
			}
		}
		$_SESSION["productId"]=implode("@",$productId_arr);//把购物车重新重组
		$_SESSION["productNum"]=implode("@",$productNum_arr);

		header('location: '.$_SERVER['HTTP_REFERER']);//刷新当前页面
		
	}else if($act=="updateNum"){
		$prdNum=$_GET["prdNum"];
		$Id=$_GET["Id"];
		
		$productId_arr=explode("@",@$_SESSION["productId"]);//把购物车分割成数组
		$productNum_arr=explode("@",@$_SESSION["productNum"]);
		for($i=0;$i<count($productId_arr)-1;$i++){
			if(($productId_arr[$i])==$Id){
				$productNum_arr[$i]=$prdNum;
			}
		}
		$_SESSION["productNum"]=implode("@",$productNum_arr);
	}else if($act=="delAll"){//执行的全部删除方法
		unset($_SESSION["productId"]);//清空指定的session
		unset($_SESSION["productNum"]);
	}
	
?>
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
	<!-- Basic Page Needs -->
	<meta charset="UTF-8">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<title>Geek Home - Shop Cart</title>

	<meta name="author" content="CreativeLayers">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Boostrap style -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<!-- Theme style -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- Reponsive -->
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

	<link rel="shortcut icon" href="images/logos/geek-icon.png">
	 
</head>
<body class="header_sticky">
	<div class="boxed">

		<div class="overlay"></div>

		<!-- Preloader -->
		<div class="preloader">
			<div class="clear-loading loading-effect-2">
				<span></span>
			</div>
		</div><!-- /.preloader -->

		<?php
			require("include/header.php");
		?>

		<section class="flat-breadcrumb">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumbs">
							<li class="trail-item">
								<a href="#" title="">家</a>
								<span><img src="images/icons/arrow-right.png" alt=""></span>
							</li>
							<li class="trail-item">
								<a href="#" title="">商店</a>
								<span><img src="images/icons/arrow-right.png" alt=""></span>
							</li>
							<li class="trail-end">
								<a href="#" title="">购物车</a>
							</li>
						</ul><!-- /.breacrumbs -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-breadcrumb -->

		<section class="flat-shop-cart">
			<div class="container">
				<div class="row">
						<div class="col-lg-8">
							<div class="flat-row-title style1">
								<h3>购物车</h3>
							</div>
							<div class="table-cart">
								<table>
									<thead>
										<tr>
											<th>产品</th>
											<th>单价</th>
											<th>数量</th>
											<th>合计</th>
											<th></th>
										</tr>
									</thead>
									<form action="users/settlement.php" method="post" id="myForm">
									<tbody id="tab">
										<?php
									  		$productId_arr=explode("@",@$_SESSION["productId"]);
											$productNum_arr=explode("@",@$_SESSION["productNum"]);
											$total=0;
											for($i=0;$i<count($productId_arr)-1;$i++){//循环数组 每循环一次 读取一次数据库
												
												$sql="select * from ite_product where Id=".$productId_arr[$i]."";
												$result=mysql_query($sql);
												$result_array=mysql_fetch_array($result);
												
												$total+=$result_array["presentPrice"]*$productNum_arr[$i];//总计钱
									  	?>
										<tr>
											<td>
									            <input type="checkbox" name="Id[]" class="product_Id check2 checkId" value="<?php echo $result_array["Id"]; ?>">
												<div class="img-product imgs maxh">
														<?php 
															$a=explode("@",$result_array["product_picture"]);
															array_pop($a);
														?>
														<img src='admin/<?php
															if($result_array["product_picture"]==""){
																echo "upload/180624/1529850480816315.jpg";
															}else{
																echo $a[0];
															}
														?>' alt="<?php echo $result_array["product_name"]; ?>" title="<?php echo $result_array["product_name"]; ?>" />
												</div>
												<div class="name-product" style="word-break: break-all;word-wrap:break-word;width: 60%;">
													<?php echo $result_array["product_name"]; ?>
												</div>
												<input type="hidden" class="input-price" id="" value="2250" />
												
												<div class="clearfix"></div>
											</td>
											<td>
												<div class="price">$<span class="price2"><?php echo $result_array["presentPrice"]; ?></span></div>
											</td>
											<td class="my_shop">
												<div class="quanlity">
								                	<div class="my_Cont033">
										               	<i style="border-right:none;" class="sub" myId="<?php echo $result_array["Id"]; ?>">-</i>
										               	<input type="num" name="productNum" value="<?php echo $productNum_arr[$i]; ?>" maxlength="4" class="num_pro" onchange="window.location.href='shop-cart.php?act=updateNum&Id=<?php echo $result_array["Id"]; ?>&prdNum='+this.value">
										               	<i style="border-left:none;" class="add" myId="<?php echo $result_array["Id"]; ?>">+</i>
									                </div>
												</div>
											</td>
											<td>
												<div class="total">$<span class="total2"><?php echo sprintf('%.2f', $result_array["presentPrice"]*$productNum_arr[$i]); ?></span></div>
											</td>
											<td style="text-align: right;">
												<a href="shop-cart.php?act=del&Id=<?php echo $result_array["Id"]; ?>" title="" class="delete-shop">
													<img src="images/icons/delete.png" alt="">
												</a>
											</td>
										</tr>
										<?php } ?>
									  	
									</tbody>
								</table>
								
								<button id="checkAll">
									<input type="checkbox" name="Id[]" class="product_Id" id="check" style="margin-top: 15px !important;" value="<?php echo $result_array["Id"]; ?>">全选
									<!--<span class="del"><a href="shop-cart.php?act=delect&Id=<?php echo $result_array["Id"]; ?>">删除选中</a></span>-->
								</button>
								
								<?php	
									if((count($productId_arr)-1)==0){
										echo "<div class='back'>
												<img src='images/cart-empty.png' width='259px' />
												<div class='h2'>您的购物车还是空的！<br/><a href='index.php' class='btn-primary'>去主页看看</a></div>
												
											</div>";
									}
							  	?>
							</div><!-- /.table-cart -->
						</div><!-- /.col-lg-8 -->
					</form><!-- /.form -->
				
					<div class="col-lg-4">
						<div class="cart-totals">
							<h3>合计</h3>
							<form action="#" method="get" accept-charset="utf-8" id="myForm">
								<table>
									<tbody>
										<tr>
											<p>已选择&nbsp;<span style="color:#f00" id="product_num">0</span>&nbsp;件商品&nbsp;&nbsp;&nbsp;&nbsp;</p>
											<td>小计</td>
											<td class="subtotal">$<span class="subtotal2" id="product_total">0.00</span></div>
										</tr>
										<tr>
											<td>航运</td>
											<td class="btn-radio">
												<div class="radio-info"><label class="radio-lab"><input type="radio" name="radio-btn" checked /></label>
													<label for="flat-rate">统一税率: <span>$</span><span class="taxRate">10.00</span></label>
												</div>
												<div class="btn-shipping">
													<a href="javascript:;" title="">计算运费</a>
												</div>
											</td><!-- /.btn-radio -->
										</tr>
										<tr>
											<td>总额</td>
									        <td class="price-color">$<span class="price-total" id="price-total">0.00</span></td>
										</tr>
									</tbody>
								</table>
								<div class="btn-cart-totals">
									<a href="shop-cart.php?act=delAll" class="update" title="">清空购物车</a>
									<a class="checkout" title="">结账</a>
								</div><!-- /.btn-cart-totals -->
							</form><!-- /form -->
						</div><!-- /.cart-totals -->
					</div><!-- /.col-lg-4 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-shop-cart -->

		<section class="flat-row flat-iconbox style3">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="iconbox style1">
							<div class="box-header">
								<div class="image">
									<img src="images/icons/car.png" alt="">
								</div>
								<div class="box-title">
									<h3>全球航运</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-lg-3 col-md-6 -->
					<div class="col-lg-3 col-md-6">
						<div class="iconbox style1">
							<div class="box-header">
								<div class="image">
									<img src="images/icons/order.png" alt="">
								</div>
								<div class="box-title">
									<h3>网上订购服务</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-lg-3 col-md-6 -->
					<div class="col-lg-3 col-md-6">
						<div class="iconbox style1">
							<div class="box-header">
								<div class="image">
									<img src="images/icons/payment.png" alt="">
								</div>
								<div class="box-title">
									<h3>付款</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-lg-3 col-md-6 -->
					<div class="col-lg-3 col-md-6">
						<div class="iconbox style1">
							<div class="box-header">
								<div class="image">
									<img src="images/icons/return.png" alt="">
								</div>
								<div class="box-title">
									<h3>返回30天</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-lg-3 col-md-6 -->
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
		<script type="text/javascript">
			$(".checkout").click(function(){
				$("#myForm").submit();
			})	
		</script>
		<script>
			$(function(){
				
				$(".add").click(function(){
					var obj=$(this);
					var obj2=$(this).parents("tr");
					var price=obj2.find(".price2").text();
					$.ajax({
						type:'POST',
						url:'admin/carNum_deal.php',
						data:"flag="+$(this).attr("myId"),
						success:function(data){
							obj.siblings(".num_pro").val(data);
							obj2.find(".total2").text(Number(price*data).toFixed(2));
						}
					});
				});
				$(".sub").click(function(){
					var obj=$(this);
					var obj2=$(this).parents("tr");
					var price=obj2.find(".price2").text();
					var total=obj2.find(".total2").text();
					if(obj.siblings(".num_pro").val()>1){
						$.ajax({
							type:'POST',
							url:'admin/carNum1_deal.php',
							data:"flag="+$(this).attr("myId"),
							success:function(data){
								obj.siblings(".num_pro").val(data);
								obj2.find(".total2").text(Number(total-price).toFixed(2));
							}
						});
					}
				});	

				//购物车结算(复选框)
				$(".checkId").click(function(){
					var sum=0;
					var sum2=0;
					var i=0;
					var num=$(".taxRate").text();
					$(".checkId").each(function(){
						if($(this).is(':checked')){
							sum+=$(this).parent().siblings().children(".price").children(".price2").text()*$(this).parent().siblings(".my_shop").children().children().children(".num_pro").val();	
							sum2=sum+Number(num);//航运税费的总额
							i++;
						}
					});

					$("#product_num").text(i);
					$("#product_total").text(Number(sum).toFixed(2));
					$("#price-total").text(Number(sum2).toFixed(2));//航运税费的总额
				});	
				
				//全选结算
				$("#check").click(function(){
					var sum=0;
					var sum2=0;
					var i=0;
					var num=$(".taxRate").text();
					$(".check2").each(function(){
						if($(this).is(':checked')){
							sum+=$(this).parent().siblings().children(".price").children(".price2").text()*$(this).parent().siblings().children().children().children(".num_pro").val();
							sum2=sum+Number(num);//航运税费的总额
							i++;
						}
					});
					
					$("#product_num").text(i);
					$("#product_total").text(Number(sum).toFixed(2));
					$("#price-total").text(Number(sum2).toFixed(2));//航运税费的总额
				});
				
			});
		</script>
		<!--<script>
			
			$(function(){

		   	 	$("#tab").delegate(".delete-shop img","click",function(){
				       $(this).parent().parent().parent("tr").fadeTo("slow", 1, function(){//fade
					    $(this).addClass("gaibian");
					    $(this).delay(500).slideUp("slow", function() {//slide up
					       $(this).delay(1200).remove();
					    });
					   
					  });
				});

			   	 	
			})
			
		</script>-->
		

</body>	
</html>