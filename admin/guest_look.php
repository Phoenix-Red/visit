<?php
	define('IN_XANET', true);
	include_once("includes/init.php");
	if(!in_array('6',$menu_arr))
	{
		header("location:error.php");
		exit();
	}
	$id=!empty($_GET['id'])? $_GET['id']:'';
	$sql="select * from cnly_guest  where guest_id='$id'";
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
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> >查看留言</td>
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
                <td align="center"><p style="margin-top:3px"><a href="news_list.php" style="font-size:12px; font-weight:normal; color:#FFFFFF">留言列表</a></p></td>
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
            <form action="?act=add&id=<?=$row['guest_id']?>" method="post"  enctype="multipart/form-data"><tr>
              <td><DIV id=con>
<UL id=tags>
  <LI class=selectTag><A onClick="selectTag('tagContent0',this)" 
  href="javascript:void(0)">基本信息</A> </LI>

</UL>
<DIV id=tagContent>
<DIV class="tagContent selectTag" id=tagContent0>
  <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
    <tr>
      <td width="110" align="right" bgcolor="#FFFFFF">留言标题：</td>
      <td bgcolor="#FFFFFF"><input name="guest_title" type="text" class="inputuser" id="guest_title" style="width:100%" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'" value="<?=$row['guest_title']?>"></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">留言人：</td>
      <td bgcolor="#FFFFFF"><input name="guest_name" type="text" class="inputuser" id="guest_name" style="width:100%" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'" value="<?=$row['guest_name']?>"></td>
    </tr>
    <tr>
      <td width="110" align="right" bgcolor="#FFFFFF">联系电话：</td>
      <td bgcolor="#FFFFFF"><input name="phone" type="text" class="inputuser" id="phone" style="width:100%" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'" value="<?=$row['phone']?>"></td>
      </tr>

    <tr>
      <td align="right" bgcolor="#FFFFFF">email：</td>
      <td bgcolor="#FFFFFF">
        <input name="email" type="text" class="inputuser" id="email" style="width:100%" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'" value="<?=$row['email']?>">     </td>
      </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">qq：</td>
      <td bgcolor="#FFFFFF"><input name="qq" type="text" class="inputuser" id="qq" style="width:100%" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'" value="<?=$row['qq']?>"></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">留言时间：</td>
      <td bgcolor="#FFFFFF"><input name="add_time" type="text" class="inputuser" id="add_time" style="width:100%" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'" value="<?=date("Y-m-d H:i:s",time()+8*3600)?>"></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">地址：</td>
      <td bgcolor="#FFFFFF"><input name="address" type="text" class="inputuser" id="guest_address" style="width:100%" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'" value="<?=$row['address']?>"></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">是否显示：</td>
      <td bgcolor="#FFFFFF"><label>
        <input type="radio" name="display" value="1" <?php if($row['display']==1) echo "checked";?>>
      </label>
      显示 
      <input type="radio" name="display" value="0"  <?php if($row['display']==0) echo "checked";?>>
      不显示</td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF">留言内容：</td>
      <td bgcolor="#FFFFFF"><textarea name="guest_content" class="inputuser" id="guest_content" style="width:100%;height:100px" onFocus="this.className='inputuser-bor'" onBlur="this.className='inputuser'"  ><?=$row['guest_content']?></textarea></td>
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
$id=!empty($_GET['id'])? $_GET['id']:'';
$guest_title=!empty($_POST['guest_title'])? trim($_POST['guest_title']):'';
$guest_name=!empty($_POST['guest_name'])? trim($_POST['guest_name']):'';
$phone=!empty($_POST['phone'])? trim($_POST['phone']):'';
$email=!empty($_POST['email'])? trim($_POST['email']):'';
$qq=!empty($_POST['qq'])? trim($_POST['qq']):'';
$add_time=!empty($_POST['add_time'])? trim($_POST['add_time']):'';
$display=!empty($_POST['display'])? intval($_POST['display']):'';
$address=!empty($_POST['address'])? trim($_POST['address']):'';
$guest_content=!empty($_POST['guest_content'])? trim($_POST['guest_content']):'';
	
			$sql="update cnly_guest  set  guest_title='$guest_title',guest_name='$guest_name',add_time='$add_time',guest_content='$guest_content',phone='$phone',email='$email',address='$address',telephone='$phone',display='$display',qq='$qq'  where guest_id='$id'";
       
		
		
	$sth = $db->prepare($sql);
	if($sth->execute())
	{
	urlMsg('添加成功','guest_list.php');
	}
	else
	{
	goBakMsg("添加失败");	
	}
}
?>