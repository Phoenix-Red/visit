<?php
    define('IN_cnly', true);
	include_once("includes/init.php");
	$cat_id=!empty($_GET['cat_id']) ? intval($_GET['cat_id']) : 0;
	$id=!empty($_GET['id']) ? intval($_GET['id']) : 0;
	$cid=!empty($_GET['cid']) ? intval($_GET['cid']) : 0;
	
	$sqld="select * from cnly_class where id=$id";
	$resd=$db->query($sqld);
	$rowd=$db->getarray($resd);
	
	$sqla="select * from cnly_class where id=$cat_id";
	$res=$db->query($sqla);
	$rowa=$db->getarray($res);
	
	$sqls="select * from cnly_config";
	$ress=$db->query($sqls);
	$rows=$db->getarray($ress);
?> 