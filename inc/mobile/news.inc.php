<?php

global $_W,$_GPC;
include 'function.php';
//判断头部开始
if($_W['container']=='wechat'){
	if($_W['fans']['follow']=='1'){
//判断头部结束

$moreads2=pdo_fetch("SELECT * FROM".tablename('hulu_love_moreads')."WHERE uniacid=:uniacid AND moreads_page=:moreads_page",array(':uniacid'=>$_W['uniacid'],':moreads_page'=>'2'));

	$weidu=pdo_fetchall("SELECT * FROM".tablename('hulu_love_news')."WHERE uniacid=:uniacid AND news_openid=:news_openid AND openid=:openid AND news_type=:news_type",array(':uniacid'=>$_W['uniacid'],':news_openid'=>$_W['openid'],':openid'=>$_GPC['news_openid'],':news_type'=>'1'));

foreach($weidu as $key=>$weidu){
	pdo_update('hulu_love_news',array('news_type'=>'2'),array('uniacid'=>$_W['uniacid'],'news_id'=>$weidu['news_id'],'news_openid'=>$_W['openid'],'openid'=>$_GPC['news_openid']));

}


$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

$ta=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['news_openid']));

$make=pdo_fetch("SELECT * FROM".tablename('hulu_love_make')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));


$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
$endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;


$beginnews=pdo_fetchall("SELECT * FROM".tablename('hulu_love_news')."WHERE uniacid=:uniacid AND openid=:openid AND news_time>=$beginToday",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

$endnews=pdo_fetchall("SELECT * FROM".tablename('hulu_love_news')."WHERE uniacid=:uniacid AND openid=:openid AND news_time<=$endToday",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));


$today_num=count(array_intersect_assoc($beginnews,$endnews));

if(($today_num-$make['make_news_oneday'])<='0'){
$today_allow='1';
}else{
$today_allow='2';

}

include $this->template('news');

//判断尾部开始
	}else{ include $this->template('nofollow');}
}else{ include $this->template('wechat');}
//判断尾部结束
//include $this->template('news');

?>