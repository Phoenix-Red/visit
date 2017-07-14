<?php 
	define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
?>
<HTML><HEAD><TITLE>主要内容</TITLE>
<META content="noindex, nofollow" name=robots>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.2900.3086" name=GENERATOR>
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
<link href="css.css" rel="stylesheet" type="text/css"></HEAD>
<BODY><div id=hiddenDiv style="filter:Alpha(opacity=10);">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #B7E6B0;border-right:1px solid #B7E6B0;">
  <tr>
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> > 用户列表</td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="10"></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10"></td>
        <td valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#D2FFD2" style="border:1px solid #BCE8B5">
          <form name="form1" method="post" action="error.htm">
            <tr>
              <td align="right"><table width="70" height="22" border="0" cellpadding="0" cellspacing="0" bgcolor="#009900" onMouseOver="this.style.backgroundColor='#003300';" onMouseOut="this.style.backgroundColor='#009900';" style="display:none">
                <tr>
                  <td align="center"><img src="images/icon_add.gif" width="16" height="16"></td>
                  <td align="center"><p style="margin-top:3px"><span onClick="sAlertopen('300','230','admin_add.php');" style="font-size:12px; font-weight:normal; color:#FFFFFF; cursor:hand">增加用户</span></p></td>
                  </tr>
              </table></td>
              </tr>
          </form>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#BCE8B5">
            <tr>
              <td width="40" height="26" align="center" background="images/list_title_bg.jpg"><strong>编号</strong></td>
              <td align="center" background="images/list_title_bg.jpg"><strong>帐号</strong></td>
              <td align="center" background="images/list_title_bg.jpg"><strong>密码</strong></td>
              <td width="60" align="center" background="images/list_title_bg.jpg"><strong>所属角色</strong></td>
              <td width="60" align="center" background="images/list_title_bg.jpg"><strong>操作</strong></td>
            </tr>
<?php
	$sql = "SELECT *,a.id as id FROM cnly_admin as a, cnly_jiaose as b where a.admin_type=b.id ORDER BY a.id";
	$res = $db->query($sql);
	$i = 1;
	while($row = $db->getarray($res))
	{
		if($i%2==0)
		{
			$style = "bgcolor=\"#EAFFDF\" onMouseOut=\"mOut(this,'#EAFFDF');\" onMouseOver=\"mOvr(this,'#DCF9B9');\"";	
		}
		else
		{
			$style = "bgcolor=\"#FFFFFF\" onMouseOut=\"mOut(this,'#FFFFFF');\" onMouseOver=\"mOvr(this,'#DCF9B9');\"";
		}
?>
            <tr <?=$style?>>
              <td height="30" align="center" ><?=$i?></td>
              <td align="center"><?=$row['admin_name']?></td>
              <td align="center"><?=$row['admin_pwd']?></td>
              <td align="center"><?=$row['jiaose_name']?></td>
              <td align="center"><table width="60" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center"><span onClick="sAlertopen('300','230','admin_upd.php?id=<?=$row['id']?>&act=upd');" style="font-size:12px; font-weight:normal; color:#FFFFFF; cursor:hand"><img src="images/icon_edit.gif" width="16" height="16" border="0" alt="修改"></span></td>
                  <td align="center">
                  <a href="?act=del&id=<?=$row['id']?>"  onClick="return confirm('确定要删除吗？')"><img src="images/icon_trash.gif" width="16" height="16" border="0" alt="删除"></a></td>
                  </tr>
              </table></td>
            </tr>
<?php
	$i++;
	}
?>                 
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#D2FFD2" style="border:1px solid #BCE8B5">
            <tr>
              <td width="250" height="30" align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table></td>
        <td width="10"></td>
      </tr>
    </table></td>
  </tr>
  
</table>
<?php
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	if($act == 'del')
	{
		$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
		if($id==1)
		{
			urlMsg('超级管理员不能删除','admin_list.php');exit();
		}
		$sql = "DELETE FROM cnly_admin WHERE id='$id'";
		$db->query($sql);
		urlMsg('删除成功','admin_list.php');
		mysql_close($db->connect());
	}
?></div>
</BODY></HTML>
