<?php 
	define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
$act=!empty($_REQUEST['act']) ? trim($_REQUEST['act']):'';
$id=!empty($_REQUEST['id']) ? intval($_REQUEST['id']):'';
$sql="select * from  huiyi where id='$id'";
$res=$db->query($sql);
$row=$db->getarray($res);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body>
<br/>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#66CCFF">
  <tr>
    <td width="100%" height="30" align="left" bgcolor="#DFF0F8" style="text-indent:24px;"><strong>会议记录</strong></td>
  </tr>

  <tr>
    <td height="30" bgcolor="#FFFFFF">
	<br/>	<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" style="border:1px #99CCFF solid">
      <form action="huiyi_upd.php" method="post">
        <input type="hidden" name="act" value="upd" />
				<input type="hidden" name="id" value="<?=$id?>" />

        <tr>
          <td width="6%" height="30" align="right">会议编号</td>
          <td><input name="bianhao" type="text" id="bianhao" size="20"  value="<?=$row['bianhao']?>"/></td>
          <td>会议名称</td>
          <td><input name="huiyiname" type="text" id="huiyiname" size="15"  value="<?=$row['huiyiname']?>"/></td>
          <td width="8%" align="right">召开日期</td>
          <td width="15%"><input name="zhaokairiqi" type="text" id="zhaokairiqi" size="20" value="<?=$row['zhaokairiqi']?>" /></td>
          <td width="5%" align="right">主持人</td>
          <td width="26%"><input name="zhuchiren" type="text" id="zhuchiren" size="20" value="<?=$row['zhuchiren']?>" /></td>
          <td width="13%">&nbsp;</td>
        </tr>
        <tr>
          <td height="31" align="right">到会人 </td>
          <td width="10%"><input name="number" type="text" id="number" size="15" value="<?=$row['number']?>" /></td>
          <td width="6%"> 会议内容 </td>
          <td width="11%"><input name="content" type="text" id="content" size="15"  value="<?=$row['content']?>"/></td>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="提交" /></td>
        </tr>
        <tr>
          <td height="30" align="right">  会议结果</td>
          <td colspan="5"><input name="result" type="text" id="result" size="20"  value="<?=$row['result']?>"/></td>
          <td align="right">备注</td>
          <td><input name="beizhu" type="text" id="beizhu" size="20"  value="<?=$row['beizhu']?>"/></td>
          <td><input type="reset" name="Submit2" value="重置" /></td>
        </tr>
        <tr>
          <td height="30" align="right"> 打开地址</td>
          <td colspan="5"><input name="openfile" type="text" id="openfile" size="20"  value="<?=$row['openfile']?>"/></td>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </form>
	  </table>
	<br/>	</td>
  </tr>
  <tr>
    <td height="30" bgcolor="#DFF0F8">&nbsp;</td>
  </tr>
</table>
</body>
</html>

<?php 

if($act=='upd')
{
$id=!empty($_POST['id']) ? intval($_POST['id']) :'';

$bianhao=!empty($_POST['bianhao']) ? trim($_POST['bianhao']) :'';
$huiyiname=!empty($_POST['huiyiname']) ? trim($_POST['huiyiname']) :'';
$zhaokairiqi=!empty($_POST['zhaokairiqi']) ? trim($_POST['zhaokairiqi']) :'';
$zhuchiren=!empty($_POST['zhuchiren']) ? trim($_POST['zhuchiren']) :'';
$number=!empty($_POST['number']) ? trim($_POST['number']) :'';
$content=!empty($_POST['content']) ? trim($_POST['content']) :'';
$result=!empty($_POST['result']) ? trim($_POST['result']) :'';
$openfile=!empty($_POST['openfile']) ? trim($_POST['openfile']) :'';
$beizhu=!empty($_POST['beizhu']) ? trim($_POST['beizhu']) :'';

$sql=" update   huiyi set bianhao='$bianhao',huiyiname='$huiyiname',zhaokairiqi='$zhaokairiqi',zhuchiren='$zhuchiren',number='$number',content='$content',result='$result',openfile='$openfile',beizhu='$beizhu' where id='$id'";
	
	if($db->query($sql))
	{
	echo "<script>alert('修改成功!');location.href='huiyi.php';</script>";
	}
}

?>