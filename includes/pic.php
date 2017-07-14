<?php
//����˵��:
//$max_file_size  : �ϴ��ļ���С����, ��λBYTE
//$destination_folder : �ϴ��ļ�·��
//$watermark   : �Ƿ񸽼�ˮӡ(1Ϊ��ˮӡ,����Ϊ����ˮӡ);
//
//ʹ��˵��:
//1. ��PHP.INI�ļ������"extension=php_gd2.dll"һ��ǰ���;��ȥ��,��Ϊ����Ҫ�õ�GD��;
//2. ��extension_dir =��Ϊ���php_gd2.dll����Ŀ¼;
//
//ʹ������
//$up = new upload;
//$up->fileName = $_FILES["upfile"];�����Լ��ı�����
//$up->imgpreview=1;�Ƿ���������ͼ
//$up->sw=100;����ͼ���
//$up->sh=150;����ͼ�߶�
//$up->up();
//echo $up->bImg."<br/>"; ����ͼƬ·��
//echo $up->sImg;����ͼƬ·��
class upload {
 //�ϴ��ļ������б�
 private $uptypes = array (
  'image/jpg',
  'image/jpeg',
  'image/png',
  'image/pjpeg',
  'image/gif',
  'image/bmp',
  'image/x-png'
 );
 private $max_file_size = 2000000; //�ϴ��ļ���С����, ��λBYTE
 private $destination_folder = "../uploadfile/"; //�ϴ��ļ�·��
 private $watermark = 1; //�Ƿ񸽼�ˮӡ(1Ϊ��ˮӡ,����Ϊ����ˮӡ);
 private $waterstring = "www.kfidc.com"; //ˮӡ�ַ���
 private $waterimg = "images/logo.gif"; //ˮӡͼƬgif
 private $watertype = 2; //ˮӡ����(1Ϊ����,2ΪͼƬ)

 public $fileName; //�ļ�����
 public $imgpreview; //�Ƿ���������ͼ(1Ϊ����,����Ϊ������);
 public $sw; //����ͼ���
 public $sh; //����ͼ�߶�
 public $bImg; //��ͼ��·��
 public $sImg; //Сͼ��·��
 function up() {

  if (!is_uploaded_file($this->fileName[tmp_name]))
   //�Ƿ�����ļ�
   {
   return $this->fileName . "ͼƬ������!";
   exit;
  }

  if ($this->max_file_size < $this->fileName["size"])
   //����ļ���С
   {
   return "ͼƬ̫���˳�����$this->max_file_size������";
   exit;
  }
  //����ļ�����
  if (!in_array($this->fileName["type"], $this->uptypes)) {
   return "�ļ����ʹ���";
   exit;
  }
  //�����ļ�Ŀ¼
  if (!file_exists($this->destination_folder)) {
   mkdir($this->destination_folder);
  }
  //�ϴ��ļ�
  $tempName = $this->fileName["tmp_name"];
  $fType = pathinfo($this->fileName["name"]);
  $fType = $fType["extension"];
  $newName = $this->destination_folder;
  $sImgName = $this->destination_folder;
  $newName .= time();
  $sImgName .="small".time();
  $newName .= "." . $fType;
  $sImgName .= "." . $fType;
  if (!move_uploaded_file($tempName, $newName)) {
   return "�ƶ��ļ�����";
   exit;
  } else {

   //�Ƿ���������ͼ
   if($this->imgpreview == 1){
   
    $data=GetImageSize($newName);////ȡ��GIF��JPEG��PNG��SWFͼ�εĴ�С
    switch ($data[2]) {/////
     case 1 :
      $sImg = imagecreatefromgif($newName);
      break;
     case 2 :
      $sImg = imagecreatefromjpeg($newName);
      break;
     case 3 :
      $sImg = imagecreatefrompng($newName);
      break;
     case 6 :
      $sImg = imagecreatefromwbmp($newName);
      break;
     default :
      die("��֧�ֵ��ļ�����");
      exit;
    }
	
	//�������ű��� 
    @$w_ratio = $this->sw/$data[0]; ////$this->sw����ͼ�Ŀ��,$data[0]ԭͼ�Ŀ�ȡ�
    @$h_ratio = $this->sh/$data[1]; ////$this->sh����ͼ�ĸ߶�,$data[1]ԭͼ�ĸ߶ȡ�
	 if( ($data[0] <= $this->sw) && ($data[1]<= $this->sh) ) 
    { 
      $newwidth=$data[0];
	  $newhight=$data[1];
    } 
    else if(($w_ratio * $data[1]) < $this->sh) 
    { 
        $newhight = ceil($w_ratio * $data[1]); 
        $newwidth=$data[0];
    }
    else 
    { 
        $newwidth = ceil($h_ratio * $data[0]); 
        $newhight=$data[1];
    }
	//��������ͼ�Ĵ�С   
	  if($data[0] > $maxwidth || $data[1] > $maxheight){    
        $widthratio = $this->sw/$data[0];        
        $heightratio = $this->sh/$data[1];
        if($widthratio > $heightratio){    
                $ratio = $widthratio;    
            }else{    
                $ratio = $heightratio;    
            }    
			$newwidth = $data[0] * $ratio;
			$newheight = $data[1] * $ratio;
            $sImgDate = imagecreatetruecolor($newwidth, $newheight);    
            imagecopyresampled($sImgDate,$sImg, 0, 0, 0, 0, $newwidth, $newheight, $data[0],$data[1]);
	}else{
    //����������ͼƬ��͸�	 
	   $sImgDate=imagecreatetruecolor($this->sw,$this->sh);//����һ��ͼ���ʶ����������һ����СΪ x_size �� y_size �ĺ�ɫͼ��.
	  imagecopyresampled($sImgDate,$sImg,0,0,0,0,$this->sw,$this->sh,$data[0],$data[1]);
 	}
  
    switch ($data[2]) {
     case 1 :
      imagejpeg($sImgDate, $sImgName);
      break;
     case 2 :
      imagejpeg($sImgDate, $sImgName);
      break;
     case 3 :
      imagepng($sImgDate, $sImgName);
      break;
     case 6 :
      imagewbmp($sImgDate, $sImgName);
      break;
    }
    imagedestroy($sImgDate);
       imagedestroy($sImg);
    $this->sImg=$sImgName;
   }

   //�Ƿ�����ˮӡ
   if ($this->watermark == 2) {
    $iinfo = getimagesize($newName);
    $nimage = imagecreatetruecolor($iinfo[0], $iinfo[1]);
    $white = imagecolorallocate($nimage, 255, 255, 255);
    $black = imagecolorallocate($nimage, 0, 0, 0);
    $red = imagecolorallocate($nimage, 255, 0, 0);
    imagefill($nimage, 0, 0, $white);
    switch ($iinfo[2]) {
     case 1 :
      $simage = imagecreatefromgif($newName);
      break;
     case 2 :
      $simage = imagecreatefromjpeg($newName);
      break;
     case 3 :
      $simage = imagecreatefrompng($newName);
      break;
     case 6 :
      $simage = imagecreatefromwbmp($newName);
      break;
     default :
      die("��֧�ֵ��ļ�����");
      exit;
    }

    imagecopy($nimage, $simage, 0, 0, 0, 0, $iinfo[0], $iinfo[1]);
    switch ($this->watertype) {
     case 1 : //��ˮӡ�ַ���
      imagefilledrectangle($nimage, 1, $iinfo[1] - 15, 80, $iinfo[1], $white);
      imagestring($nimage, 2, 3, $iinfo[1] - 15, $this->waterstring, $black);
      break;
     case 2 : //��ˮӡͼƬ
      $simage1 = imagecreatefromgif($this->waterimg);
      $waterImg = getimagesize($this->waterimg);
      imagecopy($nimage, $simage1, 0, 0, 0, 0, $waterImg[0], $waterImg[1]);
      imagedestroy($simage1);
      break;
    }

    switch ($iinfo[2]) {
     case 1 :
      imagejpeg($nimage, $newName);
      break;
     case 2 :
      imagejpeg($nimage, $newName);
      break;
     case 3 :
      imagepng($nimage, $newName);
      break;
     case 6 :
      imagewbmp($nimage, $newName);
      break;
    }
    //����ԭ�ϴ��ļ�
    imagedestroy($nimage);
    imagedestroy($simage);
   }

   $this->bImg=$newName;
  }
 }

}
?>