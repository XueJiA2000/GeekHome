<?php
//	include("../include/conn.php");
	include("../include/session_ck.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>管理员管理</title>
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="images/geek-icon.png" rel="shortcut icon" type="image/x-icon">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="format-detection" content="telephone=no">
<link rel="stylesheet" href="./css/x-admin.css" media="all">
<link rel="stylesheet" href="css/pag.css" media="all">
<script type="text/javascript" src="js/jquery-1.11.0.min.js" ></script>
</head>
<body>
<div class="x-nav"> <span class="layui-breadcrumb"> <a><cite>首页</cite></a> <a><cite>角色管理</cite></a> <a><cite>管理员管理</cite></a> </span> <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a> </div>
<div class="x-body">
<form class="layui-form x-center" action="admin.php" style="width:85%">
  <div class="layui-form-pane">
    <div class="layui-form-item">
      <label class="layui-form-label">编号</label>
      <div class="layui-input-inline" style="width:100px">
        <input type="text" name="Id"  placeholder="编号" autocomplete="off" class="layui-input">
      </div>
      <label class="layui-form-label">管理员名</label>
      <div class="layui-input-inline" style="width:100px">
        <input type="text" name="adminname"  placeholder="管理员名" autocomplete="off" class="layui-input">
      </div>
      
      <label class="layui-form-label">性别</label>
      <div class="layui-input-inline" style="width:150px">
        <input type="text" name="sex"  placeholder="性别" autocomplete="off" class="layui-input">
      </div>
      
      <label class="layui-form-label">手机号</label>
      <div class="layui-input-inline" style="width:150px">
        <input type="tel" name="phone"  placeholder="手机号" autocomplete="off" class="layui-input">
      </div>
      
      <div class="layui-input-inline" style="width:80px">
        <button class="layui-btn"  lay-submit="" lay-filter="*" type="submit">搜索</button>
      </div>
    </div>
  </div>
</form>
<div class="tools">
    <ul class="toolbar toolbar2">
    	<?php
	    	$sql="select * from ite_admin";
			$result=mysql_query($sql); //执行 $result获取的是一个结果集 （资源类型的表格）
			$result_array=mysql_fetch_array($result);//从结果集里面取出一条数据转换为数组
		?>
      <li id="sub"><span><img src="images/t03.png" /></span>批量删除</li>
      <li onclick="admin_add('添加管理员','admin_add.php','900','500')"><span><img src="images/t01.png" /></span>添加</li>
      <li onclick="admin_edit('编辑管理员','admin_edit.php','900','500')"><span><img src="images/t02.png" /></span>编辑</li>
      <li><span><img src="images/t09.png" /></span>批量导出</li>
      <li><span><img src="images/t10.png" /></span>导入</li>
    </ul>
    <!--数据动态化-->
			<?php
				$adminName=@$_POST["adminname"]?$_POST["adminname"]:@$_GET["adminname"];
				
				/*分页核心开始*/
				//第一步 计算总记录 和页数
				if($adminName==""){
					$sql="select * from ite_admin";
				}else{
					$sql="select * from ite_admin where adminname like '%".$adminName."%'";
					//exit($sql);
				}
				 $result=mysql_query($sql); //执行 $result获取的是一个结果集 （资源类型的表格） 		
				 $result_rows=mysql_num_rows($result);//获取结果集里面的总记录数
				 
				 $pageSize=10;//设置一页里面的数量
				 $pagenums=ceil($result_rows/$pageSize);//计算总页数
				 //第二步 设置或者获取当前页码 计算偏移数
				 $pageNo=@$_GET["pageNo"]?$_GET["pageNo"]:1;//当前的页码
				 $offset=($pageNo-1)* $pageSize;//计算偏移
				/*分页核心结束*/	
				
				if($adminName==""){
					$sql="select * from ite_admin limit ".$offset.",".$pageSize."";
				}else{
					$sql="select * from ite_admin where adminname like '%".$adminName."%' limit ".$offset.",".$pageSize."";
					//exit($sql);
				} 
		        $result=mysql_query($sql); //执行 $result获取的是一个结果集 （资源类型的表格）
		        //$result_array=mysql_fetch_array($result);//从结果集里面取出一条数据转换为数组
		        //print_r($result_array);
		    ?> 
    <span class="x-right" style="line-height:25px">共有数据：<?php echo $result_rows; ?> 条</span></xblock>
  </div>
<form action="admin_deal.php?act=delAll" method="post" id="myForm">  
<table class="tablelist">
  <thead>
    <tr>
      <th width="5%"> <input onclick="selectAll()" type="checkbox" name="controlAll" style="controlAll" id="controlAll"></th>
      <th width="10%"> ID </th>
      <th width="10%"> 管理员名称 </th>
      <th width="10%"> 性别</th>
      <th width="15%"> 手机</th>
      <th width="15%"> 邮箱</th>
      <th width="25%"> 备注</th>
      <th width="15%"> 操作 </th>
    </tr>
  </thead>
  <tbody>
  <?php  while($result_array=mysql_fetch_array($result)){ ?>	
    <tr>
      <td><input type="checkbox" value="<?php echo $result_array["Id"]; ?>" name="checkname[]"/></td>
      <td> <?php echo $result_array["Id"]; ?> </td>
      <td> <?php echo $result_array["adminname"]; ?> </td>
      <td> <?php echo $result_array["sex"]; ?> </td>
      <td> <?php echo $result_array["phone"]; ?> </td>
      <td> <?php echo $result_array["email"]; ?> </td>
      <td> <?php echo $result_array["tag"]; ?> </td>
      <td class="td-manage">
      	<a title="更改权限" href="javascript:;" onclick="admin_edit('更改权限','admin_edit.php?Id=<?php echo $result_array["Id"];?>','4','','510')" class="ml-5" style="text-decoration:none"> <i class="layui-icon"><img src="images/quanxian.png" width="15" height="15" style="margin-bottom: 0px !important;"></i> </a> 
      	<a title="查看" href="javascript:;" onclick="admin_look('查看','admin_look.php?Id=<?php echo $result_array["Id"];?>','4','','510')" class="ml-5" style="text-decoration:none"> <i class="layui-icon">&#xe63c;</i> </a> 
    	<a title="admin_deal.php?act=del&Id=<?php echo $result_array["Id"];?>" class="click" style="text-decoration:none"> <i class="layui-icon">&#xe640;</i> </a>
      </td>
    </tr>
  <?php } ?>     
  </tbody>
</table>
</form>
	<!--分页-->
	<div class="pagin">
		<div class="message">共<i class="blue"><?php echo $result_rows; ?></i>条记录/<?php echo $pagenums; ?>页，当前显示第&nbsp;<i class="blue"><?php echo $pageNo; ?>&nbsp;</i>页</div>
	    <?php 
				$p="";
				if($adminName!=""){
					$p="&adminname=".$adminName;
				}
		  ?>
	    <ul class="paginList">
	    <?php if($pageNo==1){?>
	    <li class="paginItem"><a>首页</a></li>
	    <li class="paginItem"><a><span class="pagepre"></span></a></li>
	    <?php }else{?>
	    <li class="paginItem"><a href="admin.php?pageNo=1<?php echo $p;?>">首页</a></li>
	    <li class="paginItem"><a href="admin.php?pageNo=<?php echo $pageNo-1; ?><?php echo $p;?>"><span class="pagepre"> < </span></a></li>
	    <?php }?>
	    
	    <?php if($pageNo==$pagenums){?>
	    <li class="paginItem"><a><span class="pagenxt"></span></a></li>
	    <li class="paginItem"><a>尾页</a></li>
	    <?php }else{?>
	    <li class="paginItem"><a href="admin.php?pageNo=<?php echo $pageNo+1; ?><?php echo $p;?>"><span class="pagenxt"> > </span></a></li>
	    <li class="paginItem"><a href="admin.php?pageNo=<?php echo $pagenums; ?><?php echo $p;?>">尾页</a></li>
	    <?php }?>
	
	    </ul>
	</div>
</div>
<br />
<br />
<br />

<!--是否确认删除提示框-->
	<div class="tip">
	    <form action="" id="myform">
	    	<div class="tiptop"><span>提示信息</span><a></a></div>
	        
	      <div class="tipinfo">
	        <span><img src="images/ticon.png" /></span>
	        <div class="tipright">
	        <p>是否确认对信息的删除？</p>
	        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
	        </div>
	        </div>
	        
	        <div class="tipbtn">
	        <input name="" type="button"  class="sure" value="确定" />&nbsp;
	        <input name="" type="button"  class="cancel" value="取消" />
	        </div>
	    </form>
	
	</div> 	

<!--实现全选反选	-->
	<script type="text/javascript">
		 //实现全选反选
	    $("#controlAll").on('click', function(){
	        $("tbody input:checkbox").prop("checked", $(this).prop('checked'));
	    })
	    $("tbody input:checkbox").on('click', function() {
	        //当选中的长度等于checkbox的长度的时候,就让控制全选反选的checkbox设置为选中,否则就为未选中
	        if($("tbody input:checkbox").length === $("tbody input:checked").length) {
	            $("#controlAll").prop("checked", true);
	        } else {
	            $("#controlAll").prop("checked", false);
	        }
	    })
	</script>
<script src="./lib/layui/layui.js" charset="utf-8"></script> 
<script src="./js/x-layui.js" charset="utf-8"></script> 
<script src="../js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery2.js" charset="utf-8"></script> 
<script src="js/js.js" charset="utf-8"></script> 
<script>
  layui.use(['laydate','element','laypage','layer'], function(){
    $ = layui.jquery;//jquery
    laydate = layui.laydate;//日期插件
	  lement = layui.element();//面包导航
	  laypage = layui.laypage;//分页
	  layer = layui.layer;//弹出层
	});

  /*添加*/
    function admin_add (title,url,w,h){
      x_admin_show(title,url,w,h);
    }
 
  //修改密码
    /*function role_management_permissions (title,url,id,w,h) {
      x_admin_show(title,url,w,h); 
    }*/
	//查看
  function admin_look (title,url,id,w,h) {
    x_admin_show(title,url,w,h); 
  }
	//编辑
  function admin_edit (title,url,id,w,h) {
    x_admin_show(title,url,w,h); 
  }
	$('.tablelist tbody tr:odd').addClass('odd');
	
	//是否确认删除提示框
	$(document).ready(function(){
		  $(".click").click(function(){
		 	$(".tip").fadeIn(200);
			//alert($(this).attr("title"));
			$("#myform").attr("action",$(this).attr("title"));
		  });
		  $(".sure").click(function(){
		 		//$("#myform").submit();
				window.location.href=$("#myform").attr("action");
				$(".tip").fadeOut(200);
		  });  
		  	  
		 $(".cancel").click(function(){
		  $(".tip").fadeOut(200);
		});
		
		  $(".sure").click(function(){
		  $(".tip").fadeOut(100);
		});
		
		  $(".cancel").click(function(){
		  $(".tip").fadeOut(100);
		});
	//删除全部	
		$("#sub").click(function(){
			$("#myForm").submit();
		})
	});
</script>
</body>
</html>