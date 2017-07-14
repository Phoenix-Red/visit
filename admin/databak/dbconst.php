<?php
	define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	define('APP_ROOT', $_SERVER["DOCUMENT_ROOT"]);
	include_once("includes/init.php");
	include_once("sessioncheck.php");

$SessionTimeSetNum = 30; //分钟
//SessionTimeSetNum 整型变量，只允许接受整数此数据以分钟计算，来设置后台Session的存活时间
//获取地址栏内容
//echo $_SERVER['QUERY_STRING']." </dr>";//连接参数 如：aid=31&act=x
//echo $_SERVER ['HTTP_HOST']." </dr>";//ip 如：127.0.0.1
//echo $_SERVER['REQUEST_URI']." </dr>";//连接地址带参数 如：/websys/fsu.php?aid=31&act=x
//echo $_SERVER['PHP_SELF']." </dr>";//连接地址 如：/websys/fsu.php
$url_this="http://".$_SERVER ['HTTP_HOST'].$_SERVER['REQUEST_URI'];

?> 