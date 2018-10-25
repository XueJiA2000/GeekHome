<?php
	include("../include/conn.php");
	/*include("../include/session_ck.php");*/
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
                              订单详情
        </title>
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
        <div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>首页</cite></a>
               <a><cite>管理信息</cite></a>
              <a><cite>订单详情</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
          <form class="layui-form x-center" action="" style="width:85%">
                <div class="layui-form-pane">
                  <div class="layui-form-item">
                    <label class="layui-form-label">编号</label>
                    <div class="layui-input-inline" style="width:100px">
                      <input type="text" name="name"  placeholder="编号" autocomplete="off" class="layui-input">
                    </div>
                    <label class="layui-form-label">姓名</label>
                    <div class="layui-input-inline" style="width:100px">
                      <input type="text" name="name"  placeholder="姓名" autocomplete="off" class="layui-input">
                    </div>
                    <label class="layui-form-label">被测时间</label>
                    <div class="layui-input-inline" style="width:150px">
                      <input type="text" name="name"  placeholder="被测时间" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:200px">
                      <input type="text" name="link"  placeholder="搜索" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline" style="width:80px">
                        <button class="layui-btn"  lay-submit="" lay-filter="*">搜索</button>
                    </div>
                  </div>
                </div> 
            </form>
            <div class="tools">
		    <ul class="toolbar toolbar2">
      		  <li id="sub"><span><img src="images/t03.png" /></span>批量删除</li>
		      <li onclick="user_add('添加用户','user_add.php','600','500')"><span><img src="images/t01.png" /></span>添加</li>
		      <li><span><img src="images/t10.png" /></span>导入</li>
		      <li><span><img src="images/t09.png" /></span>导出</li>
		      <li><span><img src="images/t07.png" /></span>打印</li>
		      <li><span><img src="images/t08.png" /></span>审核</li>
		    </ul>
		<!--数据动态化-->
	  </div>
	  	<form action="order_detail_deal.php?act=delAll" method="post" id="myForm">  
            <table class="tablelist">
                <thead>
                    <tr>
                        <th width="7%">
                            <input onclick="selectAll()" type="checkbox" name="controlAll" style="controlAll" id="controlAll">
                        </th>
                        <th width="12%">订单编号</th>
                        <th width="12%">商品名称</th>
                        <th width="16%">商品数量</th>
                        <th width="11%">商品价格</th>
                        <th width="11%">订单状态</th>
                        <th width="11%">添加时间</th>
                        <th width="12%">操作</th>
                    </tr>
                </thead>
                <tbody>
                	<?php
						$sql="select * from ite_order_detail as a join ite_order_class as b on a.status=b.Id where a.status=2 or a.status=3 order by a.Id desc";
						$result=mysql_query($sql); //执行 $result获取的是一个结果集 （资源类型的表格）
						while($result_arr=mysql_fetch_array($result)){
					?>
                    <tr>
                        <td>
                            <input type="checkbox" value="<?php echo $result_arr["Id"]; ?>" name="checkname[]">
                        </td>
                        <td><u style="cursor:pointer"> <?php echo $result_arr["OrderNum"]; ?> </u></td>
                        <td> <?php echo $result_arr["goods_name"]; ?> </td>
                        <td> <?php echo $result_arr["goods_num"]; ?> </td>
                        <td> <?php echo $result_arr["goods_price"]; ?> </td>
                        <td> 
                        	<?php echo $result_arr["ite_class"]; ?> 
                        	<a href="order_detail_deal.php?act=upda&Id=<?php echo $result_arr["Id"]; ?>" style="margin-left: 30px ;">
                        		<?php
	                        		if($result_arr["ite_class"]=="待发货"){
	                        				echo "去发货";
	                        		}
	                        	?>
                        	</a>
                        	<a href="order_detail_deal.php?act=up&Id=<?php echo $result_arr["Id"]; ?>">
                        		<?php
	                        		if($result_arr["ite_class"]=="待收货"){
	                        				echo "确认收货";
	                        		}
	                        	?>
                        	</a>
                        </td>
                        <td> <?php echo $result_arr["addTime"]; ?> </td>
                        <td class="td-manage">
                            <a style="text-decoration:none" onclick="member_stop(this,'10001')" href="javascript:;" title="停用">
                                <i class="layui-icon">&#xe601;</i>
                            </a>
                            <a title="编辑" href="javascript:;" onclick="user_edit('编辑','order_edit.php?Id=<?php echo $result_arr["Id"];?>','4','','510')"
                            class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a style="text-decoration:none"  onclick="user_edit('编辑','order_edit.php?Id=<?php echo $result_arr["Id"];?>','10001','600','400')"
                            href="javascript:;" title="编辑">
                                <i class="layui-icon">&#xe631;</i>
                            </a>
                            <a title="order_detail_deal.php?act=del&Id=<?php echo $result_arr["Id"];?>" class="click" style="text-decoration:none"> <i class="layui-icon">&#xe640;</i> </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </form>
	<!--分页-->
	<div class="pagin">
		
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
<script src="js/jquery2.js" charset="utf-8"></script> 
<script src="js/js.js" charset="utf-8"></script>
 <script type="text/javascript">
    layui.use(['laydate','element','laypage','layer'], function(){
        $ = layui.jquery;//jquery
      lement = layui.element();//面包导航
      laypage = layui.laypage;//分页
      layer = layui.layer;//弹出层
    });
     /*用户-添加*/
    function user_add(title,url,w,h){
        x_admin_show(title,url,w,h);
    }
    /*用户-查看*/
    function user_show(title,url,id,w,h){
        x_admin_show(title,url,w,h);
    }
     /*用户-停用*/
    function member_stop(obj,id){
        layer.confirm('确认要停用吗？',function(index){
            //发异步把用户状态进行更改
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="layui-icon">&#xe62f;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<button class="sp3">已停用</button>');
            $(obj).remove();
            layer.msg('已停用!',{icon: 5,time:1000});
        });
    }
    /*用户-启用*/
    function member_start(obj,id){
        layer.confirm('确认要启用吗？',function(index){
            //发异步把用户状态进行更改
            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="layui-icon">&#xe601;</i></a>');
            $(obj).parents("tr").find(".td-status").html('<button class="sp">已启用</button>');
            $(obj).remove();
            layer.msg('已启用!',{icon: 6,time:1000});
        });
    }
    // 用户-编辑
    function user_edit (title,url,id,w,h) {
        x_admin_show(title,url,w,h); 
    }
    /*密码-修改*/
    function user_password(title,url,id,w,h){
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