<?php

global $_W,$_GPC;

include 'function.php';

$make=pdo_fetch("SELECT * FROM".tablename('hulu_love_make')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));

//基本资料
$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));
//更多资料
$more=pdo_fetch("SELECT * FROM".tablename('hulu_love_more')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));

//择偶要求
$request=pdo_fetch("SELECT * FROM".tablename('hulu_love_request')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));

//照片
$photos=pdo_fetchall("SELECT * FROM".tablename('hulu_love_photos')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY pic_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));
//付费查看他的联系方式
$contact=pdo_fetchall("SELECT * FROM".tablename('hulu_love_contact')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY contact_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));

//打赏他的
$enjoy=pdo_fetchall("SELECT * FROM".tablename('hulu_love_enjoy')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY enjoy_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));
//收到的礼物
$receive=pdo_fetchall("SELECT * FROM".tablename('hulu_love_receive')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY receive_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));

//发布的活动
$active=pdo_fetchall("SELECT * FROM".tablename('hulu_love_active')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY active_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));

//参加的活动
$join=pdo_fetchall("SELECT * FROM".tablename('hulu_love_join')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY join_id",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));
//同城圈动态
$talk=pdo_fetchall("SELECT * FROM".tablename('hulu_love_talk')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY talk_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));
//提现记录
$withdraw=pdo_fetchall("SELECT * FROM".tablename('hulu_love_withdraw')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY with_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));
include $this->template('web/user_view');

?>