<?php
/**
	*本页是初始化所有参数的页面
	*
**/
header('Content-Type:text/html;charset=utf-8');
if (!defined('IN_cnly'))
{
    die('Hacking attempt');
}
error_reporting(0);
if (__FILE__ == '')
{
    die('Fatal error code: 0');
}
//取得网站所在根目录
define('ROOT_PATH', $_SERVER["DOCUMENT_ROOT"]);
 
$php_self = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
if ('/' == substr($php_self, -1))
{
    $php_self .= 'index.php';
}
define('PHP_SELF', $php_self);

include_once "dbClass.php";
include_once "pic.php";
require('lib_base.php');
require('lib_time.php');
require('page.php');
require('../../data/config.php');
//require(ROOT_PATH . '/includes/function.php');
//===================================
$db = new dbClass($gDB['db_user'],$gDB['db_pass'],$gDB['db_name'],$gDB['db_host']);
$db->connect();//链接数据库
$db->select();//选择数据库
?>