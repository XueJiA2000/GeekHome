<?php
	include("../include/conn.php");
	/*include("../include/session_ck.php");*/
	
	$Id=@$_GET["Id"];
	$sql="select * from ite_admin where Id=".$Id." ";
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
            管理员管理-修改
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
            <form action="admin_deal.php?act=update&Id=<?php echo $result_array["Id"]; ?>" method="post" class="layui-form layui-form-pane">
               <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>管理员名称&nbsp;&nbsp;
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="adminname" class="layui-input" value="<?php echo $result_array["adminname"]; ?>">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>原始密码&nbsp;&nbsp;
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="name" name="Adminpwd" class="layui-input">
                        <input type="hidden" name="Adminpwd_old" value="<?php echo $result_array["Adminpwd"]; ?>">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>新密码&nbsp;&nbsp;
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="name" name="Adminpwd_s" class="layui-input" value="<?php echo $result_array["Adminpwd"]; ?>">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red"></span>性别&nbsp;&nbsp;
                    </label>
                    <div class="layui-input-inline">
                        <select name="sex">
                        	<?php
								if($result_array["sex"]==""){
							?>
						     	<option value="未填写">未填写</option>
						    <?php }else{?>
						     	<option value="<?php echo $result_array["sex"]; ?>"><?php echo $result_array["sex"]; ?></option>
						    <?php }?>
						    <option value="女">女</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>邮箱&nbsp;&nbsp;
                    </label>
                    <div class="layui-input-inline">
                        <input type="email" id="name" name="email" class="layui-input" value="<?php echo $result_array["email"]; ?>">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>手机号&nbsp;&nbsp;
                    </label>
                    <div class="layui-input-inline">
                        <input type="tel" id="name" name="phone" class="layui-input" value="<?php echo $result_array["phone"]; ?>">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">
                        拥有的权限
                    </label>
                    <table  class="layui-table layui-input-block">
                        <tbody>
                            <tr>
                                <td width="10%">
                                    用户管理
                                </td>
                                <td width="81%">
                                    <div class="layui-input-block">
                                        <input name="id[]" checked="" type="checkbox" value="2"> 用户停用
                                        <input name="id[]" type="checkbox" value="2"> 用户删除
                                        <input name="id[]" type="checkbox" value="2"> 用户修改
                                        <input name="id[]" checked="" type="checkbox" value="2"> 用户改密
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    商品管理
                                </td>
                                <td>
                                    <div class="layui-input-block">
                                        <input name="id[]" checked="" type="checkbox" value="2"> 
                                        添加
                                        <input name="id[]" type="checkbox" value="2"> 
                                        删除
                                        <input name="id[]" type="checkbox" value="2"> 
                                        修改
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>后台登录</td>
                                <td>
                                    <div class="layui-input-block">
                                        <input name="id[]" checked="" type="checkbox" value="2"> 
                                        登录
                                        
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    数据管理
                                </td>
                                <td>
                                    <div class="layui-input-block">
                                        <input name="id[]" checked="" type="checkbox" value="2"> 
                                        编辑
                                        <input name="id[]" type="checkbox" value="2"> 
                                        删除
                                        <input name="id[]" type="checkbox" value="2"> 
                                        批量删除
                                        <input name="id[]" type="checkbox" value="2"> 
                                        批量导出
                                        <input name="id[]" checked="" type="checkbox" value="2"> 
                                        导出
                                        <input name="id[]" type="checkbox" value="2"> 
                                        搜素
                                    </div>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    网站信息管理
                                </td>
                                <td>
                                    <div class="layui-input-block">
                                        <input name="id[]" checked="" type="checkbox" value="2"> 
                                        首页
                                        <input name="id[]" checked="" type="checkbox" value="2"> 
                                        用户中心
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label for="desc" class="layui-form-label">
                        备注信息
                    </label>
                    <div class="layui-input-block">
                        <textarea value="<?php echo $result_array["tag"]; ?>" id="desc" name="tag" class="layui-textarea"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                <button class="layui-btn" type="submit">保存</button>
                <button class="layui-btn" type="reset">取消</button>
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