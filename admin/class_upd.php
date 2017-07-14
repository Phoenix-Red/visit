<?php 
	define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	//
	include_once("includes/init.php");
	include_once("sessioncheck.php");
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	$id = !empty($_GET['id']) ? trim($_GET['id']) : '';
	if($act=='upd')
	{
		$sql = "SELECT * FROM cnly_class WHERE id='$id'";
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
<table width="656" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FF6600" height="180">
  <form name="form1" method="post" action="?act=update&id=<?=$id?>" onSubmit="return check();">
  <tr>
    <td height="26" align="left" background="images/alert.jpg" style="font-size:14px; font-weight:bold">
    &nbsp;修改分类</td>
  </tr>
  <tr bgcolor="#FFFFEE">
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="10"></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
        <td width="10"></td>
        <td align="center">
          <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#FF9900">
            <tr>
              <td width="80" height="30" align="right" bgcolor="#FFFFFF">上级分类：</td>
              <td bgcolor="#FFFFFF">
              
              <select name="pid" id="select">
              	<option value="0">顶级分类</option>
				<?php
                    sub_class(0,"",$row['pid']);
                    function sub_class($pid,$cut,$id)
                    {
                        $sql = "SELECT * FROM cnly_class WHERE pid='$pid' ORDER BY class_order ASC,id DESC";
                        $res = mysql_query($sql);
                        while($row = mysql_fetch_array($res))
                        {
                ?>
                <option value='<?=$row['id']?>|<?=$row['type']?>' <?php if($id==$row['id']) {echo "selected";} ?>><?=$cut.$row['class_name']?></option>
                <?php            
                            sub_class($row['id'],'|--'.$cut,$id);
                        }
                    }
                ?>     
              </select>              </td>
            </tr>
            <tr>
              <td height="28" align="right" bgcolor="#FFFFFF">分类名称：</td>
              <td bgcolor="#FFFFFF">
			  <input type="text" name="class_name" class="inputuser" style="width:100%" value="<?=@$row['class_name']?>">			  </td>
            </tr>
            
             <tr>
              <td height="28" align="right" bgcolor="#FFFFFF">英文名称：</td>
              <td bgcolor="#FFFFFF">
			  <input type="text" name="eng_name" class="inputuser" style="width:100%" value="<?=@$row['eng_name']?>">			  </td>
            </tr>
            
             <tr>
              <td width="80" height="30" align="right" bgcolor="#FFFFFF">表现形式：</td>
              <td bgcolor="#FFFFFF"> 
              <select name="leixing" id="leixing">
              	<option value="about"  <?php if(@$row['leixing']=='about'){?> <?php echo "selected "; }?>>单篇文章</option>
				<option value="news" <?php if(@$row['leixing']=='news'){?> <?php echo "selected "; }?>>新闻列表</option>
                <option value="product" <?php if(@$row['leixing']=='product'){?> <?php echo "selected "; }?>>产品列表</option>
               
               
              </select>
              </td>
            </tr>
            
            
            <tr>
              <td width="80" height="28" align="right" bgcolor="#FFFFFF">显示顺序：</td>
              <td bgcolor="#FFFFFF">
			  <input type="text" name="class_order" class="inputuser" style="width:100%" value="<?=@$row['class_order']?>">			  </td>
            </tr>
            <tr>
              <td width="80" height="28" align="right" bgcolor="#FFFFFF">是否显示：</td>
              <td bgcolor="#FFFFFF">
              
			 显示<input name="display" type="radio" value="1" <?php if(@$row['display']=='1'){?> <?php echo"checked "; }?>> 
			 否<input name="display" type="radio" value="0" <?php if(@$row['display']=='0'){?>  <?php echo"checked";}?>>			  </td>
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
    <td height="30" bgcolor="#FFFFEE"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr bgcolor="#EAFFDF">
        <td height="30" colspan="3" align="center" bgcolor="#FBEAB5"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center"><input name="Submit" type="submit" class="button" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="修改" onClick="return confirm('确认要修改吗？');">&nbsp;&nbsp;&nbsp;
                <input name="Submit2" type="button" class="button" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="关闭" onClick="parent.doOk();"></td>
              </tr>
        </table></td>
      </tr>
    </table></td>
  </tr></form>
</table>
<?php

	if($act == 'update')
	{
		
		if($id<=4)
		{
			goBakMsg('对不起，系统分类无法编辑');
			exit();
		}
		$class_name = !empty($_POST['class_name']) ? make_semiangle(trim($_POST['class_name'])) : '';
		 $eng_name = !empty($_POST['eng_name']) ? make_semiangle(trim($_POST['eng_name'])) : '';
		
		$pid = !empty($_POST['pid']) ? trim($_POST['pid']) : '';
		 $arr = split("[|]",$pid);
		
	     $pid = $arr[0];
		 $type = $arr[1];
		
		
		$class_order = !empty($_POST['class_order']) ? intval($_POST['class_order']) : '';
		$class_dis = !empty($_POST['display']) ? intval($_POST['display']) : '';
		 $leixing = !empty($_POST['leixing']) ? trim($_POST['leixing']) : '';
		
		if($pid==0)
		{
		$sql = "UPDATE cnly_class SET class_name='$class_name',class_order='$class_order',pid='$pid',display='$class_dis',leixing='$leixing',eng_name='$eng_name' WHERE id='$id'";
		}else
		{
		$sql = "UPDATE cnly_class SET class_name='$class_name',class_order='$class_order',pid='$pid',display='$class_dis',leixing='$leixing',type='$type' ,eng_name='$eng_name' WHERE id='$id'";
		}
		if($db->query($sql))
		{
			goBakLoad('修改成功');
		}
		else
		{
			goBakMsg("修改失败");	
		}
		mysql_close($db->connect());
	}
?>
</div>
</body>
</html>
