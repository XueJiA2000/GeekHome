<?php
	include("../include/conn.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>修改头像</title>
		<meta name="author" content="CreativeLayers">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<script src="js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/responsive.css">
		<link rel="stylesheet" type="text/css" href="css/colors/color2.css" id="colors">
		<link rel="shortcut icon" href="images/logos/geek-icon.png">
		<link rel="stylesheet" href="css/personal_info.css" />
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
						<p><a href="../index.php">首页</a> <font color="#838383"> > </font> <a href="personal_c.php" style="color: #C0C0C0;">修改头像</a></p>
				</div>
			<!--中间左边开始-->
			<?php
				require("../include/left.php");
			?>
			<!--中间左边结束-->
			<!--中间右边开始-->
			<div id="center_right">
				<div style="height: 40px;"></div>
				<h1>头像修改</h1>
                <?php
					$sql="select * from ite_user where username='".$_SESSION["username"]."' ";
					//exit($sql);
					//$sql="select * from ite_user where username='某某' ";	
					$result=mysql_query($sql);
						
					$result_array=mysql_fetch_array($result);	
				?>
               	<img src="../<?php echo $result_array["upfile"]?>"/><br/>
                <form action="head_portrait_deal.php?act=update" method="post" enctype="multipart/form-data">
                    <button class="up-img">选择照片 <input type="file" name="upfile" style="position:absolute;top:15px; opacity:0;height:45px" /></button>
                     <input type="hidden" value="<?php echo $result_array["Id"]; ?>" name="photo" />
                    <button class="up-img" type="submit">修改</button>
                </form>
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
