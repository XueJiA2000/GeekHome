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
<title>用户管理-查看</title>
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
  <blockquote class="layui-elem-quote"> <img src="../users/<?php echo $result_array["upfile"]; ?>" class="layui-circle" style="width:50px;float:left">
    <dl style="margin-left:80px; color:#019688">
      <dt><span >收藏数：</span></dt>
      <dd style="margin-left:0">成交单数:</dd>
      <dd></dd><span >月登录次数：</span></dd>
    </dl>
  </blockquote>
  <div class="pd-20">
    <table  class="layui-table" lay-skin="line">
      <tbody>
        <tr>
          <th  width="80">性别：</th>
          <td><?php echo $result_array["sex"]; ?></td>
        </tr>
        <tr>
          <th>手机：</th>
          <td><?php echo $result_array["phone"]; ?></td>
        </tr>
        <tr>
          <th>邮箱：</th>
          <td><?php echo $result_array["email"]; ?></td>
        </tr>
        <tr>
          <th>地址：</th>
          <td><?php echo $result_array["address"]; ?></td>
        </tr>
        <tr>
          <th>注册时间：</th>
          <td><?php echo $result_array["regtime"]; ?></td>
        </tr>
        <tr>
          <th>积分</th>
          <td><?php echo $result_array["jifen"]; ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<script src="./lib/layui/layui.js" charset="utf-8">
        </script> 
<script src="./js/x-layui.js" charset="utf-8">
        </script>
</body>
</html>