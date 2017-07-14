<?php 
	define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
	$sql = "SELECT * FROM cnly_config  ORDER BY id LIMIT 1";
	$res = $db->query($sql);
	$row = $db->getarray($res);
?>
<HTML><HEAD><TITLE>网站基本信息</TITLE>
<META content="noindex, nofollow" name=robots>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.2900.3086" name=GENERATOR>
<link href="css.css" rel="stylesheet" type="text/css">
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
</HEAD>
<BODY>
<div id=hiddenDiv style="filter:Alpha(opacity=10);">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #B7E6B0;border-right:1px solid #B7E6B0;">
  <tr>
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：网站基本信息</td>
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
        <td valign="top"><table width="100%" border="0" cellpadding="6" cellspacing="1" bgcolor="#BCE8B5">

<form action="#" method="post" name="form1">
<input type="hidden" name="act" value="save">
<!--############################################################--> 
<tr bgcolor="#FFFFFF">
              <td height="25" colspan="2" align="center" background="images/list_title_bg.jpg" bgcolor="#E9F0E9"><strong>站点信息</strong></td>
              </tr> <tr bgcolor="#FFFFFF">
                <td width="200" height="35" align="right">网站名称(title)：</td>
                
                <td><input name="title" type="text" style="width:100%" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor'" id="title" value="<?=$row['title']?>"></td>
              </tr> <tr bgcolor="#FFFFFF">
                <td align="right">网站说明(description)：</td>
                
                <td><input name="description" type="text" style="width:100%" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor'" id="description" value="<?=$row['description']?>"></td>
              </tr> <tr bgcolor="#FFFFFF">
              <td height="35" align="right">SEO设置(keywords)：</td>
             
              <td><input name="keywords" type="text" style="width:100%" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor'" id="keywords" value="<?=$row['keywords']?>"></td>
            </tr>
              <tr bgcolor="#FFFFFF">
                <td height="35" align="right">公司名称(company)：</td>
                <td><input name="company" type="text" style="width:100%" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor'" id="company" value="<?=$row['company']?>"></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td height="35" align="right">网站网址 (domain)：</td>
                <td><input name="domain" type="text" style="width:100%" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor'" id="domain" value="<?=$row['domain']?>"></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td height="35" align="right">技术支持(author)：</td>
                <td><input name="author" type="text" style="width:100%" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor'" id="author" value="<?=$row['author']?>"></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td height="35" colspan="2" align="center">
                <input name="Submit2" type="submit" class="button" value="保存" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'" > 　　<input name="Submit2" type="submit" class="button" value="重置" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'">                </td>
                </tr>
                </form>
<!--############################################################-->			
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="10"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#D2FFD2" style="border:1px solid #BCE8B5">
            <tr>
                 <td height="30" align="center" valign="bottom" background="images/index_bottom.jpg" style="background-repeat:no-repeat; background-position:bottom">&nbsp;</td>
              </tr>
          </table>
          
          </td>
        <td width="10"></td>
      </tr>
    </table></td>
  </tr>

</table>
<?php
	$act = !empty($_POST['act']) ? trim($_POST['act']) : '';
	if($act == 'save')
	{
		$sql = "DELETE FROM cnly_config";
		$db->query($sql);
		$title = !empty($_POST['title']) ? trim($_POST['title']) : '';
		$description = !empty($_POST['description']) ? trim($_POST['description']) : '';
		$keywords = !empty($_POST['keywords']) ? trim($_POST['keywords']) : '';
		$company = !empty($_POST['company']) ? trim($_POST['company']) : '';
		$domain = !empty($_POST['domain']) ? trim($_POST['domain']) : '';
		$author = !empty($_POST['author']) ? trim($_POST['author']) : '';
		$jingtai = !empty($_POST['jingtai']) ? trim($_POST['jingtai']) : '0';
		$sql = "INSERT INTO cnly_config(title,description,keywords,company,domain,author,jingtai) 
									VALUES('$title','$description','$keywords','$company','$domain','$author','$jingtai')";
		if($db->query($sql))
		{
			urlMsg('保存成功','web_config.php');
		}
		mysql_close($db->connect());
	}
?>
</div></BODY></HTML>