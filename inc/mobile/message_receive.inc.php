<?php


global $_W,$_GPC;

/*
$data=array(
array('name'=>'葫芦','city'=>'武汉市',),
array('name'=>'黎明','city'=>'上海市',),

);
*/
$openid='oWkedt5IzbNXD7VQZeDrnFtHUyVs';
//我作为发布者
$news1=pdo_fetchall("SELECT * FROM".tablename('hulu_love_news')."WHERE uniacid=:uniacid AND openid=:openid AND news_openid=:news_openid ",array(':uniacid'=>$_W['uniacid'],':openid'=>$openid,':news_openid'=>$_GPC['news_openid']));
//我作为接收者
$news2=pdo_fetchall("SELECT * FROM".tablename('hulu_love_news')."WHERE uniacid=:uniacid AND openid=:openid AND news_openid=:news_openid ",array(':uniacid'=>$_W['uniacid'],':news_openid'=>$openid,':openid'=>$_GPC['openid']));

$news=array();

$news=array_merge($news1,$news2);



$news=json_encode($news);

	echo ($news);

?>