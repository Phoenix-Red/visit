<div class="sub_left">
<div class="sub_meut_bg">
<div class="sub_left_tit"><h2><?=$rowd['class_name']?><font><?=$rowd['eng_name']?>
</font></h2></div>
<div class="sub_meut">


<ul>

               <?php
						  $sql="select * from cnly_class where pid=$id order by class_order asc";
						  $res=$db->query($sql);
						  while($row=$db->getarray($res))
						  {
						  ?>           
<li><a href="<?=$row['leixing']?>.php?id=<?=$id?>&cat_id=<?=$row['id']?>" <?php if($row['id']==$cat_id){ ?> class="hover" <?php } ?>><?=$row['class_name']?></a></li>
  <?php
				}
				?>
</ul>

</div> 

</div>


<div class="kong"></div>

<div class="sub_new">
    <div class="ind_new_tit"><span><a href="news.php?id=571&cat_id=694">更多+</a></span>
      <h2><a href="news.php?id=571&cat_id=694">公告栏<font>Bulletin board
</font></a></h2>
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


</div>