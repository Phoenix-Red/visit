<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站管理登陆页面</title>
<style>
*{
font-size:12px;
}
.border{
 height:20px;border:1px solid #78c344; background-color:#E9FEFE;
/* font-size:14px; font-weight:bold; font-family:"微软雅黑";
*/
 font-weight:bold; font-family:Verdana, Arial, Helvetica, sans-serif;/*ime-mode:disabled*/
}

.btn1,.btn2{width:86px; height:33px; background-image:url(images/main-pic.gif); background-repeat:no-repeat;border:0px; float:left; margin-left:84px; cursor:pointer!important;cursor:hand; display:inline}
.btn1{ background-position:-310px -11px}
.btn2{ background-position:-211px -11px}

.btn3{width:86px; height:33px; background-image:url(images/main-pic.gif); background-repeat:no-repeat;border:0px; float:left; margin-left:31px; cursor:pointer!important;cursor:hand; display:inline}
.btn3{ background-position:-12px -11px}
.btn3:hover{ background-position:-111px -11px}


.login_month{
	position:absolute;
	margin-left:170px;
	top:161px;
	width:136px;
	height:72px;
	<?php
	$momth = date("m",time()+3600*8);
	switch($momth)
	{
		case 1 : echo 'background-image: url(images/month-0901.jpg);';break;
		case 2 : echo 'background-image: url(images/month-0902.jpg);';break;
		case 3 : echo 'background-image: url(images/month-0903.jpg);';break;
		case 4 : echo 'background-image: url(images/month-0904.jpg);';break;
		case 5 : echo 'background-image: url(images/month-0905.jpg);';break;
		case 6 : echo 'background-image: url(images/month-0906.jpg);';break;
		case 7 : echo 'background-image: url(images/month-0907.jpg);';break;
		case 8 : echo 'background-image: url(images/month-0908.jpg);';break;
		case 9 : echo 'background-image: url(images/month-0909.jpg);';break;
		case 10 : echo 'background-image: url(images/month-0910.jpg);';break;
		case 11 : echo 'background-image: url(images/month-0911.jpg);';break;
		case 12 : echo 'background-image: url(images/month-0912.jpg);';break;
		default : echo '';break;
	}
?>

	background-repeat: no-repeat;
}
.login_month_img{
	position:absolute;
	right:375px;
	top:72px;
	width:414px;
	height:190px;
	background-image: url(images/big-month-0906.jpg);
	background-repeat: no-repeat;
}
.login_month_img1{
	position:absolute;
	left:376px;
	top:6px;
	width:100px;
	height:280px;
	background-image:url(images/big-month-0906.jpg);
	background-repeat:no-repeat;
	background-position:-419px 39px;
}
</style>
<SCRIPT LANGUAGE="JavaScript">
<!--
function killErrors()

{

return true;

}

window.onerror = killErrors;

function reloadcode(){
      var verify=document.getElementById('safecode');
      verify.setAttribute('src','../includes/authimg.php?id='+Math.random());
}
/*判断用户名密码*/
function fLoginFormSubmit(){
	var fm = window.document.form1;
	var user = fm.username;
	user.value = fTrim( user.value); //Trim the input value.

	if( user.value =="") {
		window.alert("\请输入您的用户名");
		user.focus();
		event.returnValue = false;
		return false;
	}

	if( fm.password.value.length =="") {
		window.alert("\请输入您的密码");
		fm.password.focus();
		event.returnValue = false;
		return false;
	}

	
}
function fInitUserName()
{
	var fm = window.document.form1;
	var name = "";
	if( visitordata.data != null)
	{
		name = visitordata.data[0][0];
		//fm.remUser.checked = true;
		fm.username.autocomplete="on";
		//fm.secure.checked = (visitordata.data[0][3]==1);
	}else{
		fm.username.autocomplete="off";
		//fm.remUser.checked = getCookie("ntes_mail_noremember")!="true";
	}

	if( name != ""){
		fm.username.value = name;
		fm.password.focus();
	}else{
		fm.username.focus();
	}
}
function fTrim(str)
{
	return str.replace(/(^\s*)|(\s*$)/g, "");
}
var visitordata = new Cookie( document, "nts_mail_user", document.domain);
visitordata.load();


/*文本框样式*/
function $( id ){return document.getElementById( id );}


	function fEvent(sType,oInput){
		switch (sType){
			case "focus" :
				oInput.isfocus = true;
			case "mouseover" :
				oInput.style.borderColor = '#9ecc00';
				break;
			case "blur" :
				oInput.isfocus = false;
			case "mouseout" :
				if(!oInput.isfocus){
					oInput.style.borderColor='#84a1bd';
				}
				break;
		}
	}

try{
	if(!document.all){
		document.cookie="Coremail=;domain=163.com;path=/;expires="+(new Date()).toGMTString();
	}
}catch(e){}


//-->
</SCRIPT>

</head>

<body>
<table width="830" height="161" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="161" align="center"></td>
  </tr>
</table>

<table width="829" height="309" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="414" height="30">&nbsp;</td>
    <td width="373" valign="bottom">
	<div class="login_month"></div>
	<img src="images/top.gif" width="373" height="12" /></td>
    <td width="42">&nbsp;</td>
  </tr>
  <tr>
    <td height="254" background="images/big.jpg">&nbsp;</td>
    <td valign="top" background="images/deng_bg.gif">
	
	<form id="form1" name="form1" method="post" action="logincheck.php" onSubmit="return fLoginFormSubmit();">
      <table width="100%" height="233" border="0" cellpadding="0" cellspacing="1">
        <tr>
          <td height="37" colspan="2"><img src="images/anquan.gif" width="173" height="25" /></td>
          </tr>
        <tr>
          <td width="125" height="40" align="right">用户名：&nbsp;</td>
          <td><input type="text" style="width:160px;" class="border" name="username" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOver="fEvent('mouseover',this)" onMouseOut="fEvent('mouseout',this)" maxlength="30" /></td>
        </tr>
        <tr>
          <td height="40" align="right">密&nbsp;&nbsp;码：&nbsp;</td>
          <td><input type="password" name="password" style="width:160px;" class="border" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOver="fEvent('mouseover',this)" onMouseOut="fEvent('mouseout',this)" maxlength="30" /></td>
        </tr>
        <tr>
          <td height="40" align="right">验证码：&nbsp;</td>
          <td><table width="160" height="24" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="96"><input type="text" name="imgpost"  id="vdcode" style="width:80px;" class="border" /></td>
              <td width="73" align="right"><img src="../includes/authimg.php" name="img1" border="1" id="safecode" onClick="reloadcode()" style="cursor:hand"></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="70" colspan="2" align="center">
           	<!--<img src="images/deng.gif" onclick="document.form1.submit();" style="cursor:hand;" border="0" />-->
			<input value="" type="submit" class="btn1" onMouseOver="this.className='btn2'" onMouseOut="this.className='btn1'" />
			
			<a href="#" onClick="document.form1.reset();" class="btn3" />
			</td>
          </tr>
      </table>
        </form>
    </td>
    <td background="images/big.jpg" style="background-repeat:repeat-x; background-position:right;">&nbsp;</td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
    <td valign="top"><img src="images/down.gif" width="373" height="15" /></td>
    <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>
