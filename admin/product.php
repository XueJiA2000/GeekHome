<?php  
	require("../include/session_ck.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>index-商品列表</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="images/geek-icon.png" rel="shortcut icon" type="image/x-icon">
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
              <a><cite>产品列表</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
        <form class="layui-form x-center" action="product.php" method="post" style="width:660px">
		    <div class="layui-form-pane">
		      <div class="layui-form-item">
		        <label class="layui-form-label">类别</label>
		        <div class="layui-input-inline" style="width:122px">
			        <select lay-verify="required" name="product_category" class="layui-form-label cate">
			        <option></option>
			        <?php 
						$sql="select * from ite_category";
						$result=mysql_query($sql); //执行 $result获取的是一个结果集 （资源类型的表格）
						while($result_array=mysql_fetch_array($result)){
					?>
			        <option value="<?php echo $result_array["Id"]; ?>"><?php echo $result_array["categoryName"]; ?></option>
			        <?php } ?>
			        </select>
		        </div>
		        <label class="layui-form-label">产品名称</label>
		        <div class="layui-input-inline" style="width:152px">
		          <input type="text" name="product_name"  placeholder="简介" autocomplete="off" class="layui-input">
		        </div>
		        <input name="btn" type="submit" class="sure" value="查询"/>
		      </div>
		    </div>
		</form>
        <div class="tools">
		    <ul class="toolbar">
		    	<?php
		    		$sql="select * from ite_product";
					$result=mysql_query($sql); //执行 $result获取的是一个结果集 （资源类型的表格）
					$result_array=mysql_fetch_array($result);//从结果集里面取出一条数据转换为数组
		    	?>
		      <li id="sub"><span><img src="images/t03.png" /></span>批量删除</li>
		      <li onclick="home_add('添加','product_add.php','600','500')"><span><img src="images/t01.png" /></span>添加</li>
		    </ul>
		</div>
   		<form action="product_deal.php?act=delAll" method="POST" id="myForm">
            <table class="tablelist">
                <thead>
                    <tr>
                        <th width="6%"><input name="" type="checkbox" id="controlAll" onclick="selectAll()" /></th>
                        <th width="6%">Id</th>
                        <th width="10%">类别</th>
                        <th width="8%">标识</th>
                        <th width="12%">产品类型</th>
                        <th width="20%">产品名称</th>
                        <th width="8%">现价</th>
                        <th width="8%">原价</th>
                        <th width="7%">点击量</th>
                        <th width="10%">添加时间</th>
                        <th width="10%">操作</th>
                    </tr>
                </thead>
               
                <tbody id="x-img">
                	<?php 
						$product_category=@$_POST["product_category"]?$_POST["product_category"]:@$_GET["product_category"];
						$product_name=@$_POST["product_name"]?$_POST["product_name"]:@$_GET["product_name"];
						
						/*分页核心开始*/
						
						//第一步 计算总记录 和页数
						$sql="select * from ite_product where 1=1 ";
						
							if($product_name!=""){
								$sql.="and product_name like '%".$product_name."%' ";
							}
							if($product_category!=""){
								$sql.="and product_category=".$product_category;
							}
							//exit($sql);
							$result=mysql_query($sql);//执行$result获取的是一个结果集 （资源类型的表格）
							
							$result_rows=mysql_num_rows($result);//获取结果集里面的总记录数
							
							$pageSize=10;//设置一页里面的数量
							
							$pagenums=ceil($result_rows/$pageSize);//计算总页数
						
						//第二步 设置或者获取当前页码  计算偏移数
							$pageNo=@$_GET["pageNo"]?$_GET["pageNo"]:1;//当前的页码
							
							$offset=($pageNo-1)* $pageSize;//计算偏移
						/*分页核心结束*/
						$sql="select *,a.Id as aId from ite_product as a join ite_category as b on a.product_category=b.Id where 1=1 ";
						
						if($product_name!=""){
							$sql.="and product_name like '%".$product_name."%' ";
						}
						if($product_category!=""){
							$sql.="and product_category=".$product_category;
						}
						
						$sql.=" order by a.Id desc limit ".$offset.",".$pageSize."";
						//exit($sql);	
						$result=mysql_query($sql);
						while($result_array=mysql_fetch_array($result)){
					?>
                    <tr>
                        <td>
                            <input name="checkname[]" type="checkbox" value="<?php echo $result_array["aId"]; ?>" class="check2" />
                        </td>
                        <td><?php echo $result_array["aId"]; ?></td>
                        <td><?php echo $result_array["categoryName"]; ?></td>
                        <td><?php echo $result_array["sign"]; ?></td>
                        <td><?php echo $result_array["product_type"]; ?></td>
                        <td><div style="white-space:nowrap;overflow:hidden;width:320px;text-overflow:ellipsis;"><?php echo $result_array["product_name"]; ?></div></td>
                        <td align="left"><?php echo $result_array["presentPrice"]; ?></td>
                        <td align="left"><?php echo $result_array["originalPrice"]; ?></td>
                        <td align="left"><?php echo $result_array["click_num"]; ?></td>
                        <td><?php echo $result_array["writerTime"]; ?></td>
                        <td class="td-manage">
                            <a title="修改" href="javascript:;" onclick="home_edit('修改','product_update.php?Id=<?php echo $result_array["aId"];?>','4','','510')"
                            class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a title="product_deal.php?act=delect&Id=<?php echo $result_array["aId"]; ?>" class="click">
                            	<i class="layui-icon" style="cursor: pointer;">&#xe640;</i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
            
            
	<div class="pagin">
    	<div class="message">共<i class="blue"><?php echo $result_rows; ?></i>条记录/<?php echo $pagenums; ?>页，当前显示第&nbsp;<i class="blue"><?php echo $pageNo; ?>&nbsp;</i>页</div>
        <?php 
			$p="";
			if($product_category!=""){
				$p.="&product_category=".$product_category;
			}
			if($product_name!=""){
				$p.="&product_name=".$product_name;
			}	
		?>
        <ul class="paginList">
        <?php if($pageNo==1){?>
        <li class="paginItem"><a>首页</a></li>
        <li class="paginItem"><a><span class="pagepre"></span></a></li>
        <?php }else{?>
        <li class="paginItem"><a href="product.php?pageNo=1<?php echo $p;?>">首页</a></li>
        <li class="paginItem"><a href="product.php?pageNo=<?php echo $pageNo-1; ?><?php echo $p;?>"><span class="pagepre"><</span></a></li>
        <?php }?>
        
        <?php if($pageNo==$pagenums){?>
        <li class="paginItem"><a><span class="pagenxt"></span></a></li>
        <li class="paginItem"><a>尾页</a></li>
        <?php }else{?>
        <li class="paginItem"><a href="product.php?pageNo=<?php echo $pageNo+1; ?><?php echo $p;?>"><span class="pagenxt">></span></a></li>
        <li class="paginItem"><a href="product.php?pageNo=<?php echo $pagenums; ?><?php echo $p;?>">尾页</a></li>
        <?php }?>

        </ul>
    </div>
   
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
					window.location.href=$("#myform2").attr("action");
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