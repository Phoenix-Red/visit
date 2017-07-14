<?php
define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
	$id=!empty($_GET['id']) ? intval($_GET['id']):'';
?>
<script type="text/javascript" src="lhgcore.min.js"></script>
<script type="text/javascript" src="lhgdialog.min.js"></script>
<script type="text/javascript">
function opdgupd(xueliid,act){
    var dg = new J.dialog({ id: 'd1',title: '修改家庭成员', cover: false, rang: true, resize: true, page: 'family_member_add.php?act='+act+'&id='+xueliid, width: 600,height:400 });
    dg.ShowDialog();
}

function opdg(xueliid){
    var dg = new J.dialog({ id: 'd1',title: '家庭成员', cover: false, rang: true, resize: true, page: 'family_member_add.php?id='+xueliid, width: 600,height:400 });
    dg.ShowDialog();
}
 

</script>


<table width="98%" border="0" cellspacing="1" cellpadding="0" bgcolor="#dadada" style="font-size:12px;">
 <tr>
              <td colspan="7" align="center" bgcolor="#FFFFFF" height="30">家庭成员信息   
    <input type="button"  onClick="opdg(<?=$id?>)" style="cursor:pointer;" value="添加家庭成员"></td>
  </tr>
                <tr>
                  <td height="30" align="center" bgcolor="#FFFFFF">姓名</td>
                  <td align="center" bgcolor="#FFFFFF">关系</td>
                  <td align="center" bgcolor="#FFFFFF">工作单位</td>
				   <td align="center" bgcolor="#FFFFFF">职务</td>
                  <td align="center" bgcolor="#FFFFFF">电话</td>
                  <td align="center" bgcolor="#FFFFFF">操作</td>
                </tr>
               <?php 
			   $user_id=$id;
			   $sql1="select * from cnly_family_member   where user_id='".$user_id."'";
			   $res1=$db->query($sql1);
			   while($row1=$db->getarray($res1))
			   {
			   ?>
                <tr>
                  <td height="30" align="center" bgcolor="#FFFFFF"><?=$row1['username']?></td>
                  <td align="center" bgcolor="#FFFFFF"><?=$row1['relationship']?></td>
				   <td align="center" bgcolor="#FFFFFF"><?=$row1['company']?></td>
                  <td align="center" bgcolor="#FFFFFF"><?=$row1['job']?></td>
                  <td align="center" bgcolor="#FFFFFF"><?=$row1['telephone']?></td>
                  <td align="center" bgcolor="#FFFFFF"><span onclick="opdgupd('<?=$row1['id']?>','edit')" style=" cursor:pointer;">修改</span>||<a href="?act=del&id=<?=$row1['id']?>">删除</a></td>
                </tr>
				<?php
				 }
				 ?>
</table>
<?php $act=!empty($_GET['act']) ? trim($_GET['act']):'';
$id=!empty($_GET['id']) ? trim($_GET['id']):'';
if($act=='del')
{
	$sql="delete from  cnly_family_member  where id='$id'";

	if($db->query($sql))
	{
	echo "<script>alert('ok');cancel();window.close();</script>";
	}
}
 ?>