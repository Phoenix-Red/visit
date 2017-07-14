<?php
ob_start();
error_reporting(0);
session_start();
include("lead_db.php");//调用库类
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=uft-8">

<link href="../css.css" rel="stylesheet" type="text/css">
</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<div id=hiddenDiv style="display:block;filter:Alpha(opacity=10);">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #B7E6B0;border-right:1px solid #B7E6B0;">
  <tr>
    <td height="30" colspan="3" background="../images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：数据恢复</td>
  </tr>
  <tr>
    <td width="10"></td>
    <td valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="10"></td>
  </tr>
</table>
 
<!--开始-->

<?php
if(!$_POST['act']&&!$_SESSION['data_file']){//== 界面
$msgs[]="恢复备份数据的同时将覆盖原有数据！！！！";
$msgs[]="数据恢复功能只能恢复由本系统导出的数据文件";
$msgs[]="从本地恢复数据需要服务器支持上传并保证数据小于上传上限";
$msgs[]="如果您使用了分卷备份导入文件卷1其他数据文件会自动导入";
show_msg($msgs);
?>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="2" class="yy">
  <form action="" method="post" enctype="multipart/form-data" name="restore.php">
    <input name="hiddenField" type="hidden" value="ok" />
    <tr>
      <td height="3" colspan="2" ></td>
    </tr>
    <tr>
      <td height="1" colspan="2" background="graphics/d2.gif"></td>
    </tr>
    <tr>
      <td class="bd_txt">服务器</td>
      <td width="720" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="30"><input type="radio" name="restorefrom" value="server" checked></td>
            <td><select name="serverfile" class="bd_in352">
                <option value="">-请选择-</option>
                <?
$handle=opendir('./backup');
while ($file = readdir($handle)) {
    if(eregi("^[0-9]{8,8}([0-9a-z_]+)(\.sql)$",$file)) echo "<option value='$file'>$file</option>";}
closedir($handle); 
?>
              </select></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td height="1" colspan="2" background="graphics/d2.gif"></td>
    </tr>
    <tr>
      <td width="70" height="24" class="bd_txt">本 地</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="30"><input type="radio" name="restorefrom" value="localpc"></td>
            <td><input name="myfile" type="file" class="bd_in352" /></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td height="1" colspan="2" background="graphics/d2.gif"></td>
    </tr>
    <tr>
      <td width="70" height="30" class="bd_txt">&nbsp;
      <input type="hidden" name="MAX_FILE_SIZE" value="1500000"></td>
      <td><input name="act" type="submit" class="button" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="恢复" onClick="return confirm('确定要恢复数据库，恢复数据库将覆盖原来的数据');"></td>
    </tr>
  </form>
</table>
<?php
/**************************界面结束*/
}
/****************************主程序*/
if($_POST['act']=="恢复"){
if($_POST['restorefrom']=="server"){/***************服务器恢复*/
if(!$_POST['serverfile']){
$msgs[]="您选择从服务器文件恢复备份，但没有指定备份文件";
show_msg($msgs); 
pageend();	
}

if(!eregi("_v[0-9]+",$_POST['serverfile'])){
$filename="./backup/".$_POST['serverfile'];
if(import($filename)) $msgs[]="备份文件 [".$_POST['serverfile']."] 成功导入数据库";
else $msgs[]="备份文件 [".$_POST['serverfile']."] 成功导入数据库";show_msg($msgs); pageend();	
}else{
$filename="./backup/".$_POST['serverfile'];
if(import($filename)) $msgs[]="备份文件 [".$_POST['serverfile']."] 成功导入数据库";
else {$msgs[]="备份文件 [".$_POST['serverfile']."] 成功导入数据库";show_msg($msgs);pageend();}

$voltmp=explode("_v",$_POST['serverfile']);
$volname=$voltmp[0];
$volnum=explode(".sq",$voltmp[1]);
$volnum=intval($volnum[0])+1;
$tmpfile=$volname."_v".$volnum.".sql";
if(file_exists("./backup/".$tmpfile)){
$msgs[]="程序将在3秒钟后自动开始导入此分卷备份的下一部份：文件 [".$tmpfile."] ，请勿手动中止程序的运行，以免数据库结构受损";
$_SESSION['data_file']=$tmpfile;
show_msg($msgs);
sleep(3);
echo "<script language='javascript'>"; 
echo "location='restore.php';"; 
echo "</script>"; 
}else{
$msgs[]="<strong>全部数据导入成功！！</strong>";
show_msg($msgs);
}
}
/**************服务器恢复结束*/
}
if($_POST['restorefrom']=="localpc"){/*****从本地文件恢复*********/
	switch ($_FILES['myfile']['error']){
	case 1:
	case 2:
	$msgs[]="您上传的文件大于服务器限定值，上传未成功";
	break;
	case 3:
	$msgs[]="未能从本地完整上传备份文件";
	break;
	case 4:
	$msgs[]="从本地上传备份文件失败";
	break;
    case 0:
	break;
	}
	if($msgs){show_msg($msgs);pageend();}
//$fname=date("Ymd",time())."_".sjs(5).".sql";
$fname=date("Ymd",time())."_up.sql";
if (is_uploaded_file($_FILES['myfile']['tmp_name'])){
copy($_FILES['myfile']['tmp_name'], "./backup/".$fname);
}

if (file_exists("./backup/".$fname)){
$msgs[]="本地备份文件上传成功";
if(import("./backup/".$fname)){$msgs[]="本地备份文件成功导入数据库"; unlink("./backup/".$fname);}
else $msgs[]="本地备份文件导入数据库失败";
}
else($msgs[]="从本地上传备份文件失败");
show_msg($msgs);

/****本地恢复结束*****/
}
/****************************主程序结束*/
}

/*************************剩余分卷备份恢复**********************************/
if(!$_POST['act']&&$_SESSION['data_file']){
$filename="./backup/".$_SESSION['data_file'];
if(import($filename)) $msgs[]="备份文件 [".$_SESSION['data_file']."] 成功导入数据库";
else {$msgs[]="备份文件".$_SESSION['data_file']."成功导入数据库";show_msg($msgs);pageend();}
$voltmp=explode("_v",$_SESSION['data_file']);
$volname=$voltmp[0];
$volnum=explode(".sq",$voltmp[1]);
$volnum=intval($volnum[0])+1;
$tmpfile=$volname."_v".$volnum.".sql";
if(file_exists("./backup/".$tmpfile)){
		$msgs[]="程序将在3秒钟后自动开始导入此分卷备份的下一部份：文件 [".$tmpfile."] ，请勿手动中止程序的运行，以免数据库结构受损";
		$_SESSION['data_file']=$tmpfile;
		show_msg($msgs);
		sleep(3);
		echo "<script language='javascript'>"; 
		echo "location='restore.php';"; 
		echo "</script>"; 
		}
	else
		{
		$msgs[]="<strong>全部数据导入成功！！</strong>";
		unset($_SESSION['data_file']);
		show_msg($msgs);
		}
}
/**********************剩余分卷备份恢复结束*******************************/

//== 导入数据 ====================================================
function import($fname){
global $d;
$sqls=file($fname);
foreach($sqls as $sql){
str_replace("\r","",$sql);
str_replace("\n","",$sql);
if(!$d->query(trim($sql))) return false;
}
return true;
}


function show_msg($msgs)
{
$title="提示：";
echo "<table width='100%' border='0'  cellpadding='0' cellspacing='2' class='yy'>";
echo "<tr><td height='3'></td></tr>";
echo "<tr><td class='txt'>".$title."</td></tr>";
echo "<tr><td><ul>";
while (list($k,$v)=each($msgs))
	{
	echo "<li class='txt'>".$v."</li>";
	}
echo "</ul></td></tr></table>";
}

function pageend()
{
exit();
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="10"></td>
  </tr>
</table>

<table width="100%" height="30" border="0" cellpadding="0" cellspacing="0" bgcolor="#CCFFCC" style="border-left:1px solid #B7E6B0;border-right:1px solid #B7E6B0; border-bottom:1px solid #B7E6B0;border-top:1px solid #B7E6B0; ">
<tr>
    <td align="center" height="30">
          <center>
           
          </center></td>
  </tr></table>


<!--结束-->    </td>
    <td width="10"></td>
  </tr>
</table>
<tr>
</div>
</body>
</html>