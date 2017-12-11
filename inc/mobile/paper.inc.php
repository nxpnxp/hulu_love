<?php
use Grafika\Grafika;
global $_W;
include 'function.php';

$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
$uid = $user['uid'];
$nickname = $user['nickname'];
$uniacid = $_W['uniacid'];
$filename = '../attachment/paper/'.$uid.'.jpg';

require_once '../grafika/src/autoloader.php';

$editor = Grafika::createEditor(); 

$editor->open($image1, '../paper_bg.jpg');
$avatar = '../attachment/Avatar/'.$uniacid.'_'.$uid.'.png';
if(!file_exists($avatar)){
	$avatar = '../logo.png';
}

$editor->open($image2, $avatar);
$editor->resizeFit($image2 , 100 , 100);
$avatar1 = '../attachment/Avatar1/'.$uniacid.'_'.$uid.'.png';
$editor->save($image2 ,$avatar1);

$editor->open($image3 , $avatar1);
$editor->blend ($image1, $image3 , 'normal', 1,'top-center',0,50);
$editor->save($image1,$filename);

$color = new \Grafika\Color("#ffffff");
$editor->open($image ,$filename);
$editor->text($image ,$nickname,30,160,200,$color,'../2.ttf',0);
$editor->save($image,$filename);

$editor->open($image , $filename);
$editor->text($image ,'长按识别以下二维码一起来交友',20,50,280,$color,'../2.ttf',0);
$editor->save($image,$filename);



$qr = getQrcode($user['openid'],$uid);
$editor->open($image1, $filename);
$editor->open($image2 , $qr);
$editor->blend ($image1, $image2 , 'normal', 1,'top-center',0,350);
$editor->save($image1,$filename);



function getQrcode($openid='',$uid=0){
	$data = url('view',array('share'=>$openid,'uid'=>$uid));
	$data = "http://vp.vipin.net.cn/app/".$data;
	include('../phpqrcode/phpqrcode.php');  
	$filename = "../attachment/qr/".$uid.".png";  //  生成的文件名  
	$errorCorrectionLevel = 'L';  // 纠错级别：L、M、Q、H  
	$matrixPointSize = 4; // 点的大小：1到10  

	\QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);   
	return $filename;
}

include $this->template('paper');



?>