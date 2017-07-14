<?php
ob_start();
error_reporting(0);
include("lead_db.php");    //调用库类
/*--------------界面--------------*/
if(@!$_POST['act']){//未提交了表单
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>

<link href="../css.css" rel="stylesheet" type="text/css">
</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<div id=hiddenDiv style="filter:Alpha(opacity=10);">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #B7E6B0;border-right:1px solid #B7E6B0;">
  <tr>
    <td height="30" colspan="3" background="../images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：系统设置 > 数据备份</td>
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


<table width="408" border="0" align="center" cellpadding="0" cellspacing="2" class="yy">
  <form name="form1" method="post" action="">
    <input name="hiddenField" type="hidden" value="ok" />
   
    <tr>
      <td width="56" height="24" class="bd_txt">数据库</td>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20"><input name="bfzl" type="radio" value="quanbubiao" checked="checked"></td>
            <td class="txt">备份[全部]数据表的数据到一个.sql文件</td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td height="1" colspan="2" background="graphics/d2.gif"></td>
    </tr>
    <tr style="display:none">
      <td width="56" height="24" class="bd_txt">数据表</td>
      <td class="txt"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20"><input type="radio" name="bfzl" value="danbiao"></td>
            <td><select name="tablename" class="bd_in352">
                <option value="">请选择</option>
                <?
		$d->query("show table status from $mysqldb");
		while($d->nextrecord()){
		echo "<option value='".$d->f('Name')."'>".$d->f('Name')."</option>";}
		?>
              </select></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td height="1" colspan="2" background="graphics/d2.gif"></td>
    </tr>
    <tr>
      <td width="56" height="24" class="bd_txt">分 卷</td>
      <td class="txt"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="20"><input type="checkbox" name="fenjuan" value="yes"></td>
            <td><input name="filesize" type="text" value="100" size="10" class="bd_in340"></td>
            <td width="10"><span class="STYLE1">Kb</span></td>
          </tr>
        </table></td>
    </tr>
    <tr>
      <td height="1" colspan="2" background="graphics/d2.gif"></td>
    </tr>
    <tr>
      <td width="56" height="24" class="bd_txt">备份到</td>
      <td class="txt"><input type="radio" name="weizhi" value="server" checked>
        服务器
        　<input type="radio" name="weizhi" value="localpc">本地</td>
    </tr>
    <tr>
      <td height="1" colspan="2" background="graphics/d2.gif"></td>
    </tr>
    <tr>
      <td width="56" height="30" class="bd_txt">&nbsp;</td>
      <td>
      <input name="act" type="submit" class="button" onMouseOver="this.className='button-bor'" onMouseOut="this.className='button'" value="备份" onClick="return confirm('确定要备份数据库');">
     </td>
    </tr>
  </form>
</table>



<?php
/*-------------界面结束-------------*/
}else{

/*--------------主程序-----------------------------------------*/

if($_POST['weizhi']=="localpc"&&$_POST['fenjuan']=='yes'){
$msgs[]="只有选择备份到服务器，才能使用分卷备份功能";
show_msg($msgs); 
pageend();
}

if($_POST['fenjuan']=="yes"&&!$_POST['filesize']){
$msgs[]="您选择了分卷备份功能，但未填写分卷文件大小";
show_msg($msgs); 
pageend();
}

if($_POST['weizhi']=="server"&&!writeable("./backup")){
$msgs[]="备份文件存放目录'./backup'不可写，请修改目录属性";
show_msg($msgs); 
pageend();
}

/*----------备份全部表-------------*/
if($_POST['bfzl']=="quanbubiao"){//备份全部表

if(!$_POST['fenjuan']){//不分卷
if(!$tables=$d->query("show table status from $mysqldb")){//读数据库结构
$msgs[]="读数据库结构错误"; 
show_msg($msgs); 
pageend();

}

$sql="";
while($d->nextrecord($tables)){
	$table=$d->f("Name");
	$sql.=make_header($table);
	$d->query("select * from $table");
	$num_fields=$d->nf();
	while($d->nextrecord()){
	$sql.=make_record($table,$num_fields);
	}
	}
	
$str = substr(rand(0,999999),0,4);
$filename=date("YmdHis",time())."_$str.sql";//文件名
if($_POST['weizhi']=="localpc") down_file($sql,$filename);//保存到本地
elseif($_POST['weizhi']=="server"){//保存到服务器
if(write_file($sql,$filename)) 
echo "<script>alert('全部数据表数据备份完成');history.go(-1);</script>";
echo "<script>alert('备份全部数据表失败');history.go(-1);</script>";

show_msg($msgs);
pageend();
}


}else{//--如果分卷------------------------*/

if(!$_POST['filesize']){
$msgs[]="请填写备份文件分卷大小"; 
show_msg($msgs);
pageend();
}

if(!$tables=$d->query("show table status from $mysqldb")){
$msgs[]="读数据库结构错误"; 
show_msg($msgs); 
pageend();
}

$sql=""; 
$p=1;
$filename=date("Ymd",time())."_all";
while($d->nextrecord($tables)){
	$table=$d->f("Name");
	$sql.=make_header($table);
	$d->query("select * from $table");
	$num_fields=$d->nf();
	while($d->nextrecord()){
	$sql.=make_record($table,$num_fields);
	if(strlen($sql)>=$_POST['filesize']*1000){
			$filename.=("_v".$p.".sql");
			if(write_file($sql,$filename))
			$msgs[]="全部数据表 [卷-".$p."] 数据备份完成,生成备份文件'./backup/$filename'";
			else $msgs[]="备份表 [".$_POST['tablename']."] 失败";
			$p++;
			$filename=date("Ymd",time())."_all";
			$sql="";
			}
	}
}

if($sql!=""){
$filename.=("_v".$p.".sql");		
if(write_file($sql,$filename))
$msgs[]="[卷-".$p."] 数据备份完成,生成备份文件'./backup/$filename'<br /><strong>全部数据备份完成！！</strong>";}
show_msg($msgs);
/*---------------------分卷结束*/
}
/*--------备份全部表结束*/
}elseif($_POST['bfzl']=="danbiao"){/*----备份单表-----*/
if(!$_POST['tablename']){
$msgs[]="请选择要备份的数据表"; 
show_msg($msgs); 
pageend();
}

if(!$_POST['fenjuan']){/*--不分卷--*/
$sql=make_header($_POST['tablename']);
$d->query("select * from ".$_POST['tablename']);
$num_fields=$d->nf();
while($d->nextrecord()){
$sql.=make_record($_POST['tablename'],$num_fields);
}
$filename=date("Ymd",time())."_".$_POST['tablename'].".sql";
if($_POST['weizhi']=="localpc") down_file($sql,$filename);
elseif($_POST['weizhi']=="server"){
if(write_file($sql,$filename))
$msgs[]="表 [".$_POST['tablename']."] 数据备份完成,生成备份文件'./backup/$filename'";
else
$msgs[]="备份表 [".$_POST['tablename']."] 失败";
show_msg($msgs);
pageend();
}
/*----------------不要卷结束*/
}else{/*-------分卷-------------------------------*/
if(!$_POST['filesize']){
$msgs[]="请填写备份文件分卷大小"; 
show_msg($msgs);
pageend();
}

$sql=make_header($_POST['tablename']); 
$p=1; 
$filename=date("Ymd",time())."_".$_POST['tablename'];
$d->query("select * from ".$_POST['tablename']);
$num_fields=$d->nf();
while ($d->nextrecord()){	
$sql.=make_record($_POST['tablename'],$num_fields);
if(strlen($sql)>=$_POST['filesize']*1000){
$filename.=("_v".$p.".sql");
if(write_file($sql,$filename))
$msgs[]="表 -".$_POST['tablename']." [卷-".$p."] 数据备份完成,生成备份文件'./backup/$filename'";
else 
$msgs[]="备份表 -".$_POST['tablename']."- 失败";
$p++;
$filename=date("Ymd",time())."_".$_POST['tablename'];
$sql="";
}
}

if($sql!=""){$filename.=("_v".$p.".sql");		
if(write_file($sql,$filename))
$msgs[]="表 -".$_POST['tablename']." [卷-".$p."] 数据备份完成,生成备份文件'./backup/$filename'<br /><strong>全部数据备份完成！！</strong>";}
show_msg($msgs);
/*----------分卷结束*/
}
/*----------备份单表结束*/
}

}
/*-------------主程序结束------------------------------------------*/


//== 文件生成函数 ====================================================
function write_file($sql,$filename)
{
$re=true;
if(!@$fp=fopen("./backup/".$filename,"w+")) {$re=false; echo "打开文件失败";}
if(!@fwrite($fp,$sql)) {$re=false; echo "写文件失败";}
if(!@fclose($fp)) {$re=false; echo "关闭文件失败";}
return $re;
}

//== 文件下载函数 ====================================================
function down_file($sql,$filename)
{
	ob_end_clean();
	header("Content-Encoding: none");
	header("Content-Type: ".(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') ? 'application/octetstream' : 'application/octet-stream'));
			
	header("Content-Disposition: ".(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') ? 'inline; ' : 'attachment; ')."filename=".$filename);
			
	header("Content-Length: ".strlen($sql));
	header("Pragma: no-cache");
			
	header("Expires: 0");
	echo $sql;
	$e=ob_get_contents();
	ob_end_clean();
}

//== 目录权限判断 ====================================================
function writeable($dir){	
	if(!is_dir($dir)){
	@mkdir($dir, 0777);
	}	
	if(is_dir($dir)){	
	if($fp = @fopen("$dir/test.test", 'w')){
    @fclose($fp);
	@unlink("$dir/test.test");
	$writeable = 1;	
    }else{
    $writeable = 0;
	}	
}
return $writeable;
}


//== 目录权限判断 ====================================================
function make_header($table){
global $d;
$sql="DROP TABLE IF EXISTS ".$table."\n";
$d->query("show create table ".$table);
$d->nextrecord();
$tmp=preg_replace("/\n/","",$d->f("Create Table"));
$sql.=$tmp."\n";
return $sql;
}

//== SQL结构生成函数 ====================================================
function make_record($table,$num_fields){
global $d;
$comma="";
$sql .= "INSERT INTO ".$table." VALUES(";
for($i = 0; $i < $num_fields; $i++){
$sql .= ($comma."'".mysql_escape_string($d->record[$i])."'"); 
$comma = ",";
}
$sql .= ")\n";

//替换相关内容
return $sql;
}

//== 提示函数 ====================================================================
function show_msg($msgs)
{
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">


<body style="background-color:transparent">
<?
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
?>

</body>
</html>
<?
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