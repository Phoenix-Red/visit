<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站管理系统首页</title>
<script language="javascript"> 
<!-- 
function document.oncontextmenu() 
{ 
return false; 
} 
--> 
</script> 
<style type="text/css">
<!--
.topbg{
background-image:url(images/top.jpg);
background-repeat:repeat-y;
}

body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(images/main_top.jpg);
	background-repeat:no-repeat;
}
body,td,th {
	font-size: 12px;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #003300;
}
a:hover {
	text-decoration: none;
	color: #00CC00;
}
a:active {
	text-decoration: none;
	color: #003300;
}
a {
	font-size: 12px;
	color: #003300;
}
-->
</style>
</head>
<body topmargin="0" leftmargin="0" rightmargin="0">
<table width="100%" height="83" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td class="topbg"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td>&nbsp;</td>
        <td width="400"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="490" height="25" align="right"><table width="450" border="0" align="right" cellpadding="2" cellspacing="1" bgcolor="#D1FFBB">
                <tr>
                  <td bgcolor="#FFFF66">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td nowrap="nowrap" align="center">您好： <?php error_reporting(0);session_start();echo $_SESSION['username']?> 
    欢迎使用后台管理系统　
                    </td>
    <td width="140" align="center"><span id="jnkc"><script>setInterval("jnkc.innerHTML=new Date().toLocaleString()+' '.charAt(new Date().getDay());",1000);</script></span></td>
  </tr>
</table>

				  </td>
                </tr>
            </table></td>
            <td width="21" rowspan="2"></td>
          </tr>
          <tr>
            <td height="40" align="right"><table border="0" align="right" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="100" align="right" style="display:none"><a href="excel.php"  target="main-frame"><img src="images/main_top_b3.jpg" width="100" height="30" border="0" /></a></td>
                  <td width="25" align="right"></td>

                  <td width="100" align="right"><a href="../" target="_blank"><img src="images/main_top_ba.jpg" width="100" height="30" border="0" /></a></td>
                  <td width="25" align="right"></td>
                  <td width="100" align="right" style="display:none"><a href="shengchengjingtaihtml.php" target="main-frame"><img src="images/main_top_hc.jpg" width="100" height="30" border="0" /></a></td>
                  <td width="25" align="right"></td>
                  <td width="100" align="right"><a href="#" language="javascript" onclick="if (confirm('确认要离开本系统?')){;href='exit.php';target='_top';}"><img src="images/main_top_b4.jpg" width="100" height="30" border="0" /></a></td>
                </tr>
            </table></td>
          </tr>
        </table></td>
        <td width="16"></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>