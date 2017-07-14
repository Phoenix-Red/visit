// JavaScript Document

$(document).ready(function(){
						   
	/*内页左侧三级分类，2013-08-19 小妖 QQ：1325678188*/				   
   $('#sub_nav h1').click(function(){
	 $(this).next('dl').slideToggle().siblings('dl').slideUp();;	
	});
		
	//导航下拉菜单，2013-08-19 小妖 QQ：1325678188*/
  $('#Navigation li').mousemove(function(){
    $(this).find('dl').slideDown();
    $(this).find('a').addClass('active');
  });
  $('#Navigation li').mouseleave(function(){
    $(this).find('dl').stop(true,false).slideUp("fast");
	$(this).find('a').removeClass('active');
			
  }); 
  $('#Navigation li').mouseleave(function(){
    $(this).find('dl').stop(true,false).slideUp("fast");
	$(this).find('a').removeClass('active');

  });
  
  //head 定位
$(function() {
	$(window).scroll(function(){
		var scrolltop=$(this).scrollTop();		
		if(scrolltop>=200){		
			$("#nav").show();
		}else{
			$("#nav").hide();
		}
	});		
	
});


  
  //首页banner图，2013-08-19 小妖 QQ：1325678188*/
		
});



try{
var marqueesHeight =18; //高度
var stopscroll     = false;
var scrollElem =   document.getElementById("zzjs_net");
with(scrollElem){
style.width     = 470;//宽度
style.height    = marqueesHeight;
style.overflow  = 'hidden';
noWrap          = true;
}
scrollElem.onmouseover = new   Function('stopscroll = true');
scrollElem.onmouseout  = new   Function('stopscroll = false');
var preTop     = 0;
var currentTop = 0;
var stoptime   = 0;
var leftElem =   document.getElementById("www_zzjs_net");
scrollElem.appendChild(leftElem.cloneNode(true));
init_srolltext();
}catch(e) {}
function init_srolltext(){
scrollElem.scrollTop = 0;
setInterval('scrollUp()', 19); //滚动速度
}
function scrollUp(){
if(stopscroll) return;
currentTop += 1;
if(currentTop == 19) { //滚动距离
stoptime += 1;
currentTop -= 1;
if(stoptime == 220) { //停顿时间
currentTop = 0;
stoptime = 0;
}
}else{
preTop = scrollElem.scrollTop;
scrollElem.scrollTop += 1;
if(preTop == scrollElem.scrollTop){
scrollElem.scrollTop = 0;
scrollElem.scrollTop += 1;
}
}
}



/*鼠标移上效果*/
/* ================================================================ 
This copyright notice must be untouched at all times.
Copyright (c) 2009 Stu Nicholls - stunicholls.com - all rights reserved.
=================================================================== */
$(document).ready(function(){

$(".wraps div").hover(function() {
	$(this).animate({"top": "-137px"}, 400, "swing");
},function() {
	$(this).stop(true,false).animate({"top": "0px"}, 400, "swing");
});

});


$(document).ready(function(){

$(".wraps_s div").hover(function() {
	$(this).animate({"top": "-143px"}, 400, "swing");
},function() {
	$(this).stop(true,false).animate({"top": "-70px"}, 400, "swing");
});

});


$(document).ready(function(){

$(".pic_wrap div").hover(function() {
	$(this).animate({"top": "-220px"}, 400, "swing");
},function() {
	$(this).stop(true,false).animate({"top": "0px"}, 400, "swing");
});

});
