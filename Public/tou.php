<?php
session_start();
ini_set('memory_limit','100M');
if($_SESSION['user_id']==""){
	echo json_encode(array('error'=>'非法操作','msg'=>$msg,'imgSize'=>$imgSize));
	exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	
	$targ_w = $targ_h = 150;//图片宽高
	$jpeg_quality = 100;//图片质量

	$src = '..'.$_POST['tu'];//原图地址
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);
	
	header('Content-type: image/jpeg');
	imagejpeg($dst_r,'../Public/Upload/user/'.$_SESSION['user_id'].'/s_1.jpg',$jpeg_quality);
}
?>