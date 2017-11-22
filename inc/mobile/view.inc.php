<?php

global $_W,$_GPC;
include 'function.php';

SESSION_START();
$_SESSION['share']=$_GPC['share'];

$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND uid=:uid",array(':uniacid'=>$_W['uniacid'],':uid'=>$_GPC['uid']));


$viewer=pdo_fetchall("SELECT * FROM".tablename('hulu_love_viewer')."WHERE uniacid=:uniacid AND openid=:openid AND viewer_openid=:viewer_openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$user['openid'],':viewer_openid'=>$_W['openid']));


if(empty($viewer)&&($_W['openid'])){

$visitor=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

$viewer_nickname=isset($visitor['nickname'])?$visitor['nickname']:$_W['fans']['nickname'];
$viewer_avatar=isset($visitor['avatar'])?$visitor['avatar']:$_W['fans']['tag']['avatar'];
$viewer_sex=isset($visitor['sex'])?$visitor['sex']:$_W['fans']['tag']['sex'];

	$newviewer=array(
		'uniacid'=>$_W['uniacid'],
		'openid'=>$user['openid'],
		'viewer_openid'=>$_W['openid'],
		'viewer_nickname'=>$viewer_nickname,
				'viewer_avatar'=>$viewer_avatar,
		'viewer_sex'=>$viewer_sex,

		'viewer_time'=>$_W['timestamp'],
		'viewer_ip'=>$_W['clientip'],
		'viewer_container'=>$_W['container'],
		'viewer_os'=>$_W['os'],
				);
	pdo_insert('hulu_love_viewer',$newviewer);

}


$like=pdo_fetchall("SELECT * FROM".tablename('hulu_love_like')."WHERE uniacid=:uniacid AND openid=:openid AND like_openid=:like_openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$user['openid'],':like_openid'=>$_W['openid']));


$request=pdo_fetch("SELECT * FROM".tablename('hulu_love_request')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$user['openid']));

$more=pdo_fetch("SELECT * FROM".tablename('hulu_love_more')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$user['openid']));

$make=pdo_fetch("SELECT * FROM".tablename('hulu_love_make')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));

if($user['contact_money']>'0'){
	$order_price=$user['contact_money'];
}elseif(($user['contact_money']=='0') AND ($user['sex']=='1')){	$order_price=$make['make_contact_boymoney'];
}elseif(($user['contact_money']=='0') AND ($user['sex']=='2')){	$order_price=$make['make_contact_girlmoney'];
}elseif(($user['contact_money']=='0') AND ($user['sex']=='0')){	$order_price=$make['make_contact_nomoney'];


}else{}


$order_num=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);

//��Ƭ
$photos=pdo_fetchall("SELECT * FROM".tablename('hulu_love_photos')."WHERE uniacid=:uniacid AND openid=:openid AND pic_pid=:pic_pid ORDER BY pic_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$user['openid'],':pic_pid'=>'3'));

$photos_num=count($photos);
//����
$gift1=pdo_fetchall("SELECT * FROM".tablename('hulu_love_receive')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY receive_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$user['openid']));


$store=pdo_fetchall("SELECT * FROM".tablename('hulu_love_store')."WHERE uniacid=:uniacid AND store_openid=:store_openid ORDER BY store_id DESC",array(':uniacid'=>$_W['uniacid'],':store_openid'=>$user['openid']));

$gift=array_merge($gift1,$store);
$gift_num=count($gift);

//�Ƿ�����鿴��ϵ��ʽ

$contact=pdo_fetchall("SELECT * FROM".tablename('hulu_love_contact')."WHERE uniacid=:uniacid AND openid=:openid AND contact_openid=:contact_openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$user['openid'],':contact_openid'=>$_W['openid']));


$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
$endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;


$begin_contact=pdo_fetchall("SELECT * FROM".tablename('hulu_love_contact')."WHERE uniacid=:uniacid AND contact_openid=:contact_openid AND contact_time>=$beginToday",array(':uniacid'=>$_W['uniacid'],':contact_openid'=>$_W['openid']));

$end_contact=pdo_fetchall("SELECT * FROM".tablename('hulu_love_contact')."WHERE uniacid=:uniacid AND contact_openid=:contact_openid AND contact_time<=$endToday",array(':uniacid'=>$_W['uniacid'],':contact_openid'=>$_W['openid']));


$today_contact=count(array_intersect_assoc($begin_contact,$end_contact));



$viewer=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
include $this->template('view');

?>