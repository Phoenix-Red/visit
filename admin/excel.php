<?php 
	define('IN_cnly', true);
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
	//header("Content-Type:text/html; charset=gbk");
?>
<HTML><HEAD><TITLE>数据导入</TITLE>
<META content="noindex, nofollow" name=robots>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.2900.3086" name=GENERATOR>
<script language="javascript1.2" type="text/javascript" src="js/selAll.js"></script>
<SCRIPT language=JavaScript src="js/pub.js" type=text/javascript></SCRIPT>


<link href="css.css" rel="stylesheet" type="text/css"></HEAD>
<BODY>
<div id=hiddenDiv style="filter:Alpha(opacity=10);">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #B7E6B0;border-right:1px solid #B7E6B0;">
  <tr>
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> > 数据查询 > <?php
    	$cat = !empty($_GET['cat']) ? intval($_GET['cat']) : 1;
		if($cat==1)
		{
			echo "开放案卷目录";
		}
		if($cat==2)
		{ 
			echo "开放现行文件";
		}
		if($cat==3)
		{
			echo "招工档案人名";
		}
		if($cat==4)
		{
			echo "政务信息公开";
		}
		
	?></td>
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
          
             <tr>
              <td align="left" nowrap><A href="?cat=1">　开放案卷目录</A>　<A href="?cat=3">开放现行文件</A>　<A href="?cat=2">招工档案人名</A></td>
              <td nowrap><a href="data/已开放案卷目录.xls">开放案卷目录excel下载</a>　
             <a href="data/开放现行文件.xls"> 开放现行文件excel下载</a>　
              <a href="data/招工人名目录.xls">招工档案人名excel下载</a>　
              </td>
              <td width="70" align="right"><table width="70" height="22" border="0" cellpadding="0" cellspacing="0" bgcolor="#009900" onMouseOver="this.style.backgroundColor='#003300';" onMouseOut="this.style.backgroundColor='#009900';">
                <tr>
                  <td align="center"><img src="images/icon_add.gif" width="16" height="16"></td>
                  <td align="center"><p style="margin-top:3px"><span onClick="sAlertopen('300','200','excel_add.php');" style="font-size:12px; font-weight:normal; color:#FFFFFF; cursor:hand">开始导入</span></p></td>
                  </tr>
              </table></td>
             </tr>
          </table>
   
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="10"></td>
            </tr>
        </table>
          
          
            <form action="#" method="get" name="formdel" style="margin:0px;"> 
          <input type="hidden" name="act" value="delAll">     
    
          <table width="100%" border="0" cellpadding="1" cellspacing="1" bgcolor="#BCE8B5">
            <tr>
              <td width="40" align="center" background="images/list_title_bg.jpg">
              <input type="checkbox" name="checkbox2" id="selall" onClick="selAll();">              </td>
              <?php
              	if($cat==1)
				{
			  ?>
              <td width="60" align="center" nowrap background="images/list_title_bg.jpg">全宗号</td>
              <td width="60" align="center" nowrap background="images/list_title_bg.jpg">保管期限</td>
              <td width="60" align="center" nowrap background="images/list_title_bg.jpg">目录号</td>
              <td align="center" background="images/list_title_bg.jpg">案卷号</td>
              <td align="center" nowrap background="images/list_title_bg.jpg">案卷题名</td>
              <td width="80" align="center" background="images/list_title_bg.jpg">案卷时间</td>
              <td width="40" align="center" background="images/list_title_bg.jpg">页数</td>
              <?php
				}
				if($cat==2)
				{
			  ?>
              <td width="60" align="center" nowrap background="images/list_title_bg.jpg">全宗号</td>
              <td width="60" align="center" nowrap background="images/list_title_bg.jpg">保管期限</td>
              <td width="60" align="center" nowrap background="images/list_title_bg.jpg">目录号</td>
              <td align="center" background="images/list_title_bg.jpg">案卷号</td>
              <td align="center" nowrap background="images/list_title_bg.jpg">文件题名</td>
              <td width="80" align="center" background="images/list_title_bg.jpg">档案类型</td>
              <td width="40" align="center" background="images/list_title_bg.jpg">成文日期</td>
              <td width="40" align="center" background="images/list_title_bg.jpg">页数</td>
              <?php
				}
				if($cat==3)
				{
			  ?>
              <td width="60" align="center" nowrap background="images/list_title_bg.jpg">序号</td>
              <td width="60" align="center" nowrap background="images/list_title_bg.jpg">责任者（单位）</td>
              <td width="60" align="center" nowrap background="images/list_title_bg.jpg">文号</td>
              <td align="center" background="images/list_title_bg.jpg">题名</td>
              <td align="center" nowrap background="images/list_title_bg.jpg">日期</td>
              <td width="80" align="center" background="images/list_title_bg.jpg">页数</td>
              <td width="40" align="center" background="images/list_title_bg.jpg">备注</td>
              <?php
				}
			  ?>
              <td width="50" align="center" background="images/list_title_bg.jpg">操作</td>
            </tr>
            
<?php
if(!empty($cat))
{
	$sqlwhere  = " where type=$cat";	
}

$countSql="SELECT id FROM cnly_data $sqlwhere";//sql语句
$KeyWord = "cat=$cat";
$pageSize="20"; //每页显示数
$curPage=!empty($_GET['curPage']) ? intval($_GET['curPage']) : 1;//通过GET传来的当前页数
$urlPara= $KeyWord;//这是URL后面跟的参数，也就是问号传值
$pageOutStr=reterPageStrSam($pageSize,$curPage,$countSql,$urlPara);
$pageOutStrArr=explode("||",$pageOutStr);
$rsStart=$pageOutStrArr[0];//limit后的第一个参数
$pageStr=$pageOutStrArr[2];
$pageCount=$pageOutStrArr[1];//总页数
$sql = "SELECT * FROM cnly_data $sqlwhere ORDER BY id DESC LIMIT $rsStart, $pageSize";
$res = $db->query($sql);
$i = 1;
while($row = $db->getarray($res))
{
		if($i%2==0)
		{
			$style = "bgcolor=\"#EAFFDF\" onMouseOut=\"mOut(this,'#EAFFDF');\" onMouseOver=\"mOvr(this,'#DCF9B9');\"";	
		}
		else
		{
			$style = "bgcolor=\"#FFFFFF\" onMouseOut=\"mOut(this,'#FFFFFF');\" onMouseOver=\"mOvr(this,'#DCF9B9');\"";
		}
?>            
            <tr <?=$style?>>
              <td align="center" >
              <input type="checkbox" name="bh[]"  value="<?=$row['id'];?>">              </td>
              <?php
              	if($cat==1)
				{
			  ?>
              <td align="center"><?=$row['field_1']?></td>
              <td align="center"><?=$row['field_2']?></td>
              <td align="center"><?=$row['field_3']?></td>
              <td align="center"><?=$row['field_4']?></td>
              <td align="center"><?=$row['field_5']?></td>
              <td align="center"><?=$row['field_6']?></td>
              <td align="center"><?=$row['field_7']?></td>
              <?php
				}
				if($cat==2)
				{
			  ?>
              <td align="center"><?=$row['field_1']?></td>
              <td align="center"><?=$row['field_2']?></td>
              <td align="center"><?=$row['field_3']?></td>
              <td align="center"><?=$row['field_4']?></td>
              <td align="center"><?=$row['field_5']?></td>
              <td align="center"><?=$row['field_6']?></td>
              <td align="center"><?=$row['field_7']?></td>
              <td align="center"><?=$row['field_8']?></td>
              <?php
				}
				if($cat==3)
				{
			  ?>
              <td align="center"><?=$row['field_1']?></td>
              <td align="center"><?=$row['field_2']?></td>
              <td align="center"><?=$row['field_3']?></td>
              <td align="center"><?=$row['field_4']?></td>
              <td align="center"><?=$row['field_5']?></td>
              <td align="center"><?=$row['field_6']?></td>
              <td align="center"><?=$row['field_7']?></td>
              <?php
				}
			  ?>
              <td align="center"><table border="0" cellpadding="0" cellspacing="0">
                <tr>
                  
                  
                  <td align="center"><a href="?act=del&id=<?=$row['id']?>&curPage=<?=$curPage?>&<?=$KeyWord?>" onClick="return confirm('确定要删除吗')"><img src="images/icon_trash.gif" width="16" height="16" alt="删除" border="0"></a></td>
                  </tr>
              </table></td>
            </tr>
<?php
$i++;
}
?>            
          </table>
         
          <table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#D2FFD2" style="border:1px solid #BCE8B5; margin-top:10px;">
            <tr>
              <td align="center" width="80">
              <input type="hidden" value="<?=$urlPara?>" name="url">
              <input type="hidden" value="<?=$curPage?>" name="curPage">
              
              <input name="Submit" type="submit" class="button" value="批量删除" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'" onClick="return confirm('确定要删除选中的新闻吗？');">
              </td>
              <td height="30" align="center"><?=$pageStr?></td>
              </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          </form>
          
          
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
           
          </center></td>
  </tr>
</table>
<?php
$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
$urlPara = !empty($_GET['urlPara']) ? trim($_GET['urlPara']) : '';
$curPage = !empty($_GET['curPage']) ? trim($_GET['curPage']) : '';
$url = "excel.php?curPage=".$curPage."&".$urlPara."";
if($act == 'del'){
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	$sql = "DELETE FROM cnly_data WHERE id='$id'";
	$db->query($sql);
	urlMsg('删除成功',$url);
}
//全部删除
if($act=='delAll'){
	$bh = !empty($_GET['bh']) ? $_GET['bh'] : '';
	if(!empty($bh)){
		foreach($bh as $key =>$value){
			echo $sql = "DELETE FROM cnly_data WHERE id='$value'";
			$db->query($sql);
		}
		urlMsg('删除成功',$url);
	}
}





@mysql_close($db->connect());
?>
</div>
</BODY></HTML>