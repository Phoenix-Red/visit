<?php
include_once('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$rows['title']?></title>
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
  <div class="ind_new">
    <div class="ind_new_tit"><span><a href="news.php?id=571&cat_id=694">更多+</a></span>
      <h2><a href="news.php?id=571&cat_id=694">公告栏<font>City introduction</font></a><font></font></h2>
    </div>
    
    
     <?php
						  $sql="select * from cnly_content where cat_id=694 and img_thumb!='' order by news_order asc,add_time desc limit 0,1";
						  $res=$db->query($sql);
						  while($row=$db->getarray($res))
						  {
						  ?>
    <div class="ind_new_con"> <a href="zy.php?id=571&cat_id=<?=$row['cat_id']?>&cid=<?=$row['id']?>"><img src="<?=$row['img_thumb']?>" width="91" height="59"></a>
      <div class="sub_newc">
        <h2><a href="zy.php?id=571&cat_id=<?=$row['cat_id']?>&cid=<?=$row['id']?>"><?=sub_str($row['news_title'],6)?></a></h2>
        <p><?=sub_str($row['news_desc'],12)?></p>
      </div>
      <div class="clear"></div>
    </div>
            <?php
}
?> 
    
    
    <div class="ind_new_ul">
      <ul>
        <?php
						  $sql="select * from cnly_content where cat_id=694 order by news_order asc,add_time desc limit 0,4";
						  $res=$db->query($sql);
						  while($row=$db->getarray($res))
						  {
						  ?>
  
        <li><a href="zy.php?id=571&cat_id=<?=$row['cat_id']?>&cid=<?=$row['id']?>"><?=sub_str($row['news_title'],12)?></a></li>
        <?php
}
?> 
      </ul>
    </div>
  </div>
  <div id="ind_banner">
    <ul class="img_list">
    <?php
						  $sql="select * from cnly_content where cat_id=671 and img_thumb!='' order by news_order asc,add_time desc limit 0,4";
						  $res=$db->query($sql);
						  while($row=$db->getarray($res))
						  {
						  ?>
      <li><a href="<?=$row['news_url']?>" target="_blank"> <img src="<?=$row['img_thumb']?>" width="490" height="221"/></a></li>
<?php
}
?>
    </ul>
    <div id="btn_width" >
      <ul id="liwidth">
       <?php
						  $sql="select * from cnly_content where cat_id=671 and img_thumb!='' order by news_order asc,add_time desc limit 0,4";
						  $res=$db->query($sql);
						  $i=1;
						  while($row=$db->getarray($res))
						  {
						  ?>
        <li> <a href="javascript:void(0);" ><?=$i;?></a></li>
        <?php
		$i++;
}
?>

      </ul>
    </div>
  </div>
  <div class="ind_gong">
    <div class="ind_gong_tit"><span><a href="news.php?id=571&cat_id=691">more+</a></span>
      <h2><a href="news.php?id=571&cat_id=691">旅游动态</a></h2>
    </div>
    <?php
						  $sql="select * from cnly_content where cat_id=691 and img_thumb!='' order by news_order asc,add_time desc limit 0,1";
						  $res=$db->query($sql);
						  while($row=$db->getarray($res))
						  {
						  ?>
    <div class="ind_new_con"> <a href="zy.php?id=571&cat_id=<?=$row['cat_id']?>&cid=<?=$row['id']?>"><img src="<?=$row['img_thumb']?>" width="91" height="59"></a>
      <div class="sub_newc">
        <h2><a href="zy.php?id=571&cat_id=<?=$row['cat_id']?>&cid=<?=$row['id']?>"><?=sub_str($row['news_title'],6)?></a></h2>
        <p><?=sub_str($row['news_desc'],12)?></p>
      </div>
      <div class="clear"></div>
    </div>
            <?php
}
?> 
    <div class="ind_new_ul">
      <ul>
        <?php
						  $sql="select * from cnly_content where cat_id=691 order by news_order asc,add_time desc limit 0,4";
						  $res=$db->query($sql);
						  while($row=$db->getarray($res))
						  {
						  ?>
  
        <li><a href="zy.php?id=571&cat_id=<?=$row['cat_id']?>&cid=<?=$row['id']?>"><?=sub_str($row['news_title'],12)?></a></li>
        <?php
}
?> 
      </ul>
    </div>
  </div>
</div>
<div class="kong"></div>
<div class="wrap">
  <div class="ind_lvca">
    <div class="ind_lvca_tit"><span><a href="news.php?id=590&cat_id=590">更多 +</a></span>
      <h2><a href="news.php?id=590&cat_id=590">旅游六要素 <font>Elements</font></a><font></font></h2>
    </div>
    <div class="kong"></div>
    <div class="ind_lvca_con">
      <ul>
      
      <?php
	  $sqlm="select * from cnly_class where pid=590 order by class_order asc limit 0,6";
	  $resm=$db->query($sqlm);
	  while($rowm=$db->getarray($resm))
	  {
	  $dd=$rowm['id'];
	  ?>
        <li>
          <div class="ind_chih">
            <div class="ind_chih2">
              <h2><a href="news.php?id=590&cat_id=<?=$rowm['id']?>"><?=$rowm['class_name']?></a></h2>
            </div>
            
             <?php
						  $sql="select * from cnly_content where cat_id=$dd order by news_order asc,add_time desc limit 0,2";
						  $res=$db->query($sql);
						  while($row=$db->getarray($res))
						  {
						  ?>
  
        
            <div class="ind_chih_con"> <a href="zy.php?id=590&cat_id=<?=$row['cat_id']?>&cid=<?=$row['id']?>"><img src="images/lvyou_18.jpg" width="91" height="59"></a>
              <div class="ind_chih_cp">
                <h2><a href="zy.php?id=590&cat_id=<?=$row['cat_id']?>&cid=<?=$row['id']?>"><?=sub_str($row['news_title'],12)?></a></h2>
                <p><?=sub_str($row['news_desc'],24)?>...<a href="zy.php?id=590&cat_id=<?=$row['cat_id']?>&cid=<?=$row['id']?>">更多>></a></p>
              </div>
              <div class="clear"></div>
            </div>
            <div class="ind_chih_line"></div>
             <?php
}
?> 
            
            
          </div>
        </li>
        <?php
		}
		?>

        <div class="clear"></div>
      </ul>
      <div class="clear"></div>
    </div>
  </div>
</div>
<div class="kong"></div>
<div class="wrap">
  <div class="ind_chang">
    <div class="ind_gong_tit"><span><a href="news.php?id=622&cat_id=622">more+</a></span>
      <h2><a href="news.php?id=622&cat_id=622"> 旅游小知识</a></h2>
    </div>
    
     <?php
						  $sql="select * from cnly_content where cat_id in (select id from cnly_class where pid=622) and img_thumb!='' order by news_order asc,add_time desc limit 0,1";
						  $res=$db->query($sql);
						  while($row=$db->getarray($res))
						  {
						  ?>
    <div class="ind_new_con"> <a href="zy.php?id=622&cat_id=<?=$row['cat_id']?>&cid=<?=$row['id']?>"><img src="<?=$row['img_thumb']?>" width="91" height="59" /></a>
      <div class="ind_newc_c">
        <h2><a href="zy.php?id=622&cat_id=<?=$row['cat_id']?>&cid=<?=$row['id']?>"><?=sub_str($row['news_title'],12)?></a></h2>
        <p><?=sub_str($row['news_title'],24)?></p>
      </div>
      <div class="clear"></div>
    </div>
     <?php
}
?> 
    
    <div class="ind_chan_con">
      <ul>
        <?php
						  $sql="select * from cnly_content where cat_id in (select id from cnly_class where pid=622) order by news_order asc,add_time desc limit 0,4";
						  $res=$db->query($sql);
						  while($row=$db->getarray($res))
						  {
						  ?>
  
        <li><a href="zy.php?id=622&cat_id=<?=$row['cat_id']?>&cid=<?=$row['id']?>"><?=sub_str($row['news_title'],35)?></a></li>
        <?php
}
?> 
      
      </ul>
    </div>
  </div>
  <div class="ind_weib">
    
    <div class="ind_new_con">
      <iframe src="http://lvyou.lywww.com/index.php?ctl=mall" width="321" height="252">
此处引用了框架技术，但是您的浏览器不支持框架或浏览器默认屏蔽iframe标签显示，请升级您的浏览器以便正常访问脚本之家。
      </iframe> 
      <!-- <iframe width="321" height="252" class="share_self"  frameborder="0" scrolling="no" src="http://weibo.com/p/1001062024833771/home?from=page_100106&mod=TAB#place"></iframe> -->
      <!-- http://widget.weibo.com/weiboshow/index.php?language=&width=0&height=550&fansRow=2&ptype=1&speed=300&skin=1&isTitle=1&noborder=0&isWeibo=1&isFans=0&uid=2710605311&verifier=f02a7c5b&dpc=1 -->

    </div>
  </div>
  <div class="ind_messge">
    <div class="ind_gong_tit"><span></span>
      <h2><a>在线留言</a></h2>
    </div>
    <div class="ind_messge_con">
      <div class="message_show_s">
      <script language="javascript">
	  function checklogin()
	  {
	      if(document.login.book_name.value=='')
				  {
				     alert('请输入姓名');
					 return false;
				  }
				  if(document.login.book_dianhua.value=='')
				  {
				     alert('请输入联系方式');
					 return false;
				  }
				   if(document.login.book_connect.value=='')
				  {
				     alert('请输入留言内容');
					 return false;
				  }
	  }
	  </script>
        <form action="" method="post" class="book"  name="login" id="login" onSubmit="return checklogin();" >
            <input type="hidden" name="act" value="add" />
          <table width="97%" border="0" cellspacing="4" cellpadding="0">
            <tr>
              <th width="30%" align="right">姓  名：</th>
              <td width="70%" align="left" class="tip"><input name="book_name" type="text" class="text_bgg" id="c_txt_Name" value="" />
              </td>
            </tr>
            <tr>
              <th align="right">联系方式：</th>
              <td align="left" class="tip"><input name="book_dianhua" type="text" class="text_bgg" id="c_txt_QQ" value="" /></td>
            </tr>
            <tr>
              <th align="right">留言内容：</th>
              <td align="left"><textarea name="book_connect" class="text_areag" id="c_txt_Content"></textarea>
              </td>
            </tr>
            <tr>
              <td align="right">&nbsp;</td>
              <td align="left"><input name="button" type="submit" class="chanpint2g" id="button" value="填好了，立即提交！" /></td>
            </tr>
          </table>
        </form>
          <?php 
	$act = !empty($_POST['act']) ? trim($_POST['act']) :'';
	if($act=="add")
	{
		$book_name=!empty($_POST['book_name'])? htmlspecialchars(trim($_POST['book_name'])):'';	
		$book_dianhua=!empty($_POST['book_dianhua'])? htmlspecialchars(trim($_POST['book_dianhua'])) :'';
		
		$book_connect=!empty($_POST['book_connect'])?  htmlspecialchars(trim($_POST['book_connect'])):'';
	   
		$book_time=date("Y-m-d H:i:s",time()+8*3600);
		$sql="insert into  cnly_guestbook(book_name,book_dianhua,book_connect,book_time) values ('$book_name','$book_dianhua','$book_connect','$book_time')";

		if($db->query($sql))
		{
			echo "<script>alert('留言成功请等待审核......');location.href='index.php';</script>";
		}
		else
		{
		echo "<script>alert('留言失败,请稍后再试......');location.href='index.php';</script>";
		}
	}
	?>
        
        
      </div>
    </div>
  </div>
  <div class="clear"></div>
</div>
<div class="kong"></div>
<div class="wrap">
  <div class="ind_link">
    <div class="ind_link_tit"><span></span>
      <h2><a>友情链接</a></h2>
    </div>
    <div class="ind_link_con">
     <?php
						  $sql="select * from cnly_content where cat_id=510 order by news_order asc,add_time desc";
						  $res=$db->query($sql);
						  $i=0;
						  while($row=$db->getarray($res))
						  {
						  ?>
 <?php if($i!=0){ ?><span>|</span><?php } ?><a href="<?=$row['news_url']?>" target="_blank"><?=$row['news_title']?></a>
 <?php
$i++;
 }
 ?>
   
 </div>
  </div>
</div>
<?php
include_once('footer.php');
?>
</body>
</html>
