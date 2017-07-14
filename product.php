<?php
include_once('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$rowa['class_name']?>-<?=$rows['title']?></title>
<meta name="keywords" content="<?=$rows['keywords']?>" />
<meta name="description" content="<?=$rows['description']?>" />
<link href="css/css_index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.yysweb.js"></script>
<script type="text/javascript" src="js/banner_jq.js"></script>
</head>
<body>
<?php
include_once('header.php');
?>


<div class="wrap">

<?php 
include_once('left.php');
?>

<div class="sub_right">

<div class="sub_right_tit"><span>当前所在的位置：<a href="index.php">首页</a> > <?=$rowa['class_name']?></span><h2><?=$rowa['class_name']?><font><?=$rowa['eng_name']?>
</font></h2></div>


<div class="sub_right_bg">

<div class="sub_case_ul">
          <ul>
  <?php
			$sqlwhere="";
			if(!empty($cat_id))
			{
			//$sqlwhere=" cat_id='$cat_id'";
		$sqlwhere.=" cat_id='$cat_id' or cat_id in (select id from cnly_class where pid=$cat_id)";
			}
			$countSql="SELECT * FROM cnly_content WHERE $sqlwhere";//sql语句 // 查询总个数
			$pageSize="20"; //每页显示数
			$curPage= !empty($_GET['curPage']) ? intval($_GET['curPage']) :0;//通过GET传来的当前页数
			$urlPara= $KeyWord."cat_id=".$cat_id;//这是URL后面跟的参数，也就是问号传值
		    $pageid="id=".$id;
			$pageOutStr=reterPageStrSam($pageSize,$curPage,$countSql,$urlPara,$pageid);
			$pageOutStrArr=explode("||",$pageOutStr);
			$rsStart=$pageOutStrArr[0];//limit 后的第一个参数
			$pageStr=$pageOutStrArr[2];//limit 后的第二个参数
			$pageCount=$pageOutStrArr[1];//总页数
			$sql = "SELECT *  from cnly_content WHERE $sqlwhere  ORDER BY news_order ASC,add_time DESC LIMIT $rsStart, $pageSize";
			$res=$db->query($sql);
			while($row=$db->getarray($res))
			{
		?>            
          
            <li> <a href="show.asp"><img src="<?=$row['img_thumb']?>" width="152" height="99" /></a>
              <div class="sub_case_con">
                <h2><span><?=substr($row['add_time'],0,10)?></span><a href="zy.php?id=<?=$id?>&cat_id=<?=$cat_id?>&cid=<?=$row['id']?>"><?=$row['news_title']?></a></h2>
                <p><?=$row['news_desc']?><span><a href="zy.php?id=<?=$id?>&cat_id=<?=$cat_id?>&cid=<?=$row['id']?>">查看更多>></a></span></p>
              </div>
              <div class="spacer"></div>
            </li>
            <?php
	  }
	  ?>   
        </ul>
        </div>

      
    <div class="content_page"><?=$pageStr?></div>




</div>







</div>





</div>

<?php
include_once('footer.php');
?>
</body>
</html>
