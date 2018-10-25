<?php 
//	@include("include/session_ck.php");//添加数据
	  include("../include/conn.php");
	  
	  $Id=@$_GET["Id"];
		$sql="select * from ite_order";
		//exit($sql);
		$result=mysql_query($sql); //执行 $result获取的是一个结果集 （资源类型的表格）
		$result_array=@mysql_fetch_array($result);//从结果集里面取出一条数据转换为数组
    //print_r($result_array);
?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>
            用户管理-编辑
        </title>
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
            <form class="layui-form" action="order_deal.php?act=update&Id=<?php echo $result_array["Id"]; ?>" method="post">
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>收货人</label>
                    <div class="layui-input-inline">
                        <input type="text"  name="contactName" class="layui-input" value="<?php echo $result_array["contactName"]; ?>">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>必填
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>收货地址</label>
                    <div class="layui-input-inline">
                        <input type="text" id="username" name="Contactaddress" class="layui-input" value="<?php echo $result_array["Contactaddress"]; ?> ">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>电话
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="contactphone"  class="layui-input" value="<?php echo $result_array["contactphone"]; ?>">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_sign" class="layui-form-label">
                    </label>
                    <button class="layui-btn" key="set-mine">
                        修改
                    </button>
                </div>
            </form>
        </div>
        <script src="./lib/layui/layui.js" charset="utf-8">
        </script>
        <script src="./js/x-layui.js" charset="utf-8">
        </script>
        <script>
            layui.use(['form','layer'], function(){
                $ = layui.jquery;
              var form = layui.form()
              ,layer = layui.layer;
              
              
            });
        </script>
    </body>

</html>