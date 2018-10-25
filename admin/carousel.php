<?php  
	require("../include/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>index-carousel</title>
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
              <a><cite>轮播图</cite></a>
            </span>
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right"  href="javascript:location.replace(location.href);" title="刷新"><i class="layui-icon" style="line-height:30px">ဂ</i></a>
        </div>
        <div class="x-body">
        <form class="layui-form x-center" action="" style="width:666px">
		    <div class="layui-form-pane">
		      <div class="layui-form-item">
		        <label class="layui-form-label">大标题</label>
		        <div class="layui-input-inline" style="width:152px">
		          <input type="text" name="headlines"  placeholder="标题" autocomplete="off" class="layui-input">
		        </div>
		        <label class="layui-form-label">简介</label>
		        <div class="layui-input-inline" style="width:152px">
		          <input type="text" name="synopsis"  placeholder="简介" autocomplete="off" class="layui-input">
		        </div>
		        <input name="btn" type="submit" class="sure" value="查询"/>
		      </div>
		    </div>
		</form>
        <div class="tools">
		    <ul class="toolbar">
		    	<?php
		    		$sql="select * from ite_carousel";
					$result=mysql_query($sql); //执行 $result获取的是一个结果集 （资源类型的表格）
					$result_array=mysql_fetch_array($result);//从结果集里面取出一条数据转换为数组
		    	?>
		      <li id="sub"><span><img src="images/t03.png" /></span>批量删除</li>
		      <li onclick="home_add('添加','carousel_add.php','600','500')"><span><img src="images/t01.png" /></span>添加</li>
		    </ul>
		</div>
   		<form action="carousel_deal.php?act=delAll" method="POST" id="myForm">
            <table class="tablelist">
                <thead>
                    <tr>
                        <th width="6%">
                            <!--<input onclick="selectAll()" type="checkbox" name="controlAll" style="controlAll" id="controlAll">-->
                            <input name="" type="checkbox" id="controlAll" onclick="selectAll()" />
                        </th>
                        <th width="6%">Id</th>
                        <th width="16%">小标题</th>
                        <th width="15%">大标题</th>
                        <th width="7%">原价</th>
                        <th width="7%">现价</th>
                        <th width="22%">简介</th>
                        <th width="14%">添加时间</th>
                        <th width="11%">操作</th>
                    </tr>
                </thead>
               
                <tbody id="x-img">
                	<?php 
                		
                		$headlines=@$_POST["headlines"]?$_POST["headlines"]:@$_GET["headlines"];
						$synopsis=@$_POST["synopsis"]?$_POST["synopsis"]:@$_GET["synopsis"];
						
						/*分页核心开始*/
						
						//第一步 计算总记录 和页数
						$sql="select * from ite_carousel where 1=1 ";
						
							if($headlines!=""){
								$sql.="and headlines like '%".$headlines."%' ";
							}
							if($synopsis!=""){
								$sql.="and synopsis like '%".$synopsis."%' ";
							}
							
							//exit($sql);
							$result=mysql_query($sql);//执行$result获取的是一个结果集 （资源类型的表格）
							
							$result_rows=mysql_num_rows($result);//获取结果集里面的总记录数
							
							$pageSize=5;//设置一页里面的数量
							
							$pagenums=ceil($result_rows/$pageSize);//计算总页数
						
						//第二步 设置或者获取当前页码  计算偏移数
							$pageNo=@$_GET["pageNo"]?$_GET["pageNo"]:1;//当前的页码
							
							$offset=($pageNo-1)* $pageSize;//计算偏移
						/*分页核心结束*/
						$sql="select * from ite_carousel where 1=1 ";
						
							if($headlines!=""){
								$sql.="and headlines like '%".$headlines."%' ";
							}
							if($synopsis!=""){
								$sql.="and synopsis like '%".$synopsis."%' ";
							}
							
							$sql.=" order by Id desc limit ".$offset.",".$pageSize." ";
							//exit($sql);	
							$result=mysql_query($sql); //执行 $result获取的是一个结果集 （资源类型的表格）
							while($result_array=mysql_fetch_array($result)){
					?>
                    <tr>
                        <td>
                            <!--<input type="checkbox" value="<?php echo $result_array["Id"];?>" name="selected">-->
                            <input name="checkname[]" type="checkbox" value="<?php echo $result_array["Id"]; ?>" class="check2" />
                        </td>
                        <td><?php echo $result_array["Id"]; ?></td>
                        <td><?php echo $result_array["subtitle"]; ?></td>
                        <td><?php echo $result_array["headlines"]; ?></td>
                        <td><?php echo $result_array["originalPrice"]; ?></td>
                        <td><?php echo $result_array["presentPrice"]; ?></td>
                        <td align="left"><div style="white-space:nowrap;overflow:hidden;width:320px;text-overflow:ellipsis;"><?php echo $result_array["synopsis"]; ?></div></td>
                        <td><?php echo $result_array["writerTime"]; ?></td>
                        <!--<td class="td-status">
                            <button class="sp">已上传</button>
                        </td>-->
                        <td class="td-manage">
                            <a title="修改" href="javascript:;" onclick="home_edit('修改','carousel_update.php?Id=<?php echo $result_array["Id"];?>','4','','510')"
                            class="ml-5" style="text-decoration:none">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <!--<a title="删除" href="javascript:;" onclick="banner_del(this,'1')" 
                            style="text-decoration:none">
                                <i class="layui-icon">&#xe640;</i>
                            </a>-->
                            <a title="carousel_deal.php?act=delect&Id=<?php echo $result_array["Id"]; ?>" class="click">
                            	<i class="layui-icon" style="cursor: pointer;">&#xe640;</i>
                            </a>
                        </td>
                        <!--<input type="submit" value="删除全部" style="background: transparent;" />-->
                    </tr>
                    <?php } ?>
                </tbody>
                </form>
            </table>
            
	<div class="pagin">
    	<div class="message">共<i class="blue"><?php echo $result_rows; ?></i>条记录/<?php echo $pagenums; ?>页，当前显示第&nbsp;<i class="blue"><?php echo $pageNo; ?>&nbsp;</i>页</div>
        <?php 
			$p="";
			if($headlines!=""){
				$sql.="and headlines like '%".$headlines."%' ";
			}
			if($synopsis!=""){
				$sql.="and synopsis like '%".$synopsis."%' ";
			}
		?>
        <ul class="paginList">
        <?php if($pageNo==1){?>
        <li class="paginItem"><a>首页</a></li>
        <li class="paginItem"><a><span class="pagepre"></span></a></li>
        <?php }else{?>
        <li class="paginItem"><a href="carousel.php?pageNo=1<?php echo $p;?>">首页</a></li>
        <li class="paginItem"><a href="carousel.php?pageNo=<?php echo $pageNo-1; ?><?php echo $p;?>"><span class="pagepre"><</span></a></li>
        <?php }?>
        
        <?php if($pageNo==$pagenums){?>
        <li class="paginItem"><a><span class="pagenxt"></span></a></li>
        <li class="paginItem"><a>尾页</a></li>
        <?php }else{?>
        <li class="paginItem"><a href="carousel.php?pageNo=<?php echo $pageNo+1; ?><?php echo $p;?>"><span class="pagenxt">></span></a></li>
        <li class="paginItem"><a href="carousel.php?pageNo=<?php echo $pagenums; ?><?php echo $p;?>">尾页</a></li>
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