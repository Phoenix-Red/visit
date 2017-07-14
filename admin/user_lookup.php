<?php 
	define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	include_once("includes/init.php");
	include_once("sessioncheck.php");
	
	require_once("xajax_core/xajax.inc.php");
	$xajax = new xajax();
	$xajax->registerFunction("yylx");
	
	function yylx(){//预约类型判断
		global $db;
		$objResponse = new xajaxResponse();
		$sql="select * from ";
		$strs="aaaaaaaaaaaaaaaa";
		$objResponse->assign("anniu","innerHTML",$strs);
		return $objResponse;
	}
	$xajax->processRequest();
	
	
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	$id = !empty($_GET['id']) ? intval($_GET['id']) : '';
	
/*$sql="select user_id from cnly_user where user_id=".$_SESSION['uid'];
$count=$db->getcount($sql);
if(!empty($count))
{
$sql = "SELECT * FROM cnly_user WHERE user_id=".$_SESSION['uid'];
		$res = $db->query($sql);
		$row = $db->getarray($res);
}*/

	
		$sql = "SELECT * FROM cnly_user WHERE user_id=".$_SESSION['uid'];
		$res = $db->query($sql);
		$row = $db->getarray($res);
	
?>
<html>
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
<script type="text/javascript" language="javascript" src="js/calendar.js"></script>



</head>
<body topmargin="0" bottommargin="0" style="overflow-x:hidden;overflow-y:auto">
<?php 
	$xajax->printJavascript();
?>
<div id=hiddenDiv style="filter:Alpha(opacity=10);">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #B7E6B0;border-right:1px solid #B7E6B0;">
  <tr>
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> > 员工管理</td>
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
        <td align="center" valign="top" bgcolor="#EAFFDF">
          <table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#D2FFD2" style="border:1px solid #BCE8B5">
            <tr>
              <td width="200" align="center"><strong>员工中心</strong></td>
              <td width="100" align="center">&nbsp;</td>
              <td width="80" align="right">&nbsp;</td>
            </tr>
          </table>
          <br>
          <form action="#" method="post" name="formdel" style="margin:0px;"  enctype="multipart/form-data"> 
          <input type="hidden" name="act" value="upd">     
		  <input type="hidden" name="id" value="<?=$row['id']?>">
          <table width="100%" border="0" align="center" cellpadding="10" cellspacing="1" bgcolor="#B7E6B0">
            <tr>
              <td width="84%" colspan="5" bgcolor="#FFFFFF"><table width="100%" border="0">
                <tr>
                  <td width="9%" height="25" align="right">姓名</td>
                  <td width="23%"><input type="text" name="name" id="name"  value="<?=$row['user_name']?>"></td>
                  <td width="5%" align="right">性 别</td>
                  <td width="27%"><input type="text" name="sex" id="sex" value="<?=$row['sex']?>"></td>
                  <td width="13%" align="right">出生日期</td>
                  <td width="23%"><input type="text" name="riqi" id="riqi" value="<?=$row['riqi']?>"></td>
                </tr>
                <tr>
                  <td height="25" align="right">身高</td>
                  <td><input type="text" name="height" id="height" value="<?=$row['height']?>"></td>
                  <td align="right">体重</td>
                  <td><input name="weight" type="text" id="weight" value="<?=$row['weight']?>"></td>
                  <td align="right">政治面貌</td>
                  <td><input type="text" name="zhengzhi" id="zhengzhi" value="<?=$row['zhengzhi']?>"></td>
                </tr>
                <tr>
                  <td height="25" align="right">婚否</td>
                  <td><input name="Marriage" type="text" id="Marriage" value="<?=$row['Marriage']?>"></td>
                  <td align="right">籍贯</td>
                  <td><input type="text" name="native" id="native" value="<?=$row['native']?>"></td>
                  <td align="right">民族</td>
                  <td><input type="text" name="national" id="national" value="<?=$row['national']?>"></td>
                </tr>
                <tr>
                  <td height="25" align="right">手机</td>
                  <td><input type="text" name="telephone" id="telephone" value="<?=$row['telephone']?>"></td>
                  <td align="right">邮箱</td>
                  <td><input type="text" name="email" id="email" value="<?=$row['email']?>"></td>
                  <td align="right">QQ</td>
                  <td><input type="text" name="QQ" id="QQ" value="<?=$row['qq']?>"></td>
                </tr>
                <tr>
                  <td height="25" align="right">身份证号码</td>
                  <td><input type="text" name="userID" id="userID" value="<?=$row['userid']?>"></td>
                  <td align="right">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td align="right">健康状况</td>
                  <td><input type="text" name="health" id="health" value="<?=$row['health']?>"></td>
                </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td rowspan="2" align="right">现住地址</td>
    <td rowspan="2"><textarea name="address" id="address" cols="45" rows="2"><?=$row['address']?></textarea></td>
    <td align="right">本地紧急联络人</td>
    <td height="30"><input type="text" name="lianxiren" id="lianxiren" value="<?=$row['lianxiren']?>"></td>
  </tr>
  <tr>
    <td align="right">电话</td>
    <td height="30"><input type="text" name="dianhua" id="dianhua" value="<?=$row['dianhua']?>"></td>
  </tr>
</table></td>
              <td width="16%" align="center" bgcolor="#FFFFFF"><img src='../<?=$row['img_thumb']?>'  width="130" height="170"><br>
                <br/> 
                <input type="file" name="img_thumb" id="img_thumb"></td>
            </tr>
            <tr>
              <td height="30" align="right" bgcolor="#FFFFFF">家庭详细住址</td>
              <td bgcolor="#FFFFFF"><input type="text" name="home" id="home" value="<?=$row['home']?>"></td>
              <td align="right" bgcolor="#FFFFFF">邮编</td>
              <td bgcolor="#FFFFFF"><input type="text" name="postcode" id="postcode" value="<?=$row['postcode']?>"></td>
              <td align="right" bgcolor="#FFFFFF">家庭电话</td>
              <td bgcolor="#FFFFFF"><input type="text" name="homephone" id="homephone" value="<?=$row['homephone']?>"></td>
            </tr>
            <tr>
              <td height="30" align="right" bgcolor="#FFFFFF">毕业院校</td>
              <td bgcolor="#FFFFFF"><input type="text" name="school" id="school" value="<?=$row['school']?>"></td>
              <td align="right" bgcolor="#FFFFFF">专业</td>
              <td bgcolor="#FFFFFF"><input type="text" name="professional" id="professional" value="<?=$row['professional']?>"></td>
              <td align="right" bgcolor="#FFFFFF">文化程度</td>
              <td bgcolor="#FFFFFF"><input type="text" name="degree" id="degree" value="<?=$row['degree']?>"></td>
            </tr>
            <tr>
              <td height="30" align="right" bgcolor="#FFFFFF">个人爱好及特长</td>
              <td colspan="2" bgcolor="#FFFFFF"><input type="text" name="hobby" id="hobby" value="<?=$row['hobby']?>"></td>
              <td align="right" bgcolor="#FFFFFF">期望月薪                </td>
              <td colspan="2" bgcolor="#FFFFFF"><input type="text" name="salary" id="salary" value="<?=$row['salary']?>"></td>
              </tr>
           
            <tr>
              <td colspan="6" align="center" bgcolor="#FFFFFF" height="160">
			  <iframe id="otherFrameID"  src="xueli_list.php?id=<?=$row['id']?>" style="height:200px; width:100%;" scrolling="auto" frameborder="0" allowtransparency="0"></iframe>			  </td>
            </tr>
			<tr>
              <td colspan="6" align="center" bgcolor="#FFFFFF" height="160">
			  <iframe id="otherFrameID"  src="adminedit.php?id=<?=$row['id']?>" style="height:200px; width:100%;" scrolling="auto" frameborder="0" allowtransparency="0"></iframe>			  </td>
            </tr>
            <tr>
              <td colspan="6" align="center" bgcolor="#FFFFFF">
			  
			  <iframe id="otherFrameID"  src="Work_experience_list.php?id=<?=$row['id']?>" style="height:200px; width:100%;" scrolling="auto" frameborder="0" allowtransparency="0"></iframe>			  </td>
            </tr>
            
            <tr>
              <td colspan="6" align="center" bgcolor="#FFFFFF">
			  <iframe id="otherFrameID"  src="family_member_list.php?id=<?=$row['id']?>" style="height:200px; width:100%;" scrolling="auto" frameborder="0" allowtransparency="0"></iframe>
			  
			  </td>
            </tr>
            
            <tr>
              <td height="30" colspan="6" align="center" bgcolor="#FFFFFF"> 声明：本人在此表填写内容以及提供所有证件一切属实，如有不实，愿承担一切责任并承担公司的无薪解骋。</td>
            </tr>
            <tr>
              <td height="30" colspan="6" align="center" bgcolor="#FFFFFF">申请人： 
                <input type="text" name="username" id="username">
                       日期：
                <input type="text" name="add_time" id="add_time" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor';setday(this);" value="<?=date("Y-m-d H:i:s",time()+8*3600)?>">
                <input type="submit" name="button" id="button" value="提交"></td>
            </tr>
          </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="10"></td>
    </tr>
</table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="10"></td>
            </tr>
        </table>
          <table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#D2FFD2" style="border:1px solid #BCE8B5">
            <tr>
              <td align="center" width="80">
              <input type="hidden" value="<?=$urlPara?>" name="url">
              <input type="hidden" value="<?=$curPage?>" name="curPage"></td>
              <td width="894" height="30" align="center"><?=$pageStr?></td>
              </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          </form>
          </td>
        <td width="10"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" height="25">
          <center>
           <a href="http://www.cnly.net" target="_blank">技术支持：西安大德网络科技有限公司 电话：029-</a><a href="http://www.xadade.com" target="_blank">88662010</a>
          </center></td>
  </tr>
</table>
<?php 
$act=!empty($_POST['act'])? trim($_POST['act']):'';
if($act=='upd')
{
$name=!empty($_POST['name'])? trim($_POST['name']):'';
$sex=!empty($_POST['sex'])? trim($_POST['sex']):'';
$riqi=!empty($_POST['riqi'])? trim($_POST['riqi']):'';
$height=!empty($_POST['height'])? trim($_POST['height']):'';
$weight=!empty($_POST['weight'])? trim($_POST['weight']):'';
$zhengzhi=!empty($_POST['zhengzhi'])? trim($_POST['zhengzhi']):'';
$Marriage=!empty($_POST['Marriage'])? trim($_POST['Marriage']):'';
$native=!empty($_POST['native'])? trim($_POST['native']):'';
$national=!empty($_POST['national'])? trim($_POST['national']):'';
$telephone=!empty($_POST['telephone'])? trim($_POST['telephone']):'';
$email=!empty($_POST['email'])? trim($_POST['email']):'';
$QQ=!empty($_POST['QQ'])? trim($_POST['QQ']):'';
$userid=!empty($_POST['userid'])? trim($_POST['userid']):'';
$health=!empty($_POST['health'])? trim($_POST['health']):'';
$address=!empty($_POST['address'])? trim($_POST['address']):'';
$lianxiren=!empty($_POST['lianxiren'])? trim($_POST['lianxiren']):'';
$dianhua=!empty($_POST['dianhua'])? trim($_POST['dianhua']):'';
$home=!empty($_POST['home'])? trim($_POST['home']):'';
$postcode=!empty($_POST['postcode'])? trim($_POST['postcode']):'';
$homephone=!empty($_POST['homephone'])? trim($_POST['homephone']):'';
$school=!empty($_POST['school'])? trim($_POST['school']):'';
$professional=!empty($_POST['professional'])? trim($_POST['professional']):'';
$degree=!empty($_POST['degree'])? trim($_POST['degree']):'';
$hobby=!empty($_POST['hobby'])? trim($_POST['hobby']):'';
$salary=!empty($_POST['salary'])? trim($_POST['salary']):'';
$id=!empty($_POST['id'])? intval($_POST['id']):'';
$add_time = !empty($_POST['add_time']) ? trim($_POST['add_time']) : '';
		$img_thumb    = "";
		$small_img    = "";
/*上传附件*/
	
		if(!empty($_FILES['img_thumb']['name']))
		{
		
			$up = new upload;
			$up->fileName = $_FILES["img_thumb"];//根据自己的表单来定
			$up->imgpreview=1;//是否生成缩略图
			$up->sw=100;//缩略图宽度
			$up->sh=100;//缩略图高度
			$up->up();
			$img_thumb=$up->bImg; //返回大图片路径
			$img_thumb = str_replace("../", "", $img_thumb); 
			$small_img= $up->sImg;//返回缩略图片路径
			$small_img = str_replace("../", "", $small_img); 	
		}
		$sqlwhere="";
		if(!empty($img_thumb))
		{
		$sqlwhere.=" img_thumb='$img_thumb',";
		};
$sql="update   cnly_user 
set 
  $sqlwhere
 user_name='$name',
 sex='$sex',
 riqi='$riqi',
 height='$height',
 weight='$weight',
 zhengzhi='$zhengzhi',
 Marriage='$Marriage',
 native='$native',
 national='$national',
 telephone='$telephone',
 qq='$qq',
 email='$email',
 userid='$userid',
 health='$health',
 address='$address',
 lianxiren='$lianxiren',
 dianhua='$dianhua',
 home='$home',
 postcode='$postcode',
 homephone='$homephone',
 school='$school',
 professional='$professional',
 degree='$degree',
 hobby='$hobby',
 salary='$salary',
 add_time='$add_time' where id='$id'";
if($db->query($sql))
{

	if($_SESSION['admin_type']!=1)
	{
	echo "<script>alert('修改成功！');location.href='user_lookup.php'</script>";	

	}
	else
	{
	echo "<script>alert('修改成功！');location.href='user_list.php'</script>";	
	}
}
}
?>
</div>
</body>
</html>