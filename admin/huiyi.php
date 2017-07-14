<?php 
	define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
$act=!empty($_REQUEST['act']) ? trim($_REQUEST['act']):'';

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
    <td height="250" valign="top" bgcolor="#FFFFFF">
	<br />
	<table width="98%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#99CCFF">

      <tr>
        <td width="8%" height="15" align="center" bgcolor="#FFFFFF">会议编号</td>
        <td width="10%" align="center" bgcolor="#FFFFFF">会议名称</td>
        <td width="17%" align="center" bgcolor="#FFFFFF">召开日期</td>
        <td width="9%" align="center" bgcolor="#FFFFFF">主持人</td>
        <td width="6%" align="center" bgcolor="#FFFFFF"> 到会人</td>
        <td width="16%" align="center" bgcolor="#FFFFFF">会议内容</td>
        <td width="12%" align="center" bgcolor="#FFFFFF">会议结果</td>
        <td width="10%" align="center" bgcolor="#FFFFFF">备注</td>
        <td width="12%" align="center" bgcolor="#FFFFFF">操作</td>
      </tr>
	  <?php
	  	$sqlwhere="";
	    $countSql="SELECT * FROM huiyi  WHERE   huiyiname!=''  $sqlwhere  ";//sql语句
		$start_addtime=urlencode($urlencode);
		$end_addtime=urlencode($urlencode);
		$keywords=urlencode($keywords);
		$KeyWord ="start_addtime=$start_addtime&keywords=$keywords";
		$pageSize="20"; //每页显示数
		$curPage=!empty($_GET['curPage']) ? intval($_GET['curPage']) : 1;//通过GET传来的当前页数
		$urlPara= $KeyWord;//这是URL后面跟的参数，也就是问号传值
		$pageOutStr=reterPageStrSam($pageSize,$curPage,$countSql,$urlPara);
		$pageOutStrArr=explode("||",$pageOutStr);
		$rsStart=$pageOutStrArr[0];//limit后的第一个参数
		$pageStr=$pageOutStrArr[2];
		$pageCount=$pageOutStrArr[1];//总页数
		$sql = "SELECT * from  huiyi  WHERE huiyiname!='' $sqlwhere   ORDER BY id DESC LIMIT $rsStart, $pageSize";
	    $res=$db->query($sql);
	    while($row=$db->getarray($res))
	      {
	  ?>
      <tr>
        <td height="15" align="center" bgcolor="#FFFFFF"><?=$row['bianhao']?></td>
        <td align="center" bgcolor="#FFFFFF"><?=$row['huiyiname']?></td>
        <td align="center" bgcolor="#FFFFFF"><?=$row['zhaokairiqi']?></td>
        <td align="center" bgcolor="#FFFFFF"><?=$row['zhuchiren']?></td>
        <td align="center" bgcolor="#FFFFFF"><?=$row['number']?></td>
        <td align="center" bgcolor="#FFFFFF"><?=$row['content']?></td>
        <td align="center" bgcolor="#FFFFFF"><?=$row['result']?></td>
        <td align="center" bgcolor="#FFFFFF"><?=$row['beizhu']?></td>
        <td align="center" bgcolor="#FFFFFF"><a href="huiyi_upd.php?id=<?=$row[
		'id']?>">修改</a>||<a href="huiyi.php?act=del&id=<?=$row['id']?>">删除 </a></td>
      </tr>
	  <?php }?>
      <tr>
        <td height="15" colspan="9" bgcolor="#FFFFFF" align="center"><?=$pageStr?></td>
        </tr>
    </table>
	<br/></td>
  </tr>

  <tr>
    <td height="30" bgcolor="#FFFFFF">
	<br/>	<table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" style="border:1px #99CCFF solid">
      <form action="huiyi.php" method="post">
        <input type="hidden" name="act" value="add" />
        <tr>
          <td width="6%" height="30" align="right">会议编号</td>
          <td><input name="bianhao" type="text" id="bianhao" size="20" /></td>
          <td>会议名称</td>
          <td><input name="huiyiname" type="text" id="huiyiname" size="15" /></td>
          <td width="8%" align="right">召开日期</td>
          <td width="15%"><input name="zhaokairiqi" type="text" id="zhaokairiqi" size="20" /></td>
          <td width="5%" align="right">主持人</td>
          <td width="26%"><input name="zhuchiren" type="text" id="zhuchiren" size="20" /></td>
          <td width="13%">&nbsp;</td>
        </tr>
        <tr>
          <td height="31" align="right">到会人 </td>
          <td width="10%"><input name="number" type="text" id="number" size="15" /></td>
          <td width="6%"> 会议内容 </td>
          <td width="11%"><input name="content" type="text" id="content" size="15" /></td>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
          <td><input type="submit" name="Submit" value="提交" /></td>
        </tr>
        <tr>
          <td height="30" align="right">  会议结果</td>
          <td colspan="5"><input name="result" type="text" id="result" size="20" /></td>
          <td align="right">备注</td>
          <td><input name="beizhu" type="text" id="beizhu" size="20" /></td>
          <td><input type="reset" name="Submit2" value="重置" /></td>
        </tr>
        <tr>
          <td height="30" align="right"> 打开地址</td>
          <td colspan="5"><input name="openfile" type="text" id="openfile" size="20" /></td>
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

if($act=='add')
{
$bianhao=!empty($_POST['bianhao']) ? trim($_POST['bianhao']) :'';
$huiyiname=!empty($_POST['huiyiname']) ? trim($_POST['huiyiname']) :'';
$zhaokairiqi=!empty($_POST['zhaokairiqi']) ? trim($_POST['zhaokairiqi']) :'';
$zhuchiren=!empty($_POST['zhuchiren']) ? trim($_POST['zhuchiren']) :'';
$number=!empty($_POST['number']) ? trim($_POST['number']) :'';
$content=!empty($_POST['content']) ? trim($_POST['content']) :'';
$result=!empty($_POST['result']) ? trim($_POST['result']) :'';
$openfile=!empty($_POST['openfile']) ? trim($_POST['openfile']) :'';
$beizhu=!empty($_POST['beizhu']) ? trim($_POST['beizhu']) :'';

$sql="insert into huiyi(bianhao,huiyiname,zhaokairiqi,zhuchiren,number,content,result,openfile,beizhu) 				    	values('$bianhao','$huiyiname','$zhaokairiqi','$zhuchiren','$number','$content','$result','$openfile','$beizhu')";
	
	if($db->query($sql))
	{
	echo "<script>alert('添加成功!');location.href='huiyi.php';</script>";
	}
}
//delete
if($act=='del')
{
$id=!empty($_GET['id']) ? intval($_GET['id']):'';
$sql="delete from huiyi  where id='$id'";
if($db->query($sql))
{
echo "<script>alert('删除成功!');location.href='huiyi.php';</script>";
}
}
?>