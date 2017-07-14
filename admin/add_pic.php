<?php 
	define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
	$sql = "SELECT * FROM cnly_class WHERE id=".$_GET['id']."";
	$res = $db->query($sql);
	$row = $db->getarray($res);
?>
<?php

if($_POST['act']=="add"){
	$id=$_POST["id"];
	$gjc=$_POST['gjc'];
	$jj=$_POST['jj'];
	$cover_pic='';
	if(!empty($_FILES['upfile']['name']))
		{ 
			$up = new upload;
			$up->fileName = $_FILES["upfile"];//根据自己的表单来定
			$up->imgpreview=1;//是否生成缩略图
			$up->sw=130;//缩略图宽度
			$up->sh=85;//缩略图高度
			$up->up();
//			$img_thumb=$up->bImg; //返回大图片路径
//			$img_thumb = str_replace("../", "", $img_thumb); 
			$cover_pic= $up->bImg;//返回缩略图片路径
			$cover_pic = str_replace("../", "", $cover_pic); 
			$sql="UPDATE  cnly_class SET cover_pic='$cover_pic',gjc='$gjc',jj='$jj' WHERE id='$id'";
			$db->query($sql);
			urlMsg('封面添加成功','class.php');
			
			}else
			{
			$sql="UPDATE  cnly_class SET gjc='$gjc',jj='$jj' WHERE id='$id'";
			$db->query($sql);
			urlMsg('添加成功','class.php');
			}

}


?>
<html>

<title></title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script type="text/javascript" language="javascript" src="js/calendar.js"></script>
</style>

<link href="css.css" rel="stylesheet" type="text/css">

<style type="text/css">

<!--

.button1 {font-family: verdana;border: 0px solid #A4A1BC;font-size: 12px; width:67px; height:26px; background-image:url(/admin/images/button.gif); background-repeat:no-repeat; text-align:center; padding-left:2px;cursor:hand;

}
-->

</style>
</head>
<body>
<table width="407" height="200" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#BCE8B5">

    <td width="405" height="26" align="center"  background="images/list_title_bg.jpg" bgcolor="#FFFFFF" style="font-size:14px; font-weight:bold">添加封面</td>

    <form action="" method="post" enctype="multipart/form-data" name="form" target="main-frame">

  <tr><td bgcolor="#F1FFF2"><table width="400" border="0" align="left" cellpadding="0" cellspacing="0">

    <tr>

      <td valign="middle"><table width="100%" height="60" border="0" cellpadding="5" cellspacing="5">

        <tr>

          <td width="104">所属类别：</td>

          <td width="285"><input type="text" class="inputuser" id="News_addtime" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'"  name="type_id" style="width:100%" value="<?=$_GET['class_name']?>" disabled="disabled"></td>
        </tr>

        <tr>

          <td width="104">封面图片：</td>

          <td width="285"><input name="upfile" type="file" class="inputuser" id="upfile"  style="width:284px"  onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'"></td>
        </tr>
        <tr>
          <td>SEO标题：</td>
          <td><textarea name="gjc" rows="5"  style="width:100%"><?=$row['gjc']?></textarea></td>
        </tr>
		<tr>

          <td width="104">简介：</td>

          <td width="285">
		    <textarea name="jj" rows="7"  style="width:100%" ><?=$row['jj']?></textarea></td>
		</tr>
      </table></td>
      </tr>
</table></td></tr>
<tr bgcolor="#FBEAB5">
  <td height="35" align="center" bgcolor="#EAFFDF"><table width="300" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="center">
	  <input name="Submit" type="submit" class="button" value="添加" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'">
      </td>
      <td align="center"><input name="Submit2" type="reset" class="button1" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="重置"></td>
      <td align="center"><input name="Submit2" type="button" class="button1" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="关闭" onClick="parent.doOk();"></td>
    </tr>
  </table>
    <input name="id" type="hidden" id="id" value="<?=$_GET['id']?>">
    <input name="act" type="hidden" id="act" value="add">	
	</td>
  </tr>
  </form>
</table>
</body>
</html>