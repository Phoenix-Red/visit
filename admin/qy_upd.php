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
                <td align="center"><p style="margin-top:3px"><a href="qy_list.php" style="font-size:12px; font-weight:normal; color:#FFFFFF">信息列表</a></p></td>
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
                    sub_class(485,"",$row['cat_id']);
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
      <td align="right" bgcolor="#FFFFFF"><strong>服务课程：</strong></td>
      <td bgcolor="#FFFFFF"><select name="tuijian" id="tuijian">
          <option value="">请选择信息分类</option>
         <?php
                    sub_class1(511,"",$row['tuijian']);
                    function sub_class1($pid,$cut,$id)
                    {
                        $sql = "SELECT * FROM cnly_class WHERE pid='$pid' ORDER BY class_order ASC,id DESC";
                        $res = mysql_query($sql);
                        while($row = mysql_fetch_array($res))
                        {
                ?>
                <option value='<?=$row['id']?>' <?php if($id==$row['id']) {echo "selected";} ?>><?=$cut.$row['class_name']?></option>
                <?php            
                            sub_class1($row['id'],'|--'.$cut,$id);
                        }
                    }
                ?>     
      </select></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>学历：</strong></td>
      <td bgcolor="#FFFFFF"><select name="xl" id="xl">
          <option value="" selected>请选择分类</option>
          <option value="1" <?php if(@$row['new']=='1'){?> <?php echo"selected "; }?>>博士</option>
          <option value="2" <?php if(@$row['new']=='2'){?> <?php echo"selected "; }?>>硕士</option>
          <option value="3" <?php if(@$row['new']=='3'){?> <?php echo"selected "; }?>>本科</option>
          <option value="4" <?php if(@$row['new']=='4'){?> <?php echo"selected "; }?>>专科</option>
      </select></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>所在区域：</strong></td>
      <td bgcolor="#FFFFFF"><select name="laiyuan" id="laiyuan">
        <option value="" >请选择地区</option>
        <option value="1" <?php if(@$row['news_src']=='1'){?> <?php echo"selected "; }?>>未央区</option>
        <option value="2" <?php if(@$row['news_src']=='2'){?> <?php echo"selected "; }?>>新城区</option>
        <option value="3" <?php if(@$row['news_src']=='3'){?> <?php echo"selected "; }?>>长安区</option>
        <option value="4" <?php if(@$row['news_src']=='4'){?> <?php echo"selected "; }?>>雁塔区</option>
        <option value="5" <?php if(@$row['news_src']=='5'){?> <?php echo"selected "; }?>>碑林区</option>
        <option value="6" <?php if(@$row['news_src']=='6'){?> <?php echo"selected "; }?>>莲湖区</option>
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
      <td align="right" bgcolor="#FFFFFF"><strong>发布时间：</strong></td>
      <td bgcolor="#FFFFFF"><input name="add_time" type="text" style="width:450px;" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor';setday(this);" value="<?=@$row['add_time']?>"></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>状态：</strong></td>
      <td bgcolor="#FFFFFF"><label>
        <input name="radio" type="radio" id="radio" value="0" <?php if(@$row['type']=='0'){?> <?php echo"checked "; }?>>
        进行中&nbsp;&nbsp;&nbsp;
        <input type="radio" name="radio" id="radio2" value="1" <?php if(@$row['type']=='1'){?> <?php echo"checked "; }?>>
        已完成 </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>性别：</strong></td>
      <td bgcolor="#FFFFFF"><label>
        <input name="sex" type="radio" id="radio3" value="0" <?php if(@$row['brand_id']=='0'){?> <?php echo"checked "; }?>>
        男&nbsp;&nbsp;&nbsp;
        <input type="radio" name="sex" id="radio4" value="1" <?php if(@$row['brand_id']=='1'){?> <?php echo"checked "; }?>>
        女 </label></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>显示顺序：</strong></td>
      <td bgcolor="#FFFFFF"><input name="news_order" type="text" style="width:100px;" class="inputuser" onBlur="this.className='inputuser'" value="<?=$row['news_order']?>">　　数值越小越靠前</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>招聘人数：</strong></td>
      <td bgcolor="#FFFFFF"><input name="news_order2" type="text" style="width:100px;" class="inputuser" onBlur="this.className='inputuser'" value="<?=$row['file_url']?>"></td>
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
		$news_desc = !empty($_POST['news_desc']) ? trim($_POST['news_desc']) : '';
		$news_content = !empty($_POST['content']) ? trim($_POST['content']) : '';
		//img_thumb img_src
		$img_thumb = "";
		$small_img = "";
		$laiyuan=!empty($_POST['laiyuan']) ? trim($_POST['laiyuan']) : '';
		$news_order = !empty($_POST['news_order']) ? intval($_POST['news_order']) : '';
		$news_url = !empty($_POST['news_url']) ? trim($_POST['news_url']) : '';
		$add_time = !empty($_POST['add_time']) ? trim($_POST['add_time']) : '';
		$type = !empty($_POST['radio']) ? trim($_POST['radio']) : '';
		$file_url= !empty($_POST['news_order2']) ? trim($_POST['news_order2']) : '';
		$news_src= !empty($_POST['laiyuan']) ? trim($_POST['laiyuan']) : '';
		$tuijian= !empty($_POST['tuijian']) ? trim($_POST['tuijian']) : '';
		$brand_id= !empty($_POST['sex']) ? trim($_POST['sex']) : '';
		$new= !empty($_POST['xl']) ? trim($_POST['xl']) : '';
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
			$sql = "UPDATE cnly_content SET cat_id='$cat_id',laiyuan='$laiyuan',news_title='$news_title',news_desc='$news_desc',news_content='$news_content',add_time='$add_time',img_thumb='$img_thumb',small_img ='$small_img ',news_url='$news_url',news_order='$news_order',type='$type',file_url='$file_url',news_src=$news_src,tuijian=$tuijian,brand_id=$brand_id,new=$new WHERE id='$id'";
		}
		else
		{
			$sql = "UPDATE cnly_content SET cat_id='$cat_id',laiyuan='$laiyuan',news_title='$news_title',news_desc='$news_desc',news_content='$news_content',add_time='$add_time',news_url='$news_url',news_order='$news_order',type='$type',file_url='$file_url',news_src='$news_src',tuijian='$tuijian',brand_id='$brand_id',new='$new' WHERE id='$id'";
		}
		$url = "qy_list.php?curPage=".$curPage;
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