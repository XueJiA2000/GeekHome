<?php 
//	@include("include/session_ck.php");//添加数据
	  include("../include/conn.php");
	  
	  $Id=@$_GET["Id"];
		$sql="select * from ite_user where Id=".$Id." ";
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
            <form class="layui-form" action="user_deal.php?act=update&Id=<?php echo $result_array["Id"]; ?>" method="post">
                <div class="layui-form-item">
                    <label for="L_email" class="layui-form-label">
                        <span class="x-red">*</span>用户名称</label>
                    <div class="layui-input-inline">
                        <input type="text"  name="username" class="layui-input" value="<?php echo $result_array["username"]; ?>">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        <span class="x-red">*</span>必填
                    </div>
                </div>
                
                <div class="layui-form-item">
                    <label class="layui-form-label">
                        <span class="x-red">*</span>原始密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_pass" name="password" class="layui-input">
                        <input type="hidden" name="password_old" value="<?php echo $result_array["password"]; ?>">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        6到16个字符
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_repass" class="layui-form-label">
                        <span class="x-red">*</span>新密码
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="L_repass" name="password_s" class="layui-input" value="<?php echo $result_array["password"]; ?>">
                    </div>
                    <div class="layui-form-mid layui-word-aux">
                        6到16个字符
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>用户角色</label>
                    <div class="layui-input-inline">
                        <input type="text" id="username" name="Grade"  class="layui-input" value="<?php echo $result_array["Grade"]; ?>">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>性别
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="sex"  class="layui-input" value="<?php echo $result_array["sex"]; ?>">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="L_username" class="layui-form-label">
                        <span class="x-red">*</span>电话
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="L_username" name="phone"  class="layui-input" value="<?php echo $result_array["phone"]; ?>">
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