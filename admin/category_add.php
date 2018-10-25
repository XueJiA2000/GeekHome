<?php  
	require("../include/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>index-category_add</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="./css/x-admin.css" media="all">
    </head>
    
    <body>
        <div class="x-body">
            <form action="category_deal.php?act=add" method="post" class="layui-form" enctype="multipart/form-data">
                <div class="layui-form-item">
                    <label for="link2" class="layui-form-label">
                        <span class="x-red">*</span>类别名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link2" name="categoryName" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="link3" class="layui-form-label">
                        <span class="x-red">*</span>排序位置
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link3" name="sortPosition" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="link4" class="layui-form-label">
                        <span class="x-red">*</span>添加人
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="link4" name="addPerson" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                    </label>
                    <button class="layui-btn">
                        	增加
                    </button>
                </div>
            </form>
        </div>
        <script src="./lib/layui/layui.js" charset="utf-8"></script>
        <script src="./js/x-layui.js" charset="utf-8"></script>
        <script>
            layui.use(['form','layer','upload'], function(){
                $ = layui.jquery;
              var form = layui.form()
              ,layer = layui.layer;
            });
        </script>
        
    </body>

</html>