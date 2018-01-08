<?php
session_start();
$code=rand(1000,9999);
$_SESSION["code"]=$code;
$im = imagecreatetruecolor(50, 25);
$black = imagecolorallocate($im, 0, 0, 0);
$bg = imagecolorallocate($im, 20, 86, 155); //background color blue
$fg = imagecolorallocate($im, 255, 255, 255);//text color white
imagefill($im, 0, 0, $bg);
imagestring($im, 5, 5, 5,  $code, $fg);
imageline($im, 3, 15, 70, 15, $bg);
imageline($im, 1, 10, 70, 10, $bg);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>
