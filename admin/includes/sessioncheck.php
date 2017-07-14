<?php
/**前台公共文件管理调用方法
 * ============================================================================
*/
if (!defined('IN_XANET'))
{
    die('Hacking attempt');
}

if(empty($_SESSION['admin_uid'])||empty($_SESSION['admin_username'])||empty($_SESSION['admin_userpwd'])||empty($_SESSION['admin_type']))
{
	echo "<script language='javascript'>parent.location.href='login.php';</script>";exit();
}
else
{
		$sql = "SELECT admin_id FROM cnly_admin  WHERE admin_name='".$_SESSION['admin_username']."'  AND password='".$_SESSION['admin_userpwd']."' AND admin_id='".$_SESSION['admin_uid']."' AND type='".$_SESSION['admin_type']."'";
		$sth = $db->query($sql);
		//ECHO "<pre>";
		$row = $sth->fetch(); 
		//print_r($row);
		if(empty($row['admin_id']))
		{
			echo "<script language='javascript'>parent.location.href='login.php';</script>";
			exit();
		}
}



//查询用户的权限
		$sql = "select * from cnly_jiaose where id in(select type from cnly_admin where admin_name='".$_SESSION['admin_username']."' and password='".$_SESSION['admin_userpwd']."')";

		
		$sth= $db->query($sql);
		$admin_res= $sth->fetch();
		

		$class_arr_id = "0";
		$menu_arr_id = "0";

		$class_arr = unserialize($admin_res['jiaose_quanxian']);
		$menu_arr = unserialize($admin_res['jiaose_left']);
		
		//开始拆分数组

		foreach($class_arr as $key =>$value)
		{
			$class_arr_id.=",".$value;
		}
		
		foreach($menu_arr as $key =>$value)
		{
			$menu_arr_id.=",".$value;
		}
//判断当前页面是否拥有权限


?>
