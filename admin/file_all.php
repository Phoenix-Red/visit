<?php
//header("Content-type:text/html;charset=gb2312");
	define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文件路径</title>
<style type="text/css">
<!--
a {
	font-size: 12px;
}
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	
}
body,td,th {
	font-size: 12px;
}
-->
</style></head>

<body>
<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#CCCCCC">
  <tr>
    <td bgcolor="#FFFFFF" width="280" align="center"><strong>路径</strong></td>
    <td bgcolor="#FFFFFF" align="center"><strong>说明</strong></td>
    <td width="50" align="center" bgcolor="#FFFFFF">删除</td>
  </tr>


<?php
$id_url = !empty($_GET['id']) ? intval($_GET['id']) : '';
	$sql = "select * from cnly_xiangce  where red_id='$id_url'";
	$res = $db->query($sql);
	while($row_file=$db->getarray($res))
	{
?>
  <tr>
    <td bgcolor="#FFFFFF"><a href="<?=$row_file['file_url']?>" target="_blank"><?=$row_file['img_bthumb']?></a></td>
    <td bgcolor="#FFFFFF"><?=$row_file['img_desc']?></td>
    <td align="center" bgcolor="#FFFFFF"><a href="?id_del=<?=$row_file['id']?>&act=del&id=<?=$id_url?>">删除</a></td>
  </tr>

<?php		
	}
$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
if($act == 'del')
{
	
	
	$id_del = !empty($_GET['id_del']) ? intval($_GET['id_del']) : '';
	$sql_sel = "select * from cnly_xiangce where id='$id_del'";
	$res = $db->query($sql);
	$row_u = $db->getarray($res);
	@unlink($row_u['file_url']);
	$sql = "delete from cnly_xiangce where id='$id_del'";
	if($db->query($sql))
	{
	
	$sql = "SELECT * FROM cnly_xiangce    WHERE img_bthumb!=''  and red_id='$id_url' ORDER BY  add_time DESC ";
						$res = $db->query($sql);
						
						$dd="";
						
						while($row = $db->getarray($res))
						{	
						$dd.="<image>
  <url>".$row['img_bthumb']."</url> 
 <caption>
 <![CDATA[ <font size='50'>".$id."</font> 
  ]]> 
  </caption>
  <width>936</width> 
  <height>710</height> 
  </image>\r\n";
						}

			
$str="<?xml version=\"1.0\" encoding=\"utf-8\" ?> 

<gallery frameColor=\"0xFFFFFF\" frameWidth=\"15\" imagePadding=\"20\" displayTime=\"6\" enableRightClickOpen=\"true\">
".$dd."
 </gallery>";
file_put_contents("../xiangce/photo_".$id_url.".xml",$str);
	
		$url = "file_all.php?id=$id_url";
		url($url);
	}
}

?>
</table>
</body>
</html>