<?php
	define('IN_XANET', true);
	include_once("includes/init.php");
	if(!in_array('12',$menu_arr))
	{
		header("location:error.php");
		exit();
	}
?><HTML><HEAD><TITLE>主要内容</TITLE>
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
<link href="css.css" rel="stylesheet" type="text/css"> </HEAD>
<BODY>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #B7E6B0;border-right:1px solid #B7E6B0;">
  <tr>
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> > 数据备份 </td>
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
        <td valign="top">
          <table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#D2FFD2" style="border:1px solid #BCE8B5">
            <form name="form1" method="post" action="http://www.coolfull.net/web.asp"><tr>
              <td align="right"><table width="70" height="22" border="0" cellpadding="0" cellspacing="0" bgcolor="#009900" onMouseOver="this.style.backgroundColor='#003300';" onMouseOut="this.style.backgroundColor='#009900';">
                <tr>
                  <td align="center"><img src="images/icon_add.gif" width="16" height="16"></td>
                      <td align="center"><p style="margin-top:3px"><a href="?act=bak" onClick="return confirm('确定要备份数据库吗？')" style="font-size:12px; font-weight:normal; color:#FFFFFF">备份数据</a></p>
                       </td>
                    </tr>
              </table></td>
              </tr></form>
          </table>
                
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#BCE8B5">
            <tr bgcolor="#EAFFDF">
              <td align="center">
<?php
$base_dir = 'databak/';
$fso = opendir($base_dir);
while($flist=readdir($fso)){
	if($flist!='.'&&$flist!="..")
	{
?>
              <table width="200" height="50" border="0" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC" style="float:left; margin:10px;">
                <tr>
                  <td rowspan="2" align="center" background="images/button_bg.jpg" style="color:#FFF; font-weight:bold"><?php echo $flist;?></td>
                  <td width="50" align="center" bgcolor="#FFFF66"><?=intval(filesize("databak/$flist")/1024)?> KB</td>
                  </tr>
                <tr>
                  <td align="center" bgcolor="#FFFF66"><A href="?act=del&filename=<?php echo $flist;?>" onClick="return confirm('确定要删除吗？')">删除</A></td>
                  </tr>
              </table>
<?php
	}
}
closedir($fso)
?>
              </td>
              </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#D2FFD2" style="border:1px solid #BCE8B5">
            <tr>
              <td height="30" align="center">&nbsp;</td>
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
  <tr>
    <td align="center" height="25">
       </td>
  </tr>
</table>
<?php
	$act = !empty($_REQUEST['act']) ? trim($_REQUEST['act']) : '';
	if($act == 'bak')
	{	
		
		//copy("../App_Date/#xanet_cms#","databak/");
	

		$file = '../App_Date/#RESW$%#etert57R$$#%xanet_cms#QRFEDSL#'; 
		$newfile = 'databak/'.date("YmdHis"); // 这个文件父文件夹必须能写 
		if (file_exists($file) == false) { 
		die ('= =!!该文件不存在，无法复制'); 
		} 
		$result = copy($file, $newfile); 
		if ($result != false) { 
			echo "<script>alert('备份成功');window.location='databak.php'</script>";
		//rename($newfile,'1232.txt'); //如果重复执行，会发生错误，因为第一次执行，产生1232.txt，第二次执行，就会发生文件重命名问题
		} 
		else
		{
				echo "<script>alert('目录属性不可写，请修改权限');window.location='databak.php'</script>";
		}


			
	}
	if($act == 'del')
	{
		$filename = !empty($_REQUEST['filename'])? trim($_REQUEST['filename']) : '';

		unlink("databak/".$filename);
		urlMsg('删除成功','databak.php');
	}
?>

</BODY></HTML>
