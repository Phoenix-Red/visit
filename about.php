<?php
include_once('config.php');
$sqlt="select * from cnly_content where cat_id='$cat_id' order by news_order asc";
$rest=$db->query($sqlt);
$rowt=$db->getarray($rest);
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


      <div class="sub_shou_font"> 
      <?=$rowt['news_content']?>
      </div>
    </div>













</div>




</div>


<?php
include_once('footer.php');
?>
</body>
</html>
