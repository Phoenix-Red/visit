<?php
if (!defined('IN_cnly'))
{
    die('Hacking attempt');
}
/*参数说明: 
        $pageSize  每页显示数
        $curPage 当前页（就是是通过GET方式传来的页数）
        $countSql SQL语句
        $pagePara URL后面跟的参数(也可以是空的)！ 
		调用函数reterPageStrSam($pageSize,$curPage,$countSql,$pagePara)，并按参数说明中的要求传入参数，就OK了！
*/
function reterPageStrSam($pageSize,$curPage,$countSql,$pagePara){ 
       	 mysql_query("SET NAMES 'utf8'"); 
	   	 $result = mysql_query($countSql);
         $rsCount  = @mysql_num_rows($result);
		 $pageCount=ceil($rsCount/$pageSize);
		
         if (!isset($curPage)) $curPage=1;
         if($curPage<=1) $curPage=1;
		  if(empty($curPage)) $curPage=1;

         if($curPage>=$pageCount) $curPage=$pageCount;
         $rsStart=(int)($curPage-1)*$pageSize;
		 if($rsStart<0)
		 {
		 	$rsStart = 0;
		 }
		if($curPage==0) $curPage=1;
         $pageStr=outPageListSam($pageCount,$curPage,$pagePara);
         $outStr=$rsStart."||". $pageCount."||".$pageStr."||".$rsCount;
         return $outStr;
}
function outPageListSam($pageCount,$curPage,$pagePara){ 
         $pageListNum=10;
         $step=5;
         $pageStr=""; 
         $prePage=$curPage-1;
         $nextPage=$curPage+1; 
         $pageFromNum=$curPage-$step;
         $pageToNum=$curPage+$step;
 	if($pageCount<$step){
          $pageFromNum=1;
          $pageToNum=$pageCount;
 	}else if($pageCount<$pageListNum){
          $pageFromNum=1;
          $pageToNum=$pageCount;
 	} else if ($pageToNum>$pageCount){ 
          $pageToNum=$pageCount;
             if(($pageToNum-$pageFromNum)<$pageListNum){
                      $pageFromNum=$pageToNum-$pageListNum+1;
             }
	}else{
            if($pageFromNum<1){
                       $pageFromNum=1;
                       $pageToNum=$curPage+$step-1;
            }
}
 /*开始输出 */
 $pageStr.=" 
 <style>
 /*分页样式*/
DIV.scott {
	PADDING-RIGHT: 3px; PADDING-LEFT: 3px; PADDING-BOTTOM: 3px; MARGIN: 3px; PADDING-TOP: 3px; TEXT-ALIGN: center
}
DIV.scott A {
	BORDER-RIGHT: #ddd 1px solid; PADDING-RIGHT: 5px; BORDER-TOP: #ddd 1px solid; PADDING-LEFT: 5px; PADDING-BOTTOM: 2px; BORDER-LEFT: #ddd 1px solid; COLOR: #88af3f; MARGIN-RIGHT: 2px; PADDING-TOP: 2px; BORDER-BOTTOM: #ddd 1px solid; TEXT-DECORATION: none
}
DIV.scott A:hover {
	BORDER-RIGHT: #85bd1e 1px solid; BORDER-TOP: #85bd1e 1px solid; BORDER-LEFT: #85bd1e 1px solid; COLOR: #638425; BORDER-BOTTOM: #85bd1e 1px solid; BACKGROUND-COLOR: #f1ffd6
}
DIV.scott A:active {
	BORDER-RIGHT: #85bd1e 1px solid; BORDER-TOP: #85bd1e 1px solid; BORDER-LEFT: #85bd1e 1px solid; COLOR: #638425; BORDER-BOTTOM: #85bd1e 1px solid; BACKGROUND-COLOR: #f1ffd6
}
DIV.scott SPAN.current {
	BORDER-RIGHT: #b2e05d 1px solid; PADDING-RIGHT: 5px; BORDER-TOP: #b2e05d 1px solid; PADDING-LEFT: 5px; FONT-WEIGHT: bold; PADDING-BOTTOM: 2px; BORDER-LEFT: #b2e05d 1px solid; COLOR: #fff; MARGIN-RIGHT: 2px; PADDING-TOP: 2px; BORDER-BOTTOM: #b2e05d 1px solid; BACKGROUND-COLOR: #b2e05d
}
DIV.scott SPAN.disabled {
	BORDER-RIGHT: #f3f3f3 1px solid; PADDING-RIGHT: 5px; BORDER-TOP: #f3f3f3 1px solid; PADDING-LEFT: 5px; PADDING-BOTTOM: 2px; BORDER-LEFT: #f3f3f3 1px solid; COLOR: #ccc; MARGIN-RIGHT: 2px; PADDING-TOP: 2px; BORDER-BOTTOM: #f3f3f3 1px solid
}
 </style>
 <div class=\"scott\">
    共有".$pageCount."页&nbsp;&nbsp;&nbsp;当前为第".$curPage."页&nbsp;&nbsp;&nbsp;";
  $curPage!=1?$pageStr.="<a href=?curPage=1&$pagePara>第一页</a><a href=?curPage=1&$pagePara>上一页</a>":$pageStr.="<a href='javascript:void(0);'>第一页</a><a href='javascript:void(0);'>上一页</a>";
 for($i=$pageFromNum;$i<=$pageToNum;$i++){
	$curPage==$i ? $pageStr.="<span class='current'>$i</span>" : 
	$pageStr.="<a href=?curPage=$i&$pagePara>$i</a>";
  }  
	$curPage!=$pageCount ? $pageStr.="<a href=?curPage=$nextPage&$pagePara>下一页</a><a href=?curPage=$pageCount&$pagePara>最末页</a>" : 
	$pageStr.="<a href='javascript:void(0);'>下一页</a><a href='javascript:void(0);'>最末页</a>";
 $pageStr.="</div>";

 /*输出分页结束 */ 
 return $pageStr;
}

//下面是举例使用

/*$countSql="SELECT * FROM table";//sql语句
$pageSize="10"; //每页显示数
$curPage=$_GET['curPage'];//通过GET传来的当前页数
$urlPara= $KeyWord;//这是URL后面跟的参数，也就是问号传值

$pageOutStr=reterPageStrSam($pageSize,$curPage,$countSql,$urlPara);
$pageOutStrArr=explode("||",$pageOutStr);
$rsStart=$pageOutStrArr[0];//limit 后的第一个参数
$pageStr=$pageOutStrArr[2];//limit 后的第二个参数
$pageCount=$pageOutStrArr[1];//总页数
$sql = "SELECT * FROM table ORDER BY id DESC LIMIT $rsStart, $pageSize";
$res = $db->query($sql);
while($row = $db->getarray($res)){
 
	echo($row['id']);
 }
//输出分页
echo $pageStr;
//翻页--end--*/
?>