<?php 
	session_start();
	define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	include_once("includes/init.php");
	$username = !empty($_POST['username']) ? trim($_POST['username']) : '';
	$password = !empty($_POST['password']) ? md5(md5(trim($_POST['password']))) : '';
	$imgpost = !empty($_POST['imgpost']) ? strtolower(trim($_POST['imgpost'])) : '';
	$imgcheck = strtolower($_SESSION['seccode']);
	if(empty($imgpost))
	{
		goBakMsg("验证码不能为空！");
		exit();
	}
	if($imgcheck!=$imgpost)
	{
		goBakMsg("验证码错误！");
		exit();
	}
	if(empty($username) || empty($password))
	{
		goBakMsg("用户名或密码不能为空！");
		exit();
	}
	else 
	{
		$sql = "SELECT * FROM cnly_admin 
									WHERE admin_name='$username' 
									AND admin_pwd='$password'";
		$res = $db->query($sql);
		if($db->getcount($sql)==0)
		{
			goBakMsg("用户名或密码错误！");
			exit();
		}
		else if($row = $db->getarray($res))
		{
			$_SESSION['uid'] = $row['id'];
			$_SESSION['username'] = $row['admin_name'];
			$_SESSION['userpwd'] = $row['admin_pwd'];
			$_SESSION['admin_type'] = $row['admin_type'];
			
			echo "<script>;location.href='main.html';</script>";
		}
		else 
		{
			goBakMsg("未定义操作！");
			exit();
		}
	}
?>