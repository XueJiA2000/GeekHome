<?php
	include("../include/conn.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>个人信息</title>
		<meta name="author" content="CreativeLayers">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<script src="js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="../js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/responsive.css">
		<link rel="shortcut icon" href="images/logos/geek-icon.png">
		<link rel="stylesheet" type="text/css" href="css/personal_info.css"/>
		<link rel="stylesheet" type="text/css" href="css/left.css"/>
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
					<p><a href="../index.php">首页</a> <font color="#838383"> > </font> <a href="personal_c.php" style="color: #C0C0C0;">个人信息</a></p>
				</div>
			<!--中间左边开始-->
			<?php
				require("../include/left.php");
			?>
			<!--中间左边结束-->
			<!--中间右边开始-->
			<div class="center_right">
				<h1>个人信息</h1>
                <!-- 选项卡：通过BS的类来控制选项卡的样式-->
			    <ul class="nav nav-tabs profile-tab user-xin" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#already" role="tab">基本资料</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#wait" role="tab">修改资料</a> </li>
                </ul>
                
                <div class="tab-content">
                    <div class="tab-pane active" id="already" role="tabpanel">
                        <ul>
                        	<?php
								$sql="select * from ite_user where username='".$_SESSION["username"]."'";
									
								$result=mysql_query($sql);
									
								$result_array=mysql_fetch_array($result);	
							?>
                        	<li class="xm-goods-item">
	                            <p>用户名：<span><?php echo $_SESSION["username"];?></span></p>
	                        </li>
	                        <li class="xm-goods-item">
	                            <p>现居地址：<span><?php echo $result_array["address"];?></span></p>
	                        </li>
	                        <li class="xm-goods-item">
	                            <p>性别：<span><?php echo $result_array["sex"];?></span></p>
	                        </li>
	                        <li class="xm-goods-item">
	                            <p>电话：<span><?php echo $result_array["phone"];?></span></p>
	                        </li>
	                        <li class="xm-goods-item">
	                            <p>邮箱：<span><?php echo $result_array["email"];?></span></p>
	                        </li>
	                        <li class="xm-goods-item">
	                            <p>婚姻状况：<span><?php echo $result_array["marriage"];?></span></p>
	                        </li>
                        </ul>      
                	</div>
                    <div class="tab-pane" id="wait" role="tabpanel">
                       <form action="personal_info_deal.php?act=update&Id=<?php echo $result_array["Id"];?>" method="post">
                           <div class="my_bform">
                               <p><span>*</span>用户名：</p>
                               <input type="text" name="username" class="" value="<?php echo $result_array["username"];?>" onfocus="if (value =='$result_array["username"]'){value =''}"onblur="if(value ==''){value='$result_array["username"]'}">
                          </div>
                          <div class="my_bform">
                               <p><span>*</span>密码：</p>
                               <input type="password" class="" name="password" value="<?php echo $result_array["password"];?>">
                          </div>
                          <div class="my_bform">
                               <p><span>*</span>手机号：</p>
                               <input type="tel" class="" name="phone" value="<?php echo $result_array["phone"];?>"/>
                          </div>
                          <div class="my_bform">
                               <p>生日：</p>
                               <input type="date" />
                          </div>
                          <div class="my_bform clearfix">
                               <p><span>*</span>性别：</p>
                               <select name="sex">
                                 <?php if($result_array["sex"]=="秘密"){ ?>
                                      <option>秘密</option>
                                 <?php }else{ ?>
                                      <option>秘密</option>
                                 <?php }?>
                                 <?php if($result_array["sex"]=="男"){ ?>
                                      <option>男</option>
                                 <?php }else{ ?>
                                      <option>男</option>
                                 <?php }?>
                                 <?php if($result_array["sex"]=="女"){ ?>
                                       <option>女</option>
                                 <?php }else{ ?>
                                       <option>女</option>
                                 <?php }?>
                               </select>
                          </div>
                          <div class="my_bform clearfix">
                               <p><span>*</span>邮箱：</p>
                               <input type="email" name="email" value="<?php echo $result_array["email"];?>"/>
                          </div>
                          <div class="my_bform clearfix">
                               <p><span>*</span>常住地：</p>
                               <input type="text" name="address" class="" value="<?php echo $result_array["address"];?>" />
                          </div>
                          <!--<div class="my_bform clearfix">
                               <p>详细地址：</p>
                               <input type="text" class="my_bform_ipt my_bform_ipt02" value="详细地址" onfocus="if (value =='详细地址'){value =''}"onblur="if (value ==''){value='详细地址'}">
                          </div>-->
                          <div class="my_bform clearfix">
                               <p>婚姻状况：</p>
                               <ul class="my_bformul">
                                   <select name="marriage">
                                    <?php if($result_array["marriage"]=="秘密"){ ?>
                                       <option>秘密</option>
									 <?php }else{ ?>
                                       <option>秘密</option>
                                     <?php }?>
                                     <?php if($result_array["marriage"]=="未婚"){ ?>
                                          <option>未婚</option>
                                     <?php }else{ ?>
                                          <option>未婚</option>
                                     <?php }?>
                                     <?php if($result_array["marriage"]=="已婚"){ ?>
                                          <option>已婚</option>
                                     <?php }else{ ?>
                                          <option>已婚</option>
                                     <?php }?>
                                   </select>
                                          
                                </ul>
                          </div>
                          <div class="fbtn_02 clearfix">
                               <button type="submit" class="fbtn_021a"><a href="#">保存</a></button>
                               <button type="reset" class="fbtn_022a"><a href="#">取消</a></button>
                          </div>
           			</form>
                 </div>
             </div>
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
	<!-- Javascript -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</html>
