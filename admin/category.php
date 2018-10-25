<?php  
	require("../include/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>index-category</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="./css/x-admin.css" media="all">
        <link rel="stylesheet" href="css/pag.css" media="all"> 
        <link rel="stylesheet" href="css/pag.css" media="all"> 
    </head>
    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
              <a><cite>网站信息管理</cite></a>
              <a><cite>商品类别管理</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
        <div class="tools">
		    <ul class="toolbar">
		    	<?php
		    		$sql="select * from ite_category";
					$result=mysql_query($sql); //执行 $result获取的是一个结果集 （资源类型的表格）
					$result_array=mysql_fetch_array($result);//从结果集里面取出一条数据转换为数组
		    	?>
		      <li id="sub"><span><img src="images/t03.png" /></span>批量删除</li>
		      <li onclick="home_add('添加','category_add.php','600','500')"><span><img src="images/t01.png" /></span>添加</li>
		    </ul>
		</div>
   		<form action="category_deal.php?act=delAll" method="POST" id="myForm">
            <table class="tablelist">
                <thead>
                    <tr>
                        <th width="6%">
                            <!--<input onclick="selectAll()" type="checkbox" name="controlAll" style="controlAll" id="controlAll">-->
                            <input name="" type="checkbox" id="controlAll" onclick="selectAll()" />
                        </th>
                        <th width="6%">Id</th>
                        <th width="16%">类别名称</th>
                        <th width="15%">排序位置</th>
                        <th width="14%">添加人</th>
                        <th width="14%">添加时间</th>
                        <th width="11%">操作</th>
                    </tr>
                </thead>
               
                <tbody id="x-img">
                	<?php 
						$sql="select * from ite_category where sortPosition>0 and sortPosition<20 order by sortPosition asc";
						$result=mysql_query($sql); //执行 $result获取的是一个结果集 （资源类型的表格）
						while($result_array=mysql_fetch_array($result)){
					?>
                    <tr>
                        <td>
                            <input name="checkname[]" type="checkbox" value="<?php echo $result_array["Id"]; ?>" class="check2" />
                        </td>
                        <td><?php echo $result_array["Id"]; ?></td>
                        <td><?php echo $result_array["categoryName"]; ?></td>
                        <td><?php echo $result_array["sortPosition"]; ?></td>
                        <td><?php echo $result_array["addPerson"]; ?></td>
                        <td><?php echo $result_array["categoryTime"]; ?></td>
                        <td class="td-manage">
                            <a title="修改" href="javascript:;" onclick="home_edit('修改','category_update.php?Id=<?php echo $result_array["Id"];?>','4','','510')"
                            class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a title="category_deal.php?act=delect&Id=<?php echo $result_array["Id"]; ?>" class="click">
                            	<i class="layui-icon" style="cursor: pointer;">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                </form>
            </table>

    <!--是否确认删除遮盖层-->
    <div class="tip">
	    <form action="" id="myform2">
	    	<div class="tiptop"><span>提示信息</span><a></a></div>
	        
	      <div class="tipinfo">
	        <span><img src="images/ticon.png" /></span>
	        <div class="tipright">
	        <p>是否确认对信息的删除？</p>
	        <cite>如果是请点击确定按钮 ，否则请点取消。</cite>
	        </div>
	        </div>
	        
	        <div class="tipbtn">
	        <input name="" type="button"  class="sure2" value="确定" />&nbsp;
	        <input name="" type="button"  class="cancel" value="取消" />
	        </div>
	    </form>
    
    </div> 

</div>
<br />
<br />
<br />
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
            function home_add(title,url,w,h){
                x_admin_show(title,url,w,h);
            }
           
            // 编辑
            function home_edit (title,url,id,w,h) {
                x_admin_show(title,url,w,h); 
            }
			$('.tablelist tbody tr:odd').addClass('odd');
			
			
			//是否确认删除遮盖层
			$(function(){
				
				$(".click").click(function(){
					  $(".tip").fadeIn(200);
					  $("#myform2").attr("action",$(this).attr("title"));
					});
					$(".sure2").click(function(){
						window.location.href=$("#myform").attr("action");
					  $(".tip").fadeIn(200);
					});
				  
				  
				  $(".tiptop a").click(function(){
				  $(".tip").fadeOut(200);
				});
				
				  $(".sure").click(function(){
				  $(".tip").fadeOut(100);
				});
				
				  $(".cancel").click(function(){
				  $(".tip").fadeOut(100);
				});

			});
		</script>
		
	
    </body>
</html>