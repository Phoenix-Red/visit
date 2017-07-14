<?php
include_once('config.php');
$sqlss="update cnly_content set hit=hit+1 where id='$cat_id'";
$db->query($sqlss);
$sqlt="select * from cnly_content where id='$cid'";
$rest=$db->query($sqlt);
$rowt=$db->getarray($rest);
$bb=$rowt['cat_id'];
$sqla="select * from cnly_class where id=$bb";
$res=$db->query($sqla);
$rowa=$db->getarray($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
if($rowt['fbr']!='')
{
?>
<title><?=$rowt['fbr']?></title>
<?php
}else{
?>
<title><?=$rowa['class_name']?>-<?=$rows['title']?></title>
<?php
} 
?>
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

<div class="sub_show">
      <h3 class="biaoti"><?=$rowt['news_title']?></h3>
      <p class="laiyuan">来源：<?=$rowt['laiyuan']?>　   发布时间：<?=$rowt['add_time']?>  　浏览次数：<?=$rowt['hit']?> 次</p>
      <div class="sub_shou_font">
      <?=$rowt['news_content']?>
      
        <div class="fen">
          <!-- Baidu Button BEGIN -->
          <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">  <a class="bds_qzone"> </a> <a class="bds_tsina"></a> <a class="bds_tqq"></a> <a class="bds_renren"></a> <a class="shareCount"></a> </div>
          <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=0" ></script>
          <script type="text/javascript" id="bdshell_js"></script>
          <script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script>
          <!-- Baidu Button END -->
          <div class="clear"></div>
        </div>
        <div class="1`q">
 
         <p> 
         
        <?php 
					$sql="select * from cnly_content where cat_id='$cat_id' and id<'$cid' order by id desc limit 0,1"; 
					$res=$db->query($sql);
					$row=$db->getarray($res); 
					if(!empty($row['news_title']))
					{
					?>
					<a href="zy.php?id=<?=$id?>&cat_id=<?=$cat_id?>&cid=<?=$row['id']?>"> <b>上一篇：</b>：<?=sub_str($row['news_title'],30)?></a>
					<?php 
					}else{
					?>
                     <b>上一篇：</b>：没有了
                    <?php
					}
					?>	<br/>
                    <?php 
					$sql="select * from cnly_content where cat_id='$cat_id' and id>'$cid' order by id asc limit 0,1"; 
					$res=$db->query($sql);
					$row=$db->getarray($res); 
					if(!empty($row['news_title']))
					{
					?>
					<a href="zy.php?id=<?=$id?>&cat_id=<?=$cat_id?>&cid=<?=$row['id']?>"><b>下一篇：</b>：<?=sub_str($row['news_title'],30)?></a>
					<?php 
					}else{
					?>
                    <b>下一篇：</b>：没有了
                    <?php
					}
					?>	
           </p>
            
            
        </div>
      </div>
    </div>
</div>
</div>
</div>
<?php
include_once('footer.php');
?>
</body>
</html>
