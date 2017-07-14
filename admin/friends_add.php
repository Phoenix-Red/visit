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
		 if(document.form1.news_cat.value==""){
			alert("请选择分类");
			return false;
		}
}
</script> 
<link href="css.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #B7E6B0;border-right:1px solid #B7E6B0;">
  <tr>
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> > 添加友情链接</td>
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
                <td align="center"><p style="margin-top:3px"><a href="friends_list.php" style="font-size:12px; font-weight:normal; color:#FFFFFF">友情列表</a></p></td>
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
            <form action="?act=add" method="post"  name="form1" onSubmit="return check();" enctype="multipart/form-data"><tr>
              <td><DIV id=con>
<UL id=tags>
  <LI class=selectTag><A onClick="selectTag('tagContent0',this)" 
  href="javascript:void(0)">基本信息</A> </LI>
 
</UL>
<DIV id=tagContent>
<DIV class="tagContent selectTag" id=tagContent0>
  <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td width="110" align="right" bgcolor="#FFFFFF">名称：</td>
      <td bgcolor="#FFFFFF"><input name="news_title" type="text" class="inputuser" id="news_title" style="width:100%" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'"></td>
      </tr>
    <tr>
      <td width="110" align="right" bgcolor="#FFFFFF">分类：</td>
      <td bgcolor="#FFFFFF">
	  
	   <select name="news_cat" id="select">
              	<option value="">分类</option>
				<?php
                    sub_class(3,"",$class_arr_id);
                    function sub_class($pid,$cut,$class_arr_id)
                    {
                        $sql = "SELECT * FROM cnly_class WHERE pid='$pid' and cat_id in($class_arr_id) ORDER BY cat_order ASC,cat_id asc";
                        $sth = $GLOBALS['db']->query($sql); 
						$row = $sth->fetchAll(); 
                        for($i=0;$i<count($row);$i++)
                        {
                ?>
				<option value="<?=$row[$i]['cat_id']?>"><?=$cut.$row[$i]['cat_name']?></option>
				
				<?php
                            sub_class($row[$i]['cat_id'],'|--'.$cut,$class_arr_id);
                        }
                    }
                ?>     
              </select>	  </td>
      </tr>

    <tr>
      <td align="right" bgcolor="#FFFFFF">附件：</td>
      <td bgcolor="#FFFFFF"><label>
        <input name="news_img" type="file" id="news_img">
      </label></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">友情URL：</td>
      <td bgcolor="#FFFFFF"><input name="friends_url" type="text" class="inputuser" id="friends_url" style="width:100%" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'"></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">排序：</td>
      <td bgcolor="#FFFFFF"><input name="news_order" type="text" class="inputuser" id="news_order" style="width:100%" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'"></td>
      </tr>
  </table>
</DIV>



</DIV></DIV>
<SCRIPT type=text/javascript>
function selectTag(showContent,selfObj){
	// 操作标签00
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
                        <td align="center" width="75"><input name="Submit2" type="submit" class="button" value="确认录入" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'" ></td>
                        <td align="center" width="75" ><input name="Submit2" type="submit" class="button" value="重置" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'"></td>
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
</BODY></HTML>
<?php 

$act=!empty($_GET['act'])? $_GET['act']:'';
if($act=='add')
{
$news_title=!empty($_POST['news_title'])? trim($_POST['news_title']):'';

$news_cat=!empty($_POST['news_cat'])? intval($_POST['news_cat']):'';
$add_time=!empty($_POST['add_time'])? trim($_POST['add_time']):'';
$news_order=!empty($_POST['news_order'])? trim($_POST['news_order']):'255';
$friends_url=!empty($_POST['friends_url'])? trim($_POST['friends_url']):'';
/*上传附件*/
        $news_img="";
		
		if(!empty($_FILES['news_img']['name']))
		{
			$up = new upload;
			$up->fileName = $_FILES["news_img"];//根据自己的表单来定
			$up->imgpreview=1;//是否生成缩略图
			$up->sw=100;//缩略图宽度
			$up->sh=100;//缩略图高度
			$up->up();
			$news_img=$up->bImg; //返回大图片路径
			$news_img = str_replace("../", "", $news_img); 
		
		}
$sql="insert into cnly_friends(friends_name,friends_cat,friends_img,friends_url,friends_order) values('$news_title','$news_cat','$news_img','$friends_url','$news_order')";

	$sth = $db->prepare($sql);
	if($sth->execute())
	{
		urlMsg('添加成功','friends_list.php');
	}
	else
	{
		goBakMsg("添加失败");	
	}
}
?>