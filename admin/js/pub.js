// JavaScript Document

/*function hideinfo()
{
	 if(event.srcElement.tagName=="A")
	 {//如果触发函数的对象是链接
	//设置状态栏的显示为链接的文本
		window.status=event.srcElement.innerText
	 }
}
document.onmouseover=hideinfo          //鼠标移上时调用 hideinfo 函数
document.onmousemove=hideinfo         //鼠标移动时调用 hideinfo 函数
document.onmousedown=hideinfo        //鼠标按下时调用 hideinfo 函数*/
 

function killErrors()
{
	return true;
}
window.onerror = killErrors;
/*function document.oncontextmenu() 
{ 
return false; 
} */


  function mOvr(src,clrOver){ 

	  if (!src.contains(event.fromElement)) { 

		  src.style.cursor = 'hand'; 

		  src.bgColor = clrOver; 

	  }

  }

  function mOut(src,clrIn)  { 

	  if (!src.contains(event.toElement)) { 

		  src.style.cursor = 'default'; 

		  src.bgColor = clrIn; 

	  }

  } 



var imgPlus = new Image();

imgPlus.src = "images/menu_plus.gif";

function rowClicked(obj)

{

  obj = obj.parentNode.parentNode;



  var tbl = document.getElementById("list-table");

  var lvl = parseInt(obj.className);

  var fnd = false;



  for (i = 0; i < tbl.rows.length; i++)

  {

      var row = tbl.rows[i];



      if (tbl.rows[i] == obj)

      {

          fnd = true;

      }

      else

      {

          if (fnd == true)

          {

              var cur = parseInt(row.className);

              if (cur > lvl)

              {

                  row.style.display = (row.style.display != 'none') ? 'none' : (Browser.isIE) ? 'block' : 'table-row';

              }

              else

              {

                  fnd = false;

                  break;

              }

          }

      }

  }



  for (i = 0; i < obj.cells[0].childNodes.length; i++)

  {

      var imgObj = obj.cells[0].childNodes[i];

      if (imgObj.tagName == "IMG" && imgObj.src != 'images/menu_arrow.gif')

      {

          imgObj.src = (imgObj.src == imgPlus.src) ? 'images/menu_minus.gif' : imgPlus.src;

      }

  }

}

var Browser = new Object();



Browser.isMozilla = (typeof document.implementation != 'undefined') && (typeof document.implementation.createDocument != 'undefined') && (typeof HTMLDocument != 'undefined');

Browser.isIE = window.ActiveXObject ? true : false;

Browser.isFirefox = (navigator.userAgent.toLowerCase().indexOf("firefox") != - 1);

Browser.isSafari = (navigator.userAgent.toLowerCase().indexOf("safari") != - 1);

Browser.isOpera = (navigator.userAgent.toLowerCase().indexOf("opera") != - 1);




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

	var ad = setInterval("doAlpha()",0);

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