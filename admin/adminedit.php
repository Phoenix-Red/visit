<?php
define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
?>
<script type="text/javascript" src="lhgcore.min.js"></script>
<script type="text/javascript" src="lhgdialog.min.js"></script>
<script type="text/javascript">
function opdgupd(xueliid,act){
    var dg = new J.dialog({ id: 'd1',title: '修改学习经历', cover: false, rang: true, resize: true, page: 'xueliadd.php?act='+act+'&id='+xueliid, width: 600,height:400 });
    dg.ShowDialog();
}

function opdg(){
    var dg = new J.dialog({ id: 'd1',title: '学习经历', cover: false, rang: true, resize: true, page: 'xueliadd.php', width: 600,height:400 });
    dg.ShowDialog();
}
 

</script>


<table width="98%" border="0" cellspacing="1" cellpadding="10" bgcolor="#dadada" style="font-size:12px;">

 <tr><form action="#" method="post">
 <input type="hidden" name="act" value="upd">
              <td colspan="2" align="center" bgcolor="#FFFFFF" height="30"><strong>修改密码<?=$_SESSION['uid']?></strong></td>
  
                <tr>
                  <td width="44%" height="30" align="right" bgcolor="#FFFFFF">修改密码</td>
                  <td width="56%" align="left" bgcolor="#FFFFFF"><input name="password" type="password" id="password" /> </td>
                </tr>

                <tr>
                  <td height="30" align="right" bgcolor="#FFFFFF">在输入一次</td>
                  <td align="left" bgcolor="#FFFFFF"><input name="password1" type="password" id="password1" /></td>
                </tr>
                <tr>
                  <td height="30" align="right" bgcolor="#FFFFFF">&nbsp;</td>
                  <td align="left" bgcolor="#FFFFFF"><input name="submit" type="submit" id="submit"   value="修改密码" />
                  <input name="submit2" type="reset" id="submit2"   value="取消" /></td>
                </tr>
</form>				
</table>
<?php $act=!empty($_POST['act']) ? trim($_POST['act']):'';
$password = !empty($_POST['password']) ? md5(md5(trim($_POST['password']))) : '';

if($act=='upd')
{
	$sql="update   cnly_admin   set admin_pwd='$password' where id=".$_SESSION['uid'];

	if($db->query($sql))
	{
	echo "<script>alert('ok');cancel();window.close();</script>";
	}
}
 ?>