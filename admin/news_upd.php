<?php 
	define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	$curPage=!empty($_GET['curPage']) ? intval($_GET['curPage']) : 1;//通过GET传来的当前页数
	if($act == 'upd')
	{
		$sql = "SELECT * FROM cnly_content WHERE id='$id'";
		$res = $db->query($sql);
		$row = $db->getarray($res);
	}
?>
<HTML><HEAD><TITLE>资讯修改</TITLE>
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
<script type="text/javascript"> 
function check(){   
        if(document.form1.news_title.value==""){
			alert("请输入标题");
			return false;
		}
		 if(document.form1.cat_id.value==""){
			alert("请选择分类");
			return false;
		}
		 if(document.form1.add_time.value==""){
			alert("请选择发布时间");
			return false;
		}
}
</script> 
<script type="text/javascript" language="javascript" src="js/calendar.js"></script>
<link href="css.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY>
<div id=hiddenDiv style="filter:Alpha(opacity=10);">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #B7E6B0;border-right:1px solid #B7E6B0;">
  <tr>
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> > 信息修改</td>
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
                <td align="center"><img src="images/icon_list.gif" width="16" height="16"></td>
                <td align="center"><p style="margin-top:3px"><a href="news_list.php" style="font-size:12px; font-weight:normal; color:#FFFFFF">信息列表</a></p></td>
                </tr>
            </table></td>
          </tr>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <form action="?act=update&id=<?=$id?>&curPage=<?=$curPage?>" method="post" enctype="multipart/form-data" name="form1" onSubmit="return check();"><tr>
              <td><DIV id=con>
<UL id=tags>
  <LI class=selectTag><A onClick="selectTag('tagContent0',this)" 
  href="javascript:void(0)">基本信息</A> </LI>
  <LI><A onClick="selectTag('tagContent1',this)" 
  href="javascript:void(0)">详细信息</A> </LI>
  </UL>
<DIV id=tagContent>
<DIV class="tagContent selectTag" id=tagContent0>
  <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td width="120" align="right" bgcolor="#FFFFFF"><strong>信息标题：</strong></td>
      <td bgcolor="#FFFFFF"><input name="news_title" type="text" style="width:450px;" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor'" value="<?=@$row['news_title']?>"></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>信息分类：</strong></td>
      <td bgcolor="#FFFFFF"><select name="cat_id" id="select">
        <option value="">请选择信息分类</option>
       			<?php
                    sub_class(483,"",$row['cat_id']);
                    function sub_class($pid,$cut,$id)
                    {
                        $sql = "SELECT * FROM cnly_class WHERE pid='$pid' ORDER BY class_order ASC,id DESC";
                        $res = mysql_query($sql);
                        while($row = mysql_fetch_array($res))
                        {
                ?>
                <option value='<?=$row['id']?>' <?php if($id==$row['id']) {echo "selected";} ?>><?=$cut.$row['class_name']?></option>
                <?php            
                            sub_class($row['id'],'|--'.$cut,$id);
                        }
                    }
                ?>     
      </select></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>上传附件：</strong></td>
      <td bgcolor="#FFFFFF">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="260"><input type="file" name="img_thumb" id="img_thumb"></td>
    <td><img src="../<?=$row['small_img']?>" height="30"></td>
  </tr>
</table>      </td>
      </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>SEO标题：</strong></td>
      <td bgcolor="#FFFFFF"><input name="fbr" type="text" style="width:450px;" class="inputuser" onBlur="this.className='inputuser'" id="fbr" value="<?=@$row['fbr']?>" >
      </td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>来源：</strong></td>
      <td bgcolor="#FFFFFF"><input name="laiyuan" type="text" style="width:450px;" class="inputuser" onBlur="this.className='inputuser'" id="laiyuan" value="<?=@$row['laiyuan']?>" >
      </td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>发布时间：</strong></td>
      <td bgcolor="#FFFFFF"><input name="add_time" type="text" style="width:450px;" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor';setday(this);" value="<?=@$row['add_time']?>"></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>显示顺序：</strong></td>
      <td bgcolor="#FFFFFF"><input name="news_order" type="text" style="width:100px;" class="inputuser" onBlur="this.className='inputuser'" value="<?=$row['news_order']?>">　　数值越小越靠前</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>资讯简介：</strong></td>
      <td bgcolor="#FFFFFF"><textarea name="news_desc" class="inputuser" style="width:450px;height:100px" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'"><?=@$row['news_desc']?></textarea></td>
      </tr>
  </table>
</DIV>
<DIV class=tagContent id=tagContent1>
<textarea name="content" id="content" style="width:100%; height:400px;visibility:hidden;"><?=@$row['news_content']?></textarea>
</DIV>
</DIV>
</DIV>
<SCRIPT type=text/javascript>
function selectTag(showContent,selfObj)
{
	// 操作标签
	var tag = document.getElementById("tags").getElementsByTagName("li");
	var taglength = tag.length;
	for(i=0; i<taglength; i++){
		tag[i].className = "";
	}
	selfObj.parentNode.className = "selectTag";
	// 操作内容
	for(i=0; j=document.getElementById("tagContent"+i); i++){
		j.style.display = "none";
	}
	document.getElementById(showContent).style.display = "block";
}
</SCRIPT></td>
            </tr><tr><td height="35"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="10"></td>
  </tr>
</table>
                <table width="100%" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #BCE8B5">
                  <tr>
                    <td bgcolor="D2FFD2"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" width="75"><input name="Submit2" type="submit" class="button" value="修改" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'" ></td>
                        <td align="center" width="75" ><input name="Submit2" type="reset" class="button" value="重置" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'"></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
</td>
            </tr></form>
          </table></td>
        <td width="10"></td>
      </tr>
    </table></td>
  </tr>
  
</table>
<?php
	if($act == 'update')
	{
		$news_title = !empty($_POST['news_title']) ? trim($_POST['news_title']) : '';
		$cat_id = !empty($_POST['cat_id']) ? intval($_POST['cat_id']) : '';
		$news_desc = !empty($_POST['news_desc']) ? $_POST['news_desc'] : '';
		$news_content = !empty($_POST['content']) ? trim($_POST['content']) : '';
		$news_order = !empty($_POST['news_order']) ? intval($_POST['news_order']) : '';
		
		$img_thumb = "";
		$news_url = !empty($_POST['news_url']) ? trim($_POST['news_url']) : '';
		$add_time = !empty($_POST['add_time']) ? trim($_POST['add_time']) : '';
		$fbr = !empty($_POST['fbr']) ? trim($_POST['fbr']) : '';
		$laiyuan = !empty($_POST['laiyuan']) ? trim($_POST['laiyuan']) : '';
		/*上传附件*/
		if(!empty($_FILES['img_thumb']['name']))
		{
			$up = new upload;
			$up->fileName = $_FILES["img_thumb"];//根据自己的表单来定
			$up->imgpreview=1;//是否生成缩略图
			$up->sw=130;//缩略图宽度
			$up->sh=85;//缩略图高度
			$up->up();
			$img_thumb=$up->bImg; //返回大图片路径
			$img_thumb = str_replace("../", "", $img_thumb); 
			$small_img= $up->sImg;//返回缩略图片路径
			$small_img = str_replace("../", "", $small_img); 	
		}
		if(!empty($img_thumb))
		{	
			$sql = "UPDATE cnly_content SET cat_id='$cat_id',news_title='$news_title',news_desc='$news_desc',news_content='$news_content',add_time='$add_time',img_thumb='$img_thumb',small_img ='$small_img ',news_url='$news_url',news_order='$news_order',laiyuan='$laiyuan',fbr='$fbr' WHERE id='$id'";
		}
		else
		{
			$sql = "UPDATE cnly_content SET cat_id='$cat_id',news_title='$news_title',news_desc='$news_desc',news_content='$news_content',add_time='$add_time',news_url='$news_url',news_order='$news_order',laiyuan='$laiyuan',fbr='$fbr' WHERE id='$id'";
		}
		$url = "news_list.php?curPage=".$curPage;
		if($db->query($sql))
		{
			
			urlMsg('修改成功',$url);
		}
		else
		{
			goBakMsg("修改失败");	
		}
		
	}
	mysql_close($db->connect());
?>
</div>
</BODY></HTML>