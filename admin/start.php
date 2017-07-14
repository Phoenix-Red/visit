<?php
	define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
?>
<HTML><HEAD><TITLE>开始页面</TITLE>
<META content="noindex, nofollow" name=robots>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.2900.3086" name=GENERATOR>
<link href="css.css" rel="stylesheet" type="text/css">
<script language="javascript" src="js/pub.js"></script>
</HEAD>
<BODY>
<div id=hiddenDiv style="filter:Alpha(opacity=10);">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #B7E6B0;border-right:1px solid #B7E6B0;">
  <tr>
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a></td>
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
        <td valign="top"><table width="100%" border="0" cellpadding="6" cellspacing="1" bgcolor="#BCE8B5">
            

<!--############################################################--> 
<tr bgcolor="#FFFFFF">
              <td height="25" colspan="2" align="center" background="images/list_title_bg.jpg" bgcolor="#E9F0E9"><strong>服务器信息</strong></td>
              </tr> <tr bgcolor="#FFFFFF">
              <td width="180" height="35" align="right"><b>Apache 版本:</b> </td>
             
              <td><?=$_SERVER['SERVER_SOFTWARE']; ?></td>
            </tr> <tr bgcolor="#FFFFFF">
              <td height="35" align="right"><b>MySQL 版本:</b> </td>
             
              <td>MySql &nbsp;<?=mysql_get_client_info();?></td>
            </tr> <tr bgcolor="#FFFFFF">
              <td height="35" align="right"><b>服务器端口:</b> </td>
             
              <td><?=$_SERVER["SERVER_PORT"]?></td>
            </tr> <tr bgcolor="#FFFFFF">
              <td align="right"><b>服务器ip:</b> </td>
             
              <td><?=$_SERVER["SERVER_NAME"]?></td>
            </tr> <tr bgcolor="#FFFFFF">
              <td height="35" align="right"><b>服务器操作系统</b>:</td>
             
              <td><?=PHP_OS?></td>
            </tr>
            <tr bgcolor="#FFFFFF">
              <td height="35" align="right"><b>当前时间:</b></td>
              <td><span id="jnkc"><script>setInterval("jnkc.innerHTML=new Date().toLocaleString()+' '.charAt(new Date().getDay());",1000);</script>
              </span> </td>
            </tr>
            <tr bgcolor="#FFFFFF">
              <td height="35" align="right">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr bgcolor="#FFFFFF">
              <td height="35" align="right">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr bgcolor="#FFFFFF">
              <td height="35" align="right">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
<!--############################################################-->			
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="10"></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#D2FFD2" style="border:1px solid #BCE8B5">
            <tr>
              <td height="35" align="center">&nbsp;</td>
              </tr>
          </table>
          
          </td>
        <td width="10"></td>
      </tr>
    </table></td>
  </tr>

</table>

</div></BODY></HTML>