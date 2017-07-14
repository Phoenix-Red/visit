<?php 
	define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加管理员</title>
<link href="css.css" rel="stylesheet" type="text/css">
<script type="text/javascript"> 
function check(){   
        if(document.form1.username.value==""){
		alert("请输入管理员帐号");
		document.form1.username.focus();
		return false;}
	if(document.form1.password.value==""){
		alert("请输入管理员密码");
		document.form1.password.focus();
		return false;
	} 
	if(document.form1.password2.value==""){
		alert("请输入确认密码");
		document.form1.password2.focus();
		return false;
	}
	if(document.form1.password.value!=document.form1.password2.value){
		alert("两次输入密码不一致");
		document.form1.password2.focus();
		return false;
	}
	
}
</script> 
<script language="javascript" src="js/pub.js"></script>
<script type="text/javascript" language="javascript" src="../editor/kindeditor.js"></script>
<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
				},afterBlur: function(){this.sync();}
			});
			prettyPrint();
		});
	</script>
</head>
<body topmargin="0" bottommargin="0" style="overflow-x:hidden;overflow-y:auto">
<div id=hiddenDiv style="filter:Alpha(opacity=10);">
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FF6600" height="180">
  <form name="form1" method="post" action="#" onSubmit="return check()">
  <input type="hidden" name="act" value="add">
  <tr>
    <td height="26" align="left" background="images/alert.jpg" style="font-size:14px; font-weight:bold">
    &nbsp;添加管理员</td>
  </tr>
  <tr>
    <td valign="top" bgcolor="#FFFFEE"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="10"></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
        <td width="10"></td>
        <td align="center">
          <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#FF9900">
            <tr>
              <td width="80" height="30" align="right" bgcolor="#FFFFFF">用户名：</td>
              <td bgcolor="#FFFFFF">
			  <input type="text" name="username" class="inputuser" style="width:100%"></td>
            </tr>
            <tr>
              <td height="28" align="right" bgcolor="#FFFFFF">所属角色：</td>
              <td bgcolor="#FFFFFF">
              <select name="admin_type">
              <?php
              	$sql = "select * from cnly_jiaose order by id asc";
				$res = $db->query($sql);
				while($row = $db->getarray($res))
				{
			  ?>
              	<option value="<?=$row['id']?>"><?=$row['jiaose_name']?></option>
              <?php
				}
			  ?>
              </select>
              </td>
            </tr>
            <tr>
              <td height="28" align="right" bgcolor="#FFFFFF">密码：</td>
              <td bgcolor="#FFFFFF">
			  <input type="password" name="password" class="inputuser" style="width:100%">
			  </td>
            </tr>
            <tr>
              <td width="80" height="28" align="right" bgcolor="#FFFFFF">确认密码：</td>
              <td bgcolor="#FFFFFF">
			  <input type="password" name="password2" class="inputuser" style="width:100%">
			  </td>
            </tr>
          </table>
                
        </td>
        <td width="10"></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="10"></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="30" bgcolor="#FFFFEE"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30" colspan="3" align="center" bgcolor="#FBEAB5"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><input name="Submit" type="submit" class="button" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="添加" >&nbsp;&nbsp;&nbsp;
                <input name="Submit2" type="button" class="button" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="关闭" onClick="parent.doOk();"></td>
              </tr>
        </table></td>
      </tr>
    </table></td>
  </tr></form>
</table>
<?php
	$act = !empty($_POST['act']) ? trim($_POST['act']) : '';
	if($act == 'add')
	{
		
		$username = !empty($_POST['username']) ? make_semiangle(trim($_POST['username'])) : '';
		
		$password2 = !empty($_POST['password2']) ? md5(md5(make_semiangle(trim($_POST['password2'])))) : '';
		$admin_type = !empty($_POST['admin_type']) ? make_semiangle(trim($_POST['admin_type'])) : '';
		$sql = "INSERT INTO cnly_admin(admin_name,admin_pwd,admin_type) VALUES('$username','$password2','$admin_type')";
		if($db->query($sql))
		{
			goBakLoad('添加成功');
		}
		else
		{
			goBakMsg("该用户已经存在");	
		}
		mysql_close($db->connect());
	}
?>
</div>
</body>
</html>