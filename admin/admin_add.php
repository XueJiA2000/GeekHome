<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <title>
                管理员管理-添加
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
            <form action="admin_deal.php?act=add" method="post" class="layui-form layui-form-pane">
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>名称&nbsp;&nbsp;
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="name" name="adminname" class="layui-input" required="required">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>密码&nbsp;&nbsp;
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="name" name="Adminpwd" class="layui-input" required="required">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>重复密码&nbsp;&nbsp;
                    </label>
                    <div class="layui-input-inline">
                        <input type="password" id="name" name="Adminpwd_r" class="layui-input" required="required">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red"></span>性别&nbsp;&nbsp;
                    </label>
                    <div class="layui-input-inline">
                        <select name="sex">
                        	<option value="男">男</option>
                        	<option value="女">女</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>邮箱&nbsp;&nbsp;
                    </label>
                    <div class="layui-input-inline">
                        <input type="email" id="name" name="email" class="layui-input" required="required">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>手机号&nbsp;&nbsp;
                    </label>
                    <div class="layui-input-inline">
                        <input type="tel" id="name" name="phone" class="layui-input" required="required">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">
                        拥有权限
                    </label>
                    <table  class="layui-table layui-input-block">
                        <tbody>
                            <tr>
                                <td width="10%">
                                    管理员管理
                                </td>
                                <td width="81%">
                                    <div class="layui-input-block">
                                        <input name="id[]" type="checkbox" value="2"> 管理员停用
                                        <input name="id[]" type="checkbox" value="2"> 管理员删除
                                        <input name="id[]" type="checkbox" value="2"> 管理员修改
                                        <input name="id[]" type="checkbox" value="2"> 管理员改密
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    商品管理
                                </td>
                                <td>
                                    <div class="layui-input-block">
                                        <input name="id[]" type="checkbox" value="2"> 
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
                                        <input name="id[]" type="checkbox" value="2"> 
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
                                        <input name="id[]" type="checkbox" value="2"> 
                                        编辑
                                        <input name="id[]" type="checkbox" value="2"> 
                                        删除
                                        <input name="id[]" type="checkbox" value="2"> 
                                        批量删除
                                        <input name="id[]" type="checkbox" value="2"> 
                                        批量导出
                                        <input name="id[]" type="checkbox" value="2"> 
                                        导出
                                        <input name="id[]" type="checkbox" value="2"> 
                                        搜素
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    用户管理
                                </td>
                                <td>
                                    <div class="layui-input-block">
                                        <input name="id[]" type="checkbox" value="2"> 
                                        刷新
                                        <input name="id[]" type="checkbox" value="2"> 
                                        删除
                                        <input name="id[]" type="checkbox" value="2"> 
                                        编辑
                                        <input name="id[]" type="checkbox" value="2"> 
                                        添加
                                        <input name="id[]" type="checkbox" value="2"> 
                                        修改密码
                     
                                    </div>
                                </td>
                            </tr>
                            <tr>
                              <td>
                                    网站信息管理
                                </td>
                                <td>
                                    <div class="layui-input-block">
                                        <input name="id[]" type="checkbox" value="2"> 
                                        首页
                                        <input name="id[]" type="checkbox" value="2"> 
                                        用户中心
                   
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label for="desc" class="layui-form-label">
                        备注
                    </label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入内容" id="desc" name="tag" class="layui-textarea"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                <button class="layui-btn" type="submit">保存</button>
                <button class="layui-btn" type="reset">取消</button>
              </div>
        </form>
        </div>
        <script src="./lib/layui/layui.js" charset="utf-8"></script>
        <script src="./js/x-layui.js" charset="utf-8"></script>
        <script>
            layui.use(['form','layer'], function(){
                $ = layui.jquery;
              var form = layui.form()
              ,layer = layui.layer;

              //监听提交
              form.on('submit(save)', function(data){
                console.log(data);
                //发异步，把数据提交给php
                layer.alert("保存成功", {icon: 6},function () {
                    // 获得frame索引
                    var index = parent.layer.getFrameIndex(window.name);
                    //关闭当前frame
                    parent.layer.close(index);
                });
                return false;
              });
            });
			
        </script>
       
    </body>

</html>