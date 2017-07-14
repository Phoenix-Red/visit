<?php
	define('IN_XANET', true);
	include_once("includes/init.php");
	if(!in_array('6',$menu_arr))
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
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> > 留言管理</td>
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
              <td align="right">&nbsp;</td>
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
              <td width="772" align="center" background="images/list_title_bg.jpg"><strong>留言标题</strong></td>
              <td width="108" align="center" background="images/list_title_bg.jpg"><strong>联系电话</strong></td>
              <td width="76" align="center" background="images/list_title_bg.jpg"><strong>是否显示</strong></td>
              <td width="120" align="center" background="images/list_title_bg.jpg"><strong>录入时间</strong></td>
              <td width="60" align="center" background="images/list_title_bg.jpg"><strong>操作</strong></td>
            </tr>
            
            <?php
            	
				
			$countSql="SELECT count(*) FROM cnly_guest ";//sql语句
						
			$pageSize="20"; //每页显示数
			$curPage=!empty($_GET['curPage']) ? intval($_GET['curPage']) : 1;//通过GET传来的当前页数
			$urlPara= $KeyWord;//这是URL后面跟的参数，也就是问号传值
			
			$pageOutStr=reterPageStr($pageSize,$curPage,$countSql,$urlPara);
			$pageOutStrArr=explode("||",$pageOutStr);
			$rsStart=$pageOutStrArr[0];//limit 后的第一个参数
			$pageStr=$pageOutStrArr[2];//limit 后的第二个参数
			$pageCount=$pageOutStrArr[1];//总页数
			$sql = "SELECT * FROM cnly_guest ORDER BY add_time DESC   LIMIT $rsStart, $pageSize";
			
			//if($db->exec($sql));
			$sth = $db->query($sql); 
			
			$row = $sth->fetchAll(); 
		   

		  for($i=0;$i<count($row);$i++)
		  {
			?>
            
            <tr bgcolor="#FFFFFF" onMouseOut="mOut(this,'#FFFFFF');" onMouseOver="mOvr(this,'#DCF9B9');">
              <td height="26" align="center"><?=$i+1?></td>
              <td align="center"><?=$row[$i]['guest_title']?></td>
              <td align="center"><?=$row[$i]['telephone']?></td>
              <td align="center">
              <?php  if($row[$i]['display']==1){echo "显示";}else{echo "不显示";}?>              </td>
              <td align="center"><?=$row[$i]['add_time']?></td>
              <td align="center"><table width="60" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center"> <a href="guest_look.php?id=<?=$row[$i]['guest_id']?>&curPage=<?=$curPage?>&<?=$KeyWord?>"><img src="images/icon_view.gif" width="16" height="16" border="0"></a></td>
                  
                  <td align="center"><a href="?act=del&id=<?=$row[$i]['guest_id']?>&curPage=<?=$curPage?>&<?=$KeyWord?>"><img src="images/icon_trash.gif" width="16" height="16" border="0"></a></td>
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
$sql="delete from cnly_guest where guest_id='$id'";
		$sth = $db->prepare($sql);
		if($sth->execute())
		{
			urlMsg('删除成功','guest_list.php');
		}
		else
		{
			goBakMsg("删除失败");	
		}
}
?>