<?php

global $_W,$_GPC;

include 'function.php';

$make=pdo_fetch("SELECT * FROM".tablename('hulu_love_make')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));

//��������
$user=pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));
//��������
$more=pdo_fetch("SELECT * FROM".tablename('hulu_love_more')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));

//��żҪ��
$request=pdo_fetch("SELECT * FROM".tablename('hulu_love_request')."WHERE uniacid=:uniacid AND openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));

//��Ƭ
$photos=pdo_fetchall("SELECT * FROM".tablename('hulu_love_photos')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY pic_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));
//���Ѳ鿴������ϵ��ʽ
$contact=pdo_fetchall("SELECT * FROM".tablename('hulu_love_contact')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY contact_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));

//��������
$enjoy=pdo_fetchall("SELECT * FROM".tablename('hulu_love_enjoy')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY enjoy_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));
//�յ�������
$receive=pdo_fetchall("SELECT * FROM".tablename('hulu_love_receive')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY receive_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));

//�����Ļ
$active=pdo_fetchall("SELECT * FROM".tablename('hulu_love_active')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY active_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));

//�μӵĻ
$join=pdo_fetchall("SELECT * FROM".tablename('hulu_love_join')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY join_id",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));
//ͬ��Ȧ��̬
$talk=pdo_fetchall("SELECT * FROM".tablename('hulu_love_talk')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY talk_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));
//���ּ�¼
$withdraw=pdo_fetchall("SELECT * FROM".tablename('hulu_love_withdraw')."WHERE uniacid=:uniacid AND openid=:openid ORDER BY with_id DESC",array(':uniacid'=>$_W['uniacid'],':openid'=>$_GPC['openid']));
include $this->template('web/user_view');

?>