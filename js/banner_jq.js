
/**通用焦点大小图切换构建函数**/
/*
 * 
 * 需要自行设定类/feature_list/feature_tabs/feature_tab/feature_out
 * */
var FeatureList = function(fobj,options) {
  function feature_slide(nr) {
    if (typeof nr == "undefined") {
      nr = visible_idx + 1;
      nr = nr >= total_items ? 0 : nr;
    }

    tabs.removeClass(onclass).addClass(offclass).filter(":eq(" + nr + ")").removeClass(offclass).addClass(onclass);
    output.stop(true, true).filter(":visible").hide();
	    output.filter(":eq(" + nr + ")").fadeIn("slow",function() {
	    visible_idx = nr; 
    });
  }

  fobj = (typeof(fobj) == 'string')?$(fobj):fobj;
  fobj = $(fobj).eq(0);
  if(!fobj || fobj.size() == 0) return;

  //轮询间隔，默认2S
  var options      = options || {};
  var visible_idx  = options.startidx || 0;
  var onclass = options.onclass || "current";
  var offclass = options.offclass || "";
  var speed = options.speed || 10000;
  options.pause_on_act = options.pause_on_act || "click";
  options.interval  = options.interval  || 50000;

  var tabs = fobj.find("#liwidth li");
  var output = fobj.find(".img_list li");
  var total_items = tabs.length;
 
  //初始设定
  output.hide().eq( visible_idx ).fadeIn("slow");
  tabs.eq( visible_idx ).addClass(onclass);

  if (options.interval > 0) {
    var timer = setInterval(function () {
      feature_slide();
    }, options.interval);
    output.mouseenter(function() {clearInterval( timer );}).mouseleave(function() {clearInterval( timer );timer = setInterval(function () {feature_slide();}, options.interval);});
    if (options.pause_on_act == "mouseover") {
        tabs.mouseenter(function() {
        clearInterval( timer );
        
        var idx = tabs.index($(this));
        feature_slide(idx);
      }).mouseleave(function() {
        clearInterval( timer );
        timer = setInterval(function () {
          feature_slide();
        }, options.interval);
      });
    } else {
        tabs.click(function() {
        clearInterval( timer );
        var idx = tabs.index($(this));
        feature_slide(idx);
      });
    }
  }
}

$(document).ready(function(){
   var padl=$(window).width()- $('#liwidth').outerWidth();//获取浏览器窗口的宽度减去li的总宽度=padl
  
       FeatureList(
	  "#ind_banner", {
      "onclass": "hover",
      "offclass": "btn",
      "pause_on_act": "mouseover",
      "interval": 2000,
      "speed": 5
    });
});