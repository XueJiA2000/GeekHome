<?php
	@session_start();
	@header("Content-type:text/html;charset=utf-8");
	
	//1. 连接数据库
	@mysql_connect("127.0.0.1:3306","root","root") or exit("数据库连接失败");
	
	//2. 选择数据库
	mysql_select_db("shop_sql") or exit("数据库不存在");
	
	
	mysql_query("SET NAMES 'utf8'");//通知服务器客户端传递过去的语句的编码
	mysql_query("SET CHARACTER_SET_CLIENT=utf8");//服务器设置客户端编码
	mysql_query("SET CHARACTER_SET_CLIENTS=utf8");//设置查询结果的编码


?>