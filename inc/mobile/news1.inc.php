<?php 
	/**
	 * 聊天
	 * @return [type] [description]
	 */
	global $_GPC, $_W;
	$news_openid = $_GPC['news_openid'];

	//用户信息
	$news_user = pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid and openid = :openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['news_openid']));
	$user = pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid and openid = :openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));

	//今天说话数量
	$beginToday=mktime(0,0,0,date('m'),date('d'),date('Y'));
	$endToday=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
	$today_news=pdo_fetchall("SELECT * FROM".tablename('hulu_love_news')."WHERE uniacid=:uniacid AND openid=:openid AND news_time>=".$beginToday." AND news_time<=".$endToday,array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));   
	$today_num=count($today_news);
	$make=pdo_fetch("SELECT * FROM".tablename('hulu_love_make')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));

	//当前聊天房间号
	$room = array($user['uid'],$news_user['uid']);
	sort($room);
	$room_id =implode('_',$room);

	//更新消息状态
	$result = pdo_update('hulu_love_news', array('news_type' => '2'), array('openid' => $_W['openid'],'news_openid' => $_GPC['news_openid'] ));


	include $this->template('news');

	?>