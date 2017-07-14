<?php 
	define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站树结构</title><script>
  function   window.onload()   
  {   
        var   olink   =   document.links;   
        for(var   i=0;i<olink.length;i++)   
        {   
                olink[i].onmouseover=function(){window.status='';return   true;}   
                //解决.按住鼠标不松开还是会显示链接地址   
                olink[i].onfocus=function(){window.status='';return   true;}   
        }   
  }   
</script>
<style>  
a  {evt:expression(window.status='网站后台管理')}  
</style>  

<SCRIPT language=JavaScript src="js/correctpng.js" type=text/javascript></SCRIPT>
<style type="text/css">
<!--
body {
	background-color: #D1FFBB; 
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	SCROLLBAR-FACE-COLOR: #ffffff; FONT-SIZE: 12px; SCROLLBAR-HIGHLIGHT-COLOR: #0B9400; SCROLLBAR-SHADOW-COLOR: #0B9400; SCROLLBAR-3DLIGHT-COLOR: #0B9400; SCROLLBAR-ARROW-COLOR: #0B9400; SCROLLBAR-TRACK-COLOR: #0B9400; FONT-FAMILY: Verdana; SCROLLBAR-DARKSHADOW-COLOR: #0B9400;margin-left: 0px;margin-top: 0px;margin-right: 0px;margin-bottom: 0px;
}
body,td,th {
	font-size: 12px;
}
a {
	font-size: 14px;
	font-weight: bold;
}
a:link {
	text-decoration: none;
	color: #006600;
}
a:visited {
	text-decoration: none;
	color: #006600;
}
a:hover {
	text-decoration: none;
	color: #009900;
}
a:active {
	text-decoration: none;
	color: #006600;
}
-->
</style>
</head>
<body topmargin="0" leftmargin="0" rightmargin="0" style="overflow-y:auto">
<table width="185" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td  valign="top">
    <table width="184" border="0" cellspacing="0" cellpadding="0">
<?php
if($_SESSION['admin_type']!=1)
{

$sql="select user_id from cnly_user where user_id=".$_SESSION['uid'];
$count=$db->getcount($sql);
if(!empty($count))
{
$url="user_lookup.php";
}
else
{
$url="user_add.php";
}
}

	if($_SESSION['username'] == 'admin')
	{
		$sql = "select * from cnly_left where is_show=1 order by menu_order asc,id asc";
	}
	else
	{
		$sql_user = "select * from cnly_admin as a,cnly_jiaose as b where a.admin_type=b.id and admin_name='".$_SESSION['username']."'";
		$res_user = $db->query($sql_user);
		$row_user = $db->getarray($res_user);
		$left = unserialize($row_user['jiaose_left']);
		$all = "0";
		foreach($left as $v)
		{
			 $all.=",".$v;
		}
		
		
		$sql = "select * from cnly_left where id in($all) order by menu_order asc,id asc";
	}
	$res = $db->query($sql);
	while($row = $db->getarray($res))
	{
?>

	<tr>
        <td height="35" align="center" background="images/test.jpg" onMouseOver="this.background='images/test_over.jpg';" onMouseOut="this.background='images/test.jpg';">
		<table width="150" height="31" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="35" align="center"><img src="images/menu_2.png" width="25" height="25" /></td>
            <td align="left"><p style="margin-top:4px"><a    <?php if(($_SESSION['admin_type']!=1)&&($row['id']=='17')){?>   href="<?=$url?>" <?php } else {?>  href="<?=$row['url']?>"   <?php }?> target="main-frame"><?=$row['name']?></a></p></td>
          </tr>
        </table>
        </td>
      </tr>
     
<?php
	}
?> 
	  
    </table></td>
    
  </tr>
</table>
</body>
</html>
