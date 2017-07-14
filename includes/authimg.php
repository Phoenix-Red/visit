<?php
session_start();
header('Content-Type:text/html;charset=utf-8');
define('IN_cnly', true);
if (!defined('IN_cnly'))
{
   		die('Hacking attempt');
}
$image = imagecreatetruecolor(60, 22);
$color_Background = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $color_Background);
$key = array (
	'1',
	'2',
	'3',
	'4',
	'5',
	'6',
	'7',
	'8',
	'9',
	'a',
	'b',
	'c',
	'd',
	'e',
	'f',
	'g',
	'h',
	'i',
	'j',
	'k',
	'l',
	'm',
	'n',
	'p',
	'q',
	'r',
	's',
	't',
	'u',
	'v',
	'w',
	'x',
	'y',
	'z',
	'A',
	'B',
	'C',
	'D',
	'E',
	'F',
	'G',
	'H',
	'I',
	'J',
	'K',
	'L',
	'M',
	'N',
	'P',
	'Q',
	'R',
	'S',
	'T',
	'U',
	'V',
	'W',
	'X',
	'Y',
	'Z'
);
$string = null;
$char_X = 6;
$char_Y = 0;
for ($i = 0; $i < 4; $i++) {
	$char_Y = mt_rand(0, 5);
	$char = $key[mt_rand(0, 58)];
	$string .= $char;
	$color_Char = imagecolorallocate($image, mt_rand(0, 230), mt_rand(0, 230), mt_rand(0, 230));
	imagechar($image, 5, $char_X, $char_Y, $char, $color_Char);
	$char_X = $char_X +mt_rand(8, 15);
}
$line_X1 = 0;
$line_Y1 = 0;
$line_X2 = 0;
$line_Y2 = 0;
for ($i = 0; $i < mt_rand(0, 30); $i++) {
	$line_X1 = mt_rand(0, 58);
	$line_Y1 = mt_rand(0, 22);
	$line_X2 = mt_rand(0, 58);
	$line_Y2 = mt_rand(0, 22);
	$line_X1 = $line_X1;
	$line_Y1 = $line_Y1;
	$line_X2 = $line_X1 +mt_rand(1, 8);
	$line_Y2 = $line_Y1 +mt_rand(1, 8);
	$color_Line = imagecolorallocate($image, mt_rand(0, 230), mt_rand(0, 230), mt_rand(0, 230));
	imageline($image, $line_X1, $line_Y1, $line_X2, $line_Y2, $color_Line);
}
@$_SESSION['seccode'] = $string;
header("Expires: -1");
header("Cache-Control: no-store, private, post-check=0, pre-check=0, max-age=0", false);
header("Pragma: no-cache");
header('Content-Type: image/jpeg');
imagejpeg($image);
imagedestroy($image);
?>
