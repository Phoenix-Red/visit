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
		$sql = "SELECT * FROM cnly_baoming WHERE id='$id'";
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
<table width="550" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FF6600" height="336">
  <form name="form1" method="post" action="?act=update&id=<?=$id?>" onSubmit="return check();">
  <tr>
    <td height="26" align="left" background="images/alert.jpg" style="font-size:14px; font-weight:bold">&nbsp;&nbsp; 在线报名</td>
  </tr>
  <tr>
    <td height="275" valign="top" bgcolor="#FFFFEE"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
              <td width="100" height="20" align="right" bgcolor="#FFFFFF"> 姓      名：</td>
              <td bgcolor="#FFFFFF"><?=@$row['name']?></td>
            </tr>
            <tr >
              <td height="20" align="right" bgcolor="#FFFFFF"> 性      别：</td>
              <td bgcolor="#FFFFFF"><?=@$row['sex']?></td>
            </tr>
            <tr >
              <td height="20" align="right" bgcolor="#FFFFFF"> 年      龄：</td>
              <td bgcolor="#FFFFFF"><?=@$row['age']?></td>
            </tr>
            <tr >
              <td width="100" height="20" align="right" bgcolor="#FFFFFF"> 身      高：</td>
              <td bgcolor="#FFFFFF"><?=@$row['height']?></td>
            </tr>
            <tr>
              <td height="20" align="right" bgcolor="#FFFFFF"> 体      重：</td>
              <td bgcolor="#FFFFFF"><?=@$row['weight']?></td>
            </tr>
            <tr >
              <td height="20" align="right" bgcolor="#FFFFFF"> 所报专业：</td>
              <td bgcolor="#FFFFFF"><?=@$row['classobj']?></td>
            </tr>
            <tr >
              <td height="20" align="right" bgcolor="#FFFFFF"> 联系电话：</td>
              <td bgcolor="#FFFFFF"><?=@$row['phone']?></td>
            </tr>
            <tr >
              <td height="20" align="right" bgcolor="#FFFFFF"> 家庭住址：</td>
              <td bgcolor="#FFFFFF"><?=@$row['address']?></td>
            </tr>
            <tr >
              <td height="20" align="right" bgcolor="#FFFFFF">报名时间：</td>
              <td bgcolor="#FFFFFF"><?=@$row['add_time']?></td>
            </tr>
            <tr>
              <td width="100" height="20" align="right" bgcolor="#FFFFFF"> 个人情况描述：</td>
              <td bgcolor="#FFFFFF">
                <textarea name="content"   id="content" rows="4" style="border:#009900 solid 1px; width:100%" ><?=@$row['content']?></textarea>                </td>
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
              <td align="center"><input name="Submit2" type="button" class="button" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="关闭" onClick="parent.doOk();"></td>
              </tr>
        </table></td>
      </tr>
    </table></td>
  </tr></form>
</table>
</div>
</body>
</html>