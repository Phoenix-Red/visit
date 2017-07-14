<?php 
	define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	$id = !empty($_GET['id']) ? trim($_GET['id']) : '';
	if($act=='look')
	{
		$sql = "SELECT * FROM cnly_user WHERE id='$id'";
		$res = $db->query($sql);
		$row = $db->getarray($res);
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>栏目分类添加</title>
<link href="css.css" rel="stylesheet" type="text/css">
<script type="text/javascript"> 
function check(){   
        if(document.form1.class_name.value==""){
			alert("请输入栏目或分类名称");
			document.form1.class_name.focus();
			return false;
		}
}
</script> 
<SCRIPT language=JavaScript src="js/pub.js" type=text/javascript></SCRIPT>
</head>
<body topmargin="0" bottommargin="0" style="overflow-x:hidden;overflow-y:auto">
<div id=hiddenDiv style="filter:Alpha(opacity=10);">
<table width="550" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FF6600" height="450">
  <form name="form1" method="post" action="?act=update&id=<?=$id?>" onSubmit="return check();">
  <tr>
    <td height="26" align="left" background="images/alert.jpg" style="font-size:14px; font-weight:bold">会员详细信息</td>
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
          <table width="100%" border="0" align="center" cellpadding="4" cellspacing="1" bgcolor="#FF9900">
            <tr>
              <td height="20" align="right" bgcolor="#FFFFFF">会员类型：</td>
              <td bgcolor="#FFFFFF"><?php if(@$row['typeid']==1){echo "正式会员";}elseif(@$row['typeid']==2){echo "普通会员";}?></td>
            </tr>
            <tr>
              <td width="100" height="20" align="right" bgcolor="#FFFFFF">用户名：</td>
              <td bgcolor="#FFFFFF"><?=@$row['user_name']?></td>
            </tr>
            <tr>
              <td height="20" align="right" bgcolor="#FFFFFF">密码：</td>
              <td bgcolor="#FFFFFF"><input name="pwd" type="text" class="inputuser" id="subject2" style="width:150px; " value="<?=@$row['user_pwd']?>"></td>
            </tr>
            <tr>
              <td width="100" height="20" align="right" bgcolor="#FFFFFF">姓名：</td>
              <td bgcolor="#FFFFFF"><?=@$row['name']?></td>
            </tr>
            <tr>
              <td width="100" height="20" align="right" bgcolor="#FFFFFF">性别：</td>
              <td bgcolor="#FFFFFF"><?php if(@$row['sex']==1){echo "男";}elseif(@$row['sex']==0){echo "女";}?></td>
            </tr>
            <tr>
              <td width="100" height="20" align="right" bgcolor="#FFFFFF">公司名称：</td>
              <td bgcolor="#FFFFFF"><?=@$row['company']?></td>
            </tr>
            <tr>
              <td height="20" align="right" bgcolor="#FFFFFF">手机：</td>
              <td bgcolor="#FFFFFF"><?=@$row['mobile']?></td>
            </tr>
            <tr>
              <td height="20" align="right" bgcolor="#FFFFFF">QQ：</td>
              <td bgcolor="#FFFFFF"><?=@$row['qq']?></td>
            </tr>
            <tr>
              <td height="20" align="right" bgcolor="#FFFFFF">E-mail：</td>
              <td bgcolor="#FFFFFF"><?=@$row['email']?></td>
            </tr>
            <tr>
              <td height="20" align="right" bgcolor="#FFFFFF">联系地址：</td>
              <td bgcolor="#FFFFFF"><?=@$row['address']
?></td>
            </tr>
            <tr>
              <td height="20" align="right" bgcolor="#FFFFFF">注册时间：</td>
              <td bgcolor="#FFFFFF"><?=@$row['add_time']?></td>
            </tr>
            <tr>
              <td width="100" height="20" align="right" bgcolor="#FFFFFF">电话：</td>
              <td bgcolor="#FFFFFF">
			    <label>
			    <input type="text" name="content"  value="<?=$row['content']?>" class="inputuser">
			    </label></td>
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
    <td height="30" bgcolor="#FFFFEE"><table width="100%" height="31" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="30" colspan="3" align="center" bgcolor="#FBEAB5"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><input name="Submit" type="submit" class="button" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="保存" onClick="return confirm('确认要修改吗？');">&nbsp;&nbsp;&nbsp;
                <input name="Submit2" type="button" class="button" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="关闭" onClick="parent.doOk();"></td>
              </tr>
        </table></td>
      </tr>
    </table></td>
  </tr></form>
</table>
<?php

	if($act == 'update')
	{
		  $pwd=$_REQUEST['pwd'];

		$sql = "UPDATE cnly_user SET user_pwd='$pwd' WHERE id='$id'";
		if($db->query($sql))
		{
			goBakLoad('修改成功');
		}
		else
		{
			goBakMsg("修改失败");	
		}
		mysql_close($db->connect());
	}
?>
</div>
</body>
</html>