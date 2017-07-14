<?php
	session_start();
	$username = !empty($_SESSION['username']) ? $_SESSION['username'] : '';
	$userpwd = !empty($_SESSION['userpwd']) ? $_SESSION['userpwd'] : '';
	if(empty($username) || empty($userpwd)){
		echo "<script>top.location='login.php'</script>";
		exit();
	}
	else
	{
	$sql = "SELECT COUNT(*) FROM cnly_admin WHERE admin_name='$username' AND admin_pwd='$userpwd'";
		if($db->getcount($sql)==0)
		{
			echo "<script>top.location='login.php'</script>";
			exit();
		}
	}
	
	
	
	
		$sql_user = "select * from cnly_admin as a,cnly_jiaose as b where a.admin_type=b.id and admin_name='".$_SESSION['username']."'";
		$res_user = $db->query($sql_user);
		$row_user = $db->getarray($res_user);
		$jiaose_quanxian = unserialize($row_user['jiaose_quanxian']);
		$qxall = "0";
		foreach($jiaose_quanxian as $v)
		{
			 $qxall.=",".$v;
		}
		
		//echo $qxall;
	
	
	
	
	unset($sql);
?>