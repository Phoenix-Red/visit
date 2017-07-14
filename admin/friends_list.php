<?php
	define('IN_XANET', true);
	include_once("includes/init.php");
	if(!in_array('4',$menu_arr))
	{
		header("location:error.php");
		exit();
	}
?>
<HTML><HEAD><TITLE>主要内容</TITLE>
<META content="noindex, nofollow" name=robots>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.2900.3086" name=GENERATOR><script language="javascript" src="js/showprocessbar.js"></script>
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
<BODY>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #B7E6B0;border-right:1px solid #B7E6B0;">
  <tr>
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> > 友情管理</td>
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
            <form name="form1" method="post" action="error.htm"><tr>
              <td align="right"><table width="70" height="22" border="0" cellpadding="0" cellspacing="0" bgcolor="#009900" onMouseOver="this.style.backgroundColor='#003300';" onMouseOut="this.style.backgroundColor='#009900';">
                <tr>
                  <td align="center"><img src="images/icon_add.gif" width="16" height="16"></td>
                  <td align="center"><p style="margin-top:3px"><a href="friends_add.php" style="font-size:12px; font-weight:normal; color:#FFFFFF">录入数据</a></p></td>
                  </tr>
              </table></td>
            </tr></form>
          </table>
                
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          
          
          
          <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#BCE8B5">
            <tr>
              <td width="40" height="26" align="center" background="images/list_title_bg.jpg"><strong>编号</strong></td>
              <td align="center" background="images/list_title_bg.jpg"><strong>友情链接名称</strong></td>
              <td width="100" align="center" background="images/list_title_bg.jpg"><strong>所属分类</strong></td>
              <td width="50" align="center" background="images/list_title_bg.jpg"><strong>排序</strong></td>
              <td width="120" align="center" background="images/list_title_bg.jpg"><strong>友情url</strong></td>
              <td width="60" align="center" background="images/list_title_bg.jpg"><strong>操作</strong></td>
            </tr>
            
            <?php
            	
				
			$countSql="SELECT count(*) FROM cnly_friends as a, cnly_class as b where a.friends_cat=b.cat_id and b.cat_id in($class_arr_id)";//sql语句
						
			$pageSize="20"; //每页显示数
			$curPage=!empty($_GET['curPage']) ? intval($_GET['curPage']) : 1;//通过GET传来的当前页数
			$urlPara= $KeyWord;//这是URL后面跟的参数，也就是问号传值
			
			$pageOutStr=reterPageStr($pageSize,$curPage,$countSql,$urlPara);
			$pageOutStrArr=explode("||",$pageOutStr);
			$rsStart=$pageOutStrArr[0];//limit 后的第一个参数
			$pageStr=$pageOutStrArr[2];//limit 后的第二个参数
			$pageCount=$pageOutStrArr[1];//总页数
			$sql = "SELECT * FROM cnly_friends as a,cnly_class as b where a.friends_cat=b.cat_id and b.cat_id in($class_arr_id)   ORDER BY friends_id DESC LIMIT $rsStart, $pageSize";
			
			//if($db->exec($sql));
			$sth = $db->query($sql); 
			
			$row = $sth->fetchAll(); 
		   

		  for($i=0;$i<count($row);$i++)
		  {
			?>
            
            <tr bgcolor="#FFFFFF" onMouseOut="mOut(this,'#FFFFFF');" onMouseOver="mOvr(this,'#DCF9B9');">
              <td height="26" align="center"><?=$i+1?></td>
              <td align="left"><?=$row[$i]['friends_name']?></td>
              <td align="center"><?=$row[$i]['cat_name']?></td>
              <td align="center">
         <?=$row[$i]['friends_order']?>
              </td>
              <td align="center"><?=$row[$i]['friends_url']?></td>
              <td align="center"><table width="60" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center"><img src="images/icon_view.gif" width="16" height="16"></td>
                  <td align="center"> <a href="friends_upd.php?id=<?=$row[$i]['friends_id']?>&curPage=<?=$curPage?>&<?=$KeyWord?>"><img src="images/icon_edit.gif" width="16" height="16" border="0"></a></td>
                  <td align="center"><a href="?act=del&id=<?=$row[$i]['friends_id']?>&curPage=<?=$curPage?>&<?=$KeyWord?>"><img src="images/icon_trash.gif" width="16" height="16" border="0"></a></td>
                  </tr>
                </table></td>
            </tr>
            
            
          <?php
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
              <td height="30" align="center">
                <?php echo $pageStr;?>              </td>
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
</BODY></HTML>
<?php 
$act=!empty($_GET['act'])? $_GET['act']:'';
if($act=='del')
{
$id=!empty($_GET['id'])? intval($_GET['id']):'';
$sql="delete from cnly_friends where friends_id='$id'";
		$sth = $db->prepare($sql);
		if($sth->execute())
		{
			urlMsg('删除成功','friends_list.php');
		}
		else
		{
			goBakMsg("删除失败");	
		}
}
?>