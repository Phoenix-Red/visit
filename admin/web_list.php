<?php
	define('IN_XANET', true);
	include_once("includes/init.php");
	if(!in_array('10',$menu_arr))
	{
		header("location:error.php");
		exit();
	}
	$sql="select * from cnly_web  where web_id='1'";
	$sth = $db->query($sql); 
	$row = $sth->fetch(); 
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
<link href="css.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #B7E6B0;border-right:1px solid #B7E6B0;">
  <tr>
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> >站点设置</td>
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
            <td align="right">&nbsp;</td>
          </tr>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <form action="?act=add" method="post"  enctype="multipart/form-data"><tr>
              <td><DIV id=con>

<DIV id=tagContent>
<DIV class="tagContent selectTag" id=tagContent0>
  <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td width="150" align="right" bgcolor="#FFFFFF">网站名称title：</td>
      <td bgcolor="#FFFFFF"><input name="web_name" type="text" class="inputuser" id="web_name" style="width:100%" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'" value="<?=$row['web_name']?>"></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">关键字keywords：</td>
      <td bgcolor="#FFFFFF"><input name="web_key" type="text" class="inputuser" id="web_key" style="width:100%" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'" value="<?=$row['web_key']?>"></td>
    </tr>

    <tr>
      <td align="right" bgcolor="#FFFFFF">网站描述description：</td>
      <td bgcolor="#FFFFFF"><label></label>
        <input name="web_descriiption" type="text" class="inputuser" id="web_descriiption" style="width:100%" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'"   value="<?=$row['web_dscript']?>"></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">网站负责人Author：</td>
      <td bgcolor="#FFFFFF"><input name="web_contact" type="text" class="inputuser" id="web_contact" style="width:100%" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'"   value="<?=$row['web_contact']?>"></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">联系电话：</td>
      <td bgcolor="#FFFFFF"><input name="web_phone" type="text" class="inputuser" id="web_phone" style="width:100%" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'" value="<?=$row['web_phone']?>"></td>
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
                        <td align="center" width="75"><input name="Submit2" type="submit" class="button" value="保存" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'" ></td>
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
$web_name=!empty($_POST['web_name'])? trim($_POST['web_name']):'';
$web_key=!empty($_POST['web_key'])? trim($_POST['web_key']):'';
$web_descriiption=!empty($_POST['web_descriiption'])? trim($_POST['web_descriiption']):'';
$web_contact=!empty($_POST['web_contact'])? trim($_POST['web_contact']):'';
$web_phone=!empty($_POST['web_phone'])? trim($_POST['web_phone']):'';
$sql = "update cnly_web set web_name='$web_name',web_key='$web_key',web_dscript='$web_descriiption',web_contact='$web_contact',web_phone='$web_phone' where web_id='1'";

	$sth = $db->prepare($sql);
	if($sth->execute())
	{
		urlMsg("修改成功","web_list.php");
	}
}
?>