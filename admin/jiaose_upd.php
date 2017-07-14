<?php 
	define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
	$id = !empty($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
	$sql = "select * from cnly_jiaose where id='$id'";
	$res = $db->query($sql);
	$row_upd = $db->getarray($res);
//	print_r($row_upd['jiaose_left']);exit;
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
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> > 角色修改</td>
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
              <td align="right"><table width="70" height="22" border="0" cellpadding="0" cellspacing="0" bgcolor="#009900" onMouseOver="this.style.backgroundColor='#003300';" onMouseOut="this.style.backgroundColor='#009900';">
                <tr>
                  <td align="center"><img src="images/icon_add.gif" width="16" height="16"></td>
                  <td align="center"><p style="margin-top:3px"><a  href="jiaose.php" style="font-size:12px; font-weight:normal; color:#FFFFFF; cursor:hand">角色列表</a></p></td>
                  </tr>
              </table></td>
              </tr>
         
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table> 
          <form name="form1" method="post" action="" style="margin:0px">
          <input type="hidden" name="id" value="<?=$id?>">
          <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#BCE8B5">
            
            <tr>
              <td height="26" colspan="2" align="center" background="images/list_title_bg.jpg"><strong>添加角色</strong></td>
              </tr>

            <tr>
              <td width="180" height="30" align="right" bgcolor="#FFFFFF" >角色名称：</td>
              <td align="left" bgcolor="#FFFFFF" ><input type="text" name="jiaosename" id="jiaosename" value="<?=$row_upd['jiaose_name']?>"></td>
              </tr>
            <tr>
              <td height="30" colspan="2" align="left" bgcolor="#FFFFFF" ><p><strong>栏目权限</strong></p>
                <p>
                <?php
                	$sql = "select * from cnly_left order by id asc";
					$res = $db->query($sql);
					while($row = $db->getarray($res))
					{
				?>
                <table width="120" border="0" cellspacing="0" cellpadding="0" style="float:left">
  <tr>
    <td width="120" height="30"><?=$row['name']?>
    <input type="checkbox" name="left[]" value="<?=$row['id']?>" <?php if(in_array($row['id'],unserialize($row_upd['jiaose_left']))){?> checked <?php }?>></td>
  </tr>
</table>

               
                <?php		
					}
				?>
                </p>
                <p><strong>分类权限</strong></p>
                <p>
                <TABLE width="100%" cellPadding=3 cellSpacing=1 bgcolor="#BCE8B5" id=list-table>
                  <TBODY>
                    <TR>
                      <TH width="1205" height="24" background="images/list_title_bg.jpg">栏目名称</TH>
                      <TH width="71" background="images/list_title_bg.jpg">&nbsp;</TH>
                      </TR>
                    
                    
                    <?php
sub_class(0,"",unserialize($row_upd['jiaose_quanxian']));
function sub_class($pid,$cut,$qx)
{
	$sql = "SELECT * FROM cnly_class WHERE pid='$pid' ORDER BY class_order ASC,id DESC";
	mysql_query("set names 'utf8'");
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
                      <TD align="center"><A href="chadangyuyue.php" target="main-frame">
                        <input type="checkbox" name="qx[]" value="<?=$row['id']?>" <?php if(in_array($row['id'],$qx)){?> checked <?php }?>>
                      </A></TD>
                      </TR>
                    <?php
		sub_class($row['id'],'|--'.$cut,$qx);
	}
}
?>     
                    
                    
                  </TBODY></TABLE>
                
                
                </p></td>
              </tr>
              
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          <table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#D2FFD2" style="border:1px solid #BCE8B5">
            <tr>
              <td height="30" align="center">
              <input type="hidden" name="act" value="add">
                <input type="submit" name="button" id="button" value="提交">
              </td>
              </tr>
          </table>
          </form>
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
	$act = !empty($_POST['act']) ? trim($_POST['act']) : '';
	if($act == 'add')
	{
		$jiaosename = !empty($_POST['jiaosename']) ? trim($_POST['jiaosename']) : '';
		if(empty($jiaosename))
		{
			echo "<script>alert('请输入角色名称');history.go(-1);</script>";exit();
		}
		$left = !empty($_POST['left']) ? serialize($_POST['left']) : '';
		$qx = !empty($_POST['qx']) ? serialize($_POST['qx']) : '';
		 $sql = "update cnly_jiaose set jiaose_name='$jiaosename',jiaose_quanxian='$qx',jiaose_left='$left' where id='$id'";

		if($db->query($sql))
		{
			echo "<script>alert('修改成功');window.location='jiaose.php'</script>";
		}
		
	}
	mysql_close($db->connect());
?></div>
</BODY></HTML>
