// JavaScript Document

function killErrors()

{

return true;

}

window.onerror = killErrors;

//弹出带表单(表单填写) 

	function sAlertform(txt){

	var eSrc=(document.all)?window.event.srcElement:arguments[1];

	var shield = document.createElement("DIV");

	shield.id = "shield";

	shield.style.position = "absolute";

	shield.style.left = "0px";

	shield.style.top = "0px";

	shield.style.width = "100%";

	shield.style.height = ((document.documentElement.clientHeight>document.documentElement.scrollHeight)?document.documentElement.clientHeight:document.documentElement.scrollHeight)+"px";

	shield.style.background = "#333";

	shield.style.textAlign = "center";

	shield.style.zIndex = "10000";

	shield.style.filter = "alpha(opacity=0)";

	shield.style.opacity = 0;

	var alertFram = document.createElement("DIV");

	alertFram.id="alertFram";

	alertFram.style.position = "absolute";

	alertFram.style.left = "50%";

	alertFram.style.top = "50%";

	alertFram.style.marginLeft = "-225px" ;

	alertFram.style.marginTop = -75+document.documentElement.scrollTop+"px";

	alertFram.style.width = "272px";

	alertFram.style.height = "109px";

	alertFram.style.background = "";

	alertFram.style.textAlign = "center";

	alertFram.style.zIndex = "10001";

	strHtml  = "<ul>\n";

	strHtml += "<table width=\"272\" height=\"109\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" background=\"/UI/images/alert_form.gif\"><form name=\"form1\" method=\"post\" action=\"\"><tr><td height=\"25\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td width=\"5\"></td><td style=\"color:#15428B; font-size:12px;\">"+txt+"</td><td width=\"20\"><a href=\"#\"><img src=\"/UI/images/alertclose.gif\" width=\"15\" height=\"15\" border=0 onclick=\"doOk();\"></a></td></tr></table></td></tr><tr><td align=\"center\"><textarea name=\"textarea\" rows=\"4\" style=\" border:1px solid #006699; height:50px; width:90%; font-size:12px;\">这里输入信息</textarea></td></tr><tr><td height=\"30\" align=\"center\"><table width=\"100\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\"><tr><td align=\"center\"><input type=\"image\" name=\"imageField\" src=\"/UI/images/yes.gif\" onclick=\"document.form1.submit();doOk();\"></td><td align=\"center\"><a href=\"#\"><img src=\"/UI/images/no.gif\" width=\"53\" height=\"21\" onclick=\"doOk();\" border=0></a></td></tr></table></td></tr></form></table>\n";

	strHtml += "</ul>\n";

	alertFram.innerHTML = strHtml;

	document.body.appendChild(alertFram);

	document.body.appendChild(shield);

	this.setOpacity = function(obj,opacity){

		if(opacity>=1)opacity=opacity/100;

		try{ obj.style.opacity=opacity; }catch(e){}

		try{ 

			if(obj.filters.length>0&&obj.filters("alpha")){

				obj.filters("alpha").opacity=opacity*100;

			}else{

				obj.style.filter="alpha(opacity=\""+(opacity*100)+"\")";

			}

		}catch(e){}

	}

	var c = 0;

	this.doAlpha = function(){

		if (++c > 20){clearInterval(ad);return 0;}

		setOpacity(shield,c);

	}

	var ad = setInterval("doAlpha()",1);

	this.doOk = function(){

		//alertFram.style.display = "none";

		//shield.style.display = "none";

		document.body.removeChild(alertFram);

		document.body.removeChild(shield);

		eSrc.focus();

		

		

		document.body.onselectstart = function(){return true;}

		document.body.oncontextmenu = function(){return true;}

	}

	//document.getElementById("do_OK").focus();

	eSrc.blur();

	document.body.onselectstart = function(){return false;}

	document.body.oncontextmenu = function(){return false;}

}

//警告信息

	function sAlertwaring(txt,url){

	var eSrc=(document.all)?window.event.srcElement:arguments[1];

	var shield = document.createElement("DIV");

	shield.id = "shield";

	shield.style.position = "absolute";

	shield.style.left = "0px";

	shield.style.top = "0px";

	shield.style.width = "100%";

	shield.style.height = ((document.documentElement.clientHeight>document.documentElement.scrollHeight)?document.documentElement.clientHeight:document.documentElement.scrollHeight)+"px";

	shield.style.background = "#333";

	shield.style.textAlign = "center";

	shield.style.zIndex = "10000";

	shield.style.filter = "alpha(opacity=0)";

	shield.style.opacity = 0;

	var alertFram = document.createElement("DIV");

	alertFram.id="alertFram";

	alertFram.style.position = "absolute";

	alertFram.style.left = "50%";

	alertFram.style.top = "50%";

	alertFram.style.marginLeft = "-225px" ;

	alertFram.style.marginTop = -75+document.documentElement.scrollTop+"px";

	alertFram.style.width = "272px";

	alertFram.style.height = "109px";

	alertFram.style.background = "";

	alertFram.style.textAlign = "center";

	alertFram.style.zIndex = "10001";

	strHtml  = "<ul>\n";

	strHtml += "<table width=\"272\" height=\"109\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" background=\"/UI/images/alert.gif\"><tr><td height=\"25\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td width=\"5\"></td><td style=\"color:#15428B; font-size:12px;\">确认提示信息</td><td width=\"20\"><a href=\"#\"><img src=\"/UI/images/alertclose.gif\" width=\"15\" height=\"15\" onclick=\"doOk();\" border=0></a></td></tr></table></td></tr><tr><td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td width=\"70\"></td><td align=\"center\" style=\" font-size:12px; color:#000000;\">"+txt+"</td><td width=\"30\"></td></tr></table></td></tr><tr><td height=\"30\" align=\"center\"><table width=\"100\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\"><tr><td align=\"center\"><a href=\""+url+"\"><img src=\"/UI/images/yes.gif\" width=\"53\" height=\"21\" onclick=\"doOk();\" border=0></a></td><td align=\"center\"><a href=\"#\"><img src=\"/UI/images/no.gif\" width=\"53\" height=\"21\" onclick=\"doOk();\" border=0></a></td></tr></table></td></tr></table>\n";

	strHtml += "</ul>\n";

	alertFram.innerHTML = strHtml;

	document.body.appendChild(alertFram);

	document.body.appendChild(shield);

	this.setOpacity = function(obj,opacity){

		if(opacity>=1)opacity=opacity/100;

		try{ obj.style.opacity=opacity; }catch(e){}

		try{ 

			if(obj.filters.length>0&&obj.filters("alpha")){

				obj.filters("alpha").opacity=opacity*100;

			}else{

				obj.style.filter="alpha(opacity=\""+(opacity*100)+"\")";

			}

		}catch(e){}

	}

	var c = 0;

	this.doAlpha = function(){

		if (++c > 20){clearInterval(ad);return 0;}

		setOpacity(shield,c);

	}

	var ad = setInterval("doAlpha()",1);

	this.doOk = function(){

		//alertFram.style.display = "none";

		//shield.style.display = "none";

		document.body.removeChild(alertFram);

		document.body.removeChild(shield);

		eSrc.focus();

		document.body.onselectstart = function(){return true;}

		document.body.oncontextmenu = function(){return true;}

	}

	//document.getElementById("do_OK").focus();

	eSrc.blur();

	document.body.onselectstart = function(){return false;}

	document.body.oncontextmenu = function(){return false;}

}

//成功信息

function sAlertsuccess(txt){

	var eSrc=(document.all)?window.event.srcElement:arguments[1];

	var shield = document.createElement("DIV");

	shield.id = "shield";

	shield.style.position = "absolute";

	shield.style.left = "0px";

	shield.style.top = "0px";

	shield.style.width = "100%";

	shield.style.height = ((document.documentElement.clientHeight>document.documentElement.scrollHeight)?document.documentElement.clientHeight:document.documentElement.scrollHeight)+"px";

	shield.style.background = "#333";

	shield.style.textAlign = "center";

	shield.style.zIndex = "10000";

	shield.style.filter = "alpha(opacity=0)";

	shield.style.opacity = 0;

	var alertFram = document.createElement("DIV");

	alertFram.id="alertFram";

	alertFram.style.position = "absolute";

	alertFram.style.left = "50%";

	alertFram.style.top = "50%";

	alertFram.style.marginLeft = "-225px" ;

	alertFram.style.marginTop = -75+document.documentElement.scrollTop+"px";

	alertFram.style.width = "272px";

	alertFram.style.height = "109px";

	alertFram.style.background = "";

	alertFram.style.textAlign = "center";

	alertFram.style.zIndex = "10001";

	strHtml  = "\n";

	strHtml += "<table width=\"272\" height=\"109\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" background=\"/UI/images/alertsuccess.gif\"><tr><td height=\"25\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"25\"><tr><td width=\"5\"></td><td style=\"color:#15428B; font-size:12px;\" height=\"25\" align=\"left\">提示信息</td><td width=\"20\"><a href=\"#\"><img src=\"/UI/images/alertclose.gif\" width=\"15\" height=\"15\" onclick=\"doOk();\" border=0></a></td></tr></table></td></tr><tr><td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\"54\"><tr><td width=\"70\" height=\"54\"></td><td align=\"center\" style=\" font-size:12px; color:#000000;\">"+txt+"</td><td width=\"30\"></td></tr></table></td></tr><tr><td height=\"30\" align=\"center\"><table width=\"100\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\"><tr><td align=\"center\"><input type=\"image\" name=\"imageField\" src=\"/UI/images/yes.gif\" onclick=\"doOk();\"></td></tr></table></td></tr></table>\n";

	strHtml += "\n";

	alertFram.innerHTML = strHtml;

	document.body.appendChild(alertFram);

	document.body.appendChild(shield);

	this.setOpacity = function(obj,opacity){

		if(opacity>=1)opacity=opacity/100;

		try{ obj.style.opacity=opacity; }catch(e){}

		try{ 

			if(obj.filters.length>0&&obj.filters("alpha")){

				obj.filters("alpha").opacity=opacity*100;

			}else{

				obj.style.filter="alpha(opacity=\""+(opacity*100)+"\")";

			}

		}catch(e){}

	}

	var c = 0;

	this.doAlpha = function(){

		if (++c > 20){clearInterval(ad);return 0;}

		setOpacity(shield,c);

	}

	var ad = setInterval("doAlpha()",1);

	this.doOk = function(){

		//alertFram.style.display = "none";

		//shield.style.display = "none";

		document.body.removeChild(alertFram);

		document.body.removeChild(shield);

		eSrc.focus();

		document.body.onselectstart = function(){return true;}

		document.body.oncontextmenu = function(){return true;}

	}

	//document.getElementById("do_OK").focus();

	eSrc.blur();

	document.body.onselectstart = function(){return false;}

	document.body.oncontextmenu = function(){return false;}

}



//打开新窗口，不包含垂直的滚动条

	function sAlertopen(c_width,c_height,url){

	var eSrc=(document.all)?window.event.srcElement:arguments[1];

	var shield = document.createElement("DIV");

	shield.id = "shield";

	shield.style.position = "absolute";

	shield.style.left = "0px";

	shield.style.top = "0px";

	shield.style.width = "100%";

	shield.style.height = (document.body.scrollHeight)+"px";

	shield.style.background = "#333";

	shield.style.textAlign = "center";

	shield.style.zIndex = "10000";

	shield.style.filter = "alpha(opacity=0)";

	shield.style.opacity = 0;

	var alertFram = document.createElement("DIV");

	alertFram.id="alertFram";

	alertFram.style.position = "absolute";

	alertFram.style.left ="0px" ;

	alertFram.style.top ="0px" ;

	alertFram.style.marginLeft = (document.body.scrollWidth-c_width)/2+"px" ;

	alertFram.style.marginTop = (document.body.scrollTop+(document.body.clientHeight-c_height)/2)+"px";

	alertFram.style.width = c_width+"px";

	alertFram.style.height = c_height+"px";

	alertFram.style.background = "";

	alertFram.style.textAlign = "center";

	alertFram.style.zIndex = "10001";

	strHtml  = "<ul>\n";

	strHtml += "<table width=\""+c_width+"\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\""+c_height+"\" align=\"center\"><tr><td><iframe src=\""+url+"\" height=\""+c_height+"\" width=\""+c_width+"\" frameborder=0 framespacing=0 marginheight=1 marginwidth=1 scrolling=\"no\" vspace=\"0\" name=\"coolfull\"></iframe></td></tr></table>\n";

	strHtml += "</ul>\n";

	alertFram.innerHTML = strHtml;

	document.body.appendChild(alertFram);

	document.body.appendChild(shield);

	this.setOpacity = function(obj,opacity){

		if(opacity>=1)opacity=opacity/100;

		try{ obj.style.opacity=opacity; }catch(e){}

		try{ 

			if(obj.filters.length>0&&obj.filters("alpha")){

				obj.filters("alpha").opacity=opacity*100;

			}else{

				obj.style.filter="alpha(opacity=\""+(opacity*100)+"\")";

			}

		}catch(e){}

	}

	var c = 0;

	this.doAlpha = function(){

		if (++c > 20){clearInterval(ad);return 0;}

		setOpacity(shield,c);

	}

	var ad = setInterval("doAlpha()",1);

	this.doOk = function(){

		//alertFram.style.display = "none";

		//shield.style.display = "none";

		document.body.removeChild(alertFram);

		document.body.removeChild(shield);

		eSrc.focus();

		document.body.onselectstart = function(){return true;}

		document.body.oncontextmenu = function(){return true;}

	}

	//document.getElementById("do_OK").focus();

	eSrc.blur();

	document.body.onselectstart = function(){return false;}

	document.body.oncontextmenu = function(){return false;}

}

//




//打开新窗口，包含垂直的滚动条

	function sAlertopenQuery(c_width,c_height,url){

	var eSrc=(document.all)?window.event.srcElement:arguments[1];

	var shield = document.createElement("DIV");

	shield.id = "shield";

	shield.style.position = "absolute";

	shield.style.left = "0px";

	shield.style.top = "0px";

	shield.style.width = "100%";

	shield.style.height = (document.body.scrollHeight)+"px";

	shield.style.background = "#333";

	shield.style.textAlign = "center";

	shield.style.zIndex = "10000";

	shield.style.filter = "alpha(opacity=0)";

	shield.style.opacity = 0;

	var alertFram = document.createElement("DIV");

	alertFram.id="alertFram";

	alertFram.style.position = "absolute";

	alertFram.style.left = "0px";

	alertFram.style.top = "0px";

	alertFram.style.marginLeft = (document.body.scrollWidth-c_width)/2+"px" ;

	alertFram.style.marginTop = (document.body.scrollTop+(document.body.clientHeight-c_height)/2)+"px";

	alertFram.style.width = c_width+"px";

	alertFram.style.height = c_height+"px";

	alertFram.style.background = "";

	alertFram.style.textAlign = "center";

	alertFram.style.zIndex = "10001";

	strHtml  = "<ul>\n";

	strHtml += "<table width=\""+c_width+"\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" height=\""+c_height+"\"><tr><td><iframe src=\""+url+"\" height=\""+c_height+"\" width=\""+c_width+"\" frameborder=0 framespacing=0 marginheight=1 marginwidth=1 scrolling=\"yes\" vspace=\"0\" name=\"coolfull\"></iframe></td></tr></table>\n";

	strHtml += "</ul>\n";

	alertFram.innerHTML = strHtml;

	document.body.appendChild(alertFram);

	document.body.appendChild(shield);

	this.setOpacity = function(obj,opacity){

		if(opacity>=1)opacity=opacity/100;

		try{ obj.style.opacity=opacity; }catch(e){}

		try{ 

			if(obj.filters.length>0&&obj.filters("alpha")){

				obj.filters("alpha").opacity=opacity*100;

			}else{

				obj.style.filter="alpha(opacity=\""+(opacity*100)+"\")";

			}

		}catch(e){}

	}

	var c = 0;

	this.doAlpha = function(){

		if (++c > 20){clearInterval(ad);return 0;}

		setOpacity(shield,c);

	}

	var ad = setInterval("doAlpha()",1);

	this.doOk = function(){

		//alertFram.style.display = "none";

		//shield.style.display = "none";

		document.body.removeChild(alertFram);

		document.body.removeChild(shield);

		eSrc.focus();

		document.body.onselectstart = function(){return true;}

		document.body.oncontextmenu = function(){return true;}

	}

	//document.getElementById("do_OK").focus();

	eSrc.blur();

	document.body.onselectstart = function(){return false;}

	document.body.oncontextmenu = function(){return false;}

}



////成功信息并且又弹出新窗口

	function sAlersuccessok(txt,url){

	var eSrc=(document.all)?window.event.srcElement:arguments[1];

	var shield = document.createElement("DIV");

	shield.id = "shield";

	shield.style.position = "absolute";

	shield.style.left = "0px";

	shield.style.top = "0px";

	shield.style.width = "100%";

	shield.style.height = ((document.documentElement.clientHeight>document.documentElement.scrollHeight)?document.documentElement.clientHeight:document.documentElement.scrollHeight)+"px";

	shield.style.background = "#333";

	shield.style.textAlign = "center";

	shield.style.zIndex = "10000";

	shield.style.filter = "alpha(opacity=0)";

	shield.style.opacity = 0;

	var alertFram = document.createElement("DIV");

	alertFram.id="alertFram";

	alertFram.style.position = "absolute";

	alertFram.style.left = "50%";

	alertFram.style.top = "50%";

	alertFram.style.marginLeft = "-225px" ;

	alertFram.style.marginTop = -75+document.documentElement.scrollTop+"px";

	alertFram.style.width = "272px";

	alertFram.style.height = "109px";

	alertFram.style.background = "";

	alertFram.style.textAlign = "center";

	alertFram.style.zIndex = "10001";

	strHtml  = "<ul>\n";

	strHtml += "<table width=\"272\" height=\"109\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" background=\"/UI/images/alert.gif\"><tr><td height=\"25\"><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td width=\"5\"></td><td style=\"color:#15428B; font-size:12px;\">确认提示信息</td></tr></table></td></tr><tr><td><table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\"><tr><td width=\"70\"></td><td align=\"center\" style=\" font-size:12px; color:#000000;\">"+txt+"</td><td width=\"30\"></td></tr></table></td></tr><tr><td height=\"30\" align=\"center\"><table width=\"100\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\"><tr><td align=\"center\"><a href=\""+url+"\" target=\"main-Frame\"><img src=\"/UI/images/yes.gif\" width=\"53\" height=\"21\" onclick=\"doOk();\" border=0></a></td></tr></table></td></tr></table>\n";

	strHtml += "</ul>\n";

	alertFram.innerHTML = strHtml;

	document.body.appendChild(alertFram);

	document.body.appendChild(shield);

	this.setOpacity = function(obj,opacity){

		if(opacity>=1)opacity=opacity/100;

		try{ obj.style.opacity=opacity; }catch(e){}

		try{ 

			if(obj.filters.length>0&&obj.filters("alpha")){

				obj.filters("alpha").opacity=opacity*100;

			}else{

				obj.style.filter="alpha(opacity=\""+(opacity*100)+"\")";

			}

		}catch(e){}

	}

	var c = 0;

	this.doAlpha = function(){

		if (++c > 20){clearInterval(ad);return 0;}

		setOpacity(shield,c);

	}

	var ad = setInterval("doAlpha()",1);

	this.doOk = function(){

		//alertFram.style.display = "none";

		//shield.style.display = "none";

		document.body.removeChild(alertFram);

		document.body.removeChild(shield);

		eSrc.focus();

		document.body.onselectstart = function(){return true;}

		document.body.oncontextmenu = function(){return true;}

	}

	//document.getElementById("do_OK").focus();

	eSrc.blur();

	document.body.onselectstart = function(){return false;}

	document.body.oncontextmenu = function(){return false;}

}

