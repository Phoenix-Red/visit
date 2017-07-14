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
<script language="javascript" src="js/alert.js"></script>
<link href="css.css" rel="stylesheet" type="text/css"></HEAD>
<BODY>
<div id=hiddenDiv style="filter:Alpha(opacity=10);">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #B7E6B0;border-right:1px solid #B7E6B0;">
  <tr>
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> > 类别管理</td>
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
            <tr>
              <td height="30" align="right"><table width="70" height="22" border="0" cellpadding="0" cellspacing="0" bgcolor="#009900" onMouseOver="this.style.backgroundColor='#003300';" onMouseOut="this.style.backgroundColor='#009900';">
                <tr>
                  <td align="center"><img src="images/icon_add.gif" width="16" height="16"></td>
                  <td align="center"><p style="margin-top:3px"><span onClick="sAlertopen('656','259','class_add.php');" style="font-size:12px; font-weight:normal; color:#FFFFFF; cursor:hand">添加类别</span></p></td>
                </tr>
              </table></td>
              </tr>
    
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table><DIV class=list-div id=listDiv>
          <TABLE width="100%" cellPadding=3 cellSpacing=1 bgcolor="#BCE8B5" id=list-table>
  <TBODY>
  <TR>
    <TH width="875" height="24" background="images/list_title_bg.jpg">栏目名称</TH>
    <TH width="71" background="images/list_title_bg.jpg">排序</TH>
    <TH width="77" background="images/list_title_bg.jpg">编号</TH>
    <TH width="84" align="center" background="images/list_title_bg.jpg">操作</TH>
  </TR>
  
 
<?php
sub_class(0,"");
function sub_class($pid,$cut)
{
	$sql = "SELECT * FROM cnly_class WHERE pid='$pid' ORDER BY class_order ASC,id DESC";
	$res = mysql_query($sql);
	while($row = mysql_fetch_array($res))
	{
		if($pid==0)
		{
			$style = "class=\"0\" bgcolor=\"#EAFFDF\" onMouseOut=\"mOut(this,'#EAFFDF');\" onMouseOver=\"mOvr(this,'#DCF9B9');\"";
			$img = "<IMG style=\"MARGIN-LEFT: 0em\" onclick=rowClicked(this) height=9 src=\"images/menu_minus.gif\" width=9 border=0>";
		}
		else
		{
			$style = "class=\"1\" bgcolor=\"#FFFFFF\" onMouseOut=\"mOut(this,'#FFFFFF');\" onMouseOver=\"mOvr(this,'#DCF9B9');\"";
			$img = "&nbsp;";
		}
?>   
   <TR align=middle <?=$style?>>
    <TD height="25" align=left><?=$img?><SPAN> <strong><?=$cut.$row['class_name']?></strong></SPAN>    </TD>
    <TD align="center"><?=$row['class_order']?></TD>
    <TD align="center"><?=$row['id']?></TD>
    <TD align=center>
    <table width="60" border="0" cellspacing="0" cellpadding="0">
      <tr>
	   <td align="center"><span style="cursor:hand;color:#ff0000" onClick="sAlertopen('407','380','add_pic.php?id=<?=$row['id'];?>&class_name=<?=urlencode($row['class_name'])?>')" ><img src="images/image.gif" width="16" height="16"></span></td>
	  
        <td align="center"> 
        <span onClick="sAlertopen('656','285','class_upd.php?id=<?=$row['id']?>&act=upd');" style="font-size:12px; font-weight:normal; color:#FFFFFF; cursor:hand"><img src="images/icon_edit.gif" width="16" height="16" border="0" alt="修改"></span>
       </td>
        <td align="center" width="30">
		<?php 
		if($row['display']=='0')
		{
			echo "&nbsp;";
		}
		else
		{
		?>
		<a href="?id=<?=$row['id']?>&act=del" onClick="return confirm('确定要删除该分类吗？')"><img src="images/icon_trash.gif" width="16" height="16" border="0"></a>
		<?php
		}
		?></td>
      </tr>
    </table></TD>
  </TR>
<?php
		sub_class($row['id'],'|--'.$cut);
	}
}
?>     
    </TBODY></TABLE>

</DIV>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          </td>
        <td width="10"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" height="25">
          <center>
           <a href="http://www.xadade.com" target="_blank"></a>
      </center></td>
  </tr>
</table>
<?php
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	if($act == 'del')
	{
		$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
		if($id<=4)
		{
			goBakMsg('对不起，系统分类无法删除');
			exit();
		}
		$sql = "SELECT id FROM cnly_class WHERE pid='$id'";
		if($db->getcount($sql)>0)
		{
			goBakMsg('该分类下还有下级分类，请先删除下级分类');
			exit();
		}
		$sql = "SELECT id FROM cnly_content WHERE cat_id='$id'";
		if($db->getcount($sql)>0)
		{
			goBakMsg('该分类下存在信息，请删除该分类的信息后再删除该分类');
			exit();
		}
		$sql = "DELETE FROM cnly_class WHERE id='$id'";
		$db->query($sql);
		urlMsg('删除成功','class.php');
		mysql_close($db->connect());
	}
?>
</div>
</BODY></HTML>