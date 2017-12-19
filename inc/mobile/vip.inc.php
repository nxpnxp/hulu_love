<?php

global $_W,$_GPC;
include 'function.php';

$user = pdo_fetch("SELECT * FROM".tablename('hulu_love_user')."WHERE uniacid=:uniacid and openid=:openid",array(':uniacid'=>$_W['uniacid'],':openid'=>$_W['openid']));
if($user['ureal'] != '2'){
	//已实名认证
	message('实名认证后才可升级VIP会员！',$this->createMobileUrl('real'),'error');die;
}

$make=pdo_fetch("SELECT * FROM".tablename('hulu_love_make')."WHERE uniacid=:uniacid",array(':uniacid'=>$_W['uniacid']));

$order_num=date('YmdHis').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8);

$uid = pdo_fetchcolumn("select uid from ".tablename('mc_mapping_fans')." WHERE uniacid={$_W['uniacid']} and openid = '{$_W['openid']}'");
$jifen = pdo_fetchcolumn("select credit1 from ".tablename('mc_members')." WHERE uid=$uid and uniacid={$_W['uniacid']}");


include $this->template('vip');
?>