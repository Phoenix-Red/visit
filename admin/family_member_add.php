<?php
	define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
?>



<script type="text/javascript">
function cancel(){
	var DG = frameElement.lhgDG;
    // 这里写你要操作的代码，最后写刷新代码
    DG.curWin.location.reload();
}
</script>


<?php
$act=!empty($_REQUEST['act']) ? $_REQUEST['act']:'';
$id=!empty($_GET['id'])? intval($_GET['id']):'';
$user_id=$id;
if($act=='edit')
{ 
$sql="select * from cnly_family_member   where id='$id'";
$res=$db->query($sql);
$row=$db->getarray($res);
}
?>
<table width="600" border="0" align="center" cellpadding="10" cellspacing="1" bgcolor="#99CCFF" style="font-size:12px" height="300">
<form action="#" method="post">
<input type="hidden" value="<?php if($act=='edit'){echo "upd";}else{echo "add";}?>" name="act">
<input  type="hidden" value="<?=$id?>" name="id">
  <tr>
    <td height="30" colspan="2" bgcolor="#99CCFF"><strong>家庭成员</strong></td>
  </tr>
  <tr>
    <td width="161" height="30" align="right" bgcolor="#FFFFFF"><strong>姓名:</strong></td>
    <td width="639" bgcolor="#FFFFFF"><input name="start_time" type="text" id="start_time" value="<?=$row['start_time']?>"></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF"><strong>关系:</strong></td>
    <td height="30" bgcolor="#FFFFFF"><input name="username" type="text" id="username" value="<?=$row['username']?>"></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF"><strong>工作单位:</strong></td>
    <td height="30" bgcolor="#FFFFFF"><input name="relationship" type="text" id="relationship" value="<?=$row['relationship']?>"></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF"><strong>职务:</strong></td>
    <td height="30" bgcolor="#FFFFFF"><input name="job" type="text" id="job" value="<?=$row['job']?>"></td>
  </tr>
  <tr>
    <td height="30" align="right" bgcolor="#FFFFFF"><strong>电话:</strong></td>
    <td height="30" bgcolor="#FFFFFF"><input name="telephone" type="text" id="telephone" value="<?=$row['telephone']?>"></td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="center" bgcolor="#99CCFF"><input type="submit" name="Submit" value="提交">
    <input type="reset" name="Submit2" value="重置"></td>
  </tr>
  </form>
</table>

<?php

$username		=!empty($_POST['username']) 	? 		trim($_POST['username']):'';
$relationship	=!empty($_POST['relationship'])? 	trim($_POST['relationship']):'';
$job			=!empty($_POST['job']) ? 		trim($_POST['job']):'';
$company		=!empty($_POST['company']) ? 		trim($_POST['company']):'';
$telephone		=!empty($_POST['telephone']) 	? 		trim($_POST['telephone']):'';
if($act=='add')
{
$sql="insert into cnly_family_member(user_id,username,relationship,job,company,telephone) values('$user_id','$username','$relationship','$job','$company','$telephone') ";
	if($db->query($sql))
	{
	echo "<script>alert('ok');cancel();window.close();</script>";
	}
}
if($act=='upd')
{
$sql="update cnly_family_member   set  username='$username',relationship='$relationship',job='$job',company='$company',telephone='$telephone' where id='$id'";
if($db->query($sql))
	{
	echo "<script>alert('yes');cancel();window.close();</script>";
	}
}
?>