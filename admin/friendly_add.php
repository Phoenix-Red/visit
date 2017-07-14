<?php 
	define('IN_cnly', true);
	if (!defined('IN_cnly'))
	{
   		die('Hacking attempt');
	}
	
	include_once("includes/init.php");
	include_once("sessioncheck.php");
?>
<HTML><HEAD><TITLE>主要内容</TITLE>
<META content="noindex, nofollow" name=robots>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.2900.3086" name=GENERATOR>
<script language="javascript" src="js/pub.js"></script>
<script type="text/javascript" language="javascript" src="../editor/kindeditor.js"></script>
<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
				},afterBlur: function(){this.sync();}
			});
			prettyPrint();
		});
	</script>
<script type="text/javascript"> 
function check(){   
        if(document.form1.news_title.value==""){
			alert("请输入标题");
			return false;
		}
		 if(document.form1.cat_id.value==""){
			alert("请选择分类");
			return false;
		}
		if(document.form1.add_time.value==""){
			alert("请选择时间");
			return false;
		}
}
</script> 
<script type="text/javascript" language="javascript" src="js/calendar.js"></script>

<link href="css.css" rel="stylesheet" type="text/css">
</HEAD>
<BODY>
<div id=hiddenDiv style="filter:Alpha(opacity=10);">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="border-left:1px solid #B7E6B0;border-right:1px solid #B7E6B0;">
  <tr>
    <td height="30" background="images/main_title_bg.jpg">&nbsp;&nbsp;您的当前位置：<a href="#">系统首页</a> > 友情链接添加</td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="10"></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10"></td>
        <td valign="top"><table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#D2FFD2" style="border:1px solid #BCE8B5">
          <tr>
            <td align="right"><table width="70" height="22" border="0" cellpadding="0" cellspacing="0" bgcolor="#009900" onMouseOver="this.style.backgroundColor='#003300';" onMouseOut="this.style.backgroundColor='#009900';">
              <tr>
                <td align="center"><img src="images/icon_list.gif" width="16" height="16"></td>
                <td align="center"><p style="margin-top:3px"><a href="friendly_list.php" style="font-size:12px; font-weight:normal; color:#FFFFFF">链接列表</a></p></td>
                </tr>
            </table></td>
          </tr>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <form action="?act=add" method="post" enctype="multipart/form-data" name="form1" onSubmit="return check();"><tr>
              <td>
  <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">

    <tr>
      <td width="120" align="right" bgcolor="#FFFFFF"><strong>网站名称：</strong></td>
      <td bgcolor="#FFFFFF"><input name="news_title" type="text" style="width:450px;" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor'"></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>链接分类：</strong></td>
      <td bgcolor="#FFFFFF"><select name="cat_id" id="select">
        <option value="">请选择分类</option>
        <?php
                    sub_class(509,"");
                    function sub_class($pid,$cut)
                    {
                        $sql = "SELECT * FROM cnly_class WHERE pid='$pid' ORDER BY class_order ASC,id DESC";
                        $res = mysql_query($sql);
                        while($row = mysql_fetch_array($res))
                        {
                			echo "<option value='".$row['id']."'>".$cut.$row['class_name']."</option>";
                            sub_class($row['id'],'|--'.$cut);
                        }
                    }
                ?>
      </select></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>链接图片：</strong></td>
      <td bgcolor="#FFFFFF"><input type="file" name="img_thumb" id="img_thumb"></td>
      </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>链接地址：</strong></td>
      <td bgcolor="#FFFFFF"><input name="news_url" type="text" style="width:450px;" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor'" value="http://"></td>
    </tr>
    <tr>
      <td align="right" bgcolor="#FFFFFF"><strong>发布时间：</strong></td>
      <td bgcolor="#FFFFFF"><input name="add_time" type="text" style="width:450px;" class="inputuser" onBlur="this.className='inputuser'" onFocus="this.className='inputuser-bor';setday(this);" value="<?=date("Y-m-d H:i:s")?>"></td>
    </tr>
  </table>

</td>
            </tr><tr><td height="35"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="10"></td>
  </tr>
</table>
                <table width="100%" border="0" cellspacing="0" cellpadding="5" style="border:1px solid #BCE8B5">
                  <tr>
                    <td bgcolor="D2FFD2"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" width="75"><input name="Submit2" type="submit" class="button" value="添加" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'" ></td>
                        <td align="center" width="75" ><input name="Submit2" type="reset" class="button" value="重置" onMouseMove="this.className='button-bor'" onMouseOut="this.className='button'"></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
</td>
            </tr></form>
          </table></td>
        <td width="10"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" height="25">
          <center>
           
            
          </center></td>
  </tr>
</table>
<?php
	$act = !empty($_GET['act']) ? trim($_GET['act']) : '';
	if($act == 'add')
	{
		function getnames($exname)
		{
    		$dir = "../uploadfile/".date("Y-n-j",time()+3600*8)."/";
    		$i=1;
    		if(!is_dir($dir))
			{
       			mkdir($dir,0777);
    		}
    		while(true){
        		if(!is_file($dir.$i.".".$exname))
				{
					$name=$i.".".$exname;
					break;
     			}
     			$i++;
   			}
    		return $dir.$name;
		}
		$news_title = !empty($_POST['news_title']) ? trim($_POST['news_title']) : '';
		$cat_id = !empty($_POST['cat_id']) ? intval($_POST['cat_id']) : '';
		$news_desc = !empty($_POST['news_desc']) ? $_POST['news_desc'] : '';
		$news_content = !empty($_POST['content']) ? trim($_POST['content']) : '';
		//img_thumb img_src
		$img_thumb = "";
		$news_url = !empty($_POST['news_url']) ? trim($_POST['news_url']) : '';
		$add_time = !empty($_POST['add_time']) ? trim($_POST['add_time']) : '';
		/*上传附件*/
		if(!empty($_FILES['img_thumb']['name']))
		{
			$exname=strtolower(substr($_FILES['img_thumb']['name'],(strrpos($_FILES['img_thumb']['name'],'.')+1)));
			$img_thumb = getnames($exname);//上传后文件所在的路径、、写入数据库
			if(!move_uploaded_file($_FILES['img_thumb']['tmp_name'], $img_thumb))
			{
				echo "<script>alert('附件上传失败');history.go(-1);<script>";
				exit();	
			}
			$img_thumb = str_replace("../", "", $img_thumb); 
		}
		$sql = "INSERT INTO cnly_content(cat_id,news_title,news_desc,news_content,add_time,img_thumb,news_url,type) 
						VALUES('$cat_id','$news_title','$news_desc','$news_content','$add_time','$img_thumb','$news_url','3')";
		if($db->query($sql))
		{
			urlMsg('添加成功','friendly_list.php');
		}
		else
		{
			goBakMsg("添加失败");	
		}
		
	}
	mysql_close($db->connect());
?>
</div>
</BODY></HTML>